<?php
/**
 * Created by PhpStorm.
 * User: makino
 * Date: 2017/02/27
 * Time: 11:34
 */

namespace App\Http\Controllers;


use App\Domain\Services\UploadService;
use App\Http\Validator\UploadValidator;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public $service;

    public function __construct(UploadService $service)
    {
        $this->service = $service;
    }

    public function uploadForm()
    {
        $this->setPageTitle('サンプル');

        return view('upload_form');
    }

    public function uploadSubmit(Request $request)
    {
        (new UploadValidator())->create($request->all())->validate();

        $this->service->save($request->all());
        return 'Upload successful!';
    }

}
