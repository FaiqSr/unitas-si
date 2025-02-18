<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MerchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\adminAuthenticate;
use App\Http\Middleware\nonAuthenticated;
use GuzzleHttp\Middleware;

Route::get('/', [EventController::class, 'index']);

Route::get('/member', [MemberController::class, 'index']);

Route::get('/event/{slug}', [EventController::class, 'showEvent']);
Route::get('/merchandise/{slug}', [MerchController::class, 'showMerch']);

Route::middleware([nonAuthenticated::class])->group(function (){
    Route::get('/login', [UserController::class, 'showLoginForm']);
    Route::post('/login', [UserController::class, 'authenticate']);
});

Route::middleware([adminAuthenticate::class])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'showDashboard']);
    
    Route::get('/dashboard/members', [DashboardController::class, 'showDashboardMember']);
    Route::get('/dashboard/members/tambah', [DashboardController::class, 'showTambahMember']);
    Route::post('/dashboard/members/tambah', [DashboardController::class, 'tambahMember']);
    
    Route::get('/dashboard/events',[DashboardController::class, 'showDashboardEvent']);
    Route::get('/dashboard/events/tambah', [DashboardController::class, 'showTambahEvent']);
    Route::get('/dashboard/events/sunting/{id}', [DashboardController::class, 'showEditEvent']);
    Route::post('/dashboard/events/tambah', [DashboardController::class, 'tambahEvent']);
    Route::post('/dashboard/events/hapus', [DashboardController::class, 'hapusEventbyId']);
    Route::post('/dashboard/events/put', [DashboardController::class, 'editEvent']);
    
    Route::get('/dashboard/merchandise', [DashboardController::class, 'showDashboardMerch']);
    Route::get('/dashboard/merchandise/tambah', [DashboardController::class, 'showTambahMerch']);
    Route::get('/dashboard/merchandise/sunting/{id}', [DashboardController::class, 'showEditMerch']);
    Route::post('/dashboard/merchandise/tambah', [DashboardController::class, 'tambahMerch']);
    Route::post('/dashboard/merchandise/hapus', [DashboardController::class, 'hapusMerchById']);
    Route::post('/dashboard/merchandise/put', [DashboardController::class, 'editMerch']);

    
    Route::get('/logout', [UserController::class, 'logout']);
});