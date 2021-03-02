<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>CRUD em Laravel</title>

      <!-- Styles -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

      <!-- JavaScripts -->
      <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
      <script src="{{ asset('js/jquery-ui.js') }}"></script>

  </head>
  <body id="app-layout">

    @yield('content')

        <!-- JavaScripts -->
        <script src="{{ asset('js/crud.js') }}"></script>

  </body>
</html>
