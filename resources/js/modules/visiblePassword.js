
export class VisiblePassword {

    constructor() {
    this.eye = document.querySelector('#eye');
    this.password = document.querySelector('#password');
    

    }

    onClick(cb) {
        this.eye.addEventListener("click", cb)
    }

    run() {
        if (password.getAttribute('type') == 'password') {
            password.setAttribute('type', 'text');
            eye.classList.remove('fa-eye');
            eye.classList.add('fa-eye-slash');
        } else {
            password.setAttribute('type', 'password');
            eye.classList.remove('fa-eye-slash');
            eye.classList.add('fa-eye');
        }
    }
}
    
    