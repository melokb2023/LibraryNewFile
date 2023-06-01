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
Route::get('/bookborrowingdetail',[BookBorrowingController:: class, 'index']);

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
Route::get('/librarysession/add', [SessionController::class, 'getStudentInfo'])
->middleware(['auth', 'verified'])
->name('add-librarysession');

// //Store Student info to create function under StudentController
Route::post('/librarysession/add',[SessionController::class,'store'] )
 ->middleware(['auth', 'verified'])
 ->name('librarysession-store');

// //- Get All Data From the Student Info Table
 Route::get('/librarysession', [SessionController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('librarysession');

 //View Student Info
 Route::get('/librarysession/{sessionno}', [SessionController::class, 'show']) 
  ->middleware(['auth', 'verified'])
  ->name('librarysession-show');

Route::delete('/librarysession/delete/{sessionno}', [SessionController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('librarysession-delete');

// //Transfer Record to Edit Form
Route::get('/librarysession/edit/{sessionno}', [SessionController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('librarysession-edit');

// //Save The Updated Data
  Route::patch('/librarysession/update/{sessionno}', [SessionController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('librarysession-update');

////////////////////////////////////////////////////////////////////////////////////NetZone
//Navigate to Form Add New Session
Route::get('/netzone/add', [NetZoneController::class, 'getStudentInfo'])
->middleware(['auth', 'verified'])
->name('add-netzone');

Route::post('/netzone/add',[NetZoneController::class, 'store'] )
   ->middleware(['auth', 'verified'])
   ->name('netzone-store');
   
// //- Get All Data From the Student Info Table
 Route::get('/netzone', [NetZoneController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('netzone');

// //View Student Info
Route::get('/netzone/{n}', [NetZoneController::class, 'show']) 
  ->middleware(['auth', 'verified'])
  ->name('netzone-show');

Route::delete('/netzone/delete/{n}', [NetZoneController::class, 'destroy']) 
  ->middleware(['auth', 'verified'])
  ->name('netzone-delete');

// //Transfer Record to Edit Form
Route::get('/netzone/edit/{n}', [NetZoneController::class, 'edit']) 
  ->middleware(['auth', 'verified'])
  ->name('netzone-edit');

// //Save The Updated Data
Route::patch('/netzone/update/{n}', [NetZoneController::class, 'update']) 
  ->middleware(['auth', 'verified'])
  ->name('netzone-update');

/////////////////////////////////////////////////////////////////////////Payment
Route::get('/payment/add', [PaymentController::class, 'getStudentInfo'])
->middleware(['auth', 'verified'])
->name('add-payment');

Route::post('/payment/add',[PaymentController::class, 'store'] )
   ->middleware(['auth', 'verified'])
   ->name('payment-store');
   
// //- Get All Data From the Student Info Table
 Route::get('/payment', [PaymentController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('payment');

// //View Student Info
Route::get('/payment/{pno}', [PaymentController::class, 'show']) 
  ->middleware(['auth', 'verified'])
  ->name('payment-show');

Route::delete('/payment/delete/{pno}', [PaymentController::class, 'destroy']) 
  ->middleware(['auth', 'verified'])
  ->name('payment-delete');

// //Transfer Record to Edit Form
Route::get('/payment/edit/{pno}', [PaymentController::class, 'edit']) 
  ->middleware(['auth', 'verified'])
  ->name('payment-edit');

// //Save The Updated Data
Route::patch('/payment/update/{pno}', [PaymentController::class, 'update']) 
  ->middleware(['auth', 'verified'])
  ->name('payment-update');

//////////////////////////////////////////////////////////////////////////////////////Book Borrowing
Route::get('/bookborrowingdetail/add', [BookBorrowingController::class, 'getStudentInfo'])
->middleware(['auth', 'verified'])
->name('add-bookborrowingdetail');

Route::post('/bookborrowingdetail/add',[BookBorrowingController::class, 'store'] )
   ->middleware(['auth', 'verified'])
   ->name('bookborrowingdetail-store');
   
// //- Get All Data From the Student Info Table
 Route::get('/bookborrowingdetail', [BookBorrowingController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('bookborrowingdetail');

// //View Student Info
Route::get('/bookborrowingdetail/{bbno}', [BookBorrowingController::class, 'show']) 
  ->middleware(['auth', 'verified'])
  ->name('bookborrowingdetail-show');

Route::delete('/bookborrowingdetail/delete/{bbno}', [BookBorrowingController::class, 'destroy']) 
  ->middleware(['auth', 'verified'])
  ->name('bookborrowingdetail-delete');

// //Transfer Record to Edit Form
Route::get('/bookborrowingdetail/edit/{bbno}', [BookBorrowingController::class, 'edit']) 
  ->middleware(['auth', 'verified'])
  ->name('bookborrowingdetail-edit');

// //Save The Updated Data
Route::patch('/bookborrowingdetail/update/{bbno}', [BookBorrowingController::class, 'update']) 
  ->middleware(['auth', 'verified'])
  ->name('bookborrowingdetail-update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
