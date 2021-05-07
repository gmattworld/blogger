<?php

namespace Gmattworld\BlogManager;

use Illuminate\Support\ServiceProvider;

class BlogManagerProvider extends ServiceProvider
{
  public function boot()
  {
    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    $this->loadViewsFrom(__DIR__.'/views/', 'BlogManager');
  }

  public function register()
  {
    # code...
  }
}