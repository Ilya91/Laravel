<?php

namespace App;

use App\Transformers\UserTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    public $transformer = UserTransformer::class;
    protected $table = 'users';
    protected $dates = ['deleted_at'];
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
        'password', 'remember_token', //'verification_token',
    ];

    public function setNameAttribute($name):void
    {
        $this->attributes['name'] = strtolower($name);
    }

    /**
     * @param $name
     * @return string
     */
    public function getNameAttribute(string $name) :string
    {
        return ucwords($name);
    }

    public function setEmailAttribute($email):void
    {
        $this->attributes['email'] = strtolower($email);
    }

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
