export class cekIzinAsatidzModal {
    constructor() {
        this.title = document.querySelector('#titleIzinAsatidz')
        this.toggle = document.querySelectorAll('.toggleIzinAsatidz')
        this.form = document.querySelector('#formIzinAsatidz')
        this.setujui = document.querySelector('#setujui')
    }

        run() {
            this.toggle.forEach(button => {
                button.addEventListener('click', (e) => {
                    let d = JSON.parse(e.target.dataset.data)
                    this.title.innerHTML = e.target.dataset.title
                    this.form.setAttribute('action', '/' + e.target.dataset.url + '/' + d.id)
                })
        });
    }
}