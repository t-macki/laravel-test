<?php
namespace App\Http\Validator;

use Validator;

class UserRegisterValidator
{
    public function create(array $inputs)
    {
        return Validator::make($inputs,
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|max:10|confirmed',
            ],
            [],
            [
                'name' => 'ユーザー名',
                'email' => 'メールアドレス',
                'password' => 'パスワード',
            ]
        );
    }
}