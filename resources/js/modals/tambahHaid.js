export function tambahHaid({santri, data}){
    
    const bodyModal = document.querySelector('#bodyMyModal')
        let si = JSON.parse(santri)
        let d = JSON.parse(data)
        if (si) {
          
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input type="text" id="name" class="px-3 py-1 rounded-md w-full" name="name" value="${si.name}" readonly>
          <input type="hidden" name="santri_id" value="${si.id}">
        </div>
        <div class="flex flex-col gap-2 mt-2">
          <label for="tanggal_mulai" class="dark:text-white">Tanggal Mulai</label>
          <input type="datetime-local" name="tanggal_mulai" id="tanggal_mulai"
            class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
        </div>
        
        `}
        else {
             
        bodyModal.innerHTML = ``
        bodyModal.innerHTML = 
        `
        <div>
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input type="text" id="name" class="px-3 py-1 rounded-md w-full" name="name" value="${d.santri.name}" readonly>
          <input type="hidden" name="santri_id" value="${d.santri.id}">
          </div>
          <div class="flex flex-col gap-2 mt-2">
          <label for="tanggal_mulai" class="dark:text-white">Tanggal Mulai</label>
          <input type="datetime-local" name="tanggal_mulai" id="tanggal_mulai"
          class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" value="${d.tanggal_mulai}">
          </div>
          <input type="hidden" name="_method" value="put">

        
        `
        }
    
}