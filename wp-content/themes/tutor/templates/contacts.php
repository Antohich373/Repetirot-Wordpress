<section class="contacts">
        <h2 class="section-title wrap">Как нас найти?</h2>
        <div class="contacts__wrap">
            <div class="contacts__map" id="contacts__map">

            </div>
            <div class="wrap">
                <div class="contacts__box">
                    <?php if(get_option('adress')) { ?>
                        <p class="contacts__adress"><?php echo get_option('adress'); ?></p>                        
                    <?php } ?>
                    <?php if(get_option('phone')) { ?>
                        <a class="contacts__tel" href="tel:<?php echo get_option('phone'); ?>"><?php echo get_option('phone'); ?></a>
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
                    <div class="contacts__controls">
                        <a class="contacts__call btn-red two" href="tel:<?php echo get_option('phone'); ?>" >позвонить</a>
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