export default class Controls {
    constructor(elem) {
        window.addEventListener('keyup', e => {
            switch (e.key) {
                case 'Escape':
                    this.close()
                    break
                case 'ArrowLeft':
                    this.prev()
                    break
                case 'ArrowRight':
                    this.next()
                    break
            }
        })

        window.addEventListener('wheel', e => {
            if (e.deltaY > 0) {
                this.next()
            } else {
                this.prev()
            }
        })
    }
    
    close() {
   
    }

    prev() {
   
    }

    next() {
   
    }
}