<?php

namespace App\Services\Auth;

use App\Exceptions\AuthException;
use App\Models\ActivationCode;
use App\Models\User;
use App\Services\Service;
use Carbon\Carbon;

class ActivationCodeService extends Service
{


    public function model()
    {
        $this->model = ActivationCode::class;
    }


    /************************************
     ************** Static Func ********
     ***************  START *************/

    public static function createActivationCode(int $user_id) : ActivationCode
    {
        return ActivationCode::create([
            "user_id"       =>  $user_id ,
            "code"          =>  rand(1000 , 999999) ,
            "expired_at"    =>  Carbon::now()->addMinutes(10)
        ]);
    }

    /**
     * @throws AuthException
     */
    public static function CheckCode(User $user , $code) : void
    {
        $user_code = User::getUserActivationCode(user: $user);

        if ( !$user_code | $user_code != $code )
        {
           throw AuthException::InvalidCode();
        }

        self::CheckCodeExpiry(activationCode: $user->activationCodes()->first());
    }

    /**
     * @throws AuthException
     */
    public static function CheckUserHaveCode(User $user) : void
    {
        if (User::getUserActivationCode(user: $user))
        {
            self::CheckCodeExpiry($user->activationCodes()->first());
        }
        throw AuthException::CreateCode();
    }

    /**
     * @throws AuthException
     */
    public static function CheckCodeExpiry($activationCode): void
    {
        $current_time = Carbon::now();
        $expiry_time = Carbon::parse( $activationCode->expired_at );

        if (!$expiry_time->greaterThan( $current_time ))
        {
            throw AuthException::CodeExpiry();
        }

    }

    /************************************
     ************** Static Func ********
     ***************  END *************/

}
