<?php

use Gmattworld\Blogger\Http\Controllers\BloggerController;
use Gmattworld\Blogger\Http\Controllers\BloggerAdminController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['web']], function () {
  Route::prefix('blogger')->group(function () {  
    Route::get('/', [BloggerController::class, 'posts']);
    Route::get('/{id}', [BloggerController::class, 'post']);
  });


  Route::prefix('admin/blogger')->group(function () {
    Route::resource('/', BloggerAdminController::class);
    Route::get('/{id}/status', [BloggerAdminController::class, 'status']);
  });

// Route::post('testpost', function (Request $request) {
//     $request->all();
// });
});
