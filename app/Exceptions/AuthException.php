<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    public static function InvalidPhone(): AuthException
    {
        return new self( trans("messages.phone_number_error") );
    }

    public static function AuthError(): AuthException
    {
        return new self( trans("messages.auth_error") );
    }

    public static function InvalidToken(): AuthException
    {
        return new self( trans("messages.no_token") );
    }

    public static function BlockError(): AuthException
    {
        return new self( trans("messages.block_error") );
    }

    public static function UserExists(): AuthException
    {
        return new self( trans("messages.user_exists") );
    }

    public static function CodeExpiry(): AuthException
    {
        return new self( trans("messages.code_expiry") );
    }

    public static function InvalidCode(): AuthException
    {
        return new self( trans("messages.invalid_code") );
    }

    public static function CreateCode(): AuthException
    {
        return new self( trans("messages.create_code") );
    }
}
