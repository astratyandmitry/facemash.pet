<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'app');

Route::as('admin.')->prefix('admin')->middleware('admin')->group(function(): void {
    Route::get('/decisions', \App\Http\Controllers\Admin\DecisionsListController::class)->name('decisions.list');
    Route::delete('/decisions/{id}', \App\Http\Controllers\Admin\DecisionsDeleteController::class)->name('decisions.delete');
});
