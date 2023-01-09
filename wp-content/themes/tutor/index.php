<?php get_header() ?>

    <section class="type">
        <div class="container">
            <?php 
                while (have_posts()) {
                    the_post();
                    the_content();
                }
                wp_reset_postdata();
            ?>
        </div>
    </section>

<?php get_footer() ?>