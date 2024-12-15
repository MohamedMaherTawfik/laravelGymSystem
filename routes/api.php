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
Route::get('/members/{id}/plan', [membersController::class, 'plans']);
Route::get('/members/{id}/payments', [membersController::class, 'payments']);
Route::get('/members/{id}/feedbacks', [membersController::class, 'feedback']);
Route::post('/members',[membersController::class,'store']);
Route::post('/members/{id}',[membersController::class,'update']);
Route::delete('/members/{id}',[membersController::class,'destroy']);

Route::get('/trainers',[trainersController::class,'index']);
Route::get('/trainers/{id}',[trainersController::class,'show']);
Route::post('/trainers',[trainersController::class,'store']);
Route::post('/trainers/{id}',[trainersController::class,'update']);
Route::delete('/trainers/{id}',[trainersController::class,'destroy']);

Route::get('/plans',[plansController::class,'index']);
Route::get('/plans/{id}',[plansController::class,'show']);
Route::get('/plans/{id}/members', [plansController::class, 'members']);
Route::post('/plans',[plansController::class,'store']);
Route::post('/plans/{id}',[plansController::class,'update']);
Route::delete('/plans/{id}',[plansController::class,'destroy']);

Route::get('/attendance',[attendanceController::class,'index']);
Route::get('/attendance/{id}',[attendanceController::class,'show']);
Route::post('/attendance',[attendanceController::class,'store']);
Route::post('/attendance/{id}',[attendanceController::class,'update']);
Route::delete('/attendance/{id}',[attendanceController::class,'destroy']);

Route::get('/equipments',[equipmentsController::class,'index']);
Route::get('/equipments/{id}',[equipmentsController::class,'show']);
Route::post('/equipments',[equipmentsController::class,'store']);
Route::post('/equipments/{id}',[equipmentsController::class,'update']);
Route::delete('/equipments/{id}',[equipmentsController::class,'destroy']);

Route::get('/classes',[classesController::class,'index']);
Route::get('/classes/{id}',[classesController::class,'show']);
Route::get('/classes/{id}/members',[classesController::class,'members']);
Route::post('/classes',[classesController::class,'store']);
Route::post('/classes/{id}',[classesController::class,'update']);
Route::delete('/classes/{id}',[classesController::class,'destroy']);

Route::get('/payments',[paymentsController::class,'index']);
Route::get('/payments/{id}',[paymentsController::class,'show']);
Route::post('/payments',[paymentsController::class,'store']);
Route::post('/payments/{id}',[paymentsController::class,'update']);
Route::delete('/payments/{id}',[paymentsController::class,'destroy']);

Route::get('/feedback',[feedbackController::class,'index']);
Route::get('/feedback/{id}',[feedbackController::class,'show']);
Route::post('/feedback',[feedbackController::class,'store']);
Route::post('/feedback/{id}',[feedbackController::class,'update']);
Route::delete('/feedback/{id}',[feedbackController::class,'destroy']);
