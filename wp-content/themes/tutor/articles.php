<?php 
    // Template Name: Статьи    
    get_header() 
?>

<main class="main">
    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
            <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item">Статьи</li>
            </ul>
        </div>
    </section>
    <section class="page-title">
        <div class="wrap">
            <h2>Статьи</h2>
        </div>
    </section>
    <?php
    $articles = get_posts( array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'desc',
        'post_type'   => 'articles',
    ) );
    if ($articles) { ?>
        <section class="articles">
            <div class="wrap">
                <div class="articles__wrap">
                    <ul class="articles__list">
                        <?php foreach ($articles as $article) { setup_postdata($article); ?>
                            <li class="articles__item">
                                <div class="articles-card">
                                    <a class="articles-card__img" href="<?= get_permalink($article->ID) ?>" >
                                        <img src="<?php the_field('image', $article); ?>">
                                    </a>
                                    <div class="articles-card__content">
                                        <span><?= get_the_date() ?></span>
                                        <h3><a href="<?= get_permalink($article->ID) ?>"><?= $article->post_title ?></a> </h3>
                                        <p><?php the_field('short-discription', $article); ?></p>
                                    </div>
                                    <div class="articles-card__controls">
                                        <a class="articles-card__link btn-transparent" href="<?= get_permalink($article->ID) ?>">читать полностью</a>
                                    </div>
                                </div>
                            </li>
                        <?php } wp_reset_postdata(); ?>
                    </ul>
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