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
            'device_no' => 'nullable|string',
            'ph' => 'nullable|numeric',
            'ammonia' => 'nullable|numeric',
            'turbidity' => 'nullable|numeric',
            'temperature' => 'nullable|numeric',
            'notification' => 'nullable|string'
        ]);
    
        WaterQuality::create([
            'device_no' => $data['device_no'],
            'ph' => $data['ph'],
            'ammonia' => $data['ammonia'],
            'turbidity' => $data['turbidity'],
            'temperature' => $data['temperature'],
            'notification' => $data['notification']
        ]);
    
        return response()->json(['message' => 'success']);
    }
    
    
    public function index()
    {
        // Get the last 20 water quality records ordered by created_at
        $waterQualities = WaterQuality::latest('created_at')->take(20)->get();
    
        return view('water-quality', compact('waterQualities'));
    }
    

  public function downloadPDF()
{
    // Fetch all water quality records
    $waterQualities = WaterQuality::all();

    // Pass the $waterQualities variable to the view
    $pdf = PDF::loadView('water_qualty_pdf', compact('waterQualities'));

    // Return the generated PDF
    return $pdf->download('water_quality_report.pdf');
}

    

}
