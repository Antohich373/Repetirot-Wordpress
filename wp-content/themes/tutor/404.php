<?php 
    // Template Name: 404
    get_header() 
?>

<main class="main">
    <section class="error">
        <div class="wrap">
            <div class="error__wrap">
                <div class="error__info">
                    <h2 class="error__header">Извините! Страница, которую Вы ищете не может быть найдена.</h2> 
                    <p class="error__subtitle">Скорее всего, это случилось по одной из следующих причин: страница переехала, страницы больше нет или Вам просто нравится изучать 404 страницы</p> 
                    <a class="error__link btn-red two" href="<?= get_permalink(6) ?>">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>