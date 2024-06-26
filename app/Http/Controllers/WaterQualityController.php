<?php

namespace App\Http\Controllers;

use App\Models\WaterQuality;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class WaterQualityController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'temperature' => 'nullable',
            'oxygen' => 'nullable',
            'amonia' => 'nullable',
            'notification' => 'notification'
        ]);

        WaterQuality::create([
            'temperature' => $data['temperature'],
            'oxygen_level' => $data['oxygen'],
            'ammonia' => $data['amonia'],
            'notification'=> $data['notification'],
        ]);

        return response()->json(['message' => 'Data stored successfully']);
    }
 
    public function index()
    {
        $waterQualities = WaterQuality::all();

        return view('water-quality', compact('waterQualities'));
    }

    public function downloadPDF()
    {
        $waterQualities = WaterQuality::all(); // Fetch all records
    
        $data = [
            'waterQualities' => $waterQualities
        ];
    
        $pdf = PDF::loadView('water_qualty_pdf', $data);
    
        return $pdf->download('water_quality_report.pdf');
    }

}
