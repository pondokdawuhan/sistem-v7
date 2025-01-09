export class persetujuanPengasuhModal {
    constructor() {
        this.title = document.querySelector('#titlePersetujuanPengasuhModal')
        this.toggle = document.querySelectorAll('.togglePersetujuanPengasuhModal')
        this.form = document.querySelector('#formPersetujuanPengasuhModal')
        this.setujui = document.querySelector('#setujui')
    }

        run() {
            this.toggle.forEach(button => {
                button.addEventListener('click', (e) => {
                    let d = JSON.parse(e.target.dataset.data)
                    this.title.innerHTML = e.target.dataset.title
                    this.form.setAttribute('action', '/' + e.target.dataset.url + '/' + d.id)
                    this.setujui.value = e.target.dataset.setujui
                })
        });
    }
}