<?php
namespace App\Domain\Services;


use App\Infrastructure\Eloquents\User;

class UserRegisterService
{
    public function create(array $inputs)
    {
        \Log::debug(print_r($inputs, true));
        $user = new User();
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->password = bcrypt($inputs['password']);
        \Log::debug($user);
        $user->save();

        return true;
    }
}