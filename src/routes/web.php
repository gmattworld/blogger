<?php

use Gmattworld\Blogger\Http\Controllers\BloggerController;
use Gmattworld\Blogger\Http\Controllers\BloggerAdminController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['web', 'auth']], function () {
  Route::prefix('blogger')->group(function () {  
    Route::get('/', [BloggerController::class, 'posts']);
    Route::get('/{id}', [BloggerController::class, 'post']);
  });


  Route::prefix('admin')->group(function () {
    Route::resource('/blogger', BloggerAdminController::class);
    Route::get('/blogger/{id}/status', [BloggerAdminController::class, 'status']);
  });
});
