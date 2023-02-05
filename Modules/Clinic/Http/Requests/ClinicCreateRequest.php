<?php

namespace Modules\Clinic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClinicCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            // 'doctor_id' => ['required', 'integer', 'exists:doctors,id', 'in:' . $request->user()->id],
            'username' => ['required', 'alpha', 'min:3', 'max:15', 'unique:clinics'],
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'summary' => ['nullable', 'string', 'max:200'],
            'clinic_type' => ['required', 'in:general,especially'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        // $permissions = $request->user()->permissions;

        // return permission($permissions, 'clinic.create');

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

    public function messages()
    {
        return [
            'doctor_id.in' => 'Sorry, you cannot preform this operation'
        ];
    }
}
