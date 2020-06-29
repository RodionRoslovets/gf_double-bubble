<?php

// Создание кастомных переменных
add_action('wp_enqueue_scripts', 'my_assets_restaurants');
function my_assets_restaurants()
{
    global $wp_query;

    wp_register_script('my_assets_restaurants', get_stylesheet_directory_uri() . '/assets/js/filter.js', array('jquery'), '', true);

    wp_localize_script('my_assets_restaurants', 'ajax_pagination_restaurants', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here

    ));
    wp_enqueue_script('my_assets_restaurants');
}


// Приём и обработка запроса
add_action('wp_ajax_restaurants', 'true_filter_restaurants');
add_action('wp_ajax_nopriv_restaurants', 'true_filter_restaurants');

function true_filter_restaurants(){

    $link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;
    $paged = $link ? wp_basename($link) : false;

//    $order_value = !empty($_POST['date']) ? esc_attr($_POST['date']) : 'DESC'; // ASC или DESC

//    $villa_data = get_field('villa_data');

    $meta_value_num = !empty($_POST['grid-price']) ? 'meta_value_num' : 'date';

    $args = array(
        'posts_per_page' => $_POST['count_page'],
        'post_status' => 'publish',
        'post_type' => 'restaurants',
        'paged' => $paged,
    );

    if ( $_POST['taxonomy_item'] ) {
//        $GLOBALS["item_tax"];
//        $item_tax = [];
//        foreach ( $_POST['taxonomy_item'] as $k => $item) {
//            $item_tax[] = $item;
//        }
        $args['tax_query'][] = array(
            'relation ' => 'AND',
            array(
                'taxonomy' => 'restaurant_kitchen',
                'field' => 'slug',
                'terms' => $_POST['taxonomy_item']),
        );
    }

    if($_POST['check_item']){
        $args['tax_query'][] = [
            'relation' => 'AND',
            [
                'taxonomy' => 'restaurant_check',
                'field' => 'name',
                'terms'    => $_POST['check_item'],
                'operator' => 'IN'
            ],
        ];
    }




    query_posts( $args );

//    echo json_encode($_POST);
//    echo '<br>';
////    var_dump($_POST['grid-price']);
//    echo '<pre>';
//    var_dump($args);
//    echo '</pre>';

        /* Start the Loop */
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- post -->
            <div class="col-lg-4 col-sm-6 d-flex justify-content-center">
                <div class="restaurants-preview__item">
                    <a href="<?php the_permalink(); ?>" class="restaurants-preview__item_image">
                        <?php the_post_thumbnail(); ?>
                    </a>

                    <div class="restaurants-preview__item_content">
                        <a href="<?php the_permalink(); ?>">
                            <h5><?php the_title(); ?></h5>
                        </a>
                        <?php the_excerpt(); ?>
                        <div class="rating-group">
                            <?php echo do_shortcode('[average_rating]') ?>
<!--                            <span>9.2</span>-->
<!--                            <div class="star-block">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                            </div>-->
                        </div>
                    </div>
<!--                    <a class="like-btn" href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/blue-heart.svg" alt=""></a>-->
                    <?php echo do_shortcode('[favorite_button]') ?>
                </div>
            </div>
        <?php endwhile; ?>
            <!-- post navigation -->
        <?php else: ?>
            <!--no posts found-->
        <?php endif; ?>

    <div class="pagination-block">
        <div class="pagination-left">
            <form action="" method="POST">
                <p>Show</p>
                <label>10
                    <input type="radio" id="page10" name="count_page" value="10"></label>
                <label>20
                    <input type="radio" id="page20" name="count_page" value="20"></label>
                <label>30
                    <input type="radio" id="page30" name="count_page" value="30"></label>

                <!--            <span>10</span>-->
                <!--            <a href="#">20</a>-->
                <!--            <a href="#">30</a>-->
            </form>
        </div>
        <div class="pagination-right">
            <?php $args = array(
                'show_all' => false, // показаны все страницы участвующие в пагинации
                'end_size' => 1,     // количество страниц на концах
                'mid_size' => 1,     // количество страниц вокруг текущей
                'prev_next' => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-left.svg" alt="">',
                'next_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-right.svg" alt="">',
                'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.

            );

            $pagination = get_the_posts_pagination($args);

            echo str_replace('wp-admin/admin-ajax.php', 'restaurants', $pagination); ?>

        </div>
    </div>

    <?php


//    $value = get_field_object('villa_data');


//    echo json_encode($_POST);
//    var_dump($_POST['count_page']);

    wp_reset_query();
    wp_die();

}