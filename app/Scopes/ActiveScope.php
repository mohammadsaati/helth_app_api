<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveScope implements Scope
{
    private $field;
    private $active_status;

    public function __construct($field = "status" , array $active_status = [1])
    {
        $this->field = $field;
        $this->active_status = $active_status;
    }

    public function apply(Builder $builder, Model $model)
    {
        $final_field = $model->getTable().".$this->field";

        return $builder->whereIn("$final_field"  , $this->active_status);
    }
}
