<?php

namespace Tests\Feature\Http\Controllers\Site;

use App\Models\Article\Article;
use App\Models\Article\Comment;
use Tests\TestCase;

class ArticleCommentControllerTest extends TestCase
{
    /**
     * Проверяет показ всех комментариев для статьи.
     *
     * @return void
     */
    public function test_showAllCommentsForArticle()
    {
        $item = Article::query()->published()->firstOrFail();

        $url = route('news.comments', $item, false);
        $response = $this->get($url);

        $response->assertOk();

        $comments = Comment::query()->latest()->published()->byArticleId($item->id)->get();

        $data = $comments->flatMap(fn($item) => [
            $item->user->name,
            $item->created_at,
            $item->text,
        ])->toArray();

        $response->assertSeeInOrder($data, false);
    }
}
