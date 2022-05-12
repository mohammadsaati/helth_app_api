<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id"           ,       "code"      ,
        "is_used"           ,       "expired_at",
    ];

    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope( new ActiveScope(field: "is_used" , active_status: [0] ) );
        self::addGlobalScope(new SortScope);
    }

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
