<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kartu Santri</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="w-[8.5cm] h-[5.5cm] border border-slate-300 rounded-md overflow-hidden relative" id="capture"
    data-name="{{ $santri->name }}">
    <img src="/assets/images/ktws.png" alt="bg" class="w-full absolute h-full">


    <div class="w-[20mm] h-[25mm] border border-slate-500 absolute bottom-5 left-6 overflow-hidden bg-white">
      @if ($santri->dataSantri->foto)
        <img src="{{ asset('storage/' . $santri->dataSantri->foto) }}" alt="images" class="w-full">
      @else
        <img src="/assets/images/default.jpg" alt="images" class="w-full">
      @endif
    </div>

    <div class="absolute left-[3cm] top-[90px] pr-3">
      <table class="text-[7px] font-bold">
        <tr>
          <td class="text-[8px]">ID</td>
          <td class="text-[8px]">: {{ $santri->username }}</td>
        </tr>
        <tr>
          <td class="text-[8px]">Nama</td>
          <td class="text-[8px]">: {{ $santri->name }}</td>
        </tr>
        <tr>
          <td class="text-[8px]">Ayah</td>
          <td class="text-[8px]">: {{ $santri->dataSantri->nama_ayah }}</td>
        </tr>
        <tr>
          <td class="text-[8px]">Ibu</td>
          <td class="text-[8px]">: {{ $santri->dataSantri->nama_ibu }}</td>
        </tr>
        <tr>
          <td class="text-[8px] align-top">Alamat</td>
          <td class="text-[8px]">: {{ $santri->dataSantri->jalan }} Dsn. {{ $santri->dataSantri->dusun }}
            {{ $santri->dataSantri->rt }}
            / {{ $santri->dataSantri->rw }} Ds. {{ $santri->dataSantri->desa }} Kec.
            {{ $santri->dataSantri->kecamatan }}
            {{ $santri->dataSantri->kabupaten }} {{ $santri->dataSantri->provinsi }}
            {{ $santri->dataSantri->kodepos }}</td>
        </tr>


      </table>
    </div>

    <div class="absolute right-4 bottom-2">
      <p class="w-2">{!! DNS1D::getBarcodeHTML($santri->username, 'C39', 0.7, 15, 'black') !!}</p>
    </div>
  </div>

  <script src="/dist/js/htmlcanvas.js"></script>

  {{-- <script>
    const data = document.querySelector('#capture')
    html2canvas(data, {
      scale: 3
    }).then((canvas) => {

      const a = document.createElement("a");
      a.download = data.dataset.name + " Wali" + '.jpg';
      a.href = canvas.toDataURL("image/jpg");
      a.click();
    })
  </script> --}}
</body>

</html>
