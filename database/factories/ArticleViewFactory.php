<?php

namespace Database\Factories;

use App\Lib\Factory\WithArticleIdTrait;
use App\Lib\Factory\WithStartIdTrait;
use App\Models\Article\View;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ArticleViewFactory.
 *
 * @package Database\Factories
 */
class ArticleViewFactory extends Factory
{
    use WithArticleIdTrait;
    use WithStartIdTrait;

    protected $model = View::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => 1,
            'today' => new DateTime(),
            'value' => 1,
        ];
    }

    /**
     * Устанавливает случайную дату и количество просмотров.
     *
     * @return $this
     */
    public function withRandomViews(): static
    {
        return $this->state(function ($attributes) {
            return [
                'today' => $this->faker->dateTimeThisMonth(timezone: 'UTC'),
                'value' => $this->faker->numberBetween(1, 50),
            ];
        });
    }
}
