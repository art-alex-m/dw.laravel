<?php

namespace App\Repositories\Site;

use App\Models\Article\Comment;

/**
 * Class ArticleCommentRepository.
 *
 * @package App\Repositories\Site
 */
class ArticleCommentRepository
{
    /**
     * Возвращает список опубликованных комментариев для статьи.
     *
     * @param int $count
     * @param int|null $articleId
     *
     * @return mixed
     */
    public function getPublished(int $count, ?int $articleId)
    {
        return Comment::query()
            ->with(['user'])
            ->published()
            ->byArticleId($articleId)
            ->latest()
            ->take($count)
            ->get();
    }

    /**
     * Возвращает количество опубликованных комментариев для статьи
     *
     * @param int $articleId
     *
     * @return int
     */
    public function countPublished(int $articleId): int
    {
        return Comment::query()
            ->byArticleId($articleId)
            ->published()
            ->count();
    }
}
