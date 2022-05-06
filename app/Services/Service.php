<?php


namespace App\Services;


use App\Services\Interfaces\ChooseModelInterface;

abstract class Service
{
    public $model;
    protected int $pagination = 20;

    protected $query;

    public function __construct()
    {
        $this->model();

    }

    abstract public function model();

    public function setModelWithInterFace(ChooseModelInterface $chooseModel)
    {

    }

    public function showAll( $filter = [] )
    {
        return $this->model::query()->filter( $filter )
            ->paginate($this->pagination)
            ->appends($filter->request->query());
    }

    public function updates($data ,$item )
    {
        $safe_data = $this->protection($data);
        $item->update($safe_data);
    }

    protected function protection($data)
    {
        $protections = ["_token" , "id"];

        foreach ($data as $key => $value)
        {

            if (in_array($key , $protections))
            {
                unset($data[$key]);

            }

        }
        return $data;
    }
}
