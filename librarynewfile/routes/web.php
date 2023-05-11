<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\NetZoneController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookBorrowingController;
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

Route::get('/student',[StudentController:: class, 'index']);
Route::get('/netzone',[NetZoneController:: class, 'index']);
Route::get('/session',[SessionController:: class, 'index']);
Route::get('/payment',[PaymentController:: class, 'index']);
Route::get('/bookborrowing',[BookBorrowingController:: class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//STUDENT INFO

//Navigate to Form Add Student
Route::get('/students/add', function () {
    return view('students.add');
})->middleware(['auth', 'verified'])->name('add-student');

//Store Student info to create function under StudentInfoController
Route::post('/students/add',[StudentController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('student-store');

//- Get All Data From the Student Info Table
Route::get('/students', [StudentController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('students');

//View Student Info
Route::get('/students/{stuno}', [StudentController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('students-show');

Route::delete('/students/delete/{stuno}', [StudentController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('students-delete');

//Transfer Record to Edit Form
Route::get('/students/edit/{stuno}', [StudentController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('students-edit');

//Save The Updated Data
Route::patch('/students/update/{stuno}', [StudentController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('students-update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
