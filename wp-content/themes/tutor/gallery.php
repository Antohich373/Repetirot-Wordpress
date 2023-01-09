<?php 
    // Template Name: Галерея
    get_header() 
?>

<main class="main">

    <section class="bread-crumbs">
        <div class="wrap">
            <ul class="bread-crumbs__list">
                <li class="bread-crumbs__item"><a href="<?= get_permalink(6) ?>">Главная</a></li>
                <li class="bread-crumbs__item">Фотографии репетиторского центра 5 Плюс</li>
            </ul>
        </div>
    </section>

    <section class="page-title">
        <div class="wrap">
            <h2> Фотографии репетиторского центра 5 Плюс </h2>
            <p>Почувствуйте атмосферу центра, посмотрите как занимаются наши ученики.</p>
        </div>
    </section>

    <?php $images = get_field('images', 'option'); ?>
    <?php if($images) { ?>
        <section class="gallery">
            <div class="wrap">
                <div class="gallery__wrap">
                    <ul class="gallery__list" data-lightbox-parent>
                        <?php foreach ($images as $image) { ?> 
                            <li class="gallery__item">
                                <img src="<?= $image['img'] ?>" data-lightbox="<img src='<?= $image['img'] ?>' >"> 
                            </li>
                        <?php } ?> 
                    </ul>
                    <button class="gallery__btn btn-transparent" type="button">показать еще</button>
                    <script>
                        let btnGallery = document.querySelector('.gallery__btn')
                        btnGallery.addEventListener('click', function() {
                            btnGallery.innerHTML = (btnGallery.innerHTML === 'Скрыть') ? btnGallery.innerHTML = 'показать еще' : btnGallery.innerHTML = 'Скрыть';
                            document.querySelector('.gallery__list').classList.toggle('active')
                        })
                    </script>
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