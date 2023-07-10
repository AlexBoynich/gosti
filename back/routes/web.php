<?php

use Illuminate\Support\Facades\Route;
use Livewire\Controllers\FileUploadHandler;

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

Route::post('/cp/livewire/upload-file', [FileUploadHandler::class, 'handle'])
    ->name('livewire.upload-file')
    ->middleware(config('livewire.middleware_group', ''));
