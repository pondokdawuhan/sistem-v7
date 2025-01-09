export function modalKamar({data}){
    const bodyModal = document.querySelector('#bodyMyModal')
    let d = JSON.parse(data)

    if(d) {
        let selectedLaki, selectedPerempuan;
        if (d.untuk == "Laki-laki") {
          selectedLaki = 'selected';
          selectedPerempuan = '';
        } else if(d.untuk == 'Perempuan') {
          selectedLaki = '',
          selectedPerempuan = 'selected'
        }
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input type="text" id="name" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="`+d.name+`">
        </div>
        <div>
          <label for="untuk" class="text-slate-900 dark:text-white text-sm font-medium">Untuk</label>
          <select class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="untuk" id="untuk">
            <option>Pilih</option>
            <option value="Laki-laki" ${selectedLaki}>Laki-laki</option>
            <option value="Perempuan" ${selectedPerempuan}>Perempuan</option>
          </select>
        </div>
        <input type="hidden" name="_method" value="put">`
    } else {
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = `<div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="name" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="">
        <div>
          <label for="untuk" class="text-slate-900 dark:text-white text-sm font-medium">Untuk</label>
          <select class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="untuk" id="untuk">
            <option>Pilih</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
    </div>`
    }
}