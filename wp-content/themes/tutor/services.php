<?php 
    // Template Name: Услуги
    get_header() 
?>

<main class="main">
    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item">Услуги</li>
            </ul>
        </div>
    </section>
    <section class="page-title services-page-title">
        <div class="wrap">
            <h1>Услуги репетиторского центра 5 Плюс</h1>
            <p>Выберите предмет, по которому необходимо подтянуть знания  и улучшить текущие оценки:</p>
        </div>
    </section>
    <?php
    $services = get_posts( array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'uslugi',
    ) );
    if ($services) { ?>
        <section class="services">
            <div class="wrap">
                <div class="services__wrap swiper">
                    <ul class="services__list swiper-wrapper">
                        <?php foreach ($services as $service) { setup_postdata($service); ?>
                            <li class="swiper-slide">
                                <div class="service-card">
                                    <a href="<?= get_permalink($service->ID) ?>">
                                        <?php the_field('svg', $service); ?>
                                    </a>
                                    <h3><?= $service->post_title ?></h3>
                                    <p><?php the_field('short-discription', $service); ?></p>
                                    <a class="service-card__link" href="<?= get_permalink($service->ID) ?>">подробнее</a>
                                </div>
                            </li>
                        <?php } wp_reset_postdata(); ?>
                        <li class="swiper-slide service__swiper-slide-last">
                            <div class="service-card__dop">
                                <h3>Пробный урок</h3>
                                <p>Запишитесь на нужный предмет к учителю первой категории с опытом более 20 лет за 400 рублей.</p>
                                <button class="btn-red two trial-btn" data-dop="Пробный урок" data-modal="connection"  type="button">записаться</button>
                            </div>
                        </li>
                        <li class="swiper-slide service__swiper-slide-last">
                            <div class="service-card__dop">
                                <h3>Подготовьтесь к ЕГЭ</h3>
                                <p>Позаботьтесь о подготовке к ЕГЭ в этом учебном году.</p>
                                <button class="btn-red two trial-btn" data-dop="Подготовьтесь к ЕГЭ" data-modal="connection" type="button">записаться <span>на подготовку</span>  </button>
                                <!-- <span>на подготовку</span> -->
                            </div>
                        </li>
                        <li class="swiper-slide service__swiper-slide-last">
                            <div class="service-card__dop">
                                <h3>Забронируйте репетитора</h3>
                                <p>Заранее выберите репетитора на 2022-2023 учебный  год.</p>
                                <button class="btn-red two trial-btn" data-dop="Забронируйте репетитора" data-modal="connection" type="button">забронировать</button>
                            </div>
                        </li>
                    </ul>
                    <div class="services__box">
                        <div class="service-card__dop">
                            <h3>Пробный урок</h3>
                            <p>Запишитесь на нужный предмет к учителю первой категории с опытом более 20 лет за 400 рублей.</p>
                            <button class="btn-red two trial-btn" data-dop="Пробный урок" data-modal="connection"  type="button">записаться</button>
                        </div>
                        <div class="service-card__dop">
                            <h3>Подготовьтесь к ЕГЭ</h3>
                            <p>Позаботьтесь о подготовке к ЕГЭ в этом учебном году.</p>
                            <button class="btn-red two trial-btn" data-dop="Подготовьтесь к ЕГЭ" data-modal="connection" type="button">записаться <span>на подготовку</span>  </button>
                        </div>
                        <div class="service-card__dop">
                            <h3>Забронируйте репетитора</h3>
                            <p>Заранее выберите репетитора на 2022-2023 учебный  год.</p>
                            <button class="btn-red two trial-btn" data-dop="Забронируйте репетитора" data-modal="connection" type="button">забронировать</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<!--    --><?php
//    $services = get_posts( array(
//        'numberposts' => -1,
//        'category'    => 0,
//        'orderby'     => 'date',
//        'order'       => 'ASC',
//        'post_type'   => 'uslugi',
//    ) );
//    if ($services) { ?>
<!--        <section class="services">-->
<!--            <div class="wrap">-->
<!--                <div class="services__wrap">-->
<!--                    <ul class="services__list"> -->
<!--                        --><?php //foreach ($services as $service) { setup_postdata($service); ?>
<!--                            <li>-->
<!--                                <div class="service-card">-->
<!--                                    --><?php //the_field('svg', $service); ?>
<!--                                    <h3>--><?//= $service->post_title ?><!--</h3>-->
<!--                                    <p>--><?php //the_field('short-discription', $service); ?><!--</p>-->
<!--                                    <a href="--><?//= get_permalink($service->ID) ?><!--">подробнее</a>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        --><?php //} wp_reset_postdata(); ?>
<!--                    </ul>-->
<!--                    <div class="services__box">-->
<!--                        <div class="service-card__dop">-->
<!--                            <h3>Пробный урок</h3>-->
<!--                            <p>Запишитесь на нужный предмет к учителю первой категории с опытом более 20 лет за 400 рублей.</p>-->
<!--                            <button class="btn-red two" type="button">записаться</button>-->
<!--                        </div>-->
<!--                        <div class="service-card__dop">-->
<!--                            <h3>Подготовьтесь к ЕГЭ</h3>-->
<!--                            <p>Позаботьтесь о подготовке к ЕГЭ в этом учебном году.</p>-->
<!--                            <button class="btn-red two" type="button">записаться <span>на подготовку</span> </button>-->
<!--                        </div>-->
<!--                        <div class="service-card__dop">-->
<!--                            <h3>Забронируйте репетитора</h3>-->
<!--                            <p>Заранее выберите репетитора на 2022-2023 учебный  год.</p>-->
<!--                            <button class="btn-red two" type="button">записаться</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
<!--    --><?php //} ?>
    <?php get_template_part('templates/review') ?>
    <section class="record record-services">
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