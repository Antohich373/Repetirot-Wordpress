<?php 
    // Template Name: Главная
    get_header() 
?>

<main class="main">
    <section class="preview preview-page">
        <div class="preview__container">
            <div class="preview__content">
                <?php if(get_field('page-header', 'option')) { ?>
                    <h1 class="preview__header"><?= get_field('page-header', 'option'); ?></h1>
                <?php } ?>
                <?php $pageFeatures = get_field('page-features', 'option'); ?>
                <?php if($pageFeatures) { ?>
                    <ul class="preview__list">
                        <?php foreach ($pageFeatures as $pageFeature) { ?> 
                            <li><?= $pageFeature['text']; ?></li>
                        <?php } ?> 
                    </ul>
                <?php } ?>
                <div class="preview__controls">
                    <button class="preview__btn-record btn-red" data-modal="connection"  type="button">Записаться на пробный урок</button>
                    <button class="preview__btn-consultation btn-transparent" data-modal="consultation" type="button">Получить консультацию</button>                    
                </div>
            </div>
            <div class="preview__img">
                <img class="preview__decor" src="<?= ASSETS ?>/images/services/decor.svg"/>
                <img class="preview__page-img" src="<?= ASSETS ?>/images/services/tuter.png"/>
            </div>
            <div class="preview__controls-mobile">
                <button class="preview__btn-record btn-red" data-modal="connection" type="button">Записаться на пробный урок</button>
                <button class="preview__btn-consultation btn-transparent" data-modal="consultation"  type="button">Получить консультацию</button>                    
            </div>
        </div>
    </section>

    <section class="section-video">
        <div class="wrap">
            <div class="section-video__wrpa">
                <div class="section-video__content">
                    <h2 class="section-title"><?= get_field('about-video-title', 'option'); ?></h2>
                    <p><?= get_field('about-video-text', 'option'); ?></p>
                </div>
                <div class="section-video__box" data-lightbox-parent>
                    <img src="<?= get_field('about-video-img', 'option'); ?>">
                    <?if (get_field('about-video-youtobe', 'option')) { ?>
                        <button type="button"  data-lightbox='<?= get_field('about-video-youtobe', 'option'); ?>'>
                            <span class="pulse-one"></span>
                            <span class="pulse-two"></span>
                        </button>
                    <?php } elseif(get_field('about-video-location', 'option')) { ?>
                        <button type="button" data-lightbox='<video src="<?= get_field('about-video-location', 'option'); ?>" controls autoplay></video>'>
                            <span class="pulse-one"></span>
                            <span class="pulse-two"></span>
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php $chips = get_field('chips-list', 'option'); ?>
    <?if ($chips) { ?>
        <section class="features-numbers">
            <div class="wrap">
                <h2 class="section-title">О нас в цифрах</h2>
                <div class="features-numbers__wrap">
                    <ul class="features-numbers__list">
                        <?php foreach ($chips as $chip) { ?>
                            <li>
                                <p> <?= $chip['header'] ?></p>
                                <span><?= $chip['discription'] ?></span>
                            </li>
                        <?php } ?> 
                    </ul>
                </div>
                <?php if( get_field('chips-discription', 'option') )  { ?>
                    <div class="features-numbers__text">
                        <?= get_field('chips-discription', 'option'); ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

    <?php
    $services = get_posts( array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'uslugi',
    ) );
    if ($services) { ?>
        <section class="service">
            <div class="wrap">
                <h2 class="service__header section-title">Предметы, по которым мы  подтянем ваши знания</h2>
                <p class="service__subtitle">Выберите необходимый вам предмет или услугу:</p>
                <div class="service__wrpa">
                    <div class="service__swiper swiper">
                        <div class="service__swiper-wrapper swiper-wrapper">
                            <?php foreach ($services as $service) { setup_postdata($service); ?>
                                <div class="service__swiper-slide swiper-slide">
                                    <div class="service-card">
                                        <a href="<?= get_permalink($service->ID) ?>">
                                            <?php the_field('svg', $service); ?>
                                        </a>
                                        <h3><?= $service->post_title ?></h3>
                                        <p><?php the_field('short-discription', $service); ?></p>
                                        <a class="service-card__link" href="<?= get_permalink($service->ID) ?>">подробнее</a>
                                    </div>
                                </div>
                            <?php } wp_reset_postdata(); ?>
                            <div class="service__swiper-slide swiper-slide service__swiper-slide-last">
                                <div class="service-card__dop">
                                    <h3>Пробный урок</h3>
                                    <p>Запишитесь на нужный предмет к учителю первой категории с опытом более 20 лет за 400 рублей.</p>
                                    <button class="btn-red two trial-btn" data-dop="Пробный урок" data-modal="connection"  type="button">записаться</button>
                                </div>
                            </div>
                            <div class="service__swiper-slide swiper-slide service__swiper-slide-last">
                                <div class="service-card__dop">
                                    <h3>Подготовьтесь к ЕГЭ</h3>
                                    <p>Позаботьтесь о подготовке к ЕГЭ в этом учебном году.</p>
                                    <button class="btn-red two trial-btn" data-dop="Подготовьтесь к ЕГЭ" data-modal="connection" type="button">записаться <span>на подготовку</span>  </button>
                                    <!-- <span>на подготовку</span> -->
                                </div>
                            </div>
                            <div class="service__swiper-slide swiper-slide service__swiper-slide-last">
                                <div class="service-card__dop">
                                    <h3>Забронируйте репетитора</h3>
                                    <p>Заранее выберите репетитора на 2022-2023 учебный  год.</p>
                                    <button class="btn-red two trial-btn" data-dop="Забронируйте репетитора" data-modal="connection" type="button">забронировать</button>
                                </div>
                            </div>
                        </div>
                    </div>

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
                            <!-- <span>на подготовку</span> -->
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

    <section class="record">
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


    <?php
    $teachers = get_posts( array(
        'numberposts' => 5,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'teachers',
    ) );
    if ($teachers) { ?>
        <section class="tutor">
            <div class="wrap">
                <div class="tutor__header-box">
                    <div class="tutor__box">
                        <h2 class="tutor__header section-title">Репетиторы центра 5 Плюс</h2>
                        <p class="tutor__subtitle">Выберите преподавателя по необходимому предмету и запишитесь на занятие</p>
                    </div>
                    <div class="tutor__controls controls-slide">
                        <button class="tutor__button-prev btn-slide" type="button"></button>
                        <div class="tutor__pagination  pagination"></div>
                        <button class="tutor__button-next btn-slide next" type="button"></button>
                    </div>    
                </div>
                <div class="tutor__wrap">
                    <div class="tutor__swiper swiper">
                        <div class="tutor__swiper-wrapper swiper-wrapper">
                            <?php foreach ($teachers as $teacher) { setup_postdata($teacher); ?>
                                <div class="tutor__swiper-slide swiper-slide">
                                    <div class="tutor-card">
                                        <div class="tutor-card__box">
                                            <div class="tutor-card__box-content">
                                                <p class="tutor-card__content-object"><?php the_field('status', $teacher); ?></p>
                                                <a href="<?= get_permalink($teacher->ID) ?>" class="tutor-card__box-img-mobile">
                                                    <img src="<?php the_field('img', $teacher); ?>">
                                                </a>
                                                <h3 class="tutor-card__content-name"><?= $teacher->post_title ?></h3>
                                                <a class="tutor-card__link-mobile" href="<?= get_permalink($teacher->ID) ?>">подробнее</a>
                                                <?php $detailes = get_field('detailed-list', $teacher); ?>
                                                <?php if($detailes) { ?>
                                                    <ul class="tutor-card__list-info">
                                                        <?php foreach($detailes as $detaile) { ?>
                                                            <li>
                                                                <button class="tutor-card__info-btn " type="button" data-toggler><?= $detaile['header'] ?> </button>
                                                                <?php $discriptions = $detaile['discription'] ?>
                                                                <?php if($discriptions) { ?>
                                                                    <ul class="tutor-card__info">
                                                                        <?php foreach($discriptions as $discription) { ?>
                                                                            <li><?= $discription['text'] ?> </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                <?php } ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                            <a href="<?= get_permalink($teacher->ID) ?>" class="tutor-card__box-img">
                                                <img src="<?php the_field('img', $teacher); ?>">
                                            </a>
                                            <div class="tutor-card__controls">
                                                <button class="trial-btn" data-modal="connection" data-dop="Репетитор: <?= $teacher->post_title ?>" type="button">ЗАПИСАТЬСЯ</button>
                                                <a href="<?= get_permalink($teacher->ID) ?>">подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <script>
                        const tutor_cards = document.querySelectorAll('.tutor-card')
                        if (tutor_cards.length) tutor_cards.forEach(card => {
                            card.addEventListener('mouseenter', calcTutorPadding)
                            card.addEventListener('mouseleave', calcTutorPadding)
                        })
                        let btnCartTutor = document.querySelectorAll('.tutor-card__info-btn')
                        for(let i = 0; i < btnCartTutor.length; i++) {
                            btnCartTutor[i].addEventListener('click', function () {
                                calcTutorPadding()
                            })
                        }
                        function calcTutorPadding() {
                            setTimeout(function () {
                                let buttonCartTutor = document.querySelector('.tutor-card__info-btn.active')

                                if (buttonCartTutor) {
                                    let parent = buttonCartTutor.closest('li')
                                    let listCartTutor = parent.querySelector('.tutor-card__info')

                                    document.querySelector('.tutor__swiper').style.cssText = 'padding-bottom: calc(145px +  ' + listCartTutor.clientHeight + 'px);';
                                } else {
                                    document.querySelector('.tutor__swiper').style.cssText = 'padding-bottom: 118px;';
                                }
                            }, 100)
                        }
                    </script>
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
    ) );
    if ($reviews) { ?>
        <section class="review index">
            <div class="wrap">
                <div class="review__wrap">
                    <div class="review__box">
                        <h3 class="review__title">Отзывы наших учеников</h3>
                        <ul class="review__list" >
                            <?php $num = 0; ?>
                            <?php foreach($reviews as $review) { ?>
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
                        <a class="review__link" href="<?= get_permalink(24) ?>">ВСЕ отзывы <span>(<?= count($reviews) ?>)</span></a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


    <section class="photos-classes photos-classes-index">
        <div class="wrap">
            <h2 class="photos-classes__header section-title">Как проводятся занятия?</h2>
            <div class="photos-classes__wrap">
                <ul class="photos-classes__list">
                    <li class="photos-classes__item">
                        <?php if(get_field('page-photo-1', 'option')) { ?>
                            <img src="<?= get_field('page-photo-1', 'option'); ?>">
                        <?php } ?>
                    </li>
                    <li class="photos-classes__item photos-classes__item-two-index">
                        <div>
                            <p>Мы стараемся построить работу с детьми так, чтобы стать лучшим другом для своих учеников, понимать их, поддерживать, направлять. Грамотно и правильно выстраиваем общение с учениками. </p>
                            <span>Светлана Владимировна, <br> завуч репетиторского центра 5 Плюс</span>
                        </div>
                    </li>
                    <li class="photos-classes__item">
                        <?php if(get_field('page-photo-2', 'option')) { ?>
                            <img src="<?= get_field('page-photo-2', 'option'); ?>">
                        <?php } ?>
                    </li>
                    <li class="photos-classes__item photos-classes__item-for-index">
                        <?php if(get_field('page-photo-3', 'option')) { ?>
                            <img src="<?= get_field('page-photo-3', 'option'); ?>">
                        <?php } ?>
                        <div class="photos-classes__content">
                            <p>Мы стараемся построить работу с детьми так, чтобы стать лучшим другом для своих учеников, понимать их, поддерживать, направлять. Грамотно и правильно выстраиваем общение с учениками. </p>
                            <span>Светлана Владимировна, <br> завуч репетиторского центра 5 Плюс</span>
                        </div>
                        <div class="photos-classes__text">
                            <h3>Занятия проводятся только индивидуально, школьника ничего не отвлекает.</h3>
                            <button class="photos-classes__btn btn-red two" data-modal="connection" type="button">ЗАПИСАТЬСЯ НА ПРОБНЫЙ УРОК</button>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </section>

    
    <?php $classes = get_field('classes-list', 'option'); ?>
    <?php if($classes) { ?>
        <section class="cost-classes">
            <div class="wrap">
                <h2 class="cost-classes__header section-title">Стоимость занятий</h2>
                <p class="cost-classes__subtitle">В нашем центре выстроена система тарифов. Выберите наиболее удобный для вашего школьника.</p>
                <div class="cost-classes__wrap">
                    <div class="cost-classes__swiper swiper">
                        <div class="cost-classes__swiper-wrapper swiper-wrapper">
                            <?php foreach($classes as $classe) { ?>
                                <?php if($classe['classes-optimal']) { ?>
                                    <div class="cost-classes__swiper-slide swiper-slide">
                                        <div class="cost-classes__card optimal">
                                            <h3 class="cost-classes__card-header"> <span><?= $classe['classes-number'] ?></span>  индивидуальных занятий  </h3>
                                            <p class="cost-classes__card-subtitle"><?= $classe['classes-subtitle'] ?></p>
                                            <span class="cost-classes__card-price"><?= $classe['classes-price'] ?></span>
                                            <button data-name="<?= $classe['classes-number'] ?> индивидуальных занятий "  class="cost-classes__card-btn btn-red two season-btn" data-modal="season" type="button">купить абонемент</button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="cost-classes__swiper-slide swiper-slide">
                                        <div class="cost-classes__card">
                                            <h3 class="cost-classes__card-header"> <span><?= $classe['classes-number'] ?></span> индивидуальных занятий  </h3>
                                            <p class="cost-classes__card-subtitle"><?= $classe['classes-subtitle'] ?></p>
                                            <span class="cost-classes__card-price"><?= $classe['classes-price'] ?></span>
                                            <button  data-name="<?= $classe['classes-number'] ?> индивидуальных занятий " class="cost-classes__card-btn btn-red two season-btn" data-modal="season" type="button">купить абонемент</button>
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

    <section class="record">
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

    <?php if(get_field('about-discription', 'option')) { ?>
        <section class="about" id="about">
            <div class="wrap">
                <div class="about__wrap">
                    <div class="about__content">
                        <div class="about__content-wrap">
                            <?= get_field('about-discription', 'option'); ?>
                        </div>
                    </div>
                    <button class="about__content-btn about-btn" type="button">Читать полностью</button>
                </div>
                <a class="about__btn" href="<?= get_permalink(317) ?>" target="_blank">подробнее о центре</a>
            </div>
        </section>
    <?php } ?>


    <?php $medias = get_field('smi-list', 'option'); ?>
    <?php if($medias) { ?>
        <section class="media">
            <div class="wrap">
                <h2 class="media__header section-title">Мы в СМИ</h2>
                <p class="media__subtitle">Актуальные материалы, опубликованные известными СМИ, о  деятельности нашего репетиторского центра.</p>
                <div class="media__wrap">
                    <ul class="media__list">
                        <?php foreach($medias as $media) { ?>
                            <li class="media__item">
                                <div class="media-card">
                                    <img src="<?= $media['img']; ?>">
                                    <?php if($media['link']) { ?>
                                        <noindex>
                                            <a href="<?= $media['link']; ?>" target="_blank" rel="nofollow"><?= $media['text-link']; ?></a>
                                        </noindex>
                                    <?php } else { ?>
                                        <a  target="_blank"><?= $media['text-link']; ?></a>
                                    <?php } ?>
                                 </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php get_template_part('templates/contacts') ?>
</main>

<?php get_footer() ?>