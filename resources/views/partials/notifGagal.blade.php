@if (session()->has('gagal'))
  <div class="bg-red-500 text-white px-3 py-2 mb-5">
    <h4 class="text-center font-semibold">{{ session('gagal') }}</h4>
  </div>
@endif
