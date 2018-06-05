<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return bool
     */
    public function isVerified():bool
    {
        return $this->verified == User::VERIFIED_USER;
    }

    /**
     * @return bool
     */
    public function isAdmin():bool
    {
        return $this->admin == User::ADMIN_USER;
    }

    /**
     * @return string
     */
    public static function generateVerificationCode():string
    {
        return str_random(40);
    }
}
