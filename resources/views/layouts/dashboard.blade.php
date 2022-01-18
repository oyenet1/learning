<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

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

  </style>

  <!-- Styles -->

  {{-- <link rel="stylesheet" href="/assets/css/tailwind.output.css" /> --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  {{-- alpine tootip css --}}

  {{-- livewire styles --}}
  @livewireStyles
  @yield('stylesheet')
</head>
<body>

  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto bg-gray-900 dark:bg-gray-800 md:block flex-shrink-0">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-300 dark:text-gray-200 uppercase" href="/">
          2cyber <span class="text-red-600">security</span>
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">
            {{-- <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span> --}}
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors text-gray-400 duration-150 dark:hover:text-gray-200 dark:text-gray-100" href="/">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
          @if (auth()->user()->hasRole(['superadmin', 'manager']))
          <li class="relative px-6 py-3 hover:bg-gray-">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors text-gray-400 duration-150 dark:hover:text-gray-200" href="{{ route('users') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
              </svg>
              <span class="ml-4">Users</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors text-gray-400 duration-150 dark:hover:text-gray-200" href="/roles">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-journal-richtext" viewBox="0 0 16 16">
                <path d="M7.5 3.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047L11 4.75V7a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 7v-.5s1.54-1.274 1.639-1.208zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
              </svg>
              <span class="ml-4">Roles</span>
            </a>
          </li>
        </ul>
        <ul>
          <li class="relative px-6 py-3">
            <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors text-gray-400 duration-150 dark:hover:text-gray-200" @click="togglePagesMenu" aria-haspopup="true">
              <span class="inline-flex items-center">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
                <span class="ml-4">Messages</span>
              </span>
              <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
            <template x-if="isPagesMenuOpen">
              <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                <li class="px-2 py-1 transition-colors text-gray-400 duration-150 dark:hover:text-gray-200 hover:text-black font-semibold">
                  <a class="w-full flex justify-between items-center" href="/messages">
                    <span class="">New Message(s)</span>
                    <span class="px-1 bg-green-500 text-white text-xs py-1 rounded">{{ \app\Models\Contact::where('hasRead', false)->count() ?? '0' }}</span></a>
                </li>
                <li class="px-2 py-1 transition-colors text-gray-400 duration-150 dark:hover:text-gray-200 hover:text-black font-semibold">
                  <a class="w-full" href="/messages/send">
                    Send Messages
                  </a>
                </li>
                <li class="px-2 py-1 transition-colors text-gray-400 duration-150 dark:hover:text-gray-200 hover:text-black font-semibold">
                  <a class="w-full" href="/subcribers">
                    Subscribers
                  </a>
                </li>
              </ul>
            </template>
          </li>
        </ul>
        @else

        @endif

        <div class="px-6 my-6">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();" class="fixed bottom-2 flex items-center justify-between w-48 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors text-gray-400 duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Logout
            <span class="ml-2" aria-hidden="true">
              <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                </path>
              </svg>
            </span>
            <form class="hidden" id="logout-form2" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </a>
        </div>
      </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-500 dark:text-gray-200" href="/home">
          E-Library
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-500 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100" href="index.html">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul>

          <li class="relative px-6 py-3">
            <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors text-gray-400 duration-150 dark:hover:text-gray-200" @click="togglePagesMenu" aria-haspopup="true">
              <span class="inline-flex items-center">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
                <span class="ml-4">Pages</span>
              </span>
              <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
            <template x-if="isPagesMenuOpen">
              <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                <li class="px-2 py-1 transition-colors text-gray-400 duration-150 dark:hover:text-gray-200">
                  <a class="w-full" href="pages/login.html">Login</a>
                </li>
                <li class="px-2 py-1 transition-colors text-gray-400 duration-150 dark:hover:text-gray-200">
                  <a class="w-full" href="pages/create-account.html">
                    Create account
                  </a>
                </li>
                <li class="px-2 py-1 transition-colors text-gray-400 duration-150 dark:hover:text-gray-200">
                  <a class="w-full" href="pages/forgot-password.html">
                    Forgot password
                  </a>
                </li>
                <li class="px-2 py-1 transition-colors text-gray-400 duration-150 dark:hover:text-gray-200">
                  <a class="w-full" href="pages/404.html">404</a>
                </li>
                <li class="px-2 py-1 transition-colors text-gray-400 duration-150 dark:hover:text-gray-200">
                  <a class="w-full" href="pages/blank.html">Blank</a>
                </li>
              </ul>
            </template>
          </li>
        </ul>
        <div class="px-6 my-6">
          <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors text-gray-400 duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Create account
            <span class="ml-2" aria-hidden="true">+</span>
          </button>
        </div>
      </div>
    </aside>

    {{-- right side of the page here --}}
    <div class="flex flex-col flex-1 w-full">
      <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
          <!-- Mobile hamburger -->
          <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
          </button>
          <div></div>
          <ul class="flex items-center flex-shrink-0 space-x-6">
            <li class="relative">
              <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                <svg class="w-5 h-5 text-purple-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                  </path>
                </svg>
                <!-- Notification badge -->
                <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
              </button>
              <template x-if="isNotificationsMenuOpen">
                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
                  @if (auth()->user()->hasRole(['superadmin', 'manager']))
                  <li class="flex">
                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors text-gray-400 duration-150 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{ route('messages') }}">
                      <span>Messages</span>
                      <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-green-600 bg-green-100 rounded-full dark:text-red-100 dark:bg-red-600">
                        {{ \app\Models\Contact::where('hasRead', false)->count() ?? '' }}
                      </span>
                    </a>
                  </li>
                  @else
                  @endif
                </ul>
              </template>
            </li>
            <!-- Profile menu -->
            <li class="relative">
              <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82" alt="" aria-hidden="true" />
              </button>
    
              <template x-if="isProfileMenuOpen">
                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
                  <li class="flex">
                    <p class="inline-flex items-center w-full px-2 py-1 text-xs text-purple-600 font-bold transition-colors text-gray-400 duration-150 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#" disabled>
                      <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                      <span>{{ Auth::user()->name }}</span>
                    </p>
                  </li>
                  <li class="flex">
                    <p class="inline-flex items-center w-full px-2 py-1 text-xs text-purple-600 font-bold transition-colors text-gray-400 duration-150 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#" disabled>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                      </svg>
                      <span>{{ Auth::user()->email }}</span>
                    </p>
                  </li>

                  <li class="flex">
                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors text-gray-400 duration-150 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                        </path>
                      </svg>
                      <span>Log out</span>
                    </a>
                    <form class="hidden" id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                    </form>

                  </li>
                </ul>
              </template>
            </li>
          </ul>
        </div>
      </header>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 uppercase">
            {{ Route::currentRouteName() ?? 'Dashboard' }}
            {{-- {{ url()->current() }} --}}
            {{-- {{ Route::current()->getName() }} --}}
            {{-- management details --}}
          </h2>
          <!-- CTA -->
          @yield('content')
        </div>
      </main>

    </div>

    {{-- jquery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}

    {{-- sweet alert --}}

    <script>
      $(document).ready(function() {
        $(".alert-hide").click(function() {
          $(".alert").hide();
        });
      });

    </script>

    {{-- livewire scripts --}}
    @livewireScripts

    {{-- extra scripts --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    {{-- sweetalert github version --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')

    <script>
      window.addEventListener('swal:success', function(e) {
        Swal.fire(e.detail);
      });


      window.addEventListener('swal:confirm', event => {
        Swal.fire(e.detail)
          .then((result) => {
            if (result.isConfirmed) {
              Livewire.emit('delete');
            }
          });
      });

    </script>
  </div>
</body>
</html>
