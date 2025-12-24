<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

Route::get('/', [AuthController::class,'loginForm']);
Route::get('/login', [AuthController::class,'loginForm']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/register', [AuthController::class,'registerForm']);
Route::post('/register', [AuthController::class,'register']);

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class,'loginForm']);
Route::post('/admin/login', [AdminAuthController::class,'login']);
Route::post('/admin/logout', [AdminAuthController::class,'logout']);

Route::middleware('auth')->group(function(){
    Route::get('/profile',[ProfileController::class,'index']);
    Route::post('/profile/update',[ProfileController::class,'update']);
    Route::post('/profile/upload-picture',[ProfileController::class,'uploadPicture']);
    Route::post('/profile/add-qualification',[ProfileController::class,'addQualification']);
    Route::post('/profile/remove-qualification',[ProfileController::class,'removeQualification']);
    Route::post('/profile/add-experience',[ProfileController::class,'addExperience']);
    Route::post('/profile/remove-experience',[ProfileController::class,'removeExperience']);
});

// Admin Dashboard Routes
Route::middleware(['admin.only'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/employee/{id}', [AdminController::class, 'showEmployee']);
});
