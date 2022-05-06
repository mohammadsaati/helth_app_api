<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;

    public static function Error($title , $errors)
    {
        return [
            "title"     =>  $title ,
            "errors"    =>  $errors ,
        ];
    }

    private function showErrors($errors)
    {
        foreach ($errors as $error)
        {
            return $error;
        }
    }
}
