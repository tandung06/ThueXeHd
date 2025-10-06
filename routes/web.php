<?php

use Illuminate\Support\Facades\Route;

// Trang chủ
Route::get('/', function () {
    return view('home');
})->name('home');

// Các trang chính
Route::get('/dich-vu', function () {
    return view('services');
})->name('services');

Route::get('/doi-xe', function () {
    return view('fleet');
})->name('fleet');

Route::get('/gioi-thieu', function () {
    return view('about');
})->name('about');

Route::get('/lien-he', function () {
    return view('contact');
})->name('contact');

Route::get('/dat-xe', function () {
    return view('booking');
})->name('booking');
