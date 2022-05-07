<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService;
use App\Services\Service;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private Service $service;

    public function __construct()
    {
        $this->service = new RegisterService;
    }

    public function register(RegisterRequest $request)
    {
        $this->service->register($request->all());

        return response_as_json(data: trans("messages.success_register"));
    }

}
