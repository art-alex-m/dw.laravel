<?php

namespace Database\Factories;

use App\Enum\ArticleStatusEnum;
use App\Lib\Factory\WithStartIdTrait;
use App\Lib\Factory\WithUserIdTrait;
use App\Models\Article\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * Class ArticleFactory.
 *
 * @package Database\Factories
 */
class ArticleFactory extends Factory
{
    use WithStartIdTrait;
    use WithUserIdTrait;

    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'status' => ArticleStatusEnum::PUBLISHED,
            'title' => $this->faker->sentence(),
            'short' => $this->faker->sentences(asText: true),
            'text' => $this->faker->paragraphs(asText: true),
        ];
    }

    /**
     * Устанавливает разный статус статей.
     *
     * @return $this
     */
    public function withDifferentStatus(): self
    {
        return $this->state(
            new Sequence(
                ['status' => ArticleStatusEnum::DRAFT],
                ['status' => ArticleStatusEnum::PUBLISHED],
                ['status' => ArticleStatusEnum::PUBLISHED],
                ['status' => ArticleStatusEnum::PUBLISHED],
                ['status' => ArticleStatusEnum::ARCHIVE],
            )
        );
    }
}
