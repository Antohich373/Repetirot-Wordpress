<!-- ВСТАВИТЬ ШАБЛОН -->
<?php get_template_part('templates/services') ?>

<!-- СТАНДАРНЫЙ ВЫВОД WORDPRESS + ПОВТОРИТЕЛЬ -->
<?php
$fleets = get_posts( array(
    'numberposts' => -1,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'desc',
    'post_type'   => 'fleet-type',
) );
if ($fleets) { ?>
<?php foreach ($fleets as $fleet) {
setup_postdata($fleet); ?>
    <section class="fleet">
        <div class="wrap">
            <div class="fleet__wrap">
                <div class="fleet__container">
                    <div class="fleet__swiper swiper">
                        <div class="fleet__swiper-wrapper swiper-wrapper">
                            <?php
                                $autos = get_field('fleet-auto', $fleet->ID);             
                            if ($autos) { ?>
                                <?php foreach ($autos as $auto) { ?> 
                                    <div class="fleet__swiper-slide swiper-slide">
                                        <img class="fleet__image" src="<?= $auto['image-auto'] ?>">
                                        <p class="fleet__text"><?= $auto['name-auto'] ?></p>
                                    </div>
                                <?php } ?>   
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="fleet__box-content">
                    <h3 class="fleet__title"><?= get_field('fleet-tiitle', $fleet->ID) ?></h3>
                    <p class="fleet__content">
                        <?= get_field('fleet-subtitle', $fleet->ID) ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php }
    wp_reset_postdata();
?>
<?php } else {
    
} ?>

<!-- ПОВТОРИТЕЛЬ В ПОВТОРИТЕЛЕ  -->
<?php
$scraps = get_posts( array(
    'numberposts' => -1,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'ASC',
    'post_type'   => 'scraps',
) ); 
if($scraps) {?>

<section class="scrap-prices">
    <div class="wrap">
        <h3 class="scrap-prices__header section-title">Цены на металлолом</h3>
        <ul class="scrap-prices__list-cintrols">
            <?php foreach ($scraps as $scrap) { ?> 
                <?php $post_num++; ?>
                <li class="scrap-prices__item-controls">
                    <button class="scrap-prices__controls controls-toggle" type="button"  data-tab="<?= $post_num; ?>"><?= $scrap->post_title ?></button>
                </li>
            <?php } ?> 
        </ul>

        <div class="scrap-prices__wrap">
            <div class="scrap-prices__container">
                <div class="scrap-prices__box-header">
                    <p class="scrap-prices__box-header-name">Название металла</p>
                    <p class="scrap-prices__box-header-percent">Засор %</p>
                    <p class="scrap-prices__box-header-price">Цена за: кг</p>
                    <p style="text-align: right;" class="scrap-prices__box-header-price">Цена за: тонну</p>
                </div>
                <?php foreach ($scraps as $scrap) { ?> 
                    <?php $posts_num++; ?>
                    <div class="scrap-prices__box-type" data-tab="<?= $posts_num; ?>" >
                        <?php
                            $informations = get_field('information', $scrap->ID);             
                        if ($informations) { ?>
                            <?php foreach ($informations as $information) { ?> 
                                <div class="scrap-prices__type-name">
                                    <h3 class="scrap-prices__type-header">
                                        <p><?= $information['name'] ?></p> 
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0161 7.17658L11.0004 11.9891L4.98481 7.17658C4.60115 6.86955 4.08284 6.79053 3.62511 6.96928C3.16739 7.14802 2.8398 7.55738 2.76574 8.04315C2.69168 8.52892 2.8824 9.0173 3.26605 9.32433L10.1411 14.8243C10.6434 15.2265 11.3575 15.2265 11.8598 14.8243L18.7348 9.32433C19.3279 8.84971 19.4239 7.98416 18.9493 7.39108C18.4747 6.79799 17.6091 6.70196 17.0161 7.17658Z" fill="#F4893B"/>
                                        </svg>
                                    </h3>
                                    <p class="scrap-prices__type-price"><?= $information['price-from'] ?></p>
                                </div>
                            
                                <ul class="scrap-prices__type-list">

                                    <?php foreach ($information['detailed-information'] as $detailed) { ?> 
                                        <li class="scrap-prices__type-item">
                                            <p><?= $detailed['type'] ?></p>
                                            <p><?= $detailed['procent'] ?></p>
                                            <p><?= $detailed['pricec'] ?></p>
                                            <p style="text-align: right;"><?= $detailed['tons'] ?></p>
                                        </li>
                                    <?php } ?> 
                                </ul>
                            <?php } ?> 
                        <?php } ?>
                    </div>
                <?php } ?> 
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php wp_reset_postdata();?> 

<!-- ВЫВОД КАТЕГОРИЙ -->

<section class="who-teaching">
    <div class="wrap">
        <h2 class="who-teaching__header section-title">Кого мы обучаем</h2>
        <div class="who-teaching__wrpa">
            <?
                $categories = get_terms([
                    'taxonomy' => 'categories',
                    'parent' => 0
                ]);
            ?>
            <ul class="who-teaching__list">
                <? foreach ($categories as $catogory) { ?>
                    <li class="who-teaching__item">
                        <h3 class="who-teaching__title"><?= $catogory->name ?></h3>

                        <?php
                            $query = get_posts([
                                'post_type' => 'products',
                            ]);
                            $querye = get_posts([
                                'numberposts' => -1,
                                'post_type' => 'products',
                                'post__not_in' => array(76),
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'categories',
                                        'field' => 'term_id',
                                        'terms'    => $catogory->term_id,
                                    ]
                                ]
                            ]);
                        ?>
                        <? foreach ($querye as $querys) { ?> 
                            <a class="who-teaching__link" href="<?= get_permalink($querys->ID) ?>"><?= $querys->post_title ?></a>
                        <? } ?>
                    </li>
                <? } ?>
            </ul>
        </div>
    </div>
</section>

<!-- ЭТО ДЛЯ ВЫВОДА ОТДЕЛЬНОГО ПОСТА В КАТЕГОРИИ -->
<?php $querys = get_post(76); ?>
<?= $querys->post_title ?>
<?php the_field('additional_text', $querys); ?>

<!-- ВЫВОД КАРТИНОК  -->
<img class="student-reviews__camera" src="<?= ASSETS ?>/images/student-reviews/camera.png" width="85" height="71">


<!-- РЕГИСТРАЦИЯ МЕНЮ -->
<?php wp_nav_menu(array(
    'theme_location' => 'menu',
    'container' => null
)); ?>

<!-- ВЫВОД ДЛЯ single  -->
<?php the_content(); ?>
<?=get_field('price')?>
<?php the_title(); ?>

<?php
$images = get_field('images');
if ($images) { ?>
    <?php foreach ($images as $image) { ?> 
        <div class="product__swiper-slide swiper-slide">
            <img class="product__image" src="<?= $image['image'] ?>">
        </div>
    <?php } ?> 
<?php } ?>


<!-- ЕСЛИ НА ГЛАВНОЙ ТО  -->

<?php if (is_front_page(  )) { ?>
    1
<?php } else { ?>
    2
<?php } ?>

<!-- ССЫЛКА ОП ID -->
<?= get_permalink(6) ?>

<!-- ЭТО ЕСЛИ МЫ ХОТИМ ЧТО БЫ ИЗМЕНЕНИЯ ВИДЕЛ ТОЛЬКО АДМИНИСТРАТОР -->
<!-- <?php if(current_user_can('administrator')){ ?>
    <?php } ?> -->


