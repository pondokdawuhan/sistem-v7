export function hafalanMadin({data, santriId, santriName}){
    const bodyModal = document.querySelector('#bodyMyModal')
    let d = JSON.parse(data)

    if(d) {
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="hidden" name="santri_id" value="${santriId}">
            <input type="text" id="name" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="${santriName}" readonly>
        </div>
        <div class="mt-2">
            <label for="hafalan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hafalan</label>
            <input type="text" id="hafalan" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="hafalan" value="${d.hafalan}">
        </div>
        <input type="hidden" name="_method" value="put">`
    } else {
        console.log(santriId, santriName);
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = `
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="hidden" name="santri_id" value="${santriId}">
            <input type="text" id="name" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="${santriName}" readonly>
        </div>
        <div class="mt-2">
            <label for="hafalan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hafalan</label>
            <input type="text" id="hafalan" class="block w-full p-2 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="hafalan" value="">
        </div>
    
    `
    }
}