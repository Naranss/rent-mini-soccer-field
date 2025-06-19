<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('field')->get();
        return view('pages.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $startTime = strtotime($validated['start_time']);
        $endTime = strtotime($validated['end_time']);
        $currentTime = $startTime;

        $fieldId = $validated['field_id'];
        $hari = $validated['hari'];

        while ($currentTime < $endTime) {
            $slotStartTime = date('H:i', $currentTime);
            $slotEndTime = date('H:i', strtotime('+1 hour', $currentTime));

            // Cek apakah slot waktu sudah ada untuk field dan hari yang sama
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

            // Buat jadwal untuk slot waktu saat ini
            Schedule::create([
                'field_id' => $fieldId,
                'hari' => $hari,
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
        return view('schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule'));
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
        $schedule->update($validated);
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
