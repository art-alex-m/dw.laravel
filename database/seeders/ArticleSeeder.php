<?php

namespace Database\Seeders;

use App\Enum\ArticleStatusEnum;
use App\Lib\Factory\IndexState;
use Database\Factories\ArticleCommentFactory;
use Database\Factories\ArticleFactory;
use Database\Factories\ArticleImageFactory;
use Database\Factories\ArticleViewFactory;
use Illuminate\Database\Seeder;

/**
 * Class ArticleSeeder.
 *
 * @package Database\Seeders
 */
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(
        ArticleFactory $articleFactory,
        ArticleCommentFactory $commentFactory,
        ArticleViewFactory $viewFactory,
        ArticleImageFactory $imageFactory
    ) {
        $articleFactory
            ->count(25)
            ->withStartId()
            ->withDifferentStatus()
            ->has($imageFactory, 'image')
            ->create();

        /** @var \App\Models\Article\Article $article */
        $article = $articleFactory->modelName();
        $data = $article::query()->where('status', '<>', ArticleStatusEnum::DRAFT)->pluck('id');

        $commentIndex = new IndexState('id', 1);
        $viewIndex = new IndexState('id', 1);

        foreach ($data as $articleId) {
            $commentFactory->count(5)->withStartId($commentIndex)->withArticleId($articleId)
                ->withDifferentStatus()->create();
            $viewFactory->count(3)->withStartId($viewIndex)->withArticleId($articleId)
                ->withRandomViews()->create();
        }
    }
}
