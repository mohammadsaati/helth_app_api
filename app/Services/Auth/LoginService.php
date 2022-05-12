<?php

namespace App\Services\Auth;

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
        ActivationCodeService::CheckUserHaveCode(user: $this->user);
    }

    /***********************************
     ******* Overwrite functions *******
     ***********************************/
}
