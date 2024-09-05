<?php declare(strict_types=1);

namespace App\Enums;

enum UserStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;
    case SUSPENDED = 2;
}
