export function gantiPassword(){
    
    const bodyModal = document.querySelector('#bodyMyModal')
        
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
          
          <div class="flex flex-col gap-2 mt-2">
            <label for="passwordLama" class="dark:text-white">Password Lama</label>
            <input type="password" name="passwordLama" id="passwordLama" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          </div>
          
          <div class="flex flex-col gap-2 mt-2">
            <label for="passwordBaru1" class="dark:text-white">Password Baru</label>
            <input type="password" name="passwordBaru1" id="passwordBaru1" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          </div>
          
          <div class="flex flex-col gap-2 mt-2">
            <label for="passwordBaru2" class="dark:text-white">Ulangi Password Baru</label>
            <input type="password" name="passwordBaru2" id="passwordBaru2" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          </div>
          <input type="hidden" name="_method" value="put">

        
        `
}