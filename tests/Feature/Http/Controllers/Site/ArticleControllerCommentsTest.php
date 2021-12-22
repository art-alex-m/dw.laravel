<?php

namespace Tests\Feature\Http\Controllers\Site;

use App\Models\Article\Article;
use App\Repositories\Site\ArticleCommentRepository;
use Tests\TestCase;

/**
 * Class ArticleControllerCommentsTest.
 *
 * @package Tests\Feature\Http\Controllers\Site
 */
class ArticleControllerCommentsTest extends TestCase
{
    /**
     * Проверяет, что детальный просмотр отдает нужные комментарии.
     *
     * @return void
     */
    public function test_commentsIsShouwn()
    {
        $item = Article::query()->published()->firstOrFail();

        $url = route('news.detail', $item, false);
        $response = $this->get($url);

        $response->assertOk();

        /** @var \Illuminate\Database\Eloquent\Collection $comments */
        $comments = app(ArticleCommentRepository::class)->getPublished(2, $item->id);
        $data = $comments->flatMap(fn($item) => [
            $item->user->name,
            $item->created_at,
            $item->text,
        ])->toArray();

        $data = array_merge([
            '<h4 class="mt-5">Комментарии</h4>',
            '<div id="comment-list">'
        ], $data);

        $response->assertSeeInOrder($data, false);
    }
}
