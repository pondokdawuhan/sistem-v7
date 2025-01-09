@if (session()->has('success'))
  <div class="bg-green-400 text-white px-3 py-2 mb-5">
    <h4 class="text-center font-semibold">{{ session('success') }}</h4>
  </div>
@endif
