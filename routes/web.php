<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourtController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

   Route::prefix('courts')->group(function () {
       Route::get('/', [CourtController::class, 'index'])->name('courts.index');
       Route::get('/create', [CourtController::class, 'create'])->name('courts.create');
       Route::post('/store', [CourtController::class, 'store'])->name('courts.store');
       Route::get('/{id}/edit', [CourtController::class, 'edit'])->name('courts.edit');
       Route::put('/{id}', [CourtController::class, 'update'])->name('courts.update');
       Route::delete('/{id}', [CourtController::class, 'destroy'])->name('courts.destroy'); 

       Route::get('/court-list', [CourtController::class, 'courtListAjax'])->name('courts.list');


   });
});
