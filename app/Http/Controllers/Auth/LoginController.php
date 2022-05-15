<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private LoginService $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
       return $this->service->login($request->all());
    }
}
