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
        $schedules = Schedule::with('field')->filter(request('search'))->paginate(6);

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
        // dd($request->all());
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $startTime = Carbon::parse($validated['start_time'])->format('H:i');
        $endTime = Carbon::parse($validated['end_time'])->format('H:i');
        $currentTime = strtotime($startTime);

        $fieldId = $validated['field_id'];

        while ($currentTime < strtotime($endTime)) {
            $slotStartTime = date('H:i', $currentTime);
            $slotEndTime = date('H:i', strtotime('+1 hour', $currentTime));

            $existingSchedule = Schedule::where('field_id', $fieldId)
                ->where('hari', $validated['hari'])
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
                'hari' => $validated['hari'],
                'start_time' => $slotStartTime,
                'end_time' => $slotEndTime,
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
        $schedule->load(['field']);
        return view('pages.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $fields = Field::all(); // Ambil semua field untuk edit
        $schedule->load(['field']);
        return view('pages.schedules.edit', compact('schedule', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $startTime = Carbon::parse($validated['start_time'])->format('H:i');
        $endTime = Carbon::parse($validated['end_time'])->format('H:i');

        // Check if the time gap is more than 1 hour
        $start = Carbon::createFromFormat('H:i', $startTime);
        $end = Carbon::createFromFormat('H:i', $endTime);
        if ($start->diffInMinutes($end) > 60) {
            return redirect()->back()->withErrors(['error' => 'The time gap between start and end time must not be more than 1 hour.']);
        }

        // Check for existing schedule overlap (excluding itself)
        $exists = Schedule::where('field_id', $validated['field_id'])
            ->where('hari', $validated['hari'])
            ->where('id', '!=', $schedule->id)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where(function ($q) use ($startTime, $endTime) {
                    $q->where('start_time', '<', $endTime)
                        ->where('end_time', '>', $startTime);
                });
            })
            ->exists();
        if ($exists) {
            return redirect()->back()->withErrors(['error' => 'There is an existing schedule that overlaps with the selected time.']);
        }

        $schedule->update([
            'field_id' => $validated['field_id'],
            'hari' => $validated['hari'],
            'start_time' => $startTime,
            'end_time' => $endTime,
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
