<?php

namespace App\Traits;

use App\Exceptions\AuthException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use ApiKey;

trait RegisterTrait
{
    protected string $base_model = User::class;
    protected string $api_key_field = "api_key";
    protected array $register_data = [];
    protected $user;

    public function register($data)
    {
        $this->register_data = $data;

        try {

            $this->checkUserExist();

            return $this->user;

        } catch (AuthException $exception)
        {
            abort(401 , $exception->getMessage());
        }
    }

    protected function checkUserExist()
    {
        $user = $this->base_model::query()->where("phone_number" , $this->register_data["phone_number"])->first();

        if ($user)
        {
            throw AuthException::UserExists();
        } else {
            $this->createNewUser();
        }

    }


    protected function createNewUser()
    {
        DB::transaction(function () {

            $this->user = $this->base_model::query()->create( $this->primaryFields() );
            $this->extraSave();

        });
    }

    protected function primaryFields(): array
    {

        return array_merge([
            "first_name"            =>  $this->register_data["first_name"] ,
            "last_name"             =>  $this->register_data["last_name"] ,
            "phone_number"          =>  $this->register_data["phone_number"] ,
            "password"              =>  Hash::make($this->register_data["password"]) ,
            "status"                =>  1 ,
            "api_key"               => $this->createApiKey() ,
        ] , $this->extraFields());

    }

    protected function extraFields(): array
    {
        return [];
    }

    public function extraSave()
    {

    }


    private function createApiKey()
    {

        return ApiKey::setModel($this->base_model)->generateKey();
    }
}
