<?php

namespace App\Models;

use App\Exceptions\AuthException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "first_name" ,
        "last_name" ,
        "phone_number" ,
        "api_key"  ,
        "status" ,
        "user_type_id"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /************************************
     ************** Relations ***********
     ***************  START *************/

    public function activationCodes()
    {
        return $this->hasMany(ActivationCode::class , "user_id");
    }

    /************************************
     ************** Relations ***********
     ***************  END *************/


    /************************************
     ************** Static Func *********
     ***************  START ************
     * @throws AuthException
     */

    public static function getUserActivationCode(User $user) : int
    {
        $activation_code = $user->activationCodes()->first();

        if (!$activation_code)
            throw AuthException::CreateCode();

        return $activation_code->code;
    }

    /************************************
     ************** Static Func *********
     ***************  END *************/

}
