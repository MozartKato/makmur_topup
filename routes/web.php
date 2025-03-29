<?php

use App\Http\Controllers\GoodsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[GoodsController::class, 'showGames'])->name('main');
Route::get('/games/{id}/items',[GoodsController::class, 'showItem'])->name('items.index');
Route::get('/transactions',[GoodsController::class, 'showAllTransactions'])->name('transactions.index');
Route::post('/order',[GoodsController::class, 'order'])->name('order');
Route::get('/transaction/{transaction_code}',[GoodsController::class, 'showTransaction'])->name('transaction.show');