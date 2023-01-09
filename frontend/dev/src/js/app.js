import Modal from './classes/Modal.js'
import Select from './classes/Select.js'
import Lightbox from './classes/Lightbox.js'
import Mask from './classes/Mask.js'
// import Slider from './classes/Slider.js'
import Hover3D from './classes/Hover3D.js'
import Inputer from './classes/Inputer.js'
import './classes/Toggler.js'
import './classes/Alert.js'

import MiniMasonry from "minimasonry";
import Swiper, {
    Navigation,
    Pagination,
    Thumbs
} from 'swiper';
Swiper.use([Navigation, Pagination, Thumbs]);

document.addEventListener('DOMContentLoaded', function() {

    let form = document.querySelectorAll('.form')
    for(let i = 0; i < form.length; i++) {
        form[i].addEventListener('submit', function(evt) {
            evt.preventDefault();
            let data = new FormData(this)
            data.append('action', 'send_form2')
            fetch(ajax, {
                method: 'POST',
                body: data
            })
                .then(response => response.json())
                .then((json) => {
                    form[i].reset();
                    let close = document.querySelectorAll('.modal__close');
                    for(let i = 0; i < close.length; i++) {
                        close[i].click();
                    }
                    document.querySelector('.thans').classList.add('active')
                })
                .catch(err => console.log(err));
        })
    }

    //Закрыть модельное окно после отправки сообщения 
    if(document.querySelector('.thans__close-btn')) {
        let closeThan = document.querySelectorAll('.thans__close-btn')
        for(let i = 0; i < closeThan.length; i++) {
            closeThan[i].addEventListener('click', function() {
                document.querySelector('.thans').classList.remove('active')
            })        
        }        
    }

    let fixedHeader = document.querySelector('.header__fixed-wrap')
    window.addEventListener('scroll', function () {
        if (pageYOffset > 100) {
            let height = fixedHeader.clientHeight;
            document.querySelector('.main').style.cssText = "padding-top:" + height + "px;"
            fixedHeader.classList.add('active');
        } else {
            document.querySelector('.main').style.cssText = "padding-top: 0px;"
            fixedHeader.classList.remove('active');
        }
    });

    // ПРОБНЫЙ УРОК дада атрибут
    let btnTrail = document.querySelectorAll('.trial-btn')
    for(let i = 0; i < btnTrail.length; i++) {
        btnTrail[i].addEventListener('click', function() {
            document.querySelector('.dop-connection').value = btnTrail[i].dataset.dop
        })
    }

    // КОНСУЛЬТАЦИЯ дада атрибут
    let btnСonsultation = document.querySelectorAll('.consultation-btn')
    for(let i = 0; i < btnСonsultation.length; i++) {
        btnСonsultation[i].addEventListener('click', function() {
            document.querySelector('.dop-consultation').value = btnСonsultation[i].dataset.dop
        })
    }

    let seasonBtn = document.querySelectorAll('.season-btn')
    for(let i = 0; i < seasonBtn.length; i++) {
        seasonBtn[i].addEventListener('click', function() {
            document.querySelector('.dop-season').value = seasonBtn[i].dataset.name
        })
    }

    //Расскрывать seo text
    if(document.querySelector('.about__content')) {

        let seoText = document.querySelector('.about__content')
        let seoTextWrap = document.querySelector('.about__content-wrap')
        let btnAbout = document.querySelectorAll('.about-btn')
        if(window.screen.width >= 1024) {
            if(seoTextWrap.clientHeight > 730) {
                for(let i = 0; i < btnAbout.length; i++) {
                    btnAbout[i].style.cssText = 'display: block;'
                }
            }
        }
        if(window.screen.width <= 1024) {
            if(seoTextWrap.clientHeight > 390) {
                for(let i = 0; i < btnAbout.length; i++) {
                    btnAbout[i].style.cssText = 'display: block;'
                }
            }
        }


        if(seoTextWrap.clientHeight > 390) {
            for(let i = 0; i < btnAbout.length; i++) {
                btnAbout[i].addEventListener('click', function() {

                    seoText.classList.toggle('active')
                    btnAbout[i].innerHTML = (btnAbout[i].innerHTML === 'Скрыть') ? btnAbout[i].innerHTML = 'Читать полностью' : btnAbout[i].innerHTML = 'Скрыть';
                })
            }
        }
    }



    

    // if(document.querySelector('.review__list')) {
    //     let wifthW = window.screen.width
    //     if(wifthW >= 768 && wifthW <= 1199) {
    //         var masonry = new MiniMasonry({
    //             container: '.review__list',
    //             gutterX: 20,
    //             gutterY: 45,
    //             baseWidth: 242,
    //             surroundingGutter: false,
    //         });
    //     } else if(wifthW >= 1200) {
    //         var masonry = new MiniMasonry({
    //             container: '.review__list',
    //             gutterX: 40,
    //             gutterY: 75,
    //             baseWidth: 430,
    //             surroundingGutter: false,
    //         });
    //     }
    //
    // }

    if (document.querySelector('.service__swiper')) {
        //СЛАЙДЕР услуг на главной 
        const service = new Swiper('.service__swiper', {
            slidesPerView: 1.3,
            spaceBetween: 20,
            allowTouchMove: true,
            autoHeight: false,
            calculateHeight:true,
            loop: false,
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 32,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                1199: {
                    slidesPerView: 0,
                    spaceBetween: 0,
                    allowTouchMove: false,
                    loop: false,
                },
            },
        });
    }

    if (document.querySelector('.teacher__swiper')) {
        //СЛАЙДЕР на странице учителя 
        const teacher = new Swiper('.teacher__swiper', {
            slidesPerView: 1.3,
            spaceBetween: 20,
            allowTouchMove: true,
            autoHeight: false,
            calculateHeight:true,
            loop: false,
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 24,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                1199: {
                    slidesPerView: 0,
                    spaceBetween: 0,
                    allowTouchMove: false,
                },
            },
        });
    }



    if (document.querySelector('.services__wrap')) {
        const services = new Swiper('.services__wrap', {
            slidesPerView: 1.3,
            spaceBetween: 20,
            allowTouchMove: true,
            autoHeight: false,
            calculateHeight: true,
            loop: false,
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 24,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                1199: {
                    slidesPerView: 0,
                    spaceBetween: 0,
                    allowTouchMove: false,
                    autoHeight: false,
                    calculateHeight:false,
                    loop: false,
                },
            },
        });
    }

    if (document.querySelector('.teachers__wrap')) {
        //СЛАЙДЕР на странице учителя
        const teachers = new Swiper('.teachers__wrap', {
            slidesPerView: 1.3,
            spaceBetween: 20,
            allowTouchMove: true,
            autoHeight: false,
            calculateHeight:true,
            loop: false,
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 24,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                1199: {
                    slidesPerView: 0,
                    spaceBetween: 0,
                    allowTouchMove: false,
                },
            },
        });
    }


    if (document.querySelector('.cost-classes__swiper')) {
        //СЛАЙДЕР Стоимость занятий
        const classes = new Swiper('.cost-classes__swiper', {
            slidesPerView: 1.3,
            spaceBetween: 20,
            allowTouchMove: true,
            autoHeight: false,
            calculateHeight:true,
            loop: false,
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 12,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                1199: {
                    slidesPerView: 0,
                    spaceBetween: 0,
                    allowTouchMove: false,
                    loop: false,
                },
            },
        });
    }

    if (document.querySelector('.tutor__swiper')) {
        //СЛАЙДЕР учетелй на главной
        const tutor = new Swiper('.tutor__swiper', {
            slidesPerView: 1.3,
            spaceBetween: 20,
            allowTouchMove: true,
            autoHeight: true,
            calculateHeight:true,
            loop: false,
            pagination: {
                el: '.tutor__pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.tutor__button-next',
                prevEl: '.tutor__button-prev',
            },            
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 20,
                },
                1199: {
                    slidesPerView: 1.7,
                    spaceBetween: 24,
                },
            },
        });
    }


    if (document.querySelector('.recommendations__swiper')) {
        //СЛАЙДЕР учетелй на главной
        const recommendations = new Swiper('.recommendations__swiper', {
            slidesPerView: 1.5,
            spaceBetween: 15,
            allowTouchMove: true,
            autoHeight: false,
            calculateHeight:true,
            loop: false,         
            breakpoints: {
                500: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 2.9,
                    spaceBetween: 12,
                },
                1250: {
                    slidesPerView: 2,
                    spaceBetween: 24,
                },
            },
        });
    }

    if (document.querySelector('.location__swiper')) {
        //СЛАЙДЕР на странице контактов 
        const location = new Swiper('.location__swiper', {
            slidesPerView: 1.3,
            spaceBetween: 20,
            allowTouchMove: true,
            autoHeight: false,
            calculateHeight:true,
            loop: false,
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 24,
                    loop: false,
                },
                1199: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    loop: false,
                },
            },
        });
    }

    if (document.querySelector('.guarantees__swiper')) {
        //СЛАЙДЕР гарантии
        const guarantees = new Swiper('.guarantees__swiper', {
            slidesPerView: 1.2,
            spaceBetween: 10,
            allowTouchMove: true,
            autoHeight: true,
            calculateHeight:false,
            loop: false,
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 24,
                    autoHeight: true,
                    loop: false,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 37,
                    autoHeight: true,
                    loop: false,
                },
            },
        });
    }
    
    if (document.querySelector('.portfolio__swiper')) {
        //СЛАЙДЕ портфолио
        const portfolio = new Swiper('.portfolio__swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,   
            pagination: {
                el: '.portfolio__pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.portfolio__button-next',
                prevEl: '.portfolio__button-prev',
            },   
        });
    }


    if (document.querySelector('.teaching__swiper')) {
        //СЛАЙДЕР учетеля на странице услуги
        const teaching = new Swiper('.teaching__swiper', {
            slidesPerView: 1.4,
            spaceBetween: 20,
            allowTouchMove: true,
            autoHeight: false,
            calculateHeight:true,
            loop: false,
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                768: {
                    slidesPerView: 2.7,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
                1199: {
                    slidesPerView: 0,
                    spaceBetween: 0,
                    allowTouchMove: false,
                },
            },
        });
    }

    if (document.querySelector('.other-items__swiper')) {
        //СЛАЙДЕ услуг на странице услуги
        const portfolio = new Swiper('.other-items__swiper', {
            slidesPerView: 1.3,
            spaceBetween: 20,
            loop: true,   
            pagination: {
                el: '.other-items__pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.other-items__button-next',
                prevEl: '.other-items__button-prev',
            },   
            breakpoints: {
                500: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                },
                768: {
                    slidesPerView: 2    ,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                },
                1199: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 24,
                    allowTouchMove: true,
                    autoHeight: true,
                    calculateHeight:true,
                    loop: false,
                },
            },
        });
    }
})