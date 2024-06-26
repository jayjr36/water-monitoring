<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WaterQuality;
use Illuminate\Support\Carbon;

class WaterQualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Starting time
        $startTime = Carbon::now()->subHours(1); // Start 1 hour ago

        // Generate data for every 10 minutes
        for ($i = 0; $i < 6; $i++) {
            $data = [
                'oxygen_level' => $this->randomFloat(6.0, 8.5),
                'temperature' => $this->randomFloat(24.0, 27.0),
                'ammonia' => $this->randomFloat(0.01, 0.05),
                'notification' => $this->getNotification(),
                'created_at' => $startTime->copy()->addMinutes($i * 10)
            ];
            WaterQuality::create($data);
        }
    }

    private function randomFloat($min, $max)
    {
        return round($min + mt_rand() / mt_getrandmax() * ($max - $min), 2);
    }

    private function getNotification()
    {
        $notifications = [
            'Normal levels',
            'Slightly elevated ammonia',
            'Optimal conditions',
            'High oxygen level',
            'Low oxygen level'
        ];
        return $notifications[array_rand($notifications)];
    }
}
