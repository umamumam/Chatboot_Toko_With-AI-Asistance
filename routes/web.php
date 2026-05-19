<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AiChatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ai', [AiChatController::class, 'index']);
Route::post('/ai/chat', [AiChatController::class, 'chat']);
Route::post('/ai/notify-admin', [AiChatController::class, 'notifyAdmin']);
