<?php

namespace App\Enum;

/**
 * Class RolesEnum.
 *
 * @package App\Enum
 */
class RolesEnum extends \App\Lib\Enum\BaseEnum
{
    public const SUPER_ADMIN = 'role.super_admin';

    protected static $list = [
        self::SUPER_ADMIN => 'Super Administrator',
    ];
}
