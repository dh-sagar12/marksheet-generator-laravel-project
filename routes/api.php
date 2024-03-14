<?php

use App\Http\Controllers\Student\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('guest')->group(function() {
    Route::get('/students', [StudentController::class, 'get_students_api']) -> name('api.student.filter');
    Route::get('/students/{id}', [StudentController::class, 'get_single_student_api'])->name('api.student.single');

});