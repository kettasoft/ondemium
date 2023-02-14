<?php

namespace Modules\Experience\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Specialization\Rules\SpecializationRule;

class AddExperienceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clinic_username' => ['required', 'string', 'starts_with:@', 'exists:clinics,username'],
            'job_type'        => ['required', 'in:full-time,part-time,contract,private-job,trining'],
            'specializations' => ['required', 'string', new SpecializationRule()],
            'from_date'       => ['required', 'date'],
            'end_date'        => ['required', 'date'],
            'description'     => ['nullable', 'string', 'max:2000'],
            'modes'           => ['nullable', 'file'],
            'work_now'        => ['required', 'boolean'],
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

    public function messages()
    {
        return [
            //
        ];
    }
}
