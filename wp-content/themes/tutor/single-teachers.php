<?php 
    get_header() 
?>

<main class="main">

    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item"><a href="<?= get_permalink(16) ?>">Репетиторы</a></li>
                <li class="bread-crumbs__item"><?php the_title() ?></li>
            </ul>
        </div>
    </section>

    <section class="preview preview-services service-tuter">
        <div class="preview__container">
            <div class="preview__content">
                <h1 class="preview__header preview__header-teacher">
                    <?=get_field('page-header')?>
                </h1>
                <?php $lists = get_field('page-list'); ?>
                <?php if($lists) { ?>
                    <ul class="preview__list">
                        <?php foreach($lists as $list) { ?>
                            <li><?= $list['text'] ?> </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <div class="preview__controls">
                    <button class="preview__btn-record btn-red trial-btn" data-modal="connection" data-dop="Репетитор: <?php the_title() ?>"  type="button">Записаться на пробный урок</button>
                    <button class="preview__btn-consultation btn-transparent consultation-btn" data-modal="consultation" data-dop="Репетитор: <?php the_title() ?>"  type="button">Получить консультацию</button>  
                </div>
            </div>
            <?php if(get_field('page-img')) { ?>
                <div class="preview__img">
                    <img class="preview__decor" src="<?= ASSETS ?>/images/services/decor2.svg"/>
                    <img class="preview__page-img" src="<?= get_field('page-img') ?>"/>
                </div>
            <?php } ?>
            <div class="preview__controls-mobile">
                <button class="preview__btn-record btn-red trial-btn" data-modal="connection" data-dop="Репетитор: <?php the_title() ?>" type="button">Записаться на пробный урок</button>
                <button class="preview__btn-consultation btn-transparent consultation-btn" data-modal="consultation" data-dop="Репетитор: <?php the_title() ?>" data-modal="consultation"  type="button">Получить консультацию</button>                                          
            </div>
        </div>
    </section>

    <?php $detailes = get_field('detailed-list', $teacher); ?>
    <?php if($detailes) { ?>
        <section class="features-numbers features-teachers">
            <div class="wrap">
                <h2 class="section-title">Подробнее о репетиторе</h2>
                <div class="features-numbers__wrap">
                    <ul class="features-numbers__list">
                        <?php foreach($detailes as $detaile) { ?>
                            <li>
                                <p> <?= $detaile['header'] ?></p>
                                <span><?= $detaile['subtitle'] ?></span>
                                <?php $discriptions = $detaile['discription'] ?>
                                <?php if($discriptions) { ?>
                                    <ul>
                                        <?php foreach($discriptions as $discription) { ?>
                                            <li><?= $discription['text'] ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php if(get_field('text', $teacher)) { ?>
                    <?php
                    $blogtime = current_time('mysql');
                    list( $year, $month, $day, $hour, $minute, $second ) = preg_split( '([^0-9])', $blogtime );
                    ?>
                    <div class="features-numbers__text">
                        Информация актуальна на сегодня
                        <span><?= $day; ?>
                            <?php if($month == 1)  { ?>
                                января
                            <?php } else if($month == 2) { ?>
                                февраля
                            <?php } else if($month == 3) { ?>
                                марта
                            <?php } else if($month == 4) { ?>
                                апреля
                            <?php } else if($month == 5) { ?>
                                мая
                            <?php } else if($month == 6) { ?>
                                июня
                            <?php } else if($month == 7) { ?>
                                июля
                            <?php } else if($month == 8) { ?>
                                августа
                            <?php } else if($month == 9) { ?>
                                сентября
                            <?php } else if($month == 10) { ?>
                                октября
                            <?php } else if($month == 11) { ?>
                                ноября
                            <?php } else if($month == 12) { ?>
                                декабря
                            <?php } ?>
                            </span>
                        <?= $year; ?> года
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>


    <?php $imgs = get_field('list-img', $teacher); ?>
    <?php if($imgs) { ?>
        <section class="teacher">
            <div class="wrap">
                <h2 class="section-title">Дипломы и сертификаты репетитора</h2>
                <p class="teacher__subtitle">Посмотрите дипломы, сертификаты и награды репетитора по математике Нины Анатольевны</p>
                <div class="teacher__wrap">
                    <div class="teacher__swiper swiper" data-lightbox-parent>
                        <div class="teacher__swiper-wrapper swiper-wrapper" >
                            <?php foreach($imgs as $img) { ?>
                                <div class="teacher__swiper-slide swiper-slide">
                                    <img src="<?= $img['img'] ?>" data-lightbox='<img src="<?= $img['img'] ?>" >' >  
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


    <?php $classes = get_field('classes-list', 'option'); ?>
    <?php if($classes) { ?>
        <section class="cost-classes">
            <div class="wrap">
                <?php if(get_field('cost-classes-header')) { ?>
                    <h2 class="cost-classes__header section-title"> <?= the_field('cost-classes-header') ?> </h2> 
                <?php } else { ?>
                    <h2 class="cost-classes__header section-title"> Стоймость занятий  </h2> 
                <?php } ?>
                <p class="cost-classes__subtitle">В нашем центре выстроена система тарифов. Выберите наиболее удобный для вашего школьника.</p>
                <div class="cost-classes__wrap">
                    <div class="cost-classes__swiper swiper">
                        <div class="cost-classes__swiper-wrapper swiper-wrapper">
                            <?php foreach($classes as $classe) { ?>
                                <?php if($classe['classes-optimal']) { ?>
                                    <div class="cost-classes__swiper-slide swiper-slide">
                                        <div class="cost-classes__card optimal">
                                            <h3 class="cost-classes__card-header"> <span><?= $classe['classes-number'] ?></span>  индивидуальных занятий </h3>
                                            <p class="cost-classes__card-subtitle"><?= $classe['classes-subtitle'] ?></p>
                                            <span class="cost-classes__card-price"><?= $classe['classes-price'] ?></span>
                                            <button  data-name="<?= $classe['classes-number'] ?> индивидуальных занятий " class="cost-classes__card-btn btn-red two season-btn" data-modal="season" type="button">купить абонемент</button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="cost-classes__swiper-slide swiper-slide">
                                        <div class="cost-classes__card">
                                            <h3 class="cost-classes__card-header"> <span><?= $classe['classes-number'] ?></span>  индивидуальных занятий </h3>
                                            <p class="cost-classes__card-subtitle"><?= $classe['classes-subtitle'] ?></p>
                                            <span class="cost-classes__card-price"><?= $classe['classes-price'] ?></span>
                                            <button data-name="<?= $classe['classes-number'] ?> индивидуальных занятий " class="cost-classes__card-btn btn-red two season-btn" data-modal="season" type="button">купить абонемент</button>
                                        </div>
                                    </div>
                                <?php } ?>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="record record-teacher">
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
    <?php if(get_field('teachers-img-1') && get_field('teachers-img-2') && get_field('teachers-img-3') && get_field('teachers-img-4')) { ?>
    <section class="photos-classes photos-classes-teachers">
        <div class="wrap">
            <h2 class="photos-classes__header section-title"><?= the_field('header-teachers'); ?></h2>
            <div class="photos-classes__wrap">
                <ul class="photos-classes__list">
                    <li class="photos-classes__item">
                        <?php if(get_field('teachers-img-1')) { ?>
                            <img src="<?= the_field('teachers-img-1'); ?>">
                        <?php } ?>
                    </li>
                    <li class="photos-classes__item">
                        <?php if(get_field('teachers-img-2')) { ?>
                            <img src="<?= the_field('teachers-img-2'); ?>">
                        <?php } ?>
                    </li>
                    <li class="photos-classes__item">
                        <?php if(get_field('teachers-img-3')) { ?>
                            <img src="<?= the_field('teachers-img-3'); ?>">
                        <?php } ?>
                    </li>
                    <li class="photos-classes__item">
                        <?php if(get_field('teachers-img-4')) { ?>
                            <img src="<?= the_field('teachers-img-4'); ?>">
                        <?php } ?>
                        <div class="photos-classes__text">
                            <h3>Занятия проводятся только индивидуально, школьника ничего не отвлекает.</h3>
                            <button class="photos-classes__btn btn-red two trial-btn" data-modal="connection" data-dop="Репетитор: <?php the_title() ?>" type="button">ЗАПИСАТЬСЯ НА ПРОБНЫЙ УРОК</button>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </section>
    <?php } ?>

    <?php
    $reviews = get_posts( array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'reviews',
    ) ); ?>

    <?php $reviewLists = get_field('review-list');
    if ($reviewLists) { ?>
        <section class="review">
            <div class="wrap">
                <div class="review__wrap">
                    <div class="review__box">
                        <h3 class="review__title"><?= the_field('review-header') ?></h3>
                        <ul class="review__list">
                            <?php $num = 0; ?>
                            <?php foreach ($reviewLists as $reviewList) { ?> 
                            <?php $review = get_post($reviewList); ?>
                                <?php ++$num ?>
                                <?php if($num <= 4) { ?>
                                    <li class="review__item">
                                        <div class="review-card">
                                            <h3 class="review-card__name"><?= $review->post_title ?> </h3>
                                            <p class="review-card__text"><?php the_field('discription', $review); ?></p>
                                            <div class="review-card__box">
                                                <?php if(get_field('img', $review)) { ?>
                                                    <button class="review-card__btn" type="button"data-lightbox="<div class='img-review'><img src='<?php the_field('img', $review); ?>'></div>" >Оригинал отзыва</button>
                                                <?php } ?>
                                                <span class="review-card__data"><?= get_the_date() ?></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                        <a class="review__link" href="<?= get_permalink(24) ?>">ВСЕ отзывы <span> (<?= count($reviews) ?>) </span> </span></a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php get_template_part('templates/contacts') ?>
</main>


<?php get_footer() ?>