<?php

namespace Modules\User\Events;

use Illuminate\Queue\SerializesModels;
use Modules\User\Models\User;

class Registered
{
    use SerializesModels;

    public User $user;
    public string $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, string $type)
    {
        $this->user = $user;
        $this->type = $type;
    }
}
