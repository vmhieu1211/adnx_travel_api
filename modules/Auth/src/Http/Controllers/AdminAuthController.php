<?php

namespace Modules\Auth\src\Http\Controllers;

use App\Helper;
use App\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Auth\src\Http\Requests\AuthRequest;

class AdminAuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $loginValue = $request->input('email');
        $password = $request->input('password');
        $fieldType = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::guard('admin')->attempt([$fieldType => $loginValue, 'password' => $password])) {
            $user = User::where('email',$loginValue)->orWhere('username', $loginValue)->first();
            if ($user->status != 0) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'message' => ['Tài khoản đã bị khóa !'],
                ]);
            } else {
                $token = $user->createToken('admin_token')->plainTextToken;
                $data = [
                    'admin' => $user,
                    'token' => $token
                ];
                return Helper::jsonResponse(Constant::SUCCESS, __('auth::messages.login.success'),$data);
            }
        }

        return Helper::jsonResponse(Constant::UNAUTHORIZED, __('auth::messages.login.failure'));
    }

    public function logout(Request $request)
    {
        if (method_exists(auth()->user()->currentAccessToken(), 'delete')) {
            auth()->user()->currentAccessToken()->delete();
        }

        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        auth()->guard('web')->logout();

        return Helper::jsonResponse(Constant::SUCCESS, __('auth::messages.logout.success'));
    }
}
