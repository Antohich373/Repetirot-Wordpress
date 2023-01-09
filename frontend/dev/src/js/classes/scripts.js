// СКРИПТ СВАЙПЕРА КЛАССИКА
if (document.querySelector('.group__swiper')) {
    const groups = new Swiper('.group__swiper', {
        slidesPerView: 2,
        spaceBetween: 16,
        loop: true,
        pagination: {
            el: '.group__swiper-pagination',
        },
        navigation: {
            nextEl: '.group__button-next',
            prevEl: '.group__button-prev',
        },
        breakpoints: {
            400: {
                slidesPerView: 2,
                spaceBetween: 16,
            }
        },
    });
}



//СКРИПТ СВАЙПЕРА С ПРЕВЬЮ
if(document.querySelector('.gallery__swiper-group')) {
    let galleryThumbsSwiper = new Swiper(".gallery__swiper-group-thumbs", {
        spaceBetween: 6,
        slidesPerView: 5,
        loop: false,
        breakpoints: {
            768: {
                slidesPerView: 6,
                spaceBetween: 20,
            },
        },
    });
    let galleryPageSwiper = new Swiper(".gallery__swiper-group", {
        spaceBetween: 10,
        loop: true,
        navigation: {
        nextEl: ".gallery__group-next",
        prevEl: ".gallery__group-prev",
        },
        thumbs: {
            swiper: galleryThumbsSwiper,
        },
    });   
}

//ОТПРАВИТЬ ЗАЯВКУ С РАДИО КНОПКАМИ И ФАЙЛОМ
if(document.querySelector('.application__form')) {
    document.querySelector('.application__form').addEventListener('submit', function(evt) {
        evt.preventDefault();
        var data = new FormData()
        data.append('action', 'send_forms')
        data.append('name', this.querySelector('[name=name]').value)
        data.append('tel', this.querySelector('[name=tel]').value)
        data.append('email', this.querySelector('[name=email]').value)
        data.append('name-company', this.querySelector('[name=name-company]').value)
        data.append('comment', this.querySelector('[name=comment]').value)
        data.append('file', this.querySelector('[name=file]').files[0])
        data.append('service-1', Array.from(this.querySelectorAll('[name=service-1]:checked')).map((elem, item) => elem.value + ', ').join(''))
        var url = ajax
        fetch(url, {
            method: 'post',
            body: data
        })
        .then(response => response.json())
        .then((json) => {
            if (json.id === 101) {

            }else {
                document.location.href="http://lera.vyatka-it.ru/uspeshnaya-otpravka/#";
            }
        })
        .catch(err => console.log(err));
    })        
}

//ОБЫЧНАЯ ФОРМА ОТПРАВКИ
if(document.querySelector('.consultation__form')) {
    document.querySelector('.consultation__form').addEventListener('submit', function(evt) {
        evt.preventDefault();
        var data = new FormData(this)
        data.append('action', 'send_form2')
        var url = ajax
        fetch(url, {
            method: 'post',
            body: data
        })
        .then(response => response.json())
        .then((json) => {
        if (json.id === 101) {

        }else {
            document.querySelector('.successfull-sending').classList.add('active');
            document.querySelector('.modal-shove').classList.add('active')
            let input = document.querySelectorAll('.consultation__input')
            for (var i = 0;  i < input.length; i++) {
                input[i].value = '';
            };
        }
        
        })
        .catch(err => console.log(err));
    })        
}


//СДЕЛАТЬ ЧТО ТО ЧЕРЕЗ КАКОЕ ТО ВРЕМЯ 
setTimeout(function () {
    document.querySelector('.preloder').classList.add('opacity')
}, 1000)


//КЛШИК ВНЕ ЭЛЕМЕНТА
document.onclick = function(e){
    if ( event.target.className != 'header__open-tel' ) {
        document.querySelector('.header__tel-box').classList.remove('active')
    };
};

//ИНФОРМАЦИЯ С ДАТА АТРИБУТОВ
let itemCity = document.querySelectorAll('.city-network__city-item')
for(let i = 0; i < itemCity.length; i++) {
	itemCity[i].addEventListener('click', function() {
		let target = event.target;
		let plet = target.dataset.networkcity
		document.querySelector('.header__desctop-nav__info__city__button').innerHTML = plet
		document.querySelector('.select__input').value = plet
	})
}

//ПОКАЗЫВАЕМ ЧТО ТО ПРИ СКРОЛЛЕ ВНИЗ
document.addEventListener('DOMContentLoaded', function () {
let btn = document.querySelector('#toTop');
  window.addEventListener('scroll', function () {
      // Если прокрутили дальше 599px, показываем кнопку
      if (pageYOffset > 100) {
          btn.classList.add('show');
          // Иначе прячем
      } else {
          btn.classList.remove('show');
      }
  });
  // При клике прокручиываем на самый верх
  btn.onclick = function (click) {
      click.preventDefault();
      scrollTo(0, 400);
  }
});

//УДАЛЯЕМ КЛАСС У ВСЕХ И ДОБАВЛЯЕМ НА КОТОРЫЙ КЛИКНУЛИ
let parent = document.querySelector('.container');
let menuItem = parent.querySelectorAll('.menu__item');

