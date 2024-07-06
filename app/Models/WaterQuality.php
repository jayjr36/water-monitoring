<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterQuality extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_no',
        'ph',
        'ammonia',
        'turbidity',
        'temperature',
        'notification',
    ];

    protected $casts = [
        'ph' => 'decimal:2',
        'ammonia' => 'decimal:2',
        'turbidity' => 'decimal:2',
        'temperature' => 'decimal:2',
    ];
}
