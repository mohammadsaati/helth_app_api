<?php

namespace App\Services\Auth;

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


    /************************************
     ************** Static Func ********
     ***************  END *************/

    private function checkUserHaveCode(User $user)
    {
        $code = $user->activationCode()->where("is_used" , 0);
    }
}
