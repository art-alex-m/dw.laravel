<?php

namespace Database\Factories;

use App\Lib\Factory\WithArticleIdTrait;
use App\Lib\Factory\WithStartIdTrait;
use App\Models\Article\Article;
use App\Models\Article\ArticleToCategory;
use App\Models\Article\Category;
use Generator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * Class ArticleToCategoryFactory.
 *
 * @package Database\Factories
 */
class ArticleToCategoryFactory extends Factory
{
    use WithStartIdTrait;
    use WithArticleIdTrait;

    protected $model = ArticleToCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => 1,
            'article_id' => 1,
        ];
    }

    /**
     * @return ArticleToCategoryFactory
     */
    public function withDbArticles(): static
    {
        $generator = $this->dbArticlesIdGenerator();

        return $this->state(function () use ($generator) {
            $data = ['article_id' => $generator->current()];
            $generator->next();

            return $data;
        });
    }

    /**
     * @return ArticleToCategoryFactory
     */
    public function withRandomCategory(): static
    {
        return $this->state(
            new Sequence(
                fn() => ['category_id' => Category::query()->inRandomOrder()->first('id')],
            )
        );
    }

    /**
     * @return Generator
     */
    protected function dbArticlesIdGenerator(): Generator
    {
        $data = Article::query()->pluck('id');
        foreach ($data as $articleId) {
            yield $articleId;
        }
    }
}
