<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id"           ,       "code"      ,
        "is_used"           ,       "expired_at",
    ];

    /************************************
     ************** Relations ***********
     ***************  START *************/

    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }

    /************************************
     ************** Relations ***********
     ***************  END *************/

}
