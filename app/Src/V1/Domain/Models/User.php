<?php

namespace App\Src\V1\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];

    public const PARAM_NAME = 'user_name';
    public const PARAM_ID = 'user_id';
    public const PARAM_EMAIL = 'user_email';
    public const PARAM_PHONE = 'user_phone';
    public const PARAM_CIVIL_STATE = 'user_civil_status';
    public const PARAM_BIRTH_DATE = 'user_birth_date';

    public static function getParamsForCreation(): array
    {
        return [
            self::PARAM_NAME,
            self::PARAM_EMAIL,
            self::PARAM_PHONE,
            self::PARAM_CIVIL_STATE,
            self::PARAM_BIRTH_DATE
        ];
    }
    public static function getParamsForDeletion(): array
    {
        return [
            self::PARAM_ID,
        ];
    }
}
