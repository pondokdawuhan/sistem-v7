export class deleteModal {
    constructor() {
        this.title = document.querySelector('#titleDeleteModal')
        this.toggle = document.querySelectorAll('.toggleDeleteModal')
        this.form = document.querySelector('#formDeleteModal')
    }

        run() {
        
            this.toggle.forEach(button => {
                button.addEventListener('click', (e) => {
                    this.title.innerHTML = e.target.dataset.title
                    this.form.setAttribute('action', '/' + e.target.dataset.url + '/' + e.target.dataset.id)
                })
        });
    }
}