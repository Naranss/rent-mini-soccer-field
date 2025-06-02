<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan semua booking (untuk admin atau overview)
    public function index()
    {
        $bookings = Booking::with(['user', 'field'])->get();
        return view('bookings.index', compact('bookings'));
    }

    // Customer: Menampilkan form untuk membuat booking baru
    public function create()
    {
        $fields = Field::all(); // Ambil semua lapangan untuk ditampilkan di form
        return view('bookings.create', compact('fields'));
    }

    // Customer: Menyimpan booking baru
    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Cek apakah slot waktu tersedia
        $existingBooking = Booking::where('field_id', $request->field_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('start_time', '<=', $request->start_time)
                            ->where('end_time', '>=', $request->end_time);
                    });
            })
            ->where('status', '!=', 'canceled')
            ->exists();

        if ($existingBooking) {
            return redirect()->back()->withErrors(['error' => 'The selected time slot is already booked.']);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'field_id' => $request->field_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully. Awaiting owner confirmation.');
    }

    // Menampilkan detail booking
    public function show(Booking $booking)
    {
        $booking->load(['user', 'field']);
        return view('bookings.show', compact('booking'));
    }

    // Menampilkan form untuk mengedit booking
    public function edit(Booking $booking)
    {
        $fields = Field::all();
        return view('bookings.edit', compact('booking', 'fields'));
    }

    // Memperbarui booking
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $booking->update($request->all());

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
        return view('bookings.owner', compact('bookings'));
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
