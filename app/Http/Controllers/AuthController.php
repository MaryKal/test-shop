<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        abort_if(!auth()->attempt($request->validated()), 404, __('auth.failed'));

        $user = $request->user();

        return UserResource::make($user)->additional([
            'token' => $user->createToken(Str::random())->plainTextToken
        ]);
    }
}
