<?php

namespace App\Http\Controllers;

use App\Models\BookedHour;
use App\Models\Booking;
use App\Models\Field;
use App\Models\Payment;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RentController extends Controller
{
    //
    public function index()
    {
        $fields = Field::with('fieldImages')->filter(request(['search']))->paginate(3);
        return view('pages.rents.index', compact('fields'));
    }

    public function show($field_id)
    {
        $field = Field::with('fieldImages', 'schedules')->find($field_id);
        $bookedHours = BookedHour::fieldFutureBookings($field_id)->get();
        return view('pages.rents.book', compact('field', 'bookedHours'));
    }

    private function generateOrderId()
    {
        $prefix = 'ORD';
        $date = now()->format('YmdGi');
        return $prefix . '-' . $date;
    }

    public function storeBooking(Request $request, Field $field)
    {
        try {
            DB::beginTransaction();
            // Validate the request
            $validated = $request->validate([
                'selected_date' => 'required|date|after_or_equal:today',
                'schedules' => 'required|array|min:1',
                'schedules.*' => 'exists:schedules,id'
            ]);

            // Get the first schedule to use its time
            $schedule = Schedule::findOrFail($validated['schedules'][0]);

            // Debug the input data
            logger()->info('Booking Data:', [
                'user_id' => Auth::id(),
                'field_id' => $field->id,
                'date' => $request->selected_date,
                'start_time' => $schedule->start_time,
                'schedule_id' => $schedule->id
            ]);

            // Create the booking
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'field_id' => $field->id,
                'date' => $request->selected_date,
                'start_time' => $schedule->start_time,
                'status' => 'pending'
            ]);

            if (!$booking) {
                throw new \Exception('Booking creation failed - no record created');
            }

            // Create booked hours for each selected schedule
            foreach ($validated['schedules'] as $scheduleId) {
                BookedHour::create([
                    'field_id' => $field->id,
                    'schedule_id' => $scheduleId,
                    'schedule_date' => $request->selected_date,
                    'booking_id' => $booking->id
                ]);
            }

            $total_price = count($booking->bookedHours) * $booking->field->price;
            $payment = Payment::create([
                'order_id' => $this->generateOrderId(),
                'booking_id' => $booking->id,
                'customer_id' => $booking->user_id,
                'rentee_id' => $booking->field->owner_id,
                'amount' => $total_price,
                'status' => 'unpaid'
            ]);

            DB::commit();
            return redirect()->route('rent.details', ['field' => $field->id, 'payment' => $payment->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Booking creation failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create booking. Please try again.']);

            return back()->withErrors(['error' => 'Booking failed, please try again'])
                ->withInput();
        }
    }

    public function details(Field $field, Payment $payment)
    {
        try {
            // Load all necessary relationships
            $payment = Payment::with(['booking'])->findOrFail($payment->id);
            $booking = $payment->booking;
            
            if (!$booking || $booking->field_id !== $field->id) {
                throw new \Exception('Invalid booking or field information');
            }

            // Load field with its images
            $field->load('fieldImages');
            
            // Get booked hours with their schedule information
            $bookedHours = BookedHour::with('schedule')
                ->where('booking_id', $booking->id)
                ->orderBy('schedule_id')
                ->get();

            return view('pages.rents.details', compact('payment', 'field', 'bookedHours', 'booking'));
        } catch (\Exception $e) {
            Log::error('Error displaying booking details: ' . $e->getMessage());
            
            return redirect()->route('rent.index')
                ->withErrors(['error' => 'Unable to display booking details. Please try again or contact support.']);
        }
    }
}
