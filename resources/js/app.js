import 'flowbite';
import { deleteModal } from './modules/deleteModal';
import { modal } from './modules/modal';
import { cekSatpamModal } from './modules/cekSatpamModal';
import { persetujuanPengasuhModal } from './modules/persetujuanPengasuhModal';
import { cekIzinAsatidzModal } from './modules/cekIzinAsatidzModal';

const modalDelete = new deleteModal;
const myModal = new modal;
const modalCekSatpam = new cekSatpamModal;
const modalPersetujuanPengasuh = new persetujuanPengasuhModal;
const modalIzinAsatidz = new cekIzinAsatidzModal

modalDelete.run()
myModal.run()
modalCekSatpam.run()
modalPersetujuanPengasuh.run()
modalIzinAsatidz.run()


    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%',
        });
        $('.js-example-basic-multiple').select2({
            width: '100%',
        });

    });

    document.addEventListener('DOMContentLoaded', () => { 
       initFlowbite();
       $('.js-example-basic-single').select2({
            width: '100%',
        });
        $('.js-example-basic-multiple').select2({
            width: '100%',
        });

    })

    document.addEventListener('livewire:navigated', () => { 
       initFlowbite();
       $('.js-example-basic-single').select2({
            width: '100%',
        });
        $('.js-example-basic-multiple').select2({
            width: '100%',
        });

    })