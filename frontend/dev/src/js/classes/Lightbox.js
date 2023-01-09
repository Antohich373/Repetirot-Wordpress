import Controls from "./Controls.js"

export default class Lightbox extends Controls {
    constructor(lightbox) {
        super(lightbox)

        this.lightbox = lightbox
        this.lightbox_content = this.lightbox.querySelector('.lightbox__content')

        // Открывашки
        this.open_handler = this.open.bind(this)

        document.body.addEventListener('click', (e) => {
            if (e.target.dataset.lightbox) {
                this.open_handler(e)
            }
        })

        // Закрытие
        this.close_handler = this.close.bind(this)
        this.lightbox.addEventListener('click', this.close_handler)

        // Каруслель
        this.carousel = []
        this.carousel_index = 0
     
        this.prev_handler = this.prev.bind(this)
        this.prev_button = this.lightbox.querySelector('.lightbox__arrow--prev')
        this.prev_button.addEventListener('click', this.prev_handler)

        this.next_handler = this.next.bind(this)
        this.next_button = this.lightbox.querySelector('.lightbox__arrow--next')
        this.next_button.addEventListener('click', this.next_handler)
    }

    open(e) {
        const parent = e.target.closest('[data-lightbox-parent]')

        this.hideArrow()

        if (parent) {
            let slides = parent.querySelectorAll('[data-lightbox]')
         
            if (slides.length > 1) {
                slides.forEach((slide, index) => {
                    this.carousel.push(slide.dataset.lightbox)

                    if (slide == e.target) {
                        this.carousel_index = index
                    }
                });

                this.lightbox_content.innerHTML = this.carousel[this.carousel_index]

                this.showArrow()
            } else {
                const html = e.target.dataset.lightbox
                this.lightbox_content.innerHTML = html
            }
        } else {
            const html = e.target.dataset.lightbox
            this.lightbox_content.innerHTML = html
        }

        this.lightbox.hidden = false
    }

    hideArrow() {
        this.prev_button.hidden = true
        this.next_button.hidden = true
    }

    showArrow() {
        this.prev_button.hidden = false
        this.next_button.hidden = false
    }

    prev() {
        this.carousel_index--

        if (this.carousel_index < 0) {
            this.carousel_index = this.carousel.length - 1
        }

        this.lightbox_content.innerHTML = this.carousel[this.carousel_index]
    }

    next() {
        this.carousel_index++

        if (this.carousel_index > this.carousel.length - 1) {
            this.carousel_index = 0
        }

        this.lightbox_content.innerHTML = this.carousel[this.carousel_index]
    }

    close(e) {
        if (e.target.classList.contains('lightbox')||
            e.target.classList.contains('lightbox__content')||
            e.target.classList.contains('lightbox__wrapper') ) {

            this.lightbox.hidden = true
            this.lightbox_content.innerHTML = ''
            this.carousel = []
        }
    }

    static create() {
        const lightbox = document.createElement('div')
        lightbox.className = 'lightbox'
        lightbox.hidden = true

        const lightbox_wrapper = document.createElement('div')
        lightbox_wrapper.className = 'lightbox__wrapper'
          
        const lightbox_content = document.createElement('div')
        lightbox_content.className = 'lightbox__content'
            
        const lightbox_prev = document.createElement('button')
        lightbox_prev.className = 'lightbox__arrow lightbox__arrow--prev'

        const lightbox_next = document.createElement('button')
        lightbox_next.className = 'lightbox__arrow lightbox__arrow--next'
     
        lightbox_wrapper.append(lightbox_prev)
        lightbox_wrapper.append(lightbox_next)
        lightbox_wrapper.append(lightbox_content)

        lightbox.append(lightbox_wrapper)

        document.body.append(lightbox)

        Lightbox.init()
    }
    
    static init() {
        const lightbox = document.querySelector('.lightbox')

        new Lightbox(lightbox)
    }
}

Lightbox.create()