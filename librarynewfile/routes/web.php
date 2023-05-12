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


//STUDENT
//Navigate to Form Add Student
Route::get('/student/add', function () {
    return view('student.add');
})->middleware(['auth', 'verified'])->name('add-student');

//Store Student info to create function under StudentController
Route::post('/student/add',[StudentController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('student-store');

//- Get All Data From the Student Info Table
Route::get('/student', [StudentController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('student');

//View Student Info
Route::get('/student/{stuno}', [StudentController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('student-show');

Route::delete('/student/delete/{stuno}', [StudentController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('student-delete');

//Transfer Record to Edit Form
Route::get('/student/edit/{stuno}', [StudentController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('student-edit');

//Save The Updated Data
Route::patch('/student/update/{stuno}', [StudentController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('student-update');

//SESSION
//Navigate to Form Add New Session
// Route::get('/session/add', function () {
//    return view('session.add');
// })->middleware(['auth', 'verified'])->name('add-session ');

// //Store Student info to create function under StudentController
// Route::post('/session/add',[SessionController::class,'store'] )
// ->middleware(['auth', 'verified'])
// ->name('session-store');

// //- Get All Data From the Student Info Table
// Route::get('/session', [SessionController::class, 'index']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session');

// //View Student Info
// Route::get('/session/{sno}', [SessionController::class, 'show']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session-show');

// Route::delete('/session/delete/{stuno}', [SessionController::class, 'destroy']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session-delete');

// //Transfer Record to Edit Form
// Route::get('/session/edit/{stuno}', [SessionController::class, 'edit']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session-edit');

// //Save The Updated Data
// Route::patch('/session/update/{stuno}', [SessionController::class, 'update']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session-update');

// //NetZone
// //Navigate to Form Add New Session
// Route::get('/netzone/add', function () {
//    return view('netzone.add');
// })->middleware(['auth', 'verified'])->name('add-netzone');

// //Store Student info to create function under StudentController
// Route::post('/session/add',[SessionController::class,'store'] )
// ->middleware(['auth', 'verified'])
// ->name('session-store');

// //- Get All Data From the Student Info Table
// Route::get('/session', [SessionController::class, 'index']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session');

// //View Student Info
// Route::get('/session/{sno}', [SessionController::class, 'show']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session-show');

// Route::delete('/session/delete/{sno}', [SessionController::class, 'destroy']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session-delete');

// //Transfer Record to Edit Form
// Route::get('/session/edit/{sno}', [SessionController::class, 'edit']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session-edit');

// //Save The Updated Data
// Route::patch('/session/update/{sno}', [SessionController::class, 'update']) 
//   ->middleware(['auth', 'verified'])
//   ->name('session-update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
