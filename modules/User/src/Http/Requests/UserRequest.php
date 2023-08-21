<?php

namespace Modules\User\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_code' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'passport' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('user::validation.required'),
        ];
    }

    public function attributes()
    {
        return [
            'user_code' => __('user::validation.name'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    public function handle()
    {
        $validatedData = $this->validated();

        // Xử lý logic của bạn tại đây

        return response()->json(['message' => 'Success'], 200);
    }
}
