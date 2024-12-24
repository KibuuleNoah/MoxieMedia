<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
    @include("partials.shared_styles")
    @stack("styles")
    <style>
h1{
    color: red;
}
    </style>
  </head>
  <body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300 min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow dark:bg-gray-800 dark:shadow-gray-700">
      @include("partials.nav_bar")
    </header>

      <div class="pt-[55]">
        @yield("content")
      </div>

    @include("partials.shared_scripts")
    @stack("scripts")
  </body>
</html>


