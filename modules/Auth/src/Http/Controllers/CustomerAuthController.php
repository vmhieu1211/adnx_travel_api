<?php

namespace Modules\Auth\src\Http\Controllers;

use App\Helper;
use App\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Auth\src\Http\Requests\AuthRequest;
use Modules\Customer\src\Models\Customer;

class CustomerAuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $loginValue = $request->input('email');
        $password = $request->input('password');
        $fieldType = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'customer_name';

        if (Auth::guard('customer')->attempt([$fieldType => $loginValue, 'password' => $password])) {
            $user = Customer::where('email',$loginValue)->orWhere('customer_name', $loginValue)->first();
            if ($user->status != 0) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'message' => ['Tài khoản đã bị khóa !'],
                ]);
            } else {
                $token = $user->createToken('customer_token')->plainTextToken;
                $data = [
                    'customer' => $user,
                    'token' => $token,
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
