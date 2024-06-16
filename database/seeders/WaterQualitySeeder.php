<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WaterQuality;

class WaterQualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Sample data array
        $data = [
            [
                'oxygen_level' => 7.5,
                'temperature' => 25.2,
                'ammonia' => 0.02,
                'notification' => 'Normal levels',
            ],
            [
                'oxygen_level' => 6.8,
                'temperature' => 24.5,
                'ammonia' => 0.05,
                'notification' => 'Slightly elevated ammonia',
            ],
            [
                'oxygen_level' => 8.0,
                'temperature' => 26.0,
                'ammonia' => 0.01,
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
