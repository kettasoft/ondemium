<?php

namespace Modules\Specialization\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Specialization\Models\Specialization;

class SpecializationRule implements Rule
{
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
        $specializations = Specialization::all('slug')->toArray();
        $values = str_contains($value, ',') ? explode(',', $value) : [$value];

        $subArray = [];

        foreach ($specializations as $key => $value) {
            $subArray[] = $value['slug'];
        }

        foreach ($values as $value) {
            if (!array_search(trim($value), $subArray)) {
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
        return 'An invalid specialty was specified.';
    }
}
