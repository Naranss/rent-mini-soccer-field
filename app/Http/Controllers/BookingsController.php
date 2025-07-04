<?php

namespace App\Http\Controllers;

use App\Models\BookedHour;
use App\Models\Booking;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    // Menampilkan semua booking (untuk admin atau overview)
    public function index()
    {
        if (Auth::user()->role == "OWNER") {
            $bookings = Booking::with(['user', 'field'])->fieldIds(Auth::user()->fields->pluck('id'))->filter(request(['search']))->paginate(6);
        } elseif (Auth::user()->role == "CUSTOMER") {
            $bookings = Booking::with(['user', 'field'])->customerId(Auth::id())->filter(request(['search']))->paginate(6);
        } else {
            $bookings = Booking::with(['user', 'field'])->filter(request(['search']))->paginate(6);
        }
        return view('pages.bookings.index', compact('bookings'));
    }

    // Menampilkan detail booking
    public function show(Booking $booking)
    {
        $booking->load(['user', 'field']);
        $bookedHours = BookedHour::with('schedule')
            ->where('booking_id', $booking->id)
            ->orderBy('schedule_id')
            ->get();

        return view('pages.bookings.show', compact('booking', 'bookedHours'));
    }

    // Menampilkan form untuk mengedit booking
    public function edit(Booking $booking)
    {
        $fields = Field::all();
        return view('pages.bookings.edit', compact('booking', 'fields'));
    }

    // Memperbarui booking
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'status' => 'required|in:pending,confirmed,canceled'
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    // Menghapus booking
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }

    // Owner: Melihat semua booking untuk lapangan 
    public function ownerBookings()
    {
        $user = Auth::user();
        $fields = Field::where('owner_id', $user->id)->pluck('id');
        $bookings = Booking::whereIn('field_id', $fields)
            ->with(['user', 'field'])
            ->get();
        return view('pages.bookings.owner', compact('bookings'));
    }

    // Owner: Menerima/mengkonfirmasi booking 
    public function acceptBooking(Request $request, Booking $booking)
    {
        $user = Auth::user();
        $field = Field::find($booking->field_id);

        if (!$field || $field->owner_id !== $user->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|in:confirmed,canceled',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
}
