export function perbaikanPresensiSholat({data, untuk}){
    let d = JSON.parse(data);
    const bodyModal = document.querySelector('#bodyMyModal')

        bodyModal.innerHTML = ``
        if(untuk == 'santri'){
        bodyModal.innerHTML = 
        `
        <input type="hidden" name="_method" value="put">
        
        <div>
        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" value="${d.santri.name}" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white w-full" readonly>

        </div>

        <div>
        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
        
        <select name="keterangan" id="keterangan"
                                                    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white w-full">
                                                    <option value="S">
                                                        SAKIT</option>
                                                    <option value="I">
                                                        IZIN</option>
                                                    <option value="A">ALPHA</option>
                                                    <option value="ISTIHADLOH">ISTIHADLOH</option>
                                                    <option value="HAID">HAID</option>
                                                </select>

        <input type="hidden" name="_method" value="put">
        </div>
        
        `
        } else {
          bodyModal.innerHTML = 
        `
        <input type="hidden" name="_method" value="put">
        
        <div>
        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" value="${d.user.name}" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white w-full" readonly>

        </div>

        <div>
        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
        
        <select name="keterangan" id="keterangan"
                                                    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white w-full">
                                                    <option value="S">
                                                        SAKIT</option>
                                                    <option value="I">
                                                        IZIN</option>
                                                    <option value="A">ALPHA</option>
                                                    <option value="ISTIHADLOH">ISTIHADLOH</option>
                                                    <option value="HAID">HAID</option>
                                                </select>

        <input type="hidden" name="_method" value="put">
        </div>
        
        `
        }
    
}