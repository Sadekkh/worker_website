<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\jobPostController;
use App\Http\Controllers\jobRequestController;
use App\Http\Controllers\jobReviewController;
use App\Http\Controllers\transporterController;

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
    return view('layouts.main');
})->name('landing');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('jobs', jobPostController::class);
    Route::resource('request', jobRequestController::class);
    Route::resource('transport', transporterController::class);
    Route::resource('review', jobReviewController::class);
    Route::post('/request/accept/{id}/{jobid}', [jobRequestController::class, 'accept'])->name('request.accept');
    Route::post('/request/cancel/{id}/{jobid}', [jobRequestController::class, 'cancel'])->name('request.cancel');
    Route::post('/transport/accept/{id}/{jobid}', [transporterController::class, 'accept'])->name('transport.accept');
    Route::post('/transport/cancel/{id}/{jobid}', [transporterController::class, 'cancel'])->name('transport.cancel');
    Route::post('/jobs/details', [jobPostController::class, 'details'])->name('jobs.details');
    Route::post('/transport/details', [transporterController::class, 'details'])->name('transport.details');
    Route::get('/calendar', [jobRequestController::class, 'calendar'])->name('request.calendar');
    Route::get('/adminpannel', [adminController::class, 'index'])->name('adminpannel.index');
    Route::get('/adminpannel/users', [adminController::class, 'index1'])->name('adminpannel.index1');
    Route::get('/adminpannel/posts', [adminController::class, 'index2'])->name('adminpannel.index2');
    Route::get('/adminpannel/requests', [adminController::class, 'index3'])->name('adminpannel.index3');
    Route::get('/adminpannel/destroy/{id}', [adminController::class, 'destroy'])->name('adminpannel.destroy');
    Route::get('/jobs/destroys/{id}', [jobPostController::class, 'destroys'])->name('jobs.destroys');
    Route::get('/requests/destroys/{id}', [jobRequestController::class, 'destroys'])->name('requests.destroys');
    Route::get('/requests/map', [jobRequestController::class, 'map'])->name('requests.map');
});
