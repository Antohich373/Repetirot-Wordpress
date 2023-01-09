<?php 
    // Template Name: Отзывы    
    get_header()
?>

<?php //$reviews =  VKReviews::getReviews(); ?>
<?php //var_dump($reviews) ?>
<?php //foreach ($reviews as $reviewe) { ?>
<!--    <h3>--><?//= $reviewe['name'] ?><!--</h3>-->
<?php //} ?>

<main class="main">
    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item">Отзывы</li>
            </ul>
        </div>
    </section>

    <section class="page-title">
        <div class="wrap">
            <h2>Отзывы о нашем центре</h2>
        </div>
    </section>

    <?php
    $reviews = get_posts( array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'desc',
        'post_type'   => 'reviews',
    ) );
    if ($reviews) { ?>
        <section class="reviews">
            <div class="wrap">
                <div class="reviews__wrap">
                    <ul class="reviews__list">
                        <?php foreach($reviews as $review) { ?>
                            <li class="reviews__item">
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
                    </ul>
                    <button class="reviews__btn" type="button"> <span class="reviews__btn-name">показать все отзывы</span>  <span class="reviews__btn-qount">(21)</span>  </button>
                    <script>
                        let reviewsItem = document.querySelectorAll('.reviews__item')
                        let btnReviews = document.querySelector('.reviews__btn')
                        let btnNameReviews = document.querySelector('.reviews__btn-name')
                        if(reviewsItem.length < 6 ) {
                            btnReviews.style = 'display: none;'
                        }
                        document.querySelector('.reviews__btn-qount').innerHTML = "(" + reviewsItem.length + ")"
                        btnReviews.addEventListener('click', function() {
                            document.querySelector('.reviews__list').classList.toggle('active')
                            btnNameReviews.innerHTML = (btnNameReviews.innerHTML === 'скрыть все отзывы') ? btnNameReviews.innerHTML = 'показать все отзывы' : btnNameReviews.innerHTML = 'скрыть все отзывы';
                        })
                    </script>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="reviews-widget">
        <div class="wrap">
            <div class="reviews-widget__wrap">
                <div class="reviews-widget__content">
                    <h3 class="reviews-widget__title">Отзывы на Яндексе</h3>
                    <p class="reviews-widget__text">Прочитайте реальные отзывы о нашей компании или оставьте свой на Яндекс.Картах</p>
                    <noindex>
                        <a class="reviews-widget__link" href="https://yandex.ru/profile/1132660463" rel="nofollow" target="_blank">
                    </noindex>
                        Посмотреть отзывы на Яндексе
                        <svg width="21" height="9" viewBox="0 0 21 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.3536 4.85355C20.5488 4.65829 20.5488 4.34171 20.3536 4.14645L17.1716 0.964466C16.9763 0.769204 16.6597 0.769204 16.4645 0.964466C16.2692 1.15973 16.2692 1.47631 16.4645 1.67157L19.2929 4.5L16.4645 7.32843C16.2692 7.52369 16.2692 7.84027 16.4645 8.03553C16.6597 8.2308 16.9763 8.2308 17.1716 8.03553L20.3536 4.85355ZM0 5H20V4H0V5Z" fill="#EA142E"/>
                        </svg>
                    </a>
                </div>
                <div class="reviews-widget__card">
                    <div class="reviews-widget__yandex" style="width:560px;height:800px;overflow:hidden;position:relative;"><iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/244448659709?comments"></iframe><a href="https://yandex.ru/maps/org/5_plyus/244448659709/" target="_blank" style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">5 Плюс на карте Кирова — Яндекс Карты</a></div>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews-widget reviews-widget-vk">
        <div class="wrap">
            <div class="reviews-widget__wrap">
                <div class="reviews-widget__content">
                    <h3 class="reviews-widget__title">Отзывы в группе Вконтакте</h3>
                    <p class="reviews-widget__text">Прочитайте реальные отзывы о нашей компании или оставьте свой Вконтакте</p>
                    <noindex>
                        <a class="reviews-widget__link" href="https://vk.com/repetitor_kirov_5_plus" rel="nofollow" target="_blank">
                    </noindex>
                        Посмотреть отзывы в ВК
                        <svg width="21" height="9" viewBox="0 0 21 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.3536 4.85355C20.5488 4.65829 20.5488 4.34171 20.3536 4.14645L17.1716 0.964466C16.9763 0.769204 16.6597 0.769204 16.4645 0.964466C16.2692 1.15973 16.2692 1.47631 16.4645 1.67157L19.2929 4.5L16.4645 7.32843C16.2692 7.52369 16.2692 7.84027 16.4645 8.03553C16.6597 8.2308 16.9763 8.2308 17.1716 8.03553L20.3536 4.85355ZM0 5H20V4H0V5Z" fill="#EA142E"/>
                        </svg>
                    </a>
                </div>
                <div class="reviews-widget__card">
                    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>
                    <!-- Put this div tag to the place, where the Group block will be -->
                    <div id="vk_groups"></div>
                    <script type="text/javascript">
                    VK.Widgets.Group("vk_groups", {mode: 4, wide: 1, width: 311, height: 200, color1: "FFFFFF", color2: "000000", color3: "5181B8"}, 14620574);
                    </script>
                </div>
            </div>
        </div>
    </section>

    <section class="record record-gallery reviews">
        <div class="wrap">
            <div class="record__wrap">
                <div class="record__box">
                    <div class="record__content">
                        <h2 class="record__header">Оставьте отзыв о нашей работе</h2>
                        <p class="record__text">Будем благодарны за реальную обратную связь о работе наших репетиторов и компании в целом</p>
                    </div>
                    <form class="form record__form" method="POST">
                        <div class="record__input-box">
                            <input class="dop-consultation" class="input-castom" type="text" name="dop" value="Отзыв" hidden>
                            <input class="input-castom" type="text" name="name" placeholder="Ваше имя*" required>
                            <input class="input-castom" type="tel" name="tel" placeholder="Номер телефона*" required>
                            <div class="select select-1">
                                <input type="hidden" name="select">
                                <button class="select__button input-castom" type="button">Класс</button>
                                <ul class="select__list">
                                    <li data-value="1" selected="selected">1 класс</li>
                                    <li data-value="2">2 класс</li>
                                    <li data-value="3">3 класс</li>
                                    <li data-value="4">4 класс</li>
                                    <li data-value="5">5 класс</li>
                                    <li data-value="6">6 класс</li>
                                    <li data-value="7">7 класс</li>
                                    <li data-value="8">8 класс</li>
                                    <li data-value="9">9 класс</li>
                                    <li data-value="10">10 класс</li>
                                    <li data-value="11">11 класс</li>
                                </ul>
                            </div>
                        </div>
                        <textarea class="record__textarea input-castom" name="coment" placeholder="Текст отзыва"></textarea>
                        <button class="record__btn btn-red two record__reviews" type="submit">Оставить отзыв</button>
                        <div class="record__cheked-confederacy cheked-confederacy">
                            <input type="checkbox" name="confederacy-record" id="confederacy-record" hidden checked required>
                            <label for="confederacy-record">Отправляя заявку, я соглашаюсь с <a href="<?= get_permalink(3) ?>" target="_blank">политикой обработки персональных данных.</a> </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        let btnReviewsPage = document.querySelector('.record__reviews')
        btnReviewsPage.addEventListener('click', function () {
            document.querySelector('.thans__box h2').innerHTML = 'Спасибо за отзыв!'
            document.querySelector('.thans__box p').style.cssText = 'display: none;'
        })
    </script>
</main>

<?php get_footer() ?>
