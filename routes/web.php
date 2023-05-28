<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignTracker;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/track', [CampaignTracker::class, 'index']);
Route::put('/track', [CampaignTracker::class, 'store']);
Route::post('/track', [CampaignTracker::class, 'update']);
