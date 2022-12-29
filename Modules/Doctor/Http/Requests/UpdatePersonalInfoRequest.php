<?php

namespace Modules\Doctor\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePersonalInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $id = $request->user()->id;
        return [
            'first_name' => ['required', 'min:3', 'max:16'],
            'last_name' => ['required', 'min:3', 'max:32'],
            'gender' => ['required', 'in:male,female'],
            'date_birth' => ['required', 'date'],
            'phone' => ['required', 'unique:doctors,phone,', $id],
            'email' => ['required', 'email', 'unique:doctors,email,', $id],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if (auth()->check()) {
            return (bool) Arr::get($request->user(), 'account.update', false);
        }

        return false;
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
