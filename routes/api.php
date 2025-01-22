<?php

use App\Http\Controllers\Api\paymentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\membersController;
use App\Http\Controllers\api\trainersController;
use App\Http\Controllers\api\plansController;
use App\Http\Controllers\api\attendanceController;
use App\Http\Controllers\api\equipmentsController;
use App\Http\Controllers\api\classesController;
use App\Http\Controllers\api\feedbackController;

route::controller(feedbackController::class)->group(function () {
    Route::get('/feedback', 'index');
    Route::get('/feedback/{id}', 'show');
    Route::post('/feedback', 'store');
    Route::put('/feedback/{id}', 'update');
    Route::delete('/feedback/{id}', 'destroy');
});

route::controller(membersController::class)->group(function () {
    Route::get('/members', 'index');
    Route::get('/members/{id}', 'show');
    Route::get('/members/{id}/attendance', 'show');
    Route::get('/members/{id}/classes', 'show');
    Route::get('/members/{id}/plans', 'show');
    Route::get('/members/{id}/payments', 'show');
    Route::get('/members/{id}/feedback', 'show');
    Route::post('/members', 'store');
    Route::put('/members/{id}', 'update');
    Route::delete('/members/{id}', 'destroy');
});

route::controller(trainersController::class)->group(function () {
    Route::get('/trainers', 'index');
    Route::get('/trainers/{id}', 'show');
    Route::post('/trainers', 'store');
    Route::put('/trainers/{id}', 'update');
    Route::delete('/trainers/{id}', 'destroy');
});

route::controller(plansController::class)->group(function () {
    Route::get('/plans', 'index');
    Route::get('/plans/{id}', 'show');
    Route::post('/plans', 'store');
    Route::put('/plans/{id}', 'update');
    Route::delete('/plans/{id}', 'destroy');
});

route::controller(attendanceController::class)->group(function () {
    Route::get('/attendance', 'index');
    Route::get('/attendance/{id}', 'show');
    Route::post('/attendance', 'store');
    Route::put('/attendance/{id}', 'update');
    Route::delete('/attendance/{id}', 'destroy');
});

route::controller(equipmentsController::class)->group(function () {
    Route::get('/equipments', 'index');
    Route::get('/equipments/{id}', 'show');
    Route::post('/equipments', 'store');
    Route::put('/equipments/{id}', 'update');
    Route::delete('/equipments/{id}', 'destroy');
});

route::controller(classesController::class)->group(function () {
    Route::get('/classes', 'index');
    Route::get('/classes/{id}', 'show');
    Route::post('/classes', 'store');
    Route::put('/classes/{id}', 'update');
    Route::delete('/classes/{id}', 'destroy');
});

route::controller(paymentsController::class)->group(function () {
    Route::get('/payments', 'index');
    Route::get('/payments/{id}', 'show');
    Route::post('/payments', 'store');
    Route::put('/payments/{id}', 'update');
    Route::delete('/payments/{id}', 'destroy');
});


