<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SortScope implements Scope
{

    private string $sort_by_field;
    private string $order_by;

    public function __construct(string $sort_by_field = "id" , string $order_by = "DESC")
    {
        $this->sort_by_field = $sort_by_field;
        $this->order_by = $order_by;
    }

    public function apply(Builder $builder, Model $model)
    {
        $final_field = $model->getTable().".$this->sort_by_field";

        return $builder->orderBy("$final_field" , $this->order_by);
    }
}
