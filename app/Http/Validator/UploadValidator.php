<?php
namespace App\Http\Validator;

use Validator;

class UploadValidator
{
    public function create(array $inputs)
    {
        $rules = [
            'name' => 'required',
            'photos.*' => 'required'
        ];
//        dd($inputs);
        $photos = count($inputs['photos']);
        foreach(range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }

        return Validator::make($inputs,
            $rules,
            [],
            []
        );
    }
}