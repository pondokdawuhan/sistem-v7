import { gantiPassword } from "../modals/gantiPassword"
import { hafalanMadin } from "../modals/hafalanMadin"
import { importFile } from "../modals/import"
import { kelas } from "../modals/kelas"
import { kembali } from "../modals/kembali"
import { modalKamar } from "../modals/modalKamar"
import { modalLembaga } from "../modals/modalLembaga"
import { perbaikanPresensi } from "../modals/perbaikanPresensi"
import { perbaikanPresensiSholat } from "../modals/perbaikanPresensiSholat"
import {satu} from "../modals/satu"
import { suciHaid } from "../modals/suciHaid"
import { tambahHaid } from "../modals/tambahHaid"

export class modal {
    constructor() {
        this.toggleModal = document.querySelectorAll('.toggleMyModal')
        this.formModal = document.querySelector('#formMyModal')
        this.title = document.querySelector('#titleMyModal')
    }



    run() {
        this.toggleModal.forEach(button => {
            button.addEventListener('click', (e) => {                
                this.ubahAtribut({data: e.target.dataset.data, url: e.target.dataset.url, title: e.target.dataset.title})
                switch (e.target.dataset.modal) {
                    case 'modalLembaga':
                        modalLembaga({data: e.target.dataset.data})
                      break;
                    
                    case 'kelas':
                      kelas({data: e.target.dataset.data, kelas: e.target.dataset.kelas})
                      break; 
                    case 'satu':
                        satu({data: e.target.dataset.data})
                        break;
                    case 'import':
                        importFile();
                        break;
                    case 'kembali':
                        kembali();
                        break;
                    case 'tambahJadwal':
                        break;
                    case 'tambahHaid':
                        tambahHaid({santri: e.target.dataset.santri, data:e.target.dataset.data});
                        break;
                    case 'suciHaid':
                        suciHaid();
                        break;
                    case 'perbaikanPresensi':
                        perbaikanPresensi({data: e.target.dataset.data, lembaga:e.target.dataset.lembaga, untuk:e.target.dataset.for});
                        break;
                    case 'perbaikanPresensiSholat':
                        perbaikanPresensiSholat({data: e.target.dataset.data, untuk:e.target.dataset.for});
                        break;
                    case 'hafalanMadin':
                        hafalanMadin({data: e.target.dataset.data, santriId: e.target.dataset.santriId, santriName: e.target.dataset.santriName})
                        break;
                    case 'modalKamar':
                        modalKamar({data: e.target.dataset.data});
                        break;
                    case 'gantiPassword':
                        gantiPassword();
                    default:
                        break;
                }
            })})
    }

    ubahAtribut({data, url, title}) {
        let d = JSON.parse(data)
        
        if (d) {
            this.formModal.setAttribute('action', '/' + url + '/' + d.id)
        } else {
            this.formModal.setAttribute('action', '/' + url )
        }
        this.title.innerHTML = title;
    }
}