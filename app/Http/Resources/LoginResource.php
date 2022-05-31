<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "api_key"               =>      $this->api_key ,
            "first_name"            =>      $this->first_name ,
            "last_name"             =>      $this->last_name ,
            "phone_number"          =>      $this->phone_number ,
            "city"                  =>      ""
        ];
    }
}
