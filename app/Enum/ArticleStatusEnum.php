<?php

namespace App\Enum;

use App\Lib\Enum\BaseEnum;

/**
 * Class ArticleStatusEnum.
 * Статусы статей
 *
 * @package App\Enum
 */
final class ArticleStatusEnum extends BaseEnum
{
    public const DRAFT = 'draft';
    public const PUBLISHED = 'published';
    public const ARCHIVE = 'archive';

    protected static $list = [
        self::DRAFT => 'Draft',
        self::PUBLISHED => 'Published',
        self::ARCHIVE => 'Archive',
    ];
}
