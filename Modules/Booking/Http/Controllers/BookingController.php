<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controller;
use Illuminate\Http\ResponseJson;
use Modules\User\Models\User;
use Modules\Clinic\Models\Clinic;
use Modules\Booking\Http\Requests\MakeBookingRequest;
use Modules\Booking\Http\Requests\CancelBookingRequest;
use Modules\Booking\Http\Requests\UpdateBookingRequest;
use Carbon\Carbon;

class BookingController extends Controller
{

    private $now;

    public function __construct()
    {
        $this->now = now()->format('Y-m-d');
    }

    /**
     * Make a pre-booking for the doctor
     * @param Clinic $Clinic
     * @param User $worker
     * @return ResponseJson
     * ->update(['conditions' => json_encode(['less_age' => '2003-90-15', 'older_age' => '1990-09-15'])])
     * */
    public function make(Clinic $clinic, User $worker, MakeBookingRequest $request): ResponseJson
    {
        // Refusing to book in the event that the doctor has booked self
        if ($worker->id === auth()->id()) return alert('Bad request', false, 400);

        // Get the name of the day to be booked
        $date = strtolower(now()->parse($request->date)->format('l'));

        // Detemrine whether this day is available for the doctor to work or not
        if (is_null($worker->pivot->$date)) {
            return alert("Sorry, Dr. {$worker->fullname()} is not available on this day. Please book another day", false, 400);
        }

        $conditions = json_decode($worker->pivot->conditions, true);

        if (!is_null($conditions)) {
            $date_birth = auth()->user()->date_birth;
            $older = Carbon::parse($conditions['older_age']);
            $less = Carbon::parse($conditions['less_age']);

            if (! (is_null($conditions['older_age']) && is_null($conditions['less_age']))) {
                if (! $date_birth->between($less, $older)) {
                    return alert("Sorry, you cannot book with Dr. {$worker->fullname()}", false, 400);
                }
            }
        }

        if ($booking = auth()->user()->checkIfDoesntHaveBooking($clinic->id, $worker->id, $request->date)) {
            return alert("You have already booked with Dr. {$worker->fullname()} in the {$clinic->name} clinic, and it is your {$booking->turn} turn", false, 400);
        }

        $turn = $worker->bookings('doctor_id')->where('booking_date', '=', $request->date)->whereIsDone(0)->max('turn');

        $turn = !is_null($turn) ? ($turn + 1) : 1;

        $booking = auth()->user()->bookings()->create([
            'doctor_id' => $worker->id,
            'clinic_id' => $clinic->id,
            'booking_date' => $request->date,
            'code' => random_int(10000000, 99999999),
            'turn' => $turn
        ]);

        return alert("The booking has been made successfully with Dr. {$worker->fullname()} in the {$clinic->name} clinic, and it is your {$booking->turn} turn");
    }

    /**
     * Appointment update for booking
     * @param 
     * 
     * */
    public function update(Clinic $clinic, User $worker, UpdateBookingRequest $request)
    {
        $booking = auth()->user()->bookings()
        ->whereClinicId($clinic->id)
        ->whereDoctorId($worker->id)
        ->whereCode($request->code)->first();

        dd($booking->update());
    }

    /**
     * 
     * 
     * */
    public function currentUserTurn()
    {

    }

    /**
     * Get total bookings mead for a doctor
     * @return ResponseJson|int
     * */
    public function totalBookingsMade()
    {
        $bookings = auth()->user()->bookings('doctor_id')->get();

        return response()->json($bookings);
    }

    /**
     * Get the total count of completed bookings for a doctor
     * @return int
     * */
    public function completedBookingsCount(User $doctor): int
    {
        return (int) $doctor->bookings('doctor_id')->whereIsDone(true)->count();
    }

    /**
     * Get a previous booking today for the doctor
     * @return ResponseJson
     * */
    public function todayBookings()
    {
        
    }

    public function cancel(Clinic $clinic, User $worker, CancelBookingRequest $request)
    {
        $booking = auth()->user()->bookings()
           ->whereClinicId($clinic->id)
           ->whereDoctorId($worker->id)
           ->whereCode($request->code)
           ->first();

        if (!$booking) {
            return alert('Sorry, this booking code is not valid', false, 400);
        }

        $booking->delete();

        return alert('Your reservation has been successfully cancelled');
    }
}
