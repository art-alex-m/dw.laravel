<?php

namespace App\Enum;

use App\Lib\Enum\BaseEnum;

/**
 * Class PermissionsEnum.
 *
 * @package App\Enum
 */
final class PermissionsEnum extends BaseEnum
{
    /// SITE
    public const SITE_ARTICLE_COMMENT_CREATE = 'perm.site.article.comment.create';
    public const SITE_ARTICLE_COMMENT_PUBLISH = 'perm.site.article.comment.publish';

    ///  ADMIN
    public const ADMIN_UI = 'perm.admin.ui';
    public const ADMIN_ARTICLE = 'perm.admin.article';
    public const ADMIN_ARTICLE_CATEGORY = 'perm.admin.article.category';
    public const ADMIN_ARTICLE_COMMENT = 'perm.admin.article.comment';

    protected static $list = [
        self::SITE_ARTICLE_COMMENT_CREATE => 'Create comment for article',
        self::SITE_ARTICLE_COMMENT_PUBLISH => 'Publish comment for article without moderation',
        self::ADMIN_ARTICLE => 'Manage articles',
        self::ADMIN_ARTICLE_COMMENT => 'Manage articles comments',
        self::ADMIN_ARTICLE_CATEGORY => 'Manage article categories',
        self::ADMIN_UI => 'Access to admin cabinet',
    ];
}
