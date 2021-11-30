<?php

namespace Database\Factories;

use App\Enum\ArticleCommentStatusEnum;
use App\Lib\Factory\WithArticleIdTrait;
use App\Lib\Factory\WithStartIdTrait;
use App\Lib\Factory\WithUserIdTrait;
use App\Models\Article\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * Class ArticleCommentFactory.
 *
 * @package Database\Factories
 */
class ArticleCommentFactory extends Factory
{
    use WithStartIdTrait;
    use WithUserIdTrait;
    use WithArticleIdTrait;

    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'article_id' => 1,
            'status' => ArticleCommentStatusEnum::PUBLISHED,
            'text' => $this->faker->paragraphs(2, true),
        ];
    }

    /**
     * Устанавливает разный статус.
     *
     * @return $this
     */
    public function withDifferentStatus(): self
    {
        return $this->state(
            new Sequence(
                ['status' => ArticleCommentStatusEnum::PUBLISHED],
                ['status' => ArticleCommentStatusEnum::PUBLISHED],
                ['status' => ArticleCommentStatusEnum::MODERATION],
                ['status' => ArticleCommentStatusEnum::ARCHIVE],
            )
        );
    }
}
