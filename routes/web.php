<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/services', 'services');
Route::view('/technicians', 'technicians');
Route::view('/booking', 'booking');
Route::view('/about', 'about');
Route::view('/contact', 'contact');