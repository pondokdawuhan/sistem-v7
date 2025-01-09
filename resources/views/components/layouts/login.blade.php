<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <script src="https://kit.fontawesome.com/b573aa465a.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="/assets/images/logo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/login.js'])
</head>


<body>
  <div class="bg-cover bg-center bg-fixed w-full min-h-screen flex justify-center items-center bg-blend-screen"
    style="background-image: url('/assets/images/bg5.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover">
    {{ $slot }}
  </div>
</body>

</html>
