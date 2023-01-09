<?php 
    // Template Name: Политика конфиденциальности
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
    <section class="privacy-policy">
        <div class="wrap">
            <div class="privacy-policy__wrap">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>