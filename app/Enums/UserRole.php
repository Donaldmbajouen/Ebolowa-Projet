<?php

namespace App\Enums;

class UserRole{
    const ADMIN = 'admin_principal';
    const STRUCTURE = 'admin_secondaire';
    const USER = 'utilisateur';

    public static function all(){
        return [
        self::ADMIN,
        self::STRUCTURE,
        self::USER,
        ];
    }
}
