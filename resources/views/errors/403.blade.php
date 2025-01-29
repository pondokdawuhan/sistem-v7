<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>403 | Sistem Informasi PPBM</title>
  <script src="https://kit.fontawesome.com/b573aa465a.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="/assets/images/logo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css'])
</head>


<body>
  <div class="text-center p-6 bg-white rounded-lg shadow-lg min-h-screen flex flex-col justify-center items-center">
    <div class="">
      <img src="{{ asset('assets/images/logo.png') }}" alt="" class="mx-auto w-28 mb-4">
      <h1 class="text-8xl font-bold text-gray-800">403</h1>
      <p class="text-2xl mt-2 text-gray-800 font-bold">Akses Ditolak</p>
      <p class="mt-4 text-lg text-gray-500">Mohon Maaf anda tidak memiliki akses ke menu tersebut</p>
      <a href="/" wire:navigate
        class="mt-6 inline-block px-6 py-3 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition duration-300">Kembali
        ke Beranda</a>
    </div>
  </div>

</body>

</html>
