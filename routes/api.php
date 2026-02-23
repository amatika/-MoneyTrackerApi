<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TransactionController;

Route::post('/users', [UserController::class, 'store']); //store a new user
Route::get('/users/{id}', [UserController::class, 'show']);//get user details by id

Route::post('/wallets', [WalletController::class, 'store']);//store a new wallet
Route::get('/wallets/{id}', [WalletController::class, 'show']);//get wallet details by id

Route::post('/transactions', [TransactionController::class, 'store']);//store a new transaction
