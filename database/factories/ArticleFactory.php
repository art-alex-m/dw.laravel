<?php

namespace Database\Factories;

use App\Enum\ArticleStatusEnum;
use App\Lib\Factory\WithStartIdTrait;
use App\Lib\Factory\WithUserIdTrait;
use App\Models\Article\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence();

        return [
            'user_id' => 1,
            'status' => ArticleStatusEnum::PUBLISHED,
            'title' => $title,
            'short' => $this->faker->sentences(asText: true),
            'text' => $this->faker->paragraphs(asText: true),
            'slug' => Str::slug($title),
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
