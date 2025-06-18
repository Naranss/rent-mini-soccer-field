<?php

namespace App\Http\Controllers;

use App\Models\BookedHour;
use App\Models\Booking;
use App\Models\Field;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    //
    public function index()
    {
        $fields = Field::with('fieldImages')->filter(request(['search']))->paginate(3);
        return view('pages.rent', compact('fields'));
    }

    public function show($field_id)
    {
        $field = Field::with('fieldImages', 'schedules')->find($field_id);
        $bookedHours = BookedHour::fieldFutureBookings($field_id)->get();
        return view('pages.rentfieldbook', compact('field', 'bookedHours'));
    }

    public function storeBooking(Request $request, Field $field)
    {
        dd($request);
        try {
            // Validate the request
            $request->validate([
                'selected_date' => 'required|date|after_or_equal:today',
                'schedules' => 'required|array|min:1',
                'schedules.*' => 'exists:schedules,id'
            ]);

            // Get the selected schedules
            $schedules = Schedule::whereIn('id', $request->schedules)->get();

            // Start database transaction
            DB::beginTransaction();

            // Create the booking
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'field_id' => $field->id,
                'date' => $request->selected_date,
                'status' => 'pending', // Initial status
            ]);

            // Create booked hours for each selected schedule
            foreach ($schedules as $schedule) {
                BookedHour::create([
                    'field_id' => $field->id,
                    'schedule_id' => $schedule->id,
                    'schedule_date' => $request->selected_date,
                    'booking_id' => $booking->id
                ]);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('booking.show', $booking)
                ->with('success', 'Booking created successfully!');
        } catch (\Exception $e) {
            // Rollback in case of error
            DB::rollBack();

            return back()->withErrors(['error' => 'Failed to create booking. Please try again.'])
                ->withInput();
        }
    }
}
