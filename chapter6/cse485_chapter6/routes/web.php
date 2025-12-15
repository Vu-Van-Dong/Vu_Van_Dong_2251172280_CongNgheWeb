<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Trang chủ
Route::get('/', [PageController::class, 'showHomepage']);

// Trang giới thiệu
Route::get('/about', [PageController::class, 'showHomepage']);
