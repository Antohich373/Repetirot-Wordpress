<?php
# DEV = 0
# PRODUCTION = 1
define('MODE', 0);
define('VERSION', 1.2);

#region Настройки
add_theme_support( 'post-thumbnails' );
#endregion

#region Константы
define('PATH', get_template_directory_uri());
define('ASSETS', get_site_url() . (MODE == 0 ? '/frontend/dev/assets/' : '/frontend/app/assets/'));
define('NO_IMG', '<img src="' . get_template_directory_uri() . '/assets/img/no-img.svg" class="no-img" />');
#endregion

#region Добавление стилей и скриптов
add_action( 'wp_enqueue_scripts', 'setup_work_files' );
function setup_work_files() {

    switch (MODE) {
        case 0:
            wp_enqueue_style( 'style', get_site_url() . '/frontend/dev/assets/app.min.css', [], VERSION );
            wp_enqueue_script( 'javascript', get_site_url() . '/frontend/dev/assets/app.min.js', [], VERSION, true);
            break;
        case 1:
            wp_enqueue_style( 'style', get_site_url() . '/frontend/app/assets/app.min.css', [], VERSION );
            wp_enqueue_script( 'javascript', get_site_url() . '/frontend/app/assets/app.min.js', [], VERSION, true);
            break;
    }

    wp_dequeue_style('wp-block-library');
    wp_deregister_script( 'wp-embed' );
}

add_action('after_setup_theme', function() {
    add_theme_support( 'html5', [ 'script', 'style' ] );
});

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
#endregion

#region Контактные данные
add_action( 'admin_menu', 'contact_page' );
function contact_page() {
    add_menu_page( 'Настройки контактных данных', 'Контактные данные', 'manage_options', 'contact_identifier', 'contact_options' );
    add_action( 'admin_init', 'register_contact_settings' );
}
function register_contact_settings() {
    register_setting( 'contact_identifier-settings-group', 'adress' );
    register_setting( 'contact_identifier-settings-group', 'time-work' );
    register_setting( 'contact_identifier-settings-group', 'time-work-two' );
    register_setting( 'contact_identifier-settings-group', 'email' );
    register_setting( 'contact_identifier-settings-group', 'phone' );
    register_setting( 'contact_identifier-settings-group', 'vk' );
    register_setting( 'contact_identifier-settings-group', 'telegram' );
    register_setting( 'contact_identifier-settings-group', 'whatsApp' );
    register_setting( 'contact_identifier-settings-group', 'viber' );
    register_setting( 'contact_identifier-settings-group', 'header_code' );
    register_setting( 'contact_identifier-settings-group', 'footer_code' );
}
function contact_options() { ?>
    <div class="wrap">
        <h1><?php echo get_admin_page_title(); ?></h1>
        <form method="post" action="options.php" >
            <?php settings_fields('contact_identifier-settings-group'); ?>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="phone">Телефон:</label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" value="<?php echo get_option('phone'); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="email">Email:</label>
                    </th>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo get_option('email'); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="adress">Адрес:</label>
                    </th>
                    <td>
                        <input type="text" name="adress" id="adress" value="<?php echo get_option('adress'); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="time-work">Время работы(Будни):</label>
                    </th>
                    <td>
                        <textarea name="time-work" class="regular-text" id="time-work" cols="30" rows="10"><?php echo get_option('time-work'); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="time-work-two">Время работы(Выходные):</label>
                    </th>
                    <td>
                        <textarea name="time-work-two" class="regular-text" id="time-work-two" cols="30" rows="10"><?php echo get_option('time-work-two'); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="vk">ВКонтакте:</label>
                    </th>
                    <td>
                        <input type="text" name="vk" id="vk" value="<?php echo get_option('vk'); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="telegram">Telegram:</label>
                    </th>
                    <td>
                        <input type="text" name="telegram" id="telegram" value="<?php echo get_option('telegram'); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="whatsApp">WhatsApp:</label>
                    </th>
                    <td>
                        <input type="text" name="whatsApp" id="whatsApp" value="<?php echo get_option('whatsApp'); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="viber">Viber:</label>
                    </th>
                    <td>
                        <input type="text" name="viber" id="viber" value="<?php echo get_option('viber'); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="header_code">Код в head:</label>
                    </th>
                    <td>
                        <textarea name="header_code" class="regular-text" id="header_code" cols="30" rows="10"><?php echo get_option('header_code'); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="footer_code">Код в footer:</label>
                    </th>
                    <td>
                        <textarea name="footer_code" class="regular-text" id="footer_code" cols="30" rows="10"><?php echo get_option('footer_code'); ?></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>">
            </p>
        </form>
    </div>
    <?php
}
#endregion

