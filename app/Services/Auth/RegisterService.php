<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Service;
use App\Traits\RegisterTrait;

class RegisterService extends Service
{
    use RegisterTrait;

    public function model()
    {
       $this->model = User::class;
    }

    /***********************************
     ******* Overwrite functions *******
     ***********************************/

    public function extraSave()
    {
        ActivationCodeService::createActivationCode($this->user->id);
    }

    protected function extraFields(): array
    {
        return [
            "user_type_id"      =>  $this->register_data["user_type_id"]??1
        ];
    }

    /***********************************
     ******* Overwrite functions *******
     ***********************************/
}
