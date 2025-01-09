<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kartu Guru</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-[5.5cm] h-[8.5cm] font-inter">
  <div class="relative w-[5.5cm] h-[8.5cm] border border-slate-300 rounded-md " id="capture"
    data-name="{{ $user->name }}">
    <img src="/assets/images/ktg3.jpg" alt="bg" class=" absolute top-0 left-0 w-[5.5cm] h-[8.5cm]">

    <div class="relative top-0 left-0 w-[5.5cm] h-[8.5cm] flex flex-col gap-3 ">

      <div class="absolute top-12 flex flex-col gap-2 justify-center w-full">
        <div class="w-[3cm] h-[3cm] rounded-full border-[4px] border-emerald-500 overflow-hidden mx-auto">
          @if ($user->dataUser->foto)
            <img src="{{ asset('storage/' . $user->dataUser->foto) }}" alt="images" class="w-full">
          @else
            <img src="/assets/images/default.jpg" alt="images" class="w-full">
          @endif
        </div>

        <p class="text-center text-wrap text-slate-800 px-4 leading-tight font-bold">{{ $user->name }}</p>
        <div class="flex justify-center w-full">
          <p class="text-center">{!! DNS1D::getBarcodeHTML($user->username, 'C39', 0.9, 20, 'black') !!}</p>
        </div>
        <div class="ml-2">
          <table>
            <tr>
              <td class="text-[8px]">ID</td>
              <td class="text-[8px]">: {{ $user->username }}</td>
            </tr>
            <tr>
              <td class="text-[8px]">No HP</td>
              <td class="text-[8px]">: {{ $user->dataUser->no_hp }}</td>
            </tr>
            <tr>
              <td class="text-[8px]">Email</td>
              <td class="text-[8px]">: {{ $user->email }}</td>
            </tr>
          </table>
        </div>
      </div>

    </div>

  </div>

  <script src="/dist/js/htmlcanvas.js"></script>
  {{-- 
  <script>
    const data = document.querySelector('#capture')
    html2canvas(data, {
      scale: 3,
    }).then((canvas) => {

      const a = document.createElement("a");
      a.download = data.dataset.name + '.jpg';
      a.href = canvas.toDataURL("image/jpg");
      a.click();
    })
  </script> --}}
</body>

</html>
