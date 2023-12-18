<?php

namespace App\Providers;

use Laravel\Fortify\Http\Responses\LoginResponse as FortifyLoginResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class LoginResponse extends FortifyLoginResponse
{
    public function toResponse($request)
    {
        $role = Auth::user()->role;

        if ($role == 'admin') {
            return $request->wantsJson()
                        ? new JsonResponse('', 201)
                        : redirect(route('admin'));
        }

        return $request->wantsJson()
                    ? new JsonResponse('', 201)
                    : redirect(RouteServiceProvider::HOME);
    }
}