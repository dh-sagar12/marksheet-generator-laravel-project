<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\MarksheetController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/students', [StudentController::class, 'index']) -> name('student.all');
    Route::get('/student/new', [StudentController::class, 'create']) -> name('student.new');
    Route::post('/students', [StudentController::class, 'store']) -> name('student.create');
    Route::get('/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::delete('/marksheet/delete/{marksheet}', [MarksheetController::class, 'delete_marksheet']) -> name('marksheet.delete');
    Route::get('/marksheet/new', [MarksheetController::class, 'create']) -> name('marksheet.new');
    Route::post('/marksheet', [MarksheetController::class, 'store']) -> name('marksheet.store');
    Route::get('/marksheet', [MarksheetController::class, 'index']) -> name('marksheet.all');
    Route::get('/marksheet/download/{marksheet}', [MarksheetController::class, 'generate_marksheet']) -> name('marksheet.pdf');
});

require __DIR__.'/auth.php';
