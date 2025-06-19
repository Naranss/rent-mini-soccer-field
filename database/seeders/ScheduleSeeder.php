<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Field;
use App\Models\User;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $fields = Field::all();
        $users = User::all();
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        foreach ($fields as $field) {
            foreach ($days as $day) {
                $startHour = 12;
                $endHour = 23;

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
