<?php

namespace App\Enum;


use App\Lib\Enum\BaseEnum;

/**
 * Class ArticleCommentStatusEnum.
 * Статусы комментариев к статьям
 *
 * @package App\Enum
 */
final class ArticleCommentStatusEnum extends BaseEnum
{
    public const MODERATION = 'moderation';
    public const PUBLISHED = 'published';
    public const ARCHIVE = 'archive';

    protected static $list = [
        self::MODERATION => 'Moderation',
        self::PUBLISHED => 'Published',
        self::ARCHIVE => 'Archive',
    ];
}