parent.addEventListener('click', (event) => {
let target = event.target;
if(target.classList.contains('menu__item')) {
  for(let i = 0; i < menuItem.length; i++) {
    menuItem[i].classList.remove('active');
  }
     target.classList.add('active');
  }     
}); 


//ПОДКЛЮЧЕНИЕ JQ, СКРИП КОТОРЫЙ ОПРЕДЕЛЯЕТ ДО КАКОГО ЭЛЕМЕНТА ДОЙТИ И СДЕЛАТЬ ЧТО ТО + ЯНДЕКС КАРТА 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
$(document).ready(function(){   
    var $element = $('.new'); 
    let counter = 0;
    $(window).scroll(function() {
    var scroll = $(window).scrollTop() + $(window).height();
    var offset = $element.offset().top
        if (scroll > offset && counter == 0) {
            counter = 1;
            let script = document.createElement('script');
            script.src = 'https://api-maps.yandex.ru/2.1/?apikey=0df52a18-a88e-4253-a254-a4a2454863d7&lang=ru_RU';
            let body = document.getElementsByTagName('body');
            body[0].appendChild(script);
            script.onload = function() {

                ymaps.ready(function () {
                    var myMap = new ymaps.Map('map', {
                        center: [58.534270, 49.973351],
                        zoom: 17
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),
                    MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                        '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                    );
                    myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                        hintContent: 'г. Кирово-Чепецк ул. Производственная 6'
                    }, {
                        iconLayout: 'default#image',
                        iconImageHref: '<?= ASSETS ?>/images/Location.svg',
                        iconImageSize: [58, 58],
                        iconImageOffset: [-29, -58]
                    });
                    myMap.geoObjects.add(myPlacemark);
                    myMap.behaviors.disable('scrollZoom')
                    myMap.events.add('click', function(){
                    myMap.behaviors.enable('scrollZoom')
                    })
                });               
            }
        }
    });
});


// ПЕРЕКЛЮЧЕНИЕ БЛОКОВ ПО КНОПКЕ НАЗАД ВПЕРЕД
{/* <div class="slider">
    <div class="item">
        <img src="img/slide1.jpg" alt="Первый слайд">
        <div class="slideText">Заголовок слайда 1</div>
    </div>

    <div class="item">
        <img src="img/slide2.jpg" alt="Второй слайд">
        <div class="slideText">Заголовок слайда 2</div>
    </div>

    <div class="item">
        <img src="img/slide3.jpg" alt="Третий слайд">
        <div class="slideText">Заголовок слайда 3</div>
    </div>

    <a class="prev" onclick="minusSlide()">&#10094;</a>
    <a class="next" onclick="plusSlide()">&#10095;</a>
</div> */}

// <div class="slider-dots">
//     <span class="slider-dots_item" onclick="currentSlide(1)"></span> 
//     <span class="slider-dots_item" onclick="currentSlide(2)"></span> 
//     <span class="slider-dots_item" onclick="currentSlide(3)"></span> 
// </div>
// Индекс слайда по умолчанию
var slideIndex = 1;
showSlides(slideIndex);
// Функция увеличивает индекс на 1, показывает следующй слайд
function plusSlide() {
    showSlides(slideIndex += 1);
}
// Функция уменьшяет индекс на 1, показывает предыдущий слайд
function minusSlide() {
    showSlides(slideIndex -= 1);  
}
// Устанавливает текущий слайд 
function currentSlide(n) {
    showSlides(slideIndex = n);
}
// Основная функция слайдера
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("item");
    var dots = document.getElementsByClassName("slider-dots_item");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

//НАЗВАНИЕ ПРИКРЕПЛЕНОГО ФАЙЛА В ФОРМЕ
document.querySelector('.application__input-file').addEventListener('change', function() {
    document.querySelector('.chang').innerHTML = document.getElementById('file').files[0].name
  })

//СКРЫТЬ ОТКРЫТЬ
const btn = document.querySelector('.btn > span');
btn.addEventListener('click', function() {
  btn.innerHTML =
    (btn.innerHTML === 'Показать всё') ? btn.innerHTML = 'Скрыть всё' : btn.innerHTML = 'Показать всё';
})


//ЗАКРЫТЬ КАКОЕ ЛИБО ВСПЛЫВАЮЩЕЕ ОКНО ПО ПУСТОМУ ПРОСТРАНСТВУ 
window.addEventListener('click', function(e) {
    if ( e.target.classList.contains('production-card__btns' )) { 

    } else {
        for(let j = 0; j < menuItem.length; j++) {
            menuItem[j].classList.remove('active')
            console.log('yes')
        }
    }
})

//ИЩЕМ В НАВИГАЦИИ UL ВНУТРИ LI и ставим class a 
let navDesctop = document.querySelector('.header__nav')
let navDesctopItem = navDesctop.querySelectorAll('li')

for(let i = 0; i < navDesctopItem.length; i++) {
    if(navDesctopItem[i].querySelector('.sub-menu')) {
        navDesctopItem[i].querySelector('a').classList.add('header__nav-link-desctop')
    }
}
