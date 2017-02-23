<?php

namespace App\Http\Controllers\Auth;

use App\Http\Service\UserRegisterService;
use App\Http\Validator\UserRegisterValidator;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRegisterService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }

    public function register(Request $request)
    {
        (new UserRegisterValidator())->create($request->all())->validate();

        $this->service->create($request->all());

        return view('auth.confirm');
    }
}
