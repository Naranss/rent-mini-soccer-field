<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Field;

class ScheduleSeeder extends Seeder
{
    public function run()
    {

        $fields = Field::all();

        foreach ($fields as $field) {
            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

            foreach ($days as $day) {
                //jam buka dan tutup (semua lapangan sama: 12:00-23:00)
                $startHour = 12;
                $endHour = 23;

                // Slot waktu per jam
                for ($hour = $startHour; $hour < $endHour; $hour++) {
                    $startTime = sprintf('%02d:00', $hour);
                    $endTime = sprintf('%02d:00', $hour + 1);

                    Schedule::create([
                        'field_id' => $field->id,
                        'hari' => $day,
                        'start_time' => $startTime,
                        'end_time' => $endTime,
                    ]);
                }
            }
        }
    }
}
