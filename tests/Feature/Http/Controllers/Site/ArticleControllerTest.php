<?php

namespace Tests\Feature\Http\Controllers\Site;

use App\Repositories\Site\ArticleRepository;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pageNewsExists()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertViewIs('site.articles.index');

        /** @var \Illuminate\Database\Eloquent\Collection $articles */
        $articles = app(ArticleRepository::class)->getPublishedNews(20, null);

        $data = $articles
            ->flatMap(fn($item) => [
                "<h3>{$item->title}</h3>",
                $item->short,
                sprintf('<a href="%s">', route('news.detail', $item)),
            ])
            ->toArray();

        $response->assertSeeInOrder($data, false);
    }
}
