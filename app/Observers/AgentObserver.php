<?php

namespace App\Observers;

use Modules\Token\Models\Agent;

class AgentObserver
{
    /**
     * Handle the Agent "created" event.
     *
     * @param  \Modules\Token\Models\Agent  $agent
     * @return void
     */
    public function created(Agent $agent)
    {
        //
    }

    /**
     * Handle the Agent "updated" event.
     *
     * @param  \Modules\Token\Models\Agent  $agent
     * @return void
     */
    public function updated(Agent $agent)
    {
        if ($agent->status == false && $session = $agent->session) {
            $session->delete();
        }
    }

    /**
     * Handle the Agent "deleted" event.
     *
     * @param  \Modules\Token\Models\Agent  $agent
     * @return void
     */
    public function deleted(Agent $agent)
    {
        //
    }

    /**
     * Handle the Agent "restored" event.
     *
     * @param  \Modules\Token\Models\Agent  $agent
     * @return void
     */
    public function restored(Agent $agent)
    {
        //
    }

    /**
     * Handle the Agent "force deleted" event.
     *
     * @param  \Modules\Token\Models\Agent  $agent
     * @return void
     */
    public function forceDeleted(Agent $agent)
    {
        //
    }
}
