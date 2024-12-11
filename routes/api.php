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

Route::get('/members',[membersController::class,'index']);
Route::get('/members/{id}',[membersController::class,'show']);
Route::get('/members/{id}/classes', [membersController::class, 'classes']);
Route::get('/members/{id}/attendance', [membersController::class, 'attendance']);
Route::get('/members/{id}/plans', [membersController::class, 'plans']);
Route::get('/members/{id}/payments', [membersController::class, 'payments']);
Route::get('/members/{id}/feedback', [membersController::class, 'feedback']);

Route::get('/trainers',[trainersController::class,'index']);
Route::get('/trainers/{id}',[trainersController::class,'show']);

Route::get('/plans',[plansController::class,'index']);
Route::get('/plans/{id}',[plansController::class,'show']);
Route::get('/plans/{id}/members', [plansController::class, 'members']);

Route::get('/attendance',[attendanceController::class,'index']);
Route::get('/attendance/{id}',[attendanceController::class,'show']);

Route::get('/equipments',[equipmentsController::class,'index']);
Route::get('/equipments/{id}',[equipmentsController::class,'show']);

Route::get('/classes',[classesController::class,'index']);
Route::get('/classes/{id}',[classesController::class,'show']);
Route::get('/classes/{id}/members',[classesController::class,'members']);

Route::get('/payments',[paymentsController::class,'index']);
Route::get('/payments/{id}',[paymentsController::class,'show']);

Route::get('/feedback',[feedbackController::class,'index']);
Route::get('/feedback/{id}',[feedbackController::class,'show']);
