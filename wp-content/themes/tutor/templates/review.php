<?php
$reviews = get_posts( array(
    'numberposts' => -1,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'ASC',
    'post_type'   => 'reviews',
) );
if ($reviews) { ?>
    <section class="review">
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
                    <a class="review__link" href="<?= get_permalink(24) ?>">ВСЕ отзывы <span> (<?= count($reviews) ?>) </span></a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>