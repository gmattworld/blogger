<?php

//config for Gmattworld/Blogger
return [
    'default_language' => 'en',

    //Your custom User model
    //Change it to \App\User::class for previous laravel versions
    'user_model'=>\App\Models\User::class,

    // used in routes.php. If you want to your http://yoursite.com/latest-news (or anything else), then enter that here.
    // Default: blog
    'blog_prefix' => "blog",

    // similar to above, but used for the admin panel for the blog.
    // Default: admin
    'admin_prefix' => "admin",

];
