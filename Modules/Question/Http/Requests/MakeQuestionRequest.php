<?php

namespace Modules\Question\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MakeQuestionRequest extends FormRequest
{
    private const MYSELF = 1;
    private const SOMEONE = 2;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'specialty' => ['required'],
            'title' => ['required', 'string', 'min:1', 'max:50'],
            'description' => ['required', 'min:1', 'max:250'],
            'whom' => ['required', 'in:'.self::MYSELF.',' . self::SOMEONE . ''],
            'gender' => ['required', 'in:male,female'],
            'age' => 'required|integer|min:1|max:99'
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
            'age.min' => 'Age connot be less then :min years',
            'age.max' => 'Age connot be older then :max years',
        ];
    }
}
