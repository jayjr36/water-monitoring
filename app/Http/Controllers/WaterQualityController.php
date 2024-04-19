<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaterQualityController extends Controller
{
    public function fetchDataAndStore()
    {
        // Fetch data from API
        $client = new Client();
        $response = $client->get('https://api.example.com/water_quality');
        $data = json_decode($response->getBody(), true);

        // Store data in the database
        foreach ($data as $item) {
            WaterQuality::create([
                'parameter' => $item['parameter'],
                'value' => $item['value'],
                'unit' => $item['unit'],
                // Add other fields as necessary
            ]);
        }

        return response()->json(['message' => 'Data stored successfully']);
    }

    public function displayData()
    {
        // Retrieve data from the database
        $waterQualities = WaterQuality::all();

        return view('water_quality', compact('waterQualities'));
    }
}
