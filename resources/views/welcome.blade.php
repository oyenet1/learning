<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- google fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Elearning| Login</title>

  {{-- alpinejs  --}}
  {{-- <script  src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
  <script src="/assets/js/init-alpine.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>


  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <style>
    [x-cloak] {
      display: none !important;
    }

    
    .poppins {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 400 !important;
    }
    .poppins-bold {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 700 !important;
    }
    .poppins-extrabold {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 800 !important;
    }
    .poppins-light, body {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 300 !important;
    }
    .poppins-normal {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 400 !important;
    }
    .poppins-medium {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 500 !important;
    }
    .poppins-semibold {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 600 !important;
    }
    .poppins-black {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 900 !important;
    }
  </style>

  <!-- Styles -->

  {{-- <link rel="stylesheet" href="/assets/css/tailwind.output.css" /> --}}
  <link href="/css/app.css" rel="stylesheet">

  {{-- alpine tootip css --}}

  {{-- livewire styles --}}
  @livewireStyles
  @yield('stylesheet')
</head>
<body style="background:#ddd url('/img/alan.jpg') no-repeat; background-size: cover;" class="bg-cover">
  <div class="w-full flex items-center flex-col my-auto justify-center h-screen bg-opacity-100 mx-auto">
    <div class=" bg-white bg-opacity-50 shadow-xl px-3 md:px-6 py-12 rounded-lg w-full md:w-2/3 lg:w-1/2 max-w-md ">
      <img src="/img/logo.png" alt="alansecutity logo" class="w-32 h-auto mx-auto">
      <form action="{{ route('login') }}" method="post" class="poppins">
        @csrf
        <label class="block text-sm">
          <span class="text-green-700 dark:text-gray-400">Email Address</span>
          <input name="email" value="{{ old('email') }}" class="block py-2 border-2 border-green-600 md:py-3 rounded px-3 w-full mt-1 text-sm dark:border-gray-800 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="abuja@alansarsecurity.com" />
          @error('email')
          <span class="text-xs text-red-500 font-normal">{{ $message }}</span>
          @enderror
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-green-700 dark:text-gray-400">Password</span>
          <input name="password" value="{{ old('password') }}" class="block py-2 border-2 border-green-600 md:py-3 rounded px-3 w-full mt-1 text-sm dark:border-gray-800 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" />
          @error('password')
          <span class="text-xs text-red-500 font-normal">{{ $message }}</span>
          @enderror
        </label>
        <p class="text-right">
          <a class="text-sm text-right font-poppins font-normal text-red-600 dark:text-green-400 hover:underline" href="{{ route('password.request') }}">
            Forgot your password?
          </a>
        </p>

        <!-- You should use a button here, as the anchor is only used for the example  -->
        <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-800 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-700 focus:outline-none focus:shadow-outline-green" href="/index.html">
          Log in
        </button>
      </form>
      <hr class="my-8 bg-green-700 text-green-800 " />
      <p class="mt-1 text-center bg-red-600 py-2 rounded">
        <span class="text-gray-800 poppins text-sm">New Branch Admin</span>
        <a class="text-sm font-poppins font-medium text-white dark:text-purple-400 hover:underline" href="">
          Contact Super Admin
        </a>
      </p>
    </div>
  </div>

  {{-- livewire scripts --}}
  @livewireScripts
</body>
</html>
