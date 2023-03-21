<?php

namespace Modules\Pharmacy\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateNewPharmacyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'banners' => ['nullable'],
            'logo' => ['nullable'],
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:20', 'unique:pharmacies'],
            'summary' => ['nullable', 'string', 'max:5000']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ((auth()->user()->rules->first()->slug == 'doctor') && auth()->user()->pharmacy) {
            return true;
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
