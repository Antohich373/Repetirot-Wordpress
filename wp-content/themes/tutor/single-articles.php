<?php 
    get_header() 
?>

<main class="main">

    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item"><a href="<?= get_permalink(20) ?>">Статьи</a></li>
                <li class="bread-crumbs__item"><?= the_title() ?></li>
            </ul>
        </div>
    </section>

    <section class="page-title">
        <div class="wrap">
            <h1><?= the_title() ?></h1>
        </div>
    </section>

    <section class="article">
        <div class="wrap">
            <div class="article__wrap">
                <span class="article__date"><?= get_the_date() ?></span>
                <img src="<?=get_field('image')?>">
                <?php the_content() ?>
            </div>
        </div>
    </section>

    <?php
    $articles = get_field('recommended-stats');
    if ($articles) { ?>
        <section class="recommendations recommendations-articles">
            <div class="wrap">
                <h2 class="recommendations__header section-title">Также рекомендуем</h2>
                <div class="recommendations__wrap">
                    <div class="recommendations__swiper swiper">
                        <div class="recommendations__swiper-wrapper swiper-wrapper">
                            <?php foreach ($articles as $article) { ?> 
                                <?php $artic = get_post($article); ?>
                                <div class="recommendations__swiper-slide swiper-slide">
                                    <div class="articles-card">
                                        <a href="<?= get_permalink($artic->ID) ?>" class="articles-card__img">
                                            <img src="<?php the_field('image', $artic); ?>">
                                        </a>
                                        <div class="articles-card__content">
                                            <span><?= get_the_date() ?></span>
                                            <h3><a href="<?= get_permalink($artic->ID) ?>"><?= $artic->post_title ?></a> </h3>
                                            <p><?php the_field('short-discription', $artic); ?></p>
                                        </div>
                                        <div class="articles-card__controls">
                                            <a class="articles-card__link btn-transparent" href="<?= get_permalink($artic->ID) ?>">читать полностью</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="record record-gallery">
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