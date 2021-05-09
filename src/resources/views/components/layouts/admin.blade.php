<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title> Gmattworld </title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css2?family=Montserrat">
    <link href="//unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    @stack('styles')
  </head>
  <body class="h-screen min-h-screen font-sans antialiased">
    <div class="flex flex-nowrap">
      @include('blogger::incs.sidebar')
      <div class="flex-auto w-full min-h-screen bg-gray-100 ">
        @include('blogger::incs.header')
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main class="pb-10 overflow-hidden bg-gray-100 pt-28">
          {{ $slot }}
        </main>
        @include('blogger::incs.footer')
      </div>
    </div>

    <script src="//use.fontawesome.com/9488e44c37.js"></script>
    @stack('scripts')
  </body>
</html>
