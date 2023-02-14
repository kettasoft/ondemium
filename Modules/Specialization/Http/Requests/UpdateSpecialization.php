<?php

namespace Modules\Specialization\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Specialization\Models\Specialization;

class UpdateSpecialization extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = Specialization::whereSlug(request()->get('slug'))->first('id');
        $id = $id ? $id->id : null;
        // dd($id);
        return [
            'name' => ['required', 'string', 'max:50'],
            'slug' => ['required', 'max:100', 'string', 'unique:specializations,slug,' . $id],
            'description' => ['nullable', 'min:50', 'max:1000']
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
