<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!$validate->fails()) {
            if (\Auth::attempt($request->all())) {
                $token = str_random(32);
                \Auth::getUser()->setAttribute('api_token', $token)->save();
                return new JsonResponse(['token' => $token]);
            } else {
                return new JsonResponse(['error' => 'email not match'], 404);
            }

        } else {
            return new JsonResponse(['error' => $validate->errors()], 404);
        }
    }
}
