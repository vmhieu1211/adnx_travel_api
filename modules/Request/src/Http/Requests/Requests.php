<?php

namespace Modules\Request\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Requests extends FormRequest
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
            'full_name' => 'required ',
            'customer_code' => 'required',
            'date' => 'required',
            'driver_request' => 'required',
            'pick_up_point' => 'required',
            'quantity' => 'required',
            'serve_trip' => 'required',
            'contact_method' => 'required'
        ];
    }

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [];
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
