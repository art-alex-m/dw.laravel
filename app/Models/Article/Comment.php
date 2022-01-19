<?php

namespace App\Models\Article;

use App\Enum\ArticleCommentStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment.
 *
 * @package App\Models\Article
 */
class Comment extends Model
{
    protected $table = 'article_comments';

    protected $fillable = [
        'user_id',
        'article_id',
        'text',
    ];

    /**
     * Возвращает связь с пользователем-автором.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Ограничивает выборку опубликованными записями.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', '=', ArticleCommentStatusEnum::PUBLISHED);
    }

    /**
     * Ограничивает выборку по идентификатору статьи.
     *
     * @param Builder $query
     * @param int|null $articleId
     *
     * @return Builder
     */
    public function scopeByArticleId(Builder $query, ?int $articleId): Builder
    {
        if (null === $articleId) {
            return $query;
        }

        return $query->where('article_id', '=', $articleId);
    }
}
