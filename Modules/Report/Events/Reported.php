<?php

namespace Modules\Report\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Report\Models\Report;

class Reported
{
    use SerializesModels;

    public Report $report; 

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
