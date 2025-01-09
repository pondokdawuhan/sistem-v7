export class cekSatpamModal {
    constructor() {
        this.title = document.querySelector('#titleCekSatpamModal')
        this.toggle = document.querySelectorAll('.toggleCekSatpamModal')
        this.form = document.querySelector('#formCekSatpamModal')
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