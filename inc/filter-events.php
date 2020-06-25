<?php

// Создание кастомных переменных
add_action('wp_enqueue_scripts', 'my_assets_events');
function my_assets_events()
{
    global $wp_query;

    wp_register_script('my_assets_events', get_stylesheet_directory_uri() . '/assets/js/filter.js', array('jquery'), '', true);

    wp_localize_script('my_assets_events', 'ajax_pagination_events', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here

    ));
    wp_enqueue_script('my_assets_events');
}


// Приём и обработка запроса
add_action('wp_ajax_events', 'true_filter_events');
add_action('wp_ajax_nopriv_events', 'true_filter_events');

function true_filter_events(){

    $link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;
    $paged = $link ? wp_basename($link) : false;

//    $order_value = !empty($_POST['date']) ? esc_attr($_POST['date']) : 'DESC'; // ASC или DESC

//    $villa_data = get_field('villa_data');

//    $meta_value_num = !empty($_POST['grid-price']) ? 'meta_value_num' : 'date';

    $args = array(
        'posts_per_page' => $_POST['count_page'],
        'post_status' => 'publish',
        'post_type' => 'events',
        'paged' => $paged,

        'orderby' => 'date',
        'order' => $_POST['grid-date'],
    );




    // для таксономий

    if($_POST['grid-district']){
        $args['tax_query'] = [
            'relation' => 'AND',
            [
                'taxonomy' => 'events_district',
                'field' => 'name',
                'terms'    => $_POST['grid-district'],
                'operator' => 'IN'
            ],
        ];
    }
    if($_POST['grid-day-night']){
        $args['tax_query'] = [
            'relation' => 'AND',
            [
                'taxonomy' => 'events_day_night',
                'field' => 'name',
                'terms'    => $_POST['grid-day-night'],
                'operator' => 'IN'
            ],
        ];
    }
    
//    if( isset( $_POST['categoryfilter'] ))
//
//    $args['tax_query'] = array(
//        array(
//            'taxonomy' => 'category',
//            'field' => 'id',
//            'terms' => $_POST['categoryfilter']
//        )
//    );

//// create $args['meta_query'] array if one of the following fields is filled
//    if( isset( $_POST['min_price'] ) && $_POST['min_price']
//        || isset( $_POST['max_price'] ) && $_POST['max_price']
//        || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' ||
//        isset( $_POST['grid-price'] ) && $_POST['grid-price']
//    ){
//        $args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true
//
//    // if both minimum price and maximum price are specified we will use BETWEEN comparison
//    if( isset( $_POST['min_price'] ) && $_POST['min_price'] && isset( $_POST['max_price'] ) && $_POST['max_price'] ) {
//        $args['meta_query'][] = array(
////            'key' => 'price',
//            'field' => 'price',
//            'value' => array( $_POST['min_price'], $_POST['max_price'] ),
//            'type' => 'numeric',
//            'compare' => 'between'
//        );
//   } else {
//        // if only min price is set
//        if( isset( $_POST['min_price'] ) && $_POST['min_price'] )
//            $args['meta_query'][] = array(
////                'key' => 'price',
//                'field' => 'price',
//                'value' => $_POST['min_price'],
//                'type' => 'numeric',
//                'compare' => '=>',
//            );
//
//
//        // if only max price is set
//        if( isset( $_POST['max_price'] ) && $_POST['max_price'] )
//            $args['meta_query'][] = array(
////                'key' => 'price',
//                'field' => 'price',
//                'value' => $_POST['max_price'],
//                'type' => 'numeric',
//                'compare' => '<=',
//            );
//    }
//    }
//
//
//
////
//    // условие 3: миниатюра имеется
//    if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
//        $args['meta_query'][] = array(
//            'key' => '_thumbnail_id',
//            'compare' => 'EXISTS'
//        );
//
//    // условие 4: сортировка по цене
//    if( isset( $_POST['grid-price']) ) {
//        $args['meta_query'][] = array(
//            'field' => 'price',
//            'meta_key' => 'price',
//            'meta_value' => 'price',
//            'type' => 'numeric',
//        );
//    }




    query_posts( $args );

//    echo json_encode($_POST);
//    echo '<br>';
////    var_dump($_POST['grid-price']);
//    echo '<pre>';
//    var_dump($args);
//    echo '</pre>';

    if ( have_posts() ) : ?>

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            ?>
            <?php $event = get_field('event'); ?>
            <div class="event-grid-item">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(array(275)); ?>
                </a>
                <h5><?php the_title(); ?></h5>
                <span class="date-other-event"><?php echo esc_html( $event['date'] ); ?></span>
<!--                <a class="like-btn" href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/blue-heart.svg" alt=""></a>-->
                <?php echo do_shortcode('[favorite_button]') ?>
            </div>

        <?php endwhile;

    //the_posts_navigation();

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
                    ?>

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

            echo str_replace('wp-admin/admin-ajax.php', 'events', $pagination); ?>

        </div>
    </div>

    <?php


//    $value = get_field_object('villa_data');


//    echo json_encode($_POST);
//    var_dump($_POST['count_page']);

    wp_reset_query();
    wp_die();

}