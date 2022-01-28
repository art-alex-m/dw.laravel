<?php

namespace App\Services;

use App\Enum\ArticleCommentStatusEnum;
use App\Enum\PermissionsEnum;
use App\Models\Article\Comment;
use App\Models\User;

/**
 * Class ArticleCommentService.
 *
 * @package App\Services
 */
class ArticleCommentService
{
    /**
     * Создает новый комментарий к статье.
     *
     * @param User $user
     * @param array $comment
     *
     * @return Comment
     */
    public function create(User $user, array $comment): Comment
    {
        $model = new Comment($comment);

        $model->status = $user->can(PermissionsEnum::SITE_ARTICLE_COMMENT_PUBLISH)
            ? ArticleCommentStatusEnum::PUBLISHED
            : ArticleCommentStatusEnum::MODERATION;

        $model->save();

        return $model;
    }
}
