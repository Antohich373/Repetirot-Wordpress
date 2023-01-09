<?php
// Template Name: Портфолио
get_header()
?>

<main class="main">
    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item"><?php the_title() ?></li>
            </ul>
        </div>
    </section>
    <section class="page-title portfolios-title">
        <div class="wrap">
            <h2><?php the_title() ?></h2>
        </div>
    </section>
    <section class="portfolios">
        <div class="wrap">
            <div class="portfolio__box">
                <h2 class="portfolio__header section-title">Портфолио</h2>
                <div class="portfolio__controls controls-slide">
                    <button class="portfolio__button-prev btn-slide" type="button"></button>
                    <div class="portfolio__pagination  pagination"></div>
                    <button class="portfolio__button-next btn-slide next" type="button"></button>
                </div>
            </div>
            <div class="portfolios__wrap">
                <?php
                $portfolios = get_posts( array(
                    'numberposts' => -1,
                    'category'    => 0,
                    'orderby'     => 'date',
                    'order'       => 'ASC',
                    'post_type'   => 'portfolio',
                ) );
                if ($portfolios) { ?>
                    <div class="portfolios__wrap">
                        <ul class="portfolios__list">
                            <?php foreach($portfolios as $portfolio) { ?>
                                <li>
                                    <div class="portfolios__card">
                                        <h3 class="portfolios__card-title"><?= $portfolio->post_title ?></h3>
                                        <div class="portfolios__card-container">
                                            <div class="portfolios__card-img">
                                                <img src="<?php the_field('img', $portfolio); ?>">

                                            </div>
                                            <?php $lists = get_field('lists', $portfolio); ?>
                                            <div class="portfolios__card-content">
                                                <?php if($lists) { ?>
                                                    <ul>
                                                        <?php foreach($lists as $list) { ?>
                                                            <li> <p><?=  $list['header'] ?> </p><span> <?=  $list['discription'] ?> </span> </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="portfolios__card-detailed">
                                            <button class="portfolios__card-detailed-btn" type="button">подробнее</button>

                                        </div>
                                        <div class="portfolios__card-popup">
                                            <div class="portfolios__card-popup-box">
                                                <h3 class="portfolios__card-popup-title"><?= $portfolio->post_title ?></h3>
                                                <div class="portfolios__card-popup-container">
                                                    <div class="portfolios__card-popup-img">
                                                        <img src="<?php the_field('img', $portfolio); ?>">
                                                    </div>
                                                    <div class="portfolios__card-popup-content">
                                                        <?php if($lists) { ?>
                                                            <ul>
                                                                <?php foreach($lists as $list) { ?>
                                                                    <li> <p><?=  $list['header'] ?> </p><span> <?=  $list['discription'] ?> </span> </li>
                                                                <?php } ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <button class="portfolios__card-popup-close" type="button"></button>
                                            </div>
                                            <div class="portfolios__card-popup-wrap-close">

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <script>
                            let btnDetalet = document.querySelectorAll('.portfolios__card-detailed-btn')
                            let boxDetalet = document.querySelectorAll('.portfolios__card-popup')

                            let btnDetaletClose = document.querySelectorAll('.portfolios__card-popup-close')
                            let wrapDetaletClose = document.querySelectorAll('.portfolios__card-popup-wrap-close')
                            for(let i = 0; i < btnDetalet.length; i++) {
                                btnDetalet[i].addEventListener('click', function () {
                                    boxDetalet[i].classList.add('active')
                                })
                                btnDetaletClose[i].addEventListener('click', function () {
                                    boxDetalet[i].classList.remove('active')
                                })
                                wrapDetaletClose[i].addEventListener('click', function () {
                                    boxDetalet[i].classList.remove('active')
                                })
                            }
                        </script>

                        <div class="portfolio__swiper swiper">
                            <div class="portfolio__swiper-wrapper swiper-wrapper">
                                <?php foreach($portfolios as $portfolio) { ?>
                                    <div class="portfolio__swiper-slide swiper-slide">
                                        <div class="portfolio__card">
                                            <div class="portfolio__card-img">
                                                <img src="<?php the_field('img', $portfolio); ?>">

                                            </div>
                                            <?php $lists = get_field('lists', $portfolio); ?>
                                            <div class="portfolio__card-content">
                                                <?php if($lists) { ?>
                                                    <ul>
                                                        <?php foreach($lists as $list) { ?>
                                                            <li> <span><?=  $list['header'] ?> </span><p> <?=  $list['discription'] ?> </p> </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>

                        </div>
                        <button class="portfolio__button-prev portfolio__slide-mobile portfolio__slide-mobile-prev" type="button">
                            <svg width="23" height="42" viewBox="0 0 23 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 1L2 21L22 41" stroke="#EA142E" stroke-width="2"/>
                            </svg>
                        </button>

                        <button class="portfolio__button-next portfolio__slide-mobile portfolio__slide-mobile-next" type="button">
                            <svg width="23" height="42" viewBox="0 0 23 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L21 21L1 41" stroke="#EA142E" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>
    <section class="record portfolios-record">
        <div class="wrap">
            <div class="record__wrap">
                <div class="record__box">
                    <div class="record__content">
                        <h2 class="record__header">Запишитесь на пробное занятие за 400 ₽</h2>
                        <p class="record__text">Мы свяжемся с вами в ближайшее время и подтвердим запись</p>
                    </div>
                    <form class="form record__form" method="POST">
                        <div class="record__input-box">
                            <input class="input-castom" type="text" name="name" placeholder="Ваше имя*" required>
                            <input class="input-castom" type="tel" name="tel" placeholder="Номер телефона*" required>
                            <input class="input-castom" type="email" name="e-mail" placeholder="Ваш e-mail">
                        </div>
                        <textarea class="record__textarea input-castom" name="coment" placeholder="Текст сообщения"></textarea>
                        <button class="record__btn btn-red two" type="submit">записаться</button>
                        <div class="record__cheked-confederacy cheked-confederacy">
                            <input type="checkbox" name="confederacy-record2" id="confederacy-record2" hidden checked required>
                            <label for="confederacy-record2">Отправляя заявку, я соглашаюсь с <a href="<?= get_permalink(3) ?>" target="_blank">политикой обработки персональных данных.</a> </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>
