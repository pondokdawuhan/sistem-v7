<!DOCTYPE html>
<html class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Sistem Informasi Terpadu Pondok Pesantren Bustanul Muta'allimin">
  <meta name="title" content="SI PPBM">
  <meta name="keywords" content="sippbm, sistem ppbm, ppbm">
  <link rel="apple-touch-icon" sizes="76x76" href="/dist/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="/assets/images/logo.png" />
  <title>{{ $title }} | Sistem Informasi PPBM</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/b573aa465a.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="fixed w-full h-screen"
    style="background-image: url('/assets/images/bg5.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover">
  </div>
  <nav class="fixed top-0 z-50 w-full bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
              </path>
            </svg>
          </button>
          <a href="https://sistem.bustanulmutaallimin.com" class="flex ms-2 md:me-24">
            <img src="/assets/images/logo.png" class="h-8 me-3" alt="Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">SI
              PPBM</span>
          </a>
        </div>
        <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                @if (auth()->user()->dataUser)
                  @if (auth()->user()->dataUser->foto != null)
                    <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . auth()->user()->dataUser->foto) }}"
                      alt="user photo">
                  @else
                    <img class="w-8 h-8 rounded-full" src="/assets/images/default.jpg" alt="user photo">
                  @endif
                @else
                  <img class="w-8 h-8 rounded-full" src="/assets/images/default.jpg" alt="user photo">
                @endif
              </button>
            </div>
            <div
              class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
              id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  {{ auth()->user()->name }}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  {{ auth()->user()->username }}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  {{ auth()->user()->email }}
                </p>
              </div>
              <ul class="py-1" role="none">

                <li>
                  <a href="/profil/{{ auth()->user()->username }}" wire:navigate
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Profil</a>
                </li>
                <li>
                  <a href="/logout"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  @include('partials.navbar')

  <main class="p-4 sm:ml-64 min-h-screen relative">
    <div
      class="p-4 rounded-lg dark:border-gray-700 mt-14 bg-slate-100 dark:bg-slate-800 bg-opacity-85 dark:bg-opacity-85 overflow-hidden">
      <h1 class="dark:text-white lg:text-xl mb-4 font-bold">{{ $title }}</h1>
      @yield('container')
    </div>
  </main>


</body>

</html>
