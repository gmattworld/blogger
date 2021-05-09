<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title> Blogger </title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css2?family=Montserrat">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="pt-16">      
      <section class="w-full">
        <div class="container mx-auto">
          <div class="pb-20">
            <x-blogger::post :model='$model' />
          </div>
        </div>
      </section>
    </div>
    <script src="//use.fontawesome.com/9488e44c37.js"></script>
  </body>
</html>
