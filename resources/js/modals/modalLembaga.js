export function modalLembaga({data}){
    const bodyModal = document.querySelector('#bodyMyModal')
    let d = JSON.parse(data)

    if(d) {
        let formal, madin, tpq, asrama;
        if (d.jenis_lembaga == "FORMAL") {
          formal = 'selected';
          madin = '';
          tpq = '';
          asrama = '';
        } else if(d.jenis_lembaga == 'MADIN') {
          formal = '';
          madin = 'selected';
          tpq = '';
          asrama = '';
        } else if(d.jenis_lembaga == 'TPQ') {
          formal = '';
          madin = '';
          tpq = 'selected';
          asrama = '';
        } else if(d.jenis_lembaga == 'ASRAMA'){
          formal = '';
          madin = '';
          tpq = '';
          asrama = 'selected';
        }
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
          <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input type="text" id="nama" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama" value="${d.nama}" required>
        </div>
        <div>
          <label for="nama_singkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Singkat</label>
          <input type="text" id="nama_singkat" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama_singkat" value="${d.nama_singkat}" required>
        </div>
        <div>
          <label for="jenis_lembaga" class="text-slate-900 dark:text-white text-sm font-medium">Jenis Lembaga</label>
          <select class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="jenis_lembaga" id="jenis_lembaga">
            <option>Pilih</option>
            <option value="FORMAL" ${formal}>FORMAL</option>
            <option value="MADIN" ${madin}>MADIN</option>
            <option value="TPQ" ${tpq}>TPQ</option>
            <option value="ASRAMA" ${asrama}>ASRAMA</option>
          </select>
        </div>
        <div>
          <label for="jam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Mengajar Terbanyak</label>
          <input type="text" id="jam" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="jam" value="${d.jam}" required>
        </div>
        <input type="hidden" name="_method" value="put">`
    } else {
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = `
        <div>
          <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input type="text" id="nama" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama" value="" required>
        </div>
        <div>
          <label for="nama_singkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Singkat</label>
          <input type="text" id="nama_singkat" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama_singkat" value="" required>
        </div>
        <div>
          <label for="jenis_lembaga" class="text-slate-900 dark:text-white text-sm font-medium">Jenis Lembaga</label>
          <select class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="jenis_lembaga" id="jenis_lembaga">
            <option>Pilih</option>
            <option value="FORMAL">FORMAL</option>
            <option value="MADIN">MADIN</option>
            <option value="TPQ">TPQ</option>
            <option value="ASRAMA">ASRAMA</option>
          </select>
        </div>
        <div>
          <label for="jam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Mengajar Terbanyak</label>
          <input type="text" id="jam" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="jam" value="" required>
        </div>
        `
    }
}