<?php

use Illuminate\Database\Seeder;
use App\Models\WaterQuality;
use Illuminate\Support\Carbon;

class WaterQualitySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'device_no' => 'D001',
                'ph' => 7.2,
                'ammonia' => 0.02,
                'turbidity' => 2.5,
                'temperature' => 25.2,
                'notification' => 'Normal levels',
            ],
            [
                'device_no' => 'D002',
                'ph' => 6.8,
                'ammonia' => 0.05,
                'turbidity' => 3.0,
                'temperature' => 24.5,
                'notification' => 'Slightly elevated ammonia',
            ],
            [
                'device_no' => 'D003',
                'ph' => 7.5,
                'ammonia' => 0.01,
                'turbidity' => 1.8,
                'temperature' => 26.0,
                'notification' => 'Optimal conditions',
            ],
            // Add more sample data as needed
        ];

        // Insert data into the database
        foreach ($data as $item) {
            WaterQuality::create($item);
        }
    }
}
