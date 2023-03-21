<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Traits\Global\Helpers\Modelable;

use Modules\User\Models\User,
    Modules\Clinic\Models\Clinic;

use Modules\Booking\Http\Requests\MakeBookingRequest,
    Modules\Booking\Http\Requests\CancelBookingRequest,
    Modules\Booking\Http\Requests\UpdateBookingRequest;

class BookingController extends Controller
{
    use Modelable;

    private $now;

    public function __construct()
    {
        $this->now = now()->format('Y-m-d');
    }

    public static function instances()
    {
        return config('booking.models');
    }

    /**
     * Make a pre-booking for the doctor
     * @param Clinic $Clinic
     * @param User $worker
     * @return ResponseJson
     */
    public function create($model, $username, $doctor, MakeBookingRequest $request): JsonResponse
    {
        $fundation = $this->model($model)->whereUsername($username)->firstOrFail();

        $doctor = $fundation->doctors()->whereUsername($doctor)->firstOrFail();

        $setting = $doctor->pivot;

        // Get the name of the day to be booked
        $date = strtolower(now()->parse($request->date)->format('l'));

        if (!$setting->is_available && !$setting->status) {
            return alert("Sorry, Dr {$doctor->fullname()} is not available now.", false, BAD_REQUEST);
        }

        // Detemrine whether this day is available for the doctor to work or not
        if (!$setting->$date) {
            return alert("Sorry, Dr {$doctor->fullname()} is not available to day. Please book another day.", false, BAD_REQUEST);
        }

        // Refusing to book in the event that the doctor has booked self
        if ($doctor->id === auth()->id()) abort(404);

        if ($isBooking = $fundation->bookings()->whereUserId(auth()->id())->where('date', $request->date)->first()) {
            return alert("You have already booked with Dr. {$doctor->fullname()} in the {$fundation->name} {$model}, and it is your {$isBooking->turn} turn", false, 400);
        }

        $turn = $fundation->bookings()->where('date', $request->date)->whereDone(0)->max('turn');

        if (\Arr::get($doctor->plans->first()->privileges, 'booking.limit') <= $turn) {
            return 'Sorry, This doctor is not available';
        }

        $turn = !is_null($turn) ? ($turn + 1) : 1;

        $booking = $fundation->bookings()->create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'code' => random_int(12345678, 87654321),
            'turn' => $turn
        ]);

        return alert("The booking has been made successfully with Dr. {$doctor->fullname()} in the {$fundation->name} {$model}, and it is your {$booking->turn} turn");
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
    public function completedBookingsCount($model, $username): int
    {
        $foundation = $this->model($model)->whereUsername($username)->firstOrFail();
        return (int) $foundation->bookings()->whereIsDone(true)->count() ?? 0;
    }

    /**
     * Get a previous booking today for the doctor
     * @return ResponseJson
     * */
    public function todayBookings($model, $username)
    {
        
    }

    public function delete($model, $username, CancelBookingRequest $request)
    {
        $foundation = $this->model($model)->whereUsername($username)->firstOrFail();

        if ($foundation->bookings()->whereCode($request->code)->delete()) {
            return alert('Your reservation has been successfully cancelled');
        }

        abort(404);
    }
}
