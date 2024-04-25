
<?php
use App\Http\Controllers\WaterQualityController;


Route::post('/waterquality/update', [WaterQualityController::class, 'store']);