<?php 
    get_header() 
?>
<main class="main">
    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item"><a href="<?= get_permalink(14) ?>">Услуги</a></li>
                <li class="bread-crumbs__item"><?php the_title() ?></li>
            </ul>
        </div>
    </section>
    <section class="preview preview-services service-tuter">
        <div class="preview__container">
            <div class="preview__content">
                <h1 class="preview__header">
                    <?=get_field('page-header')?>
                </h1>
                <?php $lists = get_field('page-list'); ?>
                <?php if($lists) { ?>
                    <ul class="preview__list">
                        <?php foreach($lists as $list) { ?>
                            <li><?= $list['text'] ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <div class="preview__controls">
                    <button class="preview__btn-record btn-red trial-btn" data-modal="connection" data-dop="Услуга: <?php the_title() ?>"  type="button">Записаться на пробный урок</button>
                    <button class="preview__btn-consultation btn-transparent consultation-btn" data-modal="consultation" data-dop="Услуга: <?php the_title() ?>"  type="button">Получить консультацию</button>                    
                </div>
            </div>


            <?php if(get_field('page-img')) { ?>
                <div class="preview__img">
                    <img class="preview__decor" src="<?= ASSETS ?>/images/services/decor2.svg"/>
                    <img class="preview__page-img" src="<?= get_field('page-img') ?>"/>
                </div>
            <?php } ?>

            <div class="preview__controls-mobile">
                <button class="preview__btn-record btn-red trial-btn" data-modal="connection" data-dop="Услуга: <?php the_title() ?>" type="button">Записаться на пробный урок</button>
                <button class="preview__btn-consultation btn-transparent consultation-btn" data-modal="consultation" data-dop="Услуга: <?php the_title() ?>" data-modal="consultation"  type="button">Получить консультацию</button>                       
            </div>
        </div>
    </section>

    <?php if(get_field('img-video-lessons')) { ?>
        <section class="section-video">
            <div class="wrap">
                <div class="section-video__wrpa">
                    <div class="section-video__content">
                        <h2 class="section-title"><?=get_field('header-video-lessons')?></h2>
                        <p><?=get_field('discription-video-lessons')?></p>
                    </div>
                    <div class="section-video__box" data-lightbox-parent>
                        <img src="<?=get_field('img-video-lessons')?>">
                        <?if (get_field('lessons-video-youtobe')) { ?>
                            <button type="button" data-lightbox='<?= get_field('lessons-video-youtobe'); ?>'>
                                <span class="pulse-one"></span>
                                <span class="pulse-two"></span>
                            </button>
                        <?php } elseif(get_field('lessons-video-location')) { ?>
                            <button type="button" data-lightbox='<video src="<?= get_field('lessons-video-location'); ?>" controls autoplay></video>'>
                                <span class="pulse-one"></span>
                                <span class="pulse-two"></span>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="features-numbers features-numbers-service">
        <div class="wrap">
            <h2 class="section-title">Почему выбирают нас?</h2>
            <div class="features-numbers__wrap">
                <ul class="features-numbers__list">
                    <li><p> >12 лет</p><span>опыт работы с учениками с 1 по 11 класс</span></li>
                    <li><p> >4500</p><span>учеников за более чем 12 лет работы</span></li>
                    <li><p> 1-я </p><span>высшая категория у наших учителей</span></li>
                </ul>
            </div>
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
        </div>
    </section>

    <?php $guarantees = get_field('list-guarantees'); ?>
    <?php if($guarantees) { ?>
        <section class="guarantees">
            <div class="wrap">
                <h2 class="guarantees__header section-title">
                    Гарантируем результат
                    <div>
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="19" stroke="#EA142E" stroke-width="2"/>
                            <path d="M19 14.2875V11.75H21.6125V14.2875H19ZM19 30V16.5H21.6125V30H19Z" fill="#EA142E"/>
                        </svg>                        
                        <span>
                            При условии постоянных занятий и выполнении домашних заданий ученика.
                        </span>
                    </div>
                </h2>
                <div class="guarantees__wrap">
                    <div class="guarantees__swiper swiper">
                        <div class="guarantees__swiper-wrapper swiper-wrapper">
                            <?php foreach($guarantees as $guarantee) { ?>
                                <div class="guarantees__swiper-slide swiper-slide">
                                    <div class="guarantees__card">
                                        <h3 class="guarantees__header"><?= $guarantee['header'] ?></h3>
                                        <p class="guarantees__subtitle"><?= $guarantee['discription'] ?></p>
                                        <button class="guarantees__btn btn-red two trial-btn"  data-dop="<?= $guarantee['header'] ?>" data-modal="connection" type="button">записаться</button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    
    <?php $teachersLists = get_field('teachers-list');
    if ($teachersLists) { ?>
        <section class="teaching">
            <div class="wrap">
                <h2 class="teaching__header section-title">Познакомьтесь с нашими учителями</h2>
                <p class="teaching__subtitle">Выберите преподавателя по необходимому предмету и запишитесь на занятие</p>
                <div class="teaching__wrap">
                    <div class="teaching__swiper swiper">
                        <div class="teaching__swiper-wrapper swiper-wrapper">
                            <?php foreach ($teachersLists as $teachersList) { ?> 
                                <?php $test = get_post($teachersList); ?>
                                <div class="teaching__swiper-slide swiper-slide">
                                    <div class="tutor-card">
                                        <div class="tutor-card__box">
                                            <div class="tutor-card__box-content">
                                                <p class="tutor-card__content-object"><?php the_field('status', $test); ?></p>
                                                <a href="<?= get_permalink($teacher->ID) ?>" class="tutor-card__box-img-mobile">
                                                    <img src="<?php the_field('img', $test); ?>">
                                                </a>
                                                <h3 class="tutor-card__content-name"><?= $test->post_title ?></h3>
                                                <a class="tutor-card__link-mobile" href="<?= the_permalink($test->ID) ?>">подробнее</a>
                                                <?php $detailes = get_field('detailed-list', $test); ?>
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
                                                <img src="<?php the_field('img', $test); ?>">
                                            </a>
                                            <div class="tutor-card__controls">
                                                <button class="trial-btn" data-modal="connection" data-dop="Репетитор: <?= $test->post_title ?>" type="button">ЗАПИСАТЬСЯ</button>
                                                <a href="<?= get_permalink($test->ID) ?>">подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
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

                            document.querySelector('.teaching__swiper').style.cssText = 'padding-bottom: calc(20px +  ' + listCartTutor.clientHeight + 'px);';
                        } else {
                            document.querySelector('.teaching__swiper').style.cssText = 'padding-bottom: 20px;';
                        }
                    }, 100)
                }
                // let btnCartTutor = document.querySelectorAll('.tutor-card__info-btn')
                // let listCartTutor = document.querySelectorAll('.tutor-card__info')
                // for(let i = 0; i < btnCartTutor.length; i++) {
                //     btnCartTutor[i].addEventListener('click', function () {
                //         setTimeout(function () {
                //             document.querySelector('.teaching__swiper').style.cssText = 'padding-bottom: calc(20px +  ' + listCartTutor[i].clientHeight + 'px);';
                //         }, 100)
                //     })
                // }
            </script>
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
                        <button class="record__btn btn-red two" type="submit">ЗАПИСАТЬСЯ НА ПРОБНЫЙ УРОК</button>
                        <div class="record__cheked-confederacy cheked-confederacy">
                            <input type="checkbox" name="confederacy-record" id="confederacy-record" hidden checked required>
                            <label for="confederacy-record">Отправляя заявку, я соглашаюсь с <a href="<?= get_permalink(3) ?>" target="_blank">политикой обработки персональных данных.</a> </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php $portfolios =  get_field('portfolio-list')?>

    <?php if(count($portfolios) > 1) { ?>
        <section class="portfolio">
            <div class="wrap">
                <div class="portfolio__box">
                    <h2 class="portfolio__header section-title">Портфолио</h2>   
                    <div class="portfolio__controls controls-slide">
                        <button class="portfolio__button-prev btn-slide" type="button"></button>
                        <div class="portfolio__pagination  pagination"></div>
                        <button class="portfolio__button-next btn-slide next" type="button"></button>
                    </div>       
                </div>
                <div class="portfolio__wrap">
                    <div class="portfolio__swiper swiper">
                        <div class="portfolio__swiper-wrapper swiper-wrapper">
                            <?php foreach ($portfolios as $portfolio) { ?>
                                <?php $info = get_post($portfolio); ?>
                                <div class="portfolio__swiper-slide swiper-slide">
                                    <div class="portfolio__card">
                                        <div class="portfolio__card-img">
                                            <img src="<?php the_field('img', $info); ?>">
                                        </div>
                                        <div class="portfolio__card-content">
                                            <?php $lists = get_field('lists', $info); ?>
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
                        <h3 class="review__title">Отзывы  учеников по математике</h3>
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
                        <a class="review__link" href="<?= get_permalink(24) ?>">ВСЕ отзывы <span> (<?= count($reviews) ?>) </span> </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if(get_field('service-img-1') || get_field('service-img-2') || get_field('service-img-3') || get_field('service-img-4')) { ?>
        <section class="photos-classes">
            <div class="wrap">
                <h2 class="photos-classes__header section-title">Фотографии с занятий</h2>
                <div class="photos-classes__wrap">
                    <ul class="photos-classes__list">

                        <?php if(get_field('service-img-1')) { ?>
                            <li class="photos-classes__item">
                                <img src="<?= get_field('service-img-1'); ?>">
                            </li>
                        <?php }?>

                        <?php if(get_field('service-img-2')) { ?>
                            <li class="photos-classes__item">
                                <img src="<?= get_field('service-img-2'); ?>">
                            </li>
                        <?php }?>

                        <?php if(get_field('service-img-3')) { ?>
                            <li class="photos-classes__item ">
                                <img src="<?= get_field('service-img-3'); ?>">
                            </li>
                        <?php }?>

                        <?php if(get_field('service-img-4')) { ?>
                            <li class="photos-classes__item photos-classes__item-for-index">
                                <img src="<?= get_field('service-img-4'); ?>">
                                <div class="photos-classes__text">
                                    <h3>Занятия проводятся только индивидуально, школьника ничего не отвлекает.</h3>
                                    <button class="photos-classes__btn btn-red two trial-btn" data-modal="connection" data-dop="Услуга: <?php the_title() ?>" type="button">ЗАПИСАТЬСЯ НА ПРОБНЫЙ УРОК</button>
                                </div>
                            </li>
                        <?php }?>
                    </ul>

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
                                            <h3 class="cost-classes__card-header"> <span><?= $classe['classes-number'] ?></span>  индивидуальных занятий  </h3>
                                            <p class="cost-classes__card-subtitle"><?= $classe['classes-subtitle'] ?></p>
                                            <span class="cost-classes__card-price"><?= $classe['classes-price'] ?></span>
                                            <button data-name="<?= $classe['classes-number'] ?> индивидуальных занятий " class="cost-classes__card-btn btn-red two season-btn" data-modal="season" type="button">купить абонемент</button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="cost-classes__swiper-slide swiper-slide">
                                        <div class="cost-classes__card">
                                            <h3 class="cost-classes__card-header"> <span><?= $classe['classes-number'] ?></span>  индивидуальных занятий  </h3>
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


    <?php $frequents = get_field('frequent-questions');
    if ($frequents) { ?>
        <section class="questions">
            <div class="wrap">
                <h2 class="questions__header section-title">Частые вопросы от родителей</h2>
                <div class="questions__wrap">
                    <ul class="questions__list">
                        <?php foreach($frequents as $frequent) { ?>
                            <li class="questions__item">
                                <h3 class="questions__title">
                                    <?= $frequent['question'] ?>
                                    <button class="questions__btn" type="button">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.5738 0.75H10.3238V1V10.3238H1H0.75V10.5738V11.4262V11.6762H1H10.3238V21V21.25H10.5738H11.4262H11.6762V21V11.6762H21H21.25V11.4262V10.5738V10.3238H21H11.6762V1V0.75H11.4262H10.5738Z" fill="#212C3F" stroke="#212C3F" stroke-width="0.5"/>
                                        </svg>
                                    </button>
                                </h3>
                                <p class="questions__answer"><?= $frequent['answer'] ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                    <script>
                        let btnQuestions = document.querySelectorAll('.questions__title')
                        for(let i = 0; i < btnQuestions.length; i++) {
                            btnQuestions[i].addEventListener('click', function() {
                                btnQuestions[i].classList.toggle('active')
                            })
                        }
                    </script>
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
                        <button class="record__btn btn-red two" type="submit">ЗАПИСАТЬСЯ НА ПРОБНЫЙ УРОК</button>
                        <div class="record__cheked-confederacy cheked-confederacy">
                            <input type="checkbox" name="confederacy-record" id="confederacy-record" hidden checked required>
                            <label for="confederacy-record">Отправляя заявку, я соглашаюсь с <a href="<?= get_permalink(3) ?>" target="_blank">политикой обработки персональных данных.</a> </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 

    <?php
        $services = get_posts( array(
            'numberposts' => -1,
            'orderby'     => 'date',
            'post__not_in'   => array (get_the_ID()),
            'order'       => 'ASC',
            'post_type'   => 'uslugi',
        ) ); 
    ?>
    <?php if($services) { ?>
        <section class="other-items">
            <div class="wrap">
                <div class="other-items__box">
                    <h2 class="section-title">Другие предметы и услуги</h2>
                    <div class="other-items__controls controls-slide">
                        <button class="other-items__button-prev btn-slide" type="button"></button>
                        <div class="other-items__pagination pagination"></div>
                        <button class="other-items__button-next btn-slide next" type="button"></button>
                    </div>
                </div>
                <div class="other-items__wrap">
                    <div class="other-items__swiper swiper">
                        <div class="other-items__swiper-wrapper swiper-wrapper">
                            <?php foreach ($services as $service) { ?> 
                                <div class="other-items__swiper-slide swiper-slide">
                                    <div class="service-card">
                                        <a href="<?= get_permalink($service->ID) ?>">
                                            <?php the_field('svg', $service); ?>
                                        </a>
                                        <h3><?= $service->post_title ?></h3>
                                        <p><?php the_field('short-discription', $service); ?></p>
                                        <a class="service-card__link" href="<?= get_permalink($service->ID) ?>">подробнее</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


    <?php $content_page = get_the_content(); ?>
    <?php if($content_page) { ?>
        <section class="about">
            <div class="wrap">
                <div class="about__wrap">
                    <div class="about__content">
                        <div class="about__content-wrap">
                            <?php the_content() ?>
                        </div>
                    </div>
                    <button class="about__content-btn about-btn" type="button">Читать полностью</button>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php get_template_part('templates/contacts') ?>
</main>

<?php get_footer() ?>