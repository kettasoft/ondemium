<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'alpha', 'min:3', 'max:15'],
            'last_name' => ['required', 'alpha', 'min:3', 'max:15'],
            'gender' => ['required', 'in:male,female'],
            'date_birth' => ['required', 'date'],
            'phone' => ['required', 'numeric', 'unique:users'],
            'country_code' => ['required', 'numeric', 'starts_with:+'],
            'password' => ['required', 'min:8']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
