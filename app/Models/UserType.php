<?php

namespace App\Models;

enum UserType: string
{
    case ADMIN = 'admin';
    case USER = 'user';
}
