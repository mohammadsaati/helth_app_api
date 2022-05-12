<?php

namespace App\Services\Auth;

use App\Exceptions\AuthException;
use App\Models\ActivationCode;
use App\Models\User;
use App\Services\Service;
use Carbon\Carbon;

class ActivationCodeService extends Service
{

    private string $activation_code_filed_name = "code";

    public function model()
    {
        $this->model = ActivationCode::class;
    }

    /**
     * @param string $activation_code_filed_name
     */
    public function setActivationCodeFiledName(string $activation_code_filed_name): void
    {
        $this->activation_code_filed_name = $activation_code_filed_name;
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

    public static function CheckUserHaveCode(User $user) : AuthException
    {
        if (User::getUserActivationCode(user: $user))
        {
            self::CheckCodeExpiry($user->activationCodes()->first());
        }
        return AuthException::CreateCode();
    }

    public static function CheckCodeExpiry($activationCode): void
    {
        $current_time = Carbon::now();
        $expiry_time = Carbon::parse( $activationCode->expired_at );

        if ($expiry_time->greaterThan( $current_time ))
        {
            AuthException::CodeExpiry();
        }

    }

    /************************************
     ************** Static Func ********
     ***************  END *************/

}
