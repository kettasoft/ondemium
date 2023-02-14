<?php

namespace Modules\Specialization\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckThatTheSpecialtyIsNotAttached implements Rule
{
    private $error;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $exploded = str_contains($value, ',') ? explode(',', $value) : [$value];

        if (is_null(auth()->user())) return false;

        $subArray = [];

        $specializationsMe = auth()->user()->specializations()->get(['slug'])->toArray();
        foreach ($specializationsMe as $key => $specializationMe) {
            $subArray[] =  $specializationMe['slug'];
        }

        foreach ($exploded as $explod) {
            if (in_array(trim(strtolower($explod)), $subArray)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This is specialization has been attached!';
    }
}
