@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    <div class="flex items-center justify-between gap-2 mb-2">
      <div class="flex flex-1 gap-2">
        <a href="/user/create"
          class="text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-violet-600 dark:hover:bg-violet-700 focus:outline-none dark:focus:ring-violet-800"><i
            class="fa-solid fa-user-plus"></i></a>

        <div class="w-full lg:w-1/3">
          <form action="">
            <label for="default-search"
              class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative flex items-center gap-2">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
              </div>
              <input type="search" id="default-search"
                class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="nama, email, atau username" name="keyword" autofocus>
              <button type="submit"
                class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div>
        <form action="/downloadDataAsatidz" method="POST">
          @csrf
          <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md">Download</button>
        </form>
      </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Status
          </th>
          <th scope="col" class="px-6 py-3">
            Name
          </th>
          <th scope="col" class="px-6 py-3">
            Role
          </th>
          <th scope="col" class="px-6 py-3">
            Jenis Kelamin
          </th>
          <th scope="col" class="px-6 py-3">
            Lembaga
          </th>
          <th scope="col" class="px-6 py-3">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="pl-5">
              <div class="flex items-center">
                @if ($user->dataUser)
                  @if ($user->dataUser->aktif == true)
                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktif
                  @else
                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Tidak Aktif
                  @endif
                @endif
              </div>
            </td>
            <td class="flex items-center px-6 py-4 text-gray-900 dark:text-white">
              @if ($user->dataUser)
                @if ($user->dataUser->foto != null)
                  <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $user->dataUser->foto) }}"
                    alt="profile">
                @else
                  <img class="w-10 h-10 rounded-full" src="/assets/images/default.jpg" alt="profile">
                @endif
              @else
                <img class="w-10 h-10 rounded-full" src="/assets/images/default.jpg" alt="profile">
              @endif
              <div class="ps-3">
                <div class="text-base font-semibold">{{ $user->name }}</div>
                <div class="font-normal text-gray-500">{{ $user->username }} | {{ $user->email }}</div>
              </div>
            </td>
            <td class="px-6 py-4">
              @if ($user->roles)
                @foreach ($user->roles as $role)
                  {{ $role->name }} |
                @endforeach
              @endif
            </td>
            <td class="px-6 py-4">
              @if ($user->dataUser)
                {{ $user->dataUser->jenis_kelamin }}
              @endif
            </td>
            <td class="px-6 py-4">
              @foreach ($user->lembaga as $lembaga)
                {{ $lembaga->name }} |
              @endforeach
            </td>

            <td class="px-6 py-4">

              <a href="/user/{{ $user->username }}/edit"
                class="text-white bg-sky-500 rounded-lg text-xs px-3 py-1 inline-block"><i
                  class="fa-solid fa-user-edit"></i></a>

              <a href="/user/{{ $user->username }}"
                class="text-white bg-amber-500 rounded-lg text-xs px-3 py-1 inline-block mt-2"><i
                  class="fa-solid fa-eye"></i></a>

              <a href="/user/cetakKartu/{{ $user->username }}" target="_blank"
                class="text-white bg-green-500 rounded-lg text-xs px-3 py-1 inline-block mt-2"><i
                  class="fa-solid fa-id-card"></i></a>


              <i class="toggleDeleteModal mt-2 fa-solid fa-trash text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                data-title="Apakah Anda yakin menghapus user ini? Menghapus user ini akan menghapus semua data yang berhubungan dengan user ini"
                data-url="user" data-id="{{ $user->username }}"></i>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4 flex justify-end">
      {{ $users->links() }}
    </div>

    @include('partials.popUpDelete')
  </div>
@endsection
