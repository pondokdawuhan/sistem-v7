export function kelas({data, kelas}){
    const bodyModal = document.querySelector('#bodyMyModal')
    
    let d = JSON.parse(data)
    let k = JSON.parse(kelas)

    if(k) {
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="name" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama" value="${k.nama}">
        </div>
        <input type="hidden" name="kelas_id" value="${k.id}">
        <input type="hidden" name="lembaga_id" value="${d.nama}">
        <input type="hidden" name="_method" value="put">
        `
    } else {
      bodyModal.innerHTML = ``
        bodyModal.innerHTML = `<div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="name" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama" value="">
        <input type="hidden" name="lembaga_id" value="${d.nama}">
        <input type="hidden" name="_method" value="put">
    </div>`
    }
}