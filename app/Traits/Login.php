<?php

namespace App\Traits;

use App\Exceptions\AuthException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

trait Login
{
    protected $base_model = User::class;
    protected string $api_key_field = "api_key";
    protected array $logged_in_date = [];
    protected $user;

    public function login($data)
    {
        $this->logged_in_date = $data;

        try {
            $this->checkPhoneNumber();
            $this->afterLogin();
            return $this->user;

        } catch (AuthException $exception)
        {
            abort(401 , $exception->getMessage());
        }

    }


    /**
     * @throws AuthException
     */
    protected function checkPhoneNumber()
    {
        $this->user = $this->base_model::query()->where("phone_number" , $this->logged_in_date["phone_number"])
            ->first();

        if (!$this->user)
        {
            throw AuthException::InvalidPhone();
        } else {

            $this->checkUserActive();

        }
    }

    /**
     * @throws AuthException
     */
    protected function checkUserActive()
    {

        if ($this->user->status == 0)
        {
            throw AuthException::BlockError();
        } else {
            $this->checkPassword();
        }

    }

    /**
     * @throws AuthException
     */
    protected function checkPassword()
    {
        if ( !Hash::check( $this->logged_in_date["password"] , $this->user->password) )
        {
            throw AuthException::AuthError();
        } else {
            $this->loginPermission();
        }
    }

    protected function loginPermission()
    {

    }

    protected function afterLogin() : void
    {

    }


}
