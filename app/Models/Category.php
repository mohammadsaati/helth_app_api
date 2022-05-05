<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"          ,   "slug"          ,
        "parent_id"     ,   "status"        ,
    ];

    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope(new ActiveScope());
        self::addGlobalScope(new SortScope());
    }

    /*************************************
     * ******** scope functions **********
     ************** START ****************/


    /*************************************
     * ******** scope functions **********
     ************** END  ****************/

}
