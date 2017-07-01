<?php

namespace App\Http\Controllers\Api;

require_once __DIR__ . '/ApiStatusDefine.php';

use Validator;
use Auth;
use Cache;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!$validate->fails()) {
            if (Auth::attempt($request->all())) {

                //clean cache
                $this->cleanCache(Auth::getUser()->getAttribute('api_token'));

                $token = str_random(32);
                Auth::getUser()->setAttribute('api_token', $token)->save();
                return new JsonResponse(
                    array('status' => API_STATUS_SUCCESS, 'api_token' => $token)
                );
            } else {
                return new JsonResponse(
                    array('status' => API_STATUS_BAD_REQUEST, 'error' => 'Incorrect email or password'),
                    API_STATUS_BAD_REQUEST);
            }

        } else {
            return new JsonResponse(['error' => $validate->errors()], API_STATUS_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'api_token' => 'required',
        ]);

        if (!$validate->fails()) {
            $this->cleanCache($request->get('api_token'));
            return new JsonResponse(['status' => API_STATUS_SUCCESS]);
        } else {
            return new JsonResponse(['error' => $validate->errors()], API_STATUS_BAD_REQUEST);
        }
    }

    private function cleanCache($apiToken)
    {
        if (Cache::has($apiToken)) {
            Cache::forget($apiToken);
        }
    }
}
