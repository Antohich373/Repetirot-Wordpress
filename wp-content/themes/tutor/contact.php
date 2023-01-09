<?php 
    // Template Name: Контакты    
    get_header() 
?>

<main class="main">
    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item">Контакты</li>
            </ul>
        </div>
    </section>
    <section class="page-title">
        <div class="wrap">
            <h2>Контакты</h2>
        </div>
    </section>
    <section class="contacts contact">
        <div class="contacts__wrap">
            <div class="contacts__map" id="contacts__map">
            </div>
            <div class="wrap">
                <div class="contacts__box">
                    <?php if(get_option('adress')) { ?>
                        <p class="contacts__adress"><?php echo get_option('adress'); ?></p>
                    <?php } ?>
                    <?php if(get_option('time-work')) { ?>
                        <ul class="contacts__list">
                            <li>
                                <p>
                                    Режим работы: <br>
                                    <?php echo get_option('time-work'); ?>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <?php echo get_option('time-work-two'); ?>
                                </p>
                            </li>
                        </ul>
                    <?php } ?>
                    <?php if(get_option('phone')) { ?>
                        <a class="contacts__tel" href="tel:<?php echo get_option('phone'); ?>"><?php echo get_option('phone'); ?></a>
                    <?php } ?>
                    <?php if(get_option('email')) { ?>
                        <a class="contacts__mail" href="mailto:<?php echo get_option('email'); ?>"><?php echo get_option('email'); ?></a>
                    <?php } ?>
                    <?php get_template_part('templates/social') ?>
                    <div class="contacts__controls">
                        <button class="contacts__call btn-red two" data-modal="consultation" type="button">позвонить</button>
                        <a class="contacts__link btn-transparent" href="https://yandex.ru/maps/?rtext=~58.598888,49.682036" target="_blank">ПОСТРОИТЬ МАРШРУТ</a>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){   
            var $elements = $('.contacts');
            let counters = 0;
            $(window).scroll(function() {
                var scroll = $(window).scrollTop() + $(window).height();
                var offset = $elements.offset().top
                if (scroll > offset && counters == 0) {
                    counters = 1;
                    let script = document.createElement('script');
                    script.src = 'https://api-maps.yandex.ru/2.1/?apikey=5606c582-dee1-495f-9bb5-c7bef86d0bdd&lang=ru_RU';
                    let body = document.getElementsByTagName('body');
                    body[0].appendChild(script);
                    script.onload = function() {
                        ymaps.ready(function () {
                            var myMap = new ymaps.Map('contacts__map', {
                                    center: [58.598846, 49.680419],
                                    zoom: 16
                                }, {
                                    searchControlProvider: 'yandex#search'
                                }),

                                MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                                    '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                                );
                            myPlacemark = new ymaps.Placemark([58.598888, 49.682036],  {
                                hintContent: 'г. Киров, ул. Ленина, 92'
                            }, {
                                iconLayout: 'default#image',
                                iconImageHref: '<?= ASSETS ?>/images/Location.svg',
                                iconImageSize: [32, 32],
                                iconImageOffset: [-16, -32]
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
    </script>

    <section class="location">
        <div class="wrap">
            <h2 class="section-title">Как нас найти?</h2>
            <div class="location__wrap">
                <div class="location__swiper swiper">
                    <div class="location__swiper-wrapper swiper-wrapper" data-lightbox-parent>
                        <?php $requisites = get_field('requisites-images', 'option'); ?>
                        <?php if($requisites) { ?>
                            <?php foreach($requisites as $requisite) { ?>
                                <div class="location__swiper-slide swiper-slide">
                                    <img src='<?= $requisite['image'] ?>' data-lightbox="<img src='<?= $requisite['image'] ?>'>"> 
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="location__juridical">
                    <h3>Реквизиты компании</h3>
                    <div class="location__juridical-box">
                        <div>
                            <?= get_field('requisites-1', 'option'); ?>
                        </div>
                        <div>
                            <?= get_field('requisites-2', 'option'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="record record-gallery">
        <div class="wrap">
            <div class="record__wrap">
                <div class="record__box">
                    <div class="record__content">
                        <h2 class="record__header">Напишите нам</h2>
                        <p class="record__text">Отправьте нам сообщение, мы ответим вам в ближайшее время</p>
                    </div>
                    <form class="form record__form" method="POST">
                        <div class="record__input-box">
                            <input class="input-castom" type="text" name="name" placeholder="Ваше имя*" required>
                            <input class="input-castom" type="tel" name="tel" placeholder="Номер телефона*" required>
                            <input class="input-castom" type="email" name="e-mail" placeholder="Ваш e-mail">
                        </div>
                        <textarea class="record__textarea input-castom" name="coment" placeholder="Текст сообщения"></textarea>
                        <button class="record__btn btn-red two" type="submit">Отправить</button>
                        <div class="record__cheked-confederacy cheked-confederacy">
                            <input type="checkbox" name="confederacy-record" id="confederacy-record" hidden checked required>
                            <label for="confederacy-record">Отправляя заявку, я соглашаюсь с <a href="<?= get_permalink(3) ?>" target="_blank">политикой обработки персональных данных.</a> </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 
</main>

<?php get_footer() ?>