class Content {
    public function __construct() {
        self::registerAdminPage();
    }

    function registerAdminPage() {
        add_action('acf/init', function() {
            acf_add_options_page(array(
                'page_title' 	=> 'Контент сайта',
                'menu_title'	=> 'Контент сайта',
                'menu_slug' 	=> 'content-settings',
                'capability'	=> 'edit_posts',
                'position'      => 3,
                'icon_url'      => 'dashicons-layout',
                'redirect'		=> false
            ));
            acf_add_options_sub_page( array(
                'page_title' => 'Главная страница',
                'menu_title' => 'Главная страница',
                'menu_slug' => 'main-page',
                'parent_slug' => 'content-settings',
                'update_button' => 'Обновить',
            ) );
            acf_add_options_sub_page( array(
                'page_title' => 'Галерея',
                'menu_title' => 'Галерея',
                'menu_slug' => 'gallery',
                'parent_slug' => 'content-settings',
                'update_button' => 'Обновить',
            ) );
            acf_add_options_sub_page( array(
                'page_title' => 'Как нас найти?',
                'menu_title' => 'Как нас найти?',
                'menu_slug' => 'map',
                'parent_slug' => 'content-settings',
                'update_button' => 'Обновить',
            ) );
            acf_add_options_sub_page( array(
                'page_title' => 'Стоимость занятий',
                'menu_title' => 'Стоимость занятий',
                'menu_slug' => 'price',
                'parent_slug' => 'content-settings',
                'update_button' => 'Обновить',
            ) );
        });
    }
}
new Content();


#region Услуги
//    add_action( 'init', 'create_services' );
//    function create_services(){
//        register_post_type('services', array(
//            'label'  => 'Услуги',
//            'labels' => array(
//                'name'               => 'Услуги', // основное название для типа записи
//                'singular_name'      => 'Услуги', // название для одной записи этого типа
//                'add_new'            => 'Добавить услугу', // для добавления новой записи
//                'add_new_item'       => 'Добавление услуг', // заголовка у вновь создаваемой записи в админ-панели.
//                'edit_item'          => 'Редактирование услуг', // для редактирования типа записи
//                'new_item'           => 'Новые услуги', // текст новой записи
//                'view_item'          => 'Смотреть услуги', // для просмотра записи этого типа.
//                'search_items'       => 'Искать услуги', // для поиска по этим типам записи
//                'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
//                'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
//                'parent_item_colon'  => '', // для родителей (у древовидных типов)
//                'menu_name'          => 'Услуги', // название меню
//            ),
//            'description'         => '',
//            'public'              => true,
//            'publicly_queryable'  => null, // зависит от public
//            'exclude_from_search' => null, // зависит от public
//            'show_ui'             => null, // зависит от public
//            'show_in_menu'        => null, // показывать ли в меню адмнки
//            'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
//            'show_in_nav_menus'   => null, // зависит от public
//            'show_in_rest'        => null, // добавить в REST API. C WP 4.7
//            'rest_base'           => null, // $post_type. C WP 4.7
//            'menu_position'       => 4,
//            'menu_icon'           => 'dashicons-hammer',
//            //'capability_type'   => 'post',
//            //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
//            //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
//            'hierarchical'        => false,
//            'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
//            'taxonomies'          => array(),
//            'has_archive'         => false,
//            'rewrite'             => true,
//            'query_var'           => true,
//
//        ) );
//
//    }
//    #endregion

#region Услуги
add_action( 'init', 'create_uslugi' );
function create_uslugi(){
    register_post_type('uslugi', array(
        'label'  => 'Услуги',
        'labels' => array(
            'name'               => 'Услуги', // основное название для типа записи
            'singular_name'      => 'Услуги', // название для одной записи этого типа
            'add_new'            => 'Добавить услугу', // для добавления новой записи
            'add_new_item'       => 'Добавление услуг', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование услуг', // для редактирования типа записи
            'new_item'           => 'Новые услуги', // текст новой записи
            'view_item'          => 'Смотреть услуги', // для просмотра записи этого типа.
            'search_items'       => 'Искать услуги', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Услуги', // название меню
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => null, // зависит от public
        'exclude_from_search' => null, // зависит от public
        'show_ui'             => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => null, // зависит от public
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-hammer',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,

    ) );

}
#endregion


#region Репетиторы
add_action( 'init', 'create_teachers' );
function create_teachers(){
    register_post_type('teachers', array(
        'label'  => 'Репетиторы',
        'labels' => array(
            'name'               => 'Репетиторы', // основное название для типа записи
            'singular_name'      => 'Репетиторы', // название для одной записи этого типа
            'add_new'            => 'Добавить репетитора', // для добавления новой записи
            'add_new_item'       => 'Добавление репетитора', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование репетитора', // для редактирования типа записи
            'new_item'           => 'Новые репетиторы', // текст новой записи
            'view_item'          => 'Смотреть репетитора', // для просмотра записи этого типа.
            'search_items'       => 'Искать репетитора', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Репетиторы', // название меню
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => null, // зависит от public
        'exclude_from_search' => null, // зависит от public
        'show_ui'             => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => null, // зависит от public
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-users',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,

    ) );

}
#endregion

#region портфолио
add_action( 'init', 'create_portfolio' );
function create_portfolio(){
    register_post_type('portfolio', array(
        'label'  => 'Портфолио',
        'labels' => array(
            'name'               => 'Портфолио', // основное название для типа записи
            'singular_name'      => 'Портфолио', // название для одной записи этого типа
            'add_new'            => 'Добавить портфолио', // для добавления новой записи
            'add_new_item'       => 'Добавление портфолио', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование портфолио', // для редактирования типа записи
            'new_item'           => 'Новые портфолио', // текст новой записи
            'view_item'          => 'Смотреть портфолио', // для просмотра записи этого типа.
            'search_items'       => 'Искать портфолио', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'портфолио', // название меню
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => null, // зависит от public
        'exclude_from_search' => null, // зависит от public
        'show_ui'             => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => null, // зависит от public
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-page',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,

    ) );

}
#endregion



#region Отзывы
add_action( 'init', 'create_reviews' );
function create_reviews(){
    register_post_type('reviews', array(
        'label'  => 'Отзывы',
        'labels' => array(
            'name'               => 'Отзывы', // основное название для типа записи
            'singular_name'      => 'Отзывы', // название для одной записи этого типа
            'add_new'            => 'Добавить отзыв', // для добавления новой записи
            'add_new_item'       => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование отзыва', // для редактирования типа записи
            'new_item'           => 'Новые отзывы', // текст новой записи
            'view_item'          => 'Смотреть отзывы', // для просмотра записи этого типа.
            'search_items'       => 'Искать отзывы', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Отзывы', // название меню
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => null, // зависит от public
        'exclude_from_search' => null, // зависит от public
        'show_ui'             => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => null, // зависит от public
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-status',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}
#endregion

#region Статьи
add_action( 'init', 'create_articles' );
function create_articles(){
    register_post_type('articles', array(
        'label'  => 'Статьи',
        'labels' => array(
            'name'               => 'Статьи', // основное название для типа записи
            'singular_name'      => 'Статьи', // название для одной записи этого типа
            'add_new'            => 'Добавить статьи', // для добавления новой записи
            'add_new_item'       => 'Добавление статей', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование статей', // для редактирования типа записи
            'new_item'           => 'Новые статьй', // текст новой записи
            'view_item'          => 'Смотреть статьй', // для просмотра записи этого типа.
            'search_items'       => 'Искать статьй', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Статьи', // название меню
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => null, // зависит от public
        'exclude_from_search' => null, // зависит от public
        'show_ui'             => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
        'show_in_nav_menus'   => null, // зависит от public
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-welcome-write-blog',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,

    ) );

}
#endregion

class VKReviews {
//         public function __construct() {
//             $this->registerAdminPage();
//             $this->setHandlers();
//         }

    function setHandlers() {
        add_action('wp_ajax_vkreviews_update', [$this, 'updateReviews']);
        add_action('wp_ajax_nopriv_vkreviews_update', [$this, 'updateReviews']);
    }
    //http://repetitor.vyatka-it.ru/wp-admin/admin-ajax.php?action=vkreviews_update

//         function registerAdminPage() {
//             add_action('acf/init', function() {
//                 acf_add_options_sub_page(array(
//                     'page_title' => 'Отзывы из ВК',
//                     'menu_title' => 'Отзывы из ВК',
//                     'parent_slug' => 'content-settings',
//                     'update_button' => 'Обновить',
//                 ));
//             });
//         }

    static function updateReviews() {
        $reviews = [];
        $access_token = 'vk1.a.jVSKrXtpDTwXPOKW4-Rxg_UJFJmtcMBn2a0gVP-hEkmhMlr8peGrJ8hkKh2pCDilpvhiRP4q33UTAyJGPkphW7tKUX8kWyxb61NzLBODn5uv53AJ6Hz_Vbps9lejqL2SYkDhnFBl5R8RgqKVQBMOtLV-hx4eFNuduNfKcwAiLuc85AahwrUQqGvgnBPcc1qv2GkDsFuj09KS4j6vXhoR5w';
        $group_id = '21972542';
        $topic_id = '14620574';
        for ($i = 0; $i < 10; $i++) {
            $request_params = [
                'group_id' => $group_id,
                'access_token' => $access_token,
                'topic_id' => $topic_id,
                'sort' => 'desc',
                'count' => 99,
                'offset' => $i * 99,
                'extended' => 1,
                'v' => '5.81'
            ];
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://api.vk.com/method/board.getComments',
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_POSTFIELDS => $request_params,
            ]);

            $result = curl_exec($ch);
            $result = json_decode($result, true);

            curl_close($ch);

            if (empty($reviews)) {
                $reviews = $result;
            } else {
                $reviews['response']['items'] = array_merge($reviews['response']['items'], $result['response']['items']);
                $reviews['response']['profiles'] = array_merge($reviews['response']['profiles'], $result['response']['profiles']);
            }

            if (count($result['response']['items']) < 99) {
                break;
            }
        }

        file_put_contents(ABSPATH . '/vk_reviews.json', json_encode($reviews));

        update_field('vkreviews-date', date('d-m-Y'), 'options');
    }

    static function getReviews($limit = null) {
        if (self::dateOverdue()) {
            self::updateReviews();
        }

        $reviews_raw = json_decode(file_get_contents(ABSPATH . '/vk_reviews.json'));

        # Группа
        // $user['34687056']['name'] = 'Вятка-IT';
        // $user['34687056']['photo'] = 'https://sun9-80.userapi.com/impg/c0kL1KwUOTGkKeTOiMaolyC1R9BYAVwxy-UQ0A/83KOO542RNo.jpg?size=500x500&quality=95&sign=79ab8dade1ea79691d3de35b7f9a9b74&type=album';

        # Остальные пользователи
        foreach ($reviews_raw->response->profiles as $item) {
            $user[$item->id]['name'] = $item->first_name . ' ' . $item->last_name;
            $user[$item->id]['photo'] = $item->photo_100;
        }

        foreach ($reviews_raw->response->items as $key => $item) {
            if (!self::isBlackList($item)) {

                if (isset($limit) && $key > $limit) {
                    break;
                }

                if (isset($user[abs($item->from_id)])) {
                    $date = date('j-d-Y', $item->date);

                    # Изображения

                    if (isset($item->attachments)) {
                        $images = [];
                        foreach ($item->attachments as $attachment) {
                            if ($attachment->type == 'photo') {

                                $thumb = null;
                                $large = null;
                                $sizes = null;

                                //d($attachment->photo->sizes);

                                foreach ($attachment->photo->sizes as $size) {
                                    if ($size->type == 'o') {
                                        $thumb = $size->url;

                                        $sizes = parse_url($size->url);
                                        $sizes = parse_str($sizes['query'], $output);
                                        $sizes = explode('x', $output['size']);
                                        $sizes = [
                                            'w' => $sizes[0],
                                            'h' => $sizes[1]
                                        ];
                                    }

                                    if ($size->type == 'x') {
                                        $large = $size->url;
                                    }

                                    if ($size->type == 'w') {
                                        $large = $size->url;
                                    }
                                }

                                $images[] = [
                                    'thumb' => $thumb,
                                    'large' => $large,
                                    'sizes' => $sizes
                                ];
                            }
                        }
                    } else {
                        $images = null;
                    }

                    $reviews[] = [
                        'id' => $item->from_id,
                        'name' => $user[abs($item->from_id)]['name'],
                        'image' => $user[abs($item->from_id)]['photo'],
                        'text' => htmlentities($item->text),
                        'date' => $date,
                        'link' => 'https://vk.com/topic-14620574_21972542?post=' . $item->id,
                        'images' => $images,
                    ];
                }
            }
        }

        return $reviews;
    }

    static function dateOverdue() {
        $now = new DateTime();
        $last_update = DateTime::createFromFormat("d-m-Y", date('d-m-Y', strtotime(get_field('vkreviews-date', 'options'))));

        $diff = $now->diff($last_update);

        if ($diff->d >= 1) {
            return true;
        } else {
            return false;
        }
    }

    static function isBlackList($item) {
        $in_blacklist = false;

        $blacklist = get_field('vkreviews-blacklist', 'options');
        $users_blacklist = $blacklist['vkreviews-blacklist-users'];
        $posts_blacklist = $blacklist['vkreviews-blacklist-ids'];


        if ($users_blacklist) {
            $search = array_search($item->from_id, array_column($users_blacklist, 'vkreviews-blacklist-user'));

            if (is_int($search) && $search >= 0) {
                $in_blacklist = true;
            }
        }

        if ($posts_blacklist) {
            $search = array_search($item->id, array_column($posts_blacklist, 'vkreviews-blacklist-id'));

            if (is_int($search) && $search >= 0) {
                $in_blacklist = true;
            }
        }

        return $in_blacklist;
    }

    // static function getTemplate() {
    //     $data['reviews'] = self::getReviews(18);
    //     $data['link'] = get_permalink(18);

    //     if ($data['reviews']) {
    //         return Helper::getTemplate('reviews', $data);
    //     }
    // }

}

new VKReviews();

add_action( 'wp_ajax_get_product', 'get_product' );
add_action( 'wp_ajax_nopriv_get_product', 'get_product' );
function get_product() {
    $product_id = $_POST['IDproduct'];
    $product = custom_get_template_as_str('templates/card-product', ['product_id' => $product_id]);
    wp_die(json_encode(['html' => $product]));
}
function custom_get_template_as_str( $template_name, $data ) {
    ob_start();
    extract( $data );
    require locate_template( $template_name . '.php' );
    $template = ob_get_contents();
    ob_end_clean();

    return $template;
}


#region Отправщик писем
add_action('wp_ajax_send_form2', 'send_form2');
add_action('wp_ajax_nopriv_send_form2', 'send_form2');
function send_form2() {
    $name = $_POST['name'];
    $phone = $_POST['tel'];
    $email = $_POST['e-mail'];
    $comment = $_POST['coment'];
    $dop = $_POST['dop'];
    $select = $_POST['select'];


    $to = 'anton.dev@vyatka-it.ru';

    if (isset($phone) && !empty($phone)) {
        $subject = 'Новая заявка';
        $headers = "From: САЙТ <info@vyatka-it.ru>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";

        $message = "Имя: " . $name . "\r\n";

        $message .= "Телефон: ". $phone ."\r\n";

        if(!empty($email)) {
            $message .= "E-mail: ".$email."\r\n";
        }

        if(!empty($comment)) {
            $message .= "Комментарий: " . $comment . "\r\n";
        }

        if(!empty($dop)) {
            $message .= "" . $dop . "\r\n";
        }
        if(!empty($select)) {
            $message .= "" . $dop . "\r\n";
        }


        $message .= "------------------------------------\r\n";

        if (wp_mail($to, $subject, $message, $headers)) {
            wp_die(json_encode([
                'success' => true
            ]));
        } else {
            wp_die(json_encode([
                'error' => true
            ]));
        }
    }
    return false;
}

add_action('after_setup_theme', 'theme_register_nav_menu_header_bottom');
function theme_register_nav_menu_header_bottom() {
    register_nav_menu( 'bottom', 'Нижняя навигация шапка' );
}

add_action('after_setup_theme', 'theme_register_nav_menu_header_top');
function theme_register_nav_menu_header_top() {
    register_nav_menu( 'top', 'Верхняя навигация шапка' );
}

add_action('after_setup_theme', 'theme_register_nav_menu_footer');
function theme_register_nav_menu_footer() {
    register_nav_menu( 'footer', 'Навигация подвал' );
}

add_action('after_setup_theme', 'theme_register_nav_menu_info');
function theme_register_nav_menu_info() {
    register_nav_menu( 'info', 'Информция' );
}

add_action('after_setup_theme', 'theme_register_nav_menu_service');
function theme_register_nav_menu_service() {
    register_nav_menu( 'service', 'Услуги' );
}

#region Вспомогательные функции
# Кастомное получение шаблона
function custom_get_template($template, $data = array()){
    extract($data);
    require locate_template($template.'.php');
}

#endregion

#region Скрыть ненужные пункты меню
add_action('admin_menu', 'remove_admin_menu');
function remove_admin_menu() {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('tools.php');
}
#endregion

#region Скрыть панель админа
show_admin_bar( false );
#endregion
