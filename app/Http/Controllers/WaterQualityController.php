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
        $waterQuality = WaterQuality::all();
        $data = [
            'device_no' => $waterQuality->pluck('device_no')->toArray(),
            'ph' => $waterQuality->pluck('ph')->toArray(),
            'ammonia' => $waterQuality->pluck('ammonia')->toArray(),
            'turbidity' => $waterQuality->pluck('turbidity')->toArray(),
            'temperature' => $waterQuality->pluck('temperature')->toArray(),
            'notification' => $waterQuality->pluck('notification')->toArray(),
        ];
    
        $pdf = PDF::loadView('water_quality_pdf', $data);
    
        return $pdf->download('water_quality_report.pdf');
    }
    

}
