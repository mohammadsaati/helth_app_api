<?php

namespace App\Services\Auth;

use App\Jobs\UserActivationCodeUsedJob;
use App\Models\User;
use App\Services\Service;
use App\Traits\Login;

class LoginService extends Service
{
    use Login;

    public function model()
    {
        $this->model = User::class;
    }

    /***********************************
     ******* Overwrite functions *******
     ***********************************/

    protected function loginPermission()
    {
         ActivationCodeService::CheckCode(user: $this->user , code: $this->logged_in_date["activation_code"]??"");
    }

    protected function afterLogin() : void
    {
        UserActivationCodeUsedJob::dispatch($this->user->activationCodes()->first());
    }

    /***********************************
     ******* Overwrite functions *******
     ***********************************/
}
