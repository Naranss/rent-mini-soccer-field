<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    // Admin: Menampilkan semua pembayaran
    public function index()
    {
        $payments = Payment::with(['booking', 'customer', 'rentee'])->get();
        return view('payments.index', compact('payments'));
    }

    // Admin: Menampilkan form untuk membuat pembayaran baru
    public function create()
    {
        return view('payments.create');
    }

    // Admin: Menyimpan pembayaran baru
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'customer_id' => 'required|exists:users,id',
            'rentee_id' => 'required|exists:users,id',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'nullable|date',
            'status' => 'required|in:paid,unpaid',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    // Admin: Menampilkan detail pembayaran
    public function show(Payment $payment)
    {
        $payment->load(['booking', 'customer', 'rentee']);
        return view('payments.show', compact('payment'));
    }

    // Admin: Menampilkan form untuk mengedit pembayaran
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    // Admin: Memperbarui pembayaran
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'customer_id' => 'required|exists:users,id',
            'rentee_id' => 'required|exists:users,id',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'nullable|date',
            'status' => 'required|in:paid,unpaid',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    // Admin: Menghapus pembayaran
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }

    // User: Mengecek status pembayaran mereka
    public function checkStatus()
    {
        $user = Auth::user();
        $payments = Payment::where('customer_id', $user->id)
            ->with(['booking', 'rentee'])
            ->get();
        return view('payments.user_status', compact('payments'));
    }

    // Owner (Rentee): Mengecek dan mengkonfirmasi pembayaran
    public function confirmPayment(Request $request, Payment $payment)
    {
        $user = Auth::user();

        // Pastikan user adalah rentee dari pembayaran ini
        if ($payment->rentee_id !== $user->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|in:paid,unpaid',
        ]);

        $payment->update([
            'status' => $request->status,
            'payment_date' => $request->status === 'paid' ? now() : $payment->payment_date,
        ]);

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }
}
