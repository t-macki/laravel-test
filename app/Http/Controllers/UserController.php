<?php
namespace App\Http\Controllers;

use App\Domain\Services\UserService;
use Illuminate\Http\Request;
use Response;
use Symfony\Component\HttpFoundation\Response as Res;

class UserController
{
    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $users = $this->service->find($request->all());
        return Response::json(
            [
                'cd' => '0',
                'message' => "test",
                'items' => $users
            ]
        );
    }

    public function find(Request $request){
        $users = $this->service->findId($request->all());
        return Response::json(
            [
                'cd' => '0',
                'message' => "test",
                'items' => $users
            ]
        );
    }
}