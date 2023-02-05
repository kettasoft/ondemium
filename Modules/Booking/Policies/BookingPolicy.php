<?php

namespace Modules\Booking\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Doctor\Models\Doctor;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkIfAvilable($sick, $clinic, $setting)
    {
        if(is_null($setting->less_age) && is_null($setting->older_age)) {
            return true;
        }

        $dates = [
            'less' => $setting->less_age,
            'older' => $setting->older_age,
        ];

        foreach ($dates as $name => $date) {
            if(!is_null($date)) {
                if ($name == 'less') {
                    return $sick->date_birth <= $date;
                }
                if ($name == 'older') {
                    return $sick->date_birth >= $date;
                }
            }
        }

        return false;
    }

    private function checkIfTheAgeIsAppropriate($sick, $clinic, $setting)
    {
        if (!is_null($setting->older_age) and $setting->older_age <= $sick->date_birth) {
            return true;
        }
    }
}
