<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title")</title>
    @include("partials.shared_styles")

  </head>
  <body
    class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300 flex items-center justify-center min-h-screen"
  >
    @yield("content")
  </body>
</html>
