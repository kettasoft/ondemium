<?php

namespace App\Observers;

use Modules\Report\Models\Report;
use Modules\Report\Events\Reported;

class ReportObserver
{
    /**
     * Handle the Report "created" event.
     *
     * @param  \Modules\Report\Models\Report  $report
     * @return void
     */
    public function created(Report $report)
    {
        event(new Reported($report));
    }

    /**
     * Handle the Report "updated" event.
     *
     * @param  \Modules\Report\Models\Report  $report
     * @return void
     */
    public function updated(Report $report)
    {
        //
    }

    /**
     * Handle the Report "deleted" event.
     *
     * @param  \Modules\Report\Models\Report  $report
     * @return void
     */
    public function deleted(Report $report)
    {
        //
    }

    /**
     * Handle the Report "restored" event.
     *
     * @param  \Modules\Report\Models\Report  $report
     * @return void
     */
    public function restored(Report $report)
    {
        //
    }

    /**
     * Handle the Report "force deleted" event.
     *
     * @param  \Modules\Report\Models\Report  $report
     * @return void
     */
    public function forceDeleted(Report $report)
    {
        //
    }
}
