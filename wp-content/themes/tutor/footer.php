<footer class="footer">
    <div class="footer__limitation">
        <div class="footer__wrap">
            <?php if (is_front_page(  )) { ?>
                <a class="footer__logo">
                    <img src="<?= ASSETS ?>/images/footer/logo.svg">
                </a>
			<?php } else { ?>
                <a class="footer__logo" href="<?= get_permalink(6) ?>">
                    <img src="<?= ASSETS ?>/images/footer/logo.svg">
                </a>
			<?php } ?>

            <div class="footer__container">
                <div class="footer__nav">
                    <div class="footer__nav-service">
                        <div class="footer__nav-service-controls">
                            <button class="footer__btn-service" type="button">Услуги</button>
                            <span></span>                                    
                        </div>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'service',
                            'container' => null
                        )); ?>
                        <script>
                            let btnService = document.querySelector('.footer__nav-service-controls')
                            btnService.addEventListener('click', function() {
                                btnService.classList.toggle('active')
                            })
                        </script>
                    </div>
                    <div class="footer__nav-page">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'container' => null
                        )); ?>
                        <div class="footer__nav-info">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'info',
                                'container' => null
                            )); ?>
                            <div class="footer__info-payment">
                                <p>Приём оплаты:</p>
                                <ul>
                                    <li><img src="<?= ASSETS ?>/images/footer/peyment1.svg"></li>
                                    <li><img src="<?= ASSETS ?>/images/footer/peyment2.svg"></li>
                                    <li><img src="<?= ASSETS ?>/images/footer/peyment3.svg"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__contact">
                    <?php if(get_option('phone')) { ?>
                        <a class="footer__contact-tel" href="tel:<?php echo get_option('phone'); ?>"><?php echo get_option('phone'); ?></a>
                    <?php } ?>
                    <?php if(get_option('email')) { ?>
                        <a class="footer__contact-mail" href="mailto:<?php echo get_option('email'); ?>"><?php echo get_option('email'); ?></a>
                    <?php } ?>
                    <?php if(get_option('adress')) { ?>
                        <p class="footer__contact-adres"><?php echo get_option('adress'); ?></p>
                    <?php } ?>
                    <?php if(get_option('time-work')) { ?>
                        <ul class="footer__contact-list">
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
                    <?php get_template_part('templates/social') ?>
                </div>
            </div>
            <div class="footer__confendeciality">
                © 2009-2022 Репетиторский центр «5 Плюс». Репетиторы по всем предметам в Кирове. Все права защищены.
                Не является публичной офертой. <a class="politics" href="<?= get_permalink(3) ?>" target="_blank"> Политика конфиденциальности. </a>
                <a class="offer" href="<?= get_permalink(337) ?>" target="_blank">Договор оферты. </a>
                ИП Сапегин Станислав Евгеньевич, ИНН 431702433470 / ОГРНИП 322435000012420
                <br><br>
                Образовательная лицензия №123456789. <a href="<?= get_permalink(335) ?>" target="_blank">Подробнее </a>
            </div>
        </div>
    </div>
</footer>

<div class="modal" data-modal-type="connection" hidden>
    <div class="modal__content">
        <div class="modal-connection">
            <div class="record__box">
                <div class="record__content">
                    <h2 class="record__header">Запишитесь на пробное занятие за 400 ₽</h2>
                    <p class="record__text">Мы свяжемся с вами в ближайшее время и подтвердим запись</p>
                </div>
                <form class="form record__form" method="POST">
                    <div class="record__input-box">
                        <input class="dop-connection" class="input-castom" type="text" name="dop" hidden >
                        <input class="input-castom" type="text" name="name" placeholder="Ваше имя*" required aria-invalid="true">
                        <input class="input-castom" type="tel" name="tel" placeholder="Номер телефона*" required aria-invalid="true">
                        <input class="input-castom" type="email" name="e-mail" placeholder="Ваш e-mail">
                    </div>
                    <textarea class="record__textarea input-castom" name="coment" placeholder="Текст сообщения"></textarea>
                    <button class="record__btn btn-red two" type="submit">записаться</button>
                    <div class="record__cheked-confederacy cheked-confederacy">
                        <input type="checkbox" name="connection-record" id="connection-record" hidden checked required>
                        <label for="connection-record">Отправляя заявку, я соглашаюсь с <a href="<?= get_permalink(3) ?>" target="_blank">политикой обработки персональных данных.</a> </label>
                    </div>
                </form>
                <button class="modal-connection__close modal__close" type="button">

                </button>
            </div>
        </div>        
    </div>
</div>

<div class="modal" data-modal-type="consultation" hidden>
    <div class="modal__content">
        <div class="modal-box">
            <div class="modal-box__container">
                <h2 class="modal-box__header">Получите быструю консультацию менеджера</h2>
                <p class="modal-box__subtitle">Оставьте контакты, мы свяжемся с вами в ближайшее время</p>
                <form class="modal-box__form form" method="post">
                    <ul class="modal-box__list">
                        <input class="dop-consultation" class="input-castom" type="text" name="dop" hidden>
                        <li><input class="input-castom" type="text" name="name" placeholder="Ваше имя*" required></li>
                        <li><input class="input-castom" type="tel" name="tel" placeholder="Номер телефона*" required></li>
                    </ul>
                    <button class="modal-box__btn btn-red two" type="submit">Получить консультацию</button>
                    <div class="modal-box__cheked-confederacy cheked-confederacy">
                        <input type="checkbox" name="consultation-consultation" id="consultation-consultation" hidden checked required>
                        <label for="consultation-consultation">Отправляя заявку, я соглашаюсь с <a href="<?= get_permalink(3) ?>" target="_blank">политикой обработки персональных данных.</a> </label>
                    </div>
                </form>
                <button class="modal-connection__close modal__close" type="button"></button>
            </div>
        </div>
    </div>
</div>

<div class="modal" data-modal-type="season" hidden>
    <div class="modal__content">
        <div class="modal-box">
            <div class="modal-box__container">
                <h2 class="modal-box__header">Хотите приобрести <br> абонемент?</h2>
                <p class="modal-box__subtitle">Оставьте контакты, мы расскажем как оформить покупку.</p>
                <form class="modal-box__form form" method="post">
                    <ul class="modal-box__list">
                        <input class="dop-season" type="text" name="dop" hidden>
                        <li><input class="input-castom" type="text" name="name" placeholder="Ваше имя*" required></li>
                        <li><input class="input-castom" type="tel" name="tel" placeholder="Номер телефона*" required></li>
                    </ul>
                    <button class="modal-box__btn btn-red two" type="submit">Получить консультацию</button>
                    <div class="modal-box__cheked-confederacy cheked-confederacy">
                        <input type="checkbox" name="season" id="season" hidden checked required>
                        <label for="season">Отправляя заявку, я соглашаюсь с <a href="<?= get_permalink(3) ?>" target="_blank">политикой обработки персональных данных.</a> </label>
                    </div>
                </form>
                <button class="modal-connection__close modal__close" type="button"></button>
            </div>
        </div>
    </div>
</div>

<div class="thans">
    <div class="thans__box">
        <h2>Ваша заявка отправлена!</h2>
        <p>Мы свяжемся с вами в ближайшее время и подтвердим запись.</p>
        <button class="thans__close thans__close-btn"></button>
    </div>
    <div class="thans__close-wrap thans__close-btn">

    </div>
</div>

<?= get_option('footer_code') ?>
<? wp_footer() ?>
</body>
</html>