export function suciHaid(){
    const bodyModal = document.querySelector('#bodyMyModal')

        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
        <label for="tanggal_suci" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Suci</label>
        <input type="datetime-local" id="tanggal_suci" class="px-3 py-1 rounded-md w-full" name="tanggal_suci">
        <input type="hidden" name="_method" value="put">
        </div>`
    
}