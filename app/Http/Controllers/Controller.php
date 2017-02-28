<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setPageTitle($title)
    {
        view()->share('pageTitle', $title);
    }

    protected function showPermissionError()
    {
        if (request()->wantsJson()) {
            $response = response()->json(['error' => trans('errors.permissionJson')], 403);
        } else {
            $response = redirect('/');
            session()->flash('error', trans('errors.permission'));
        }

        throw new HttpResponseException($response);
    }

    protected function jsonError($messageText = "", $statusCode = 500)
    {
        return response()->json(['message' => $messageText], $statusCode);
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        if ($request->expectsJson()) {
            return response()->json(['validation' => $errors], 422);
        }

        return redirect()->to($this->getRedirectUrl())
            ->withInput($request->input())
            ->withErrors($errors, $this->errorBag());
    }


}
