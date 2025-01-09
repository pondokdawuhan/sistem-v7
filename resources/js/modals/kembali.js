export function kembali(){
    const bodyModal = document.querySelector('#bodyMyModal')

        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
        <label for="waktu_kembali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Kembali</label>
        <input type="datetime-local" id="waktu_kembali" class="px-3 py-1 rounded-md w-full" name="waktu_kembali">
        <input type="hidden" name="_method" value="put">
        </div>`
    
}