import Splide from '@splidejs/splide'

export default class Slider {
    constructor(selector, options) {
        this.parrent = document.querySelector(selector)

        if (this.parrent) {
            // Arrows
            this.prev_arrow = this.parrent.querySelector('.slider-arrow--prev')
            if (this.prev_arrow) this.prev_arrow.addEventListener('click', () => this.slide("-"))

            this.next_arrow = this.parrent.querySelector('.slider-arrow--next')
            if (this.next_arrow) this.next_arrow.addEventListener('click', () => this.slide("+"))

            this.slider = document.querySelector('.splide')
            this.slides = this.slider.querySelectorAll('.splide__slide')

            this.slider = new Splide(this.parrent, options).mount();

            // Dotted
            this.dotted()
        }
    }

    async dotted() {
        if (this.parrent.querySelectorAll('.dotted').length) {
            if (this.slides.length > 1) {
                for (let i = 0; i < this.slides.length; i++) {
                    let li = document.createElement('li')
                    li.dataset.index = i

                    if (i == 0) {
                        li.className = 'active'
                    }

                    li.addEventListener('click', () => {
                        const need_index = parseInt(li.dataset.index)
                      
                        this.slide(need_index)
                       
                        this.parrent.querySelector('.dotted .active').classList.remove('active')
                        this.parrent.querySelectorAll('.dotted ul li')[need_index].classList.add('active')
                    })

                    await this.parrent.querySelector('.dotted ul').append(li)
                }


                this.slider.on('moved', (index) => {
                    this.parrent.querySelectorAll('.dotted .active').forEach(item => item.classList.remove('active'))
                    this.parrent.querySelectorAll('.dotted ul li')[index].classList.add('active')
                })
            }
        }
    }

    slide(need_slide) {
        this.slider.go(need_slide)
    }

    refresh() {
        this.slider.refresh()
    }

    static init() {
        new Slider('.slider', {
            type: 'loop',
            arrows: false,
            pagination: false,
            autoplay: true,
            interval: 5000,
            perPage: 3,
            perMove: 1,
            gap: '15px',
            // autoWidth: true,
            breakpoints: {
                640: {
                    perPage: 2,
                    gap: '7px'
                },
                
            }
        })
    }
}

Slider.init()