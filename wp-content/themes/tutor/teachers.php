<?php 
    // Template Name: Репетиторы
    get_header() 
?>

<main class="main">

    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item">Репетиторы</li>
            </ul>
        </div>
    </section>

    <section class="preview preview-services">
        <div class="preview__container">
            <div class="preview__content">
                <h1 class="preview__header">
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
                    <button class="preview__btn-record btn-red trial-btn" data-modal="connection" data-dop="Услуга: <?php the_title() ?>"  type="button">Записаться на пробный урок</button>
                    <button class="preview__btn-consultation btn-transparent consultation-btn" data-modal="consultation" data-dop="Услуга: <?php the_title() ?>"  type="button">Получить консультацию</button>
                </div>
            </div>
            <div class="preview__img">
                <img class="preview__decor" src="<?= ASSETS ?>/images/services/decor.svg"/>
                <img class="preview__page-img" src="<?= ASSETS ?>/images/services/tuter.png"/>
            </div>
            <div class="preview__controls-mobile">
                <button class="preview__btn-record btn-red trial-btn" data-modal="connection" data-dop="Услуга: <?php the_title() ?>" type="button">Записаться на пробный урок</button>
                <button class="preview__btn-consultation btn-transparent consultation-btn" data-modal="consultation" data-dop="Услуга: <?php the_title() ?>" data-modal="consultation"  type="button">Получить консультацию</button>
            </div>
        </div>
    </section>


    <?php
    $teachers = get_posts( array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'teachers',
    ) );
    if ($teachers) { ?>
        <section class="teachers">
            <div class="wrap">
                <h2 class="section-title">Познакомьтесь с нашими учителями</h2>
                <p class="teachers__subtitle">Выберите преподавателя по необходимому предмету и запишитесь на занятие</p>
                <div class="teachers__wrap swiper">
                    <ul class="teachers__list swiper-wrapper">
                        <?php foreach ($teachers as $teacher) { setup_postdata($teacher); ?>
                            <li class="swiper-slide">
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
                            </li>
                        <?php } wp_reset_postdata(); ?>
                    </ul>
                   <button class="teachers__btn" type="button">показать еще</button>
                </div>
                <script>
                    let btnOpenTuter = document.querySelector('.teachers__btn')
                    btnOpenTuter.addEventListener('click', function () {
                        document.querySelector('.teachers__list').classList.toggle('active')
                        btnOpenTuter.innerHTML = (btnOpenTuter.innerHTML === 'Скрыть') ? btnOpenTuter.innerHTML = 'показать еще' : btnOpenTuter.innerHTML = 'Скрыть';
                    })
                </script>
<!--              <script>-->
<!--                  let btnTeachers = document.querySelector('.teachers__btn')-->
<!--                    let itemTeachers = document.querySelectorAll('teachers__list li')-->
<!--                   if(itemTeachers.length > 5) {-->
<!--                        btnTeachers.style.cssText = 'display: none;'-->
<!--                }-->
<!--                   btnTeachers.addEventListener('click', function() {-->
<!--                       btnTeachers.innerHTML = (btnTeachers.innerHTML === 'Скрыть') ? btnTeachers.innerHTML = 'показать еще' : btnTeachers.innerHTML = 'Скрыть';-->
<!--                       document.querySelector('.teachers__list').classList.toggle('active')-->
<!--                   })-->
<!--                </script>-->
            </div>
        </section>
    <?php } ?>

<!--    --><?php
//    $teachers = get_posts( array(
//        'numberposts' => -1,
//        'category'    => 0,
//        'orderby'     => 'date',
//        'order'       => 'ASC',
//        'post_type'   => 'teachers',
//    ) );
//    if ($teachers) { ?>
<!--        <section class="teachers">-->
<!--            <div class="wrap">-->
<!--                <h2 class="section-title">Познакомьтесь с нашими учителями</h2>-->
<!--                <p class="teachers__subtitle">Выберите преподавателя по необходимому предмету и запишитесь на занятие</p>-->
<!--                <div class="teachers__wrap">-->
<!--                    <ul class="teachers__list">-->
<!--                        --><?php //foreach ($teachers as $teacher) { setup_postdata($teacher); ?>
<!--                            <li>-->
<!--                                <div class="tutor-card">-->
<!--                                    <div class="tutor-card__box">-->
<!--                                        <div class="tutor-card__box-content">-->
<!--                                            <p class="tutor-card__content-object">--><?php //the_field('status', $teacher); ?><!--</p>-->
<!--                                            <a href="--><?//= get_permalink($teacher->ID) ?><!--" class="tutor-card__box-img-mobile">-->
<!--                                                <img src="--><?php //the_field('img', $teacher); ?><!--">-->
<!--                                            </a>-->
<!--                                            <h3 class="tutor-card__content-name">--><?//= $teacher->post_title ?><!--</h3>-->
<!--                                            <a class="tutor-card__link-mobile" href="--><?//= get_permalink($teacher->ID) ?><!--">подробнее</a>-->
<!--                                            --><?php //$detailes = get_field('detailed-list', $teacher); ?>
<!--                                            --><?php //if($detailes) { ?>
<!--                                                <ul class="tutor-card__list-info">-->
<!--                                                    --><?php //foreach($detailes as $detaile) { ?>
<!--                                                        <li>-->
<!--                                                            <button class="tutor-card__info-btn " type="button" data-toggler>--><?//= $detaile['header'] ?><!-- </button>-->
<!--                                                            --><?php //$discriptions = $detaile['discription'] ?>
<!--                                                            --><?php //if($discriptions) { ?>
<!--                                                                <ul class="tutor-card__info">-->
<!--                                                                    --><?php //foreach($discriptions as $discription) { ?>
<!--                                                                        <li>--><?//= $discription['text'] ?><!-- </li>-->
<!--                                                                    --><?php //} ?>
<!--                                                                </ul>-->
<!--                                                            --><?php //} ?>
<!--                                                        </li>-->
<!--                                                    --><?php //} ?>
<!--                                                </ul>-->
<!--                                            --><?php //} ?>
<!--                                        </div>-->
<!--                                        <a href="--><?//= get_permalink($teacher->ID) ?><!--" class="tutor-card__box-img">-->
<!--                                            <img src="--><?php //the_field('img', $teacher); ?><!--">-->
<!--                                        </a>-->
<!--                                        <div class="tutor-card__controls">-->
<!--                                        <button class="trial-btn" data-modal="connection" data-dop="Репетитор: --><?//= $teacher->post_title ?><!--" type="button">ЗАПИСАТЬСЯ</button>-->
<!--                                            <a href="--><?//= get_permalink($teacher->ID) ?><!--">подробнее</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        --><?php //} wp_reset_postdata(); ?>
<!--                    </ul>-->
<!--                    <button class="teachers__btn" type="button">показать еще</button>-->
<!--                </div>-->
<!--                <script>-->
<!--                    let btnTeachers = document.querySelector('.teachers__btn')-->
<!--                    let itemTeachers = document.querySelectorAll('teachers__list li')-->
<!--                    if(itemTeachers.length <= 5) {-->
<!--                        btnTeachers.style.cssText = 'display: none;'-->
<!--                    }-->
<!--                    btnTeachers.addEventListener('click', function() {-->
<!--                        btnTeachers.innerHTML = (btnTeachers.innerHTML === 'Скрыть') ? btnTeachers.innerHTML = 'показать еще' : btnTeachers.innerHTML = 'Скрыть';-->
<!--                        document.querySelector('.teachers__list').classList.toggle('active')-->
<!--                    })-->
<!--                </script>-->
<!--            </div>-->
<!--        </section>-->
<!--    --><?php //} ?>
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
    <?php $page_content = get_the_content(); ?>
    <? if($page_content) { ?>
    <section class="about">
        <div class="wrap">
            <div class="about__wrap">
                <div class="about__content">
                    <div class="about__content-wrap">
                        <!-- <h2>О репетиторах центра</h2>
                        <p>За 12 лет мы работали с педагогами разного возраста и стажа. На опыте мы убедились, что для подготовки к серьезным испытаниям больше подходит опытный репетитор, а с 5-8-ми классами прекрасно справляется и молодой специалист.</p>
                        <p>Наши учителя - кировские, свои, знакомые и проверенные. Их опыт - более 15 лет, все - с высшим образованием, имеют 1 и высшую категорию. Каждый помог более 100 ученикам.</p>
                        <p>Наши репетиторы по математике в Кирове занимаются и с 5, 6, 7, 8, 9, 10 и 11 классами. А наши ученики - это не только школьники с "тройками", но и сильные ребята из ВГГ, КЭПЛ, КФМЛ, КЛЕН.</p>
                        <p>Для начала мы проводим пробное занятие. Чтобы вы убедились, что заниматься с нами удобно и надежно, познакомились с педагогом, задали все вопросы. А потом составляем индивидуальное расписание и начинаем заниматься с репетитором по математике.</p>
                     -->
                     <?php the_content() ?>
                    </div>
                </div>
                <button class="about__content-btn about-btn" type="button">Читать полностью</button>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php get_template_part('templates/review') ?>
    <?php get_template_part('templates/contacts') ?>
</main>

<?php get_footer() ?>