<?php

namespace Modules\Pharmacy\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;
use Modules\Pharmacy\Models\Pharmacy;

class PharmacyPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Pharmacy $pharmacy)
    {
        return ($pharmacy->user_id === $user->id) && $user->ability("pharmacy.{$pharmacy->username}.create");
    }
}
