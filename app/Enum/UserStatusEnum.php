<?php

namespace App\Enum;

use App\Lib\Enum\BaseEnum;

/**
 * Class UserStatusEnum.
 * Статус пользователя
 *
 * @package App\Enum
 */
final class UserStatusEnum extends BaseEnum
{
    public const ACTIVE = 'active';
    public const BLOCKED = 'blocked';

    protected static $list = [
        self::ACTIVE => 'Active',
        self::BLOCKED => 'Blocked',
    ];
}
