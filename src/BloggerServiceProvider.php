<?php

namespace Gmattworld\Blogger;

// use Gmattworld\Blogger\View\Components\admin\CreatePost;
use Gmattworld\Blogger\View\Components\admin\posts as AdminPosts;
// use Gmattworld\Blogger\View\Components\admin\post as AdminPost;
use Gmattworld\Blogger\View\Components\layouts\admin;
use Gmattworld\Blogger\View\Components\posts;
use Gmattworld\Blogger\View\Components\post;
use Illuminate\Support\ServiceProvider;

class BloggerServiceProvider extends ServiceProvider
{
  public function boot()
  {
    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    $this->loadViewsFrom(__DIR__.'/resources/views/', 'blogger');
    $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    $this->mergeConfigFrom(__DIR__.'/config/blogger.php', 'blogger');

    $this->loadViewComponentsAs('blogger', [
      // CreatePost::class,
      AdminPosts::class,
      // AdminPost::class,



      admin::class,
      posts::class,
      post::class,
    ]);


    $this->publishes([
        __DIR__.'/resources/views' => resource_path('views/vendor/blogger'),
    ], 'views');

    $this->publishes([
        __DIR__.'/config/blogger.php' => config_path('blogger.php')
    ], 'config');

    $this->publishes([
        __DIR__.'/database/migrations/' => database_path('migrations')
    ], 'migrations');
  }

  public function register()
  {
    # code...
  }
}