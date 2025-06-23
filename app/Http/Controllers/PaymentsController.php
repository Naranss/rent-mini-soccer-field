<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class PaymentsController extends Controller
{
    // Admin: Menampilkan semua pembayaran
    public function index()
    {
        if (Auth::user()->role == "ADMIN") {
            $payments = Payment::with(['booking', 'customer', 'rentee'])->filter(request(['search']))->paginate(6);
        } else {
            $payments = Payment::with(['booking', 'customer', 'rentee'])->customerOwner(Auth::id())->filter(request(['search']))->paginate(6);
        }
        return view('pages.payments.index', compact('payments'));
    }


    // Admin: Menampilkan detail pembayaran
    public function show(Payment $payment)
    {
        $payment->load(['booking', 'customer', 'rentee']);
        return view('pages.payments.show', compact('payment'));
    }

    // Admin: Menampilkan form untuk mengedit pembayaran
    public function edit(Payment $payment)
    {
        return view('pages.payments.edit', compact('payment'));
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
            'status' => 'required|in:paid,unpaid,canceled',
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
}
