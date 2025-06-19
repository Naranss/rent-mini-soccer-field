<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\User;
use Carbon\Carbon;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schedules = Schedule::with(['field', 'user'])
            ->when($request->search, function ($query) use ($request) {
                $search = $request->search;
                $query->whereHas('field', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->get();

        return view('pages.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = Field::all(); // Ambil semua field dari database, termasuk Herman Arena, Coki Suka Tidur Arena, Mbah Singo Arena
        $users = User::all();
        return view('pages.schedules.create', compact('fields', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'user_id' => 'required|exists:users,id',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'status' => 'required|in:pending,confirmed',
        ]);

        $startTime = Carbon::parse($validated['start_time'])->format('H:i');
        $endTime = Carbon::parse($validated['end_time'])->format('H:i');
        $currentTime = strtotime($startTime);
        $hari = Carbon::parse($validated['start_time'])->locale('id')->dayName;

        $fieldId = $validated['field_id'];
        $userId = $validated['user_id'];
        $status = $validated['status'];

        while ($currentTime < strtotime($endTime)) {
            $slotStartTime = date('H:i', $currentTime);
            $slotEndTime = date('H:i', strtotime('+1 hour', $currentTime));

            $existingSchedule = Schedule::where('field_id', $fieldId)
                ->where('hari', $hari)
                ->where(function ($query) use ($slotStartTime, $slotEndTime) {
                    $query->where(function ($q) use ($slotStartTime, $slotEndTime) {
                        $q->where('start_time', '<=', $slotStartTime)
                            ->where('end_time', '>', $slotStartTime);
                    })->orWhere(function ($q) use ($slotStartTime, $slotEndTime) {
                        $q->where('start_time', '<', $slotEndTime)
                            ->where('end_time', '>=', $slotEndTime);
                    })->orWhere(function ($q) use ($slotStartTime, $slotEndTime) {
                        $q->where('start_time', '>=', $slotStartTime)
                            ->where('end_time', '<=', $slotEndTime);
                    });
                })
                ->exists();

            if ($existingSchedule) {
                return redirect()->back()->withErrors(['error' => 'One or more time slots are already booked for the selected field and day.']);
            }

            Schedule::create([
                'field_id' => $fieldId,
                'user_id' => $userId,
                'hari' => $hari,
                'start_time' => $slotStartTime,
                'end_time' => $slotEndTime,
                'status' => $status,
            ]);

            $currentTime = strtotime('+1 hour', $currentTime);
        }

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan secara massal!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        $schedule->load(['field', 'user']);
        return view('pages.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $fields = Field::all(); // Ambil semua field untuk edit
        $users = User::all();
        $schedule->load(['field', 'user']);
        return view('pages.schedules.edit', compact('schedule', 'fields', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'user_id' => 'required|exists:users,id',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'status' => 'required|in:pending,confirmed',
        ]);

        $startTime = Carbon::parse($validated['start_time'])->format('H:i');
        $endTime = Carbon::parse($validated['end_time'])->format('H:i');
        $hari = Carbon::parse($validated['start_time'])->locale('id')->dayName;

        $schedule->update([
            'field_id' => $validated['field_id'],
            'user_id' => $validated['user_id'],
            'hari' => $hari,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => $validated['status'],
        ]);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
