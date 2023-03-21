<?php

namespace App\Observers;

use Modules\Booking\Models\Booking;

class BookingObserver
{
    /**
     * Handle the Booking "created" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "updated" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function updated(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "deleted" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function deleted(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function restored(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function forceDeleted(Booking $booking)
    {
        //
    }
}
