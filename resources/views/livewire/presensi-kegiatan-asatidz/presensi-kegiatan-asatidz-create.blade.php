<div class=" overflow-x-auto shadow-md sm:rounded-lg bg-white p-5 rounded-md dark:bg-slate-900">
  <form action="/{{ $lembaga->id }}/{{ $role }}/presensiKegiatanAsatidz" method="POST">
    @csrf
    <input type="hidden" name="lembaga" value="{{ $lembaga->id }}">
    <input type="hidden" name="role" value="{{ $role }}">
    <div>
      <div class="flex flex-col w-full lg:w-min gap-2 mb-2">
        <label for="kegiatan" class="text-slate-800 dark:text-white">Kegiatan</label>
        <input type="text" class="px-3 py-1 rounded-md" name="kegiatan" id="kegiatan" required>
      </div>
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              No
            </th>
            <th scope="col" class="px-6 py-3">
              Nama
            </th>
            <th scope="col" class="px-6 py-3">
              Keterangan
            </th>
          </tr>
        </thead>
        <tbody>

          @foreach ($users as $user)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">

              <td class="px-6 py-4 dark:text-white @if (in_array($user->id, $izinKeluarUsers) || in_array($user->id, $izinPulangUsers) || in_array($user->id, $izinAsatidz)) bg-red-500 text-white @endif">
                {{ $loop->iteration }}</td>
              <td class="px-6 py-4 dark:text-white @if (in_array($user->id, $izinKeluarUsers) || in_array($user->id, $izinPulangUsers) || in_array($user->id, $izinAsatidz)) bg-red-500 text-white @endif">
                <input type="hidden" name="user_id[]" value="{{ $user->id }}">
                {{ $user->name }}
              </td>

              <td class="px-6 py-4 @if (in_array($user->id, $izinKeluarUsers) || in_array($user->id, $izinPulangUsers) || in_array($user->id, $izinAsatidz)) bg-red-500 dark:text-white @endif">
                <select name="keterangans[]" id="keterangan"
                  class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                  <option value="H">HADIR</option>
                  <option value="S">
                    SAKIT</option>
                  <option value="I" @if (in_array($user->id, $izinKeluarUsers) || in_array($user->id, $izinPulangUsers) || in_array($user->id, $izinAsatidz)) selected @endif>
                    IZIN</option>
                  <option value="A">ALPHA</option>
                </select>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="flex justify-end mr-5">
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white mt-5">Kirim</button>
      </div>
    </div>
  </form>
</div>
