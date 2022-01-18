<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/app.css">
  <title>@yield('title')</title>
</head>
<body class="bg-cover" style="background: url('/img/alan.jpg'); background-size: cover ">

  <div class="h-screen w-screen bg-opacity-95  bg-green-800 flex justify-center">
    @yield('content')
  </div>
  
</body>
</html>