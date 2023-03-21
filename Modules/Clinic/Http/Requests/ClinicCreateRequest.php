<?php

namespace Modules\Clinic\Http\Requests;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Clinic\Models\Clinic;

class ClinicCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
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
    public function authorize()
    {
        return app(Gate::class)->allows('create', Clinic::class);
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
            //
        ];
    }
}
