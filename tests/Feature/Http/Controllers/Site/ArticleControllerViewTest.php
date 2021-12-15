<?php

namespace Tests\Feature\Http\Controllers\Site;

use App\Enum\ArticleStatusEnum;
use App\Models\Article\Article;
use Illuminate\Support\Arr;
use Tests\TestCase;

class ArticleControllerViewTest extends TestCase
{
    /**
     * Проверяет структуру страницы опубликованной новости.
     *
     * @return void
     */
    public function test_viewPageIsCorrect()
    {
        $item = Article::query()->withCount('comments')->published()->firstOrFail();

        $url = route('news.detail', $item, false);
        $response = $this->get($url);

        $response->assertOk();

        $data = Arr::flatten([
            sprintf('<img src="%s" width="350" alt="%s">', $item->image->path, $item->title),
            "<h3>{$item->title}</h3>",
            $item->categories
                ->map(fn($category) => sprintf(
                    '<a class="pr-2" href="%s">%s</a>',
                    route('news.category', $category),
                    $category->title
                ))
                ->toArray(),
            $item->created_at,
            $item->comments_count,
            $item->totalViews->total,
            sprintf('<p class="mb-0">%s</p>', $item->short),
            $item->text,
        ]);

        $response->assertSeeInOrder($data, false);
    }

    /**
     * Проверяет, что для неопубликованных новостей запрос отдает 404
     */
    public function test_unpublishedNotShown()
    {
        $article = Article::query()->where('status', '<>', ArticleStatusEnum::PUBLISHED)->firstOrFail();

        $url = route('news.detail', $article, false);
        $response = $this->get($url);

        $response->assertNotFound();
    }
}
