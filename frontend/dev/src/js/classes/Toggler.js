let togglers = []

class Toggler {
    constructor(toggler) {
        this.toggler_button = toggler

        // this.toggler_button = this.toggler.querySelector('[data-toggler]')
        if (this.toggler_button) this.toggler_button.addEventListener('click', this.open.bind(this))
    }

    open(e) {
        if (!e.target.classList.contains('active')) {
            this.closeAll()

            this.toggler_button.classList.add('active')
        } else {
            this.closeAll()
        }``
    }

    close(toggler) {
        toggler.toggler_button.classList.remove('active')
    }
    
    closeAll() {
        togglers.forEach(toggler => toggler.close(toggler))
    }

    static init() {
        const togglers_ = document.querySelectorAll('[data-toggler]')

        if (togglers_.length) {
            togglers_.forEach(toggler => togglers.push(new Toggler(toggler)))
        }
    }
}

Toggler.init()