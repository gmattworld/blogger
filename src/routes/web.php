<?php

use Gmattworld\Blogger\Http\Controllers\BloggerController;
use Gmattworld\Blogger\Http\Controllers\BloggerAdminController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['web']], function () {
  Route::prefix(config('blogger::blog_prefix', 'blogger'))->group(function () {  
    Route::get('/', [BloggerController::class, 'posts']);
    Route::get('/{id}', [BloggerController::class, 'post']);
  });


  Route::prefix(config('blogger::admin_prefix', 'admin'))->group(function () {
    Route::resource('/blogger', BloggerAdminController::class);
    Route::get('/blogger/{id}/status', [BloggerAdminController::class, 'status']);
  });

// Route::post('testpost', function (Request $request) {
//     $request->all();
// });
});
