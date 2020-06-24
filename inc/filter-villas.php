<?php

// Создание кастомных переменных
add_action('wp_enqueue_scripts', 'my_assets');
function my_assets()
{
    global $wp_query;

    wp_register_script('my_assets', get_stylesheet_directory_uri() . '/assets/js/filter.js', array('jquery'), '', true);

    wp_localize_script('my_assets', 'ajax_pagination', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here

    ));
    wp_enqueue_script('my_assets');
}


// Приём и обработка запроса
add_action('wp_ajax_myfilter', 'true_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'true_filter_function');

function true_filter_function(){

    $link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;
    $paged = $link ? wp_basename($link) : false;

//    $order_value = !empty($_POST['date']) ? esc_attr($_POST['date']) : 'DESC'; // ASC или DESC

//    $villa_data = get_field('villa_data');

    $meta_value_num = !empty($_POST['grid-price']) ? 'meta_value_num' : 'date';


    $args = array(
        'posts_per_page' => $_POST['count_page'],
        'post_status' => 'publish',
        'post_type' => 'villas',
        'paged' => $paged,


//        'orderby' => array(
//            'grid-price' => $_POST['grid-price']
//        ),
//        'order' => $_POST['grid-price'],
//                'field' => 'price',
//        'meta_key' => 'price',

//        'orderby' => array(
//            'price' => $_POST['grid-price'],
//            'data' => 'data',
//        ),
//        'order'	=> $order_value,
        'orderby' => $meta_value_num,
        'order' => $_POST['grid-price'],
//
//        'meta_query' => array(
//            array(
//                'meta_key' => 'price',
//                'field' => 'price',
//            )
//        )

    );




    // для таксономий
//    if( isset( $_POST['categoryfilter'] ))
//
//    $args['tax_query'] = array(
//        array(
//            'taxonomy' => 'category',
//            'field' => 'id',
//            'terms' => $_POST['categoryfilter']
//        )
//    );

// create $args['meta_query'] array if one of the following fields is filled
    if( isset( $_POST['min_price'] ) && $_POST['min_price']
        || isset( $_POST['max_price'] ) && $_POST['max_price']
        || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' ||
        isset( $_POST['grid-price'] ) && $_POST['grid-price']
    ){
        $args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true

    // if both minimum price and maximum price are specified we will use BETWEEN comparison
    if( isset( $_POST['min_price'] ) && $_POST['min_price'] && isset( $_POST['max_price'] ) && $_POST['max_price'] ) {
        $args['meta_query'][] = array(
//            'key' => 'price',
            'field' => 'price',
            'value' => array( $_POST['min_price'], $_POST['max_price'] ),
            'type' => 'numeric',
            'compare' => 'between'
        );
   } else {
        // if only min price is set
        if( isset( $_POST['min_price'] ) && $_POST['min_price'] )
            $args['meta_query'][] = array(
//                'key' => 'price',
                'field' => 'price',
                'value' => $_POST['min_price'],
                'type' => 'numeric',
                'compare' => '=>',
            );


        // if only max price is set
        if( isset( $_POST['max_price'] ) && $_POST['max_price'] )
            $args['meta_query'][] = array(
//                'key' => 'price',
                'field' => 'price',
                'value' => $_POST['max_price'],
                'type' => 'numeric',
                'compare' => '<=',
            );

    }
    }



//
    // условие 3: миниатюра имеется
    if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
        $args['meta_query'][] = array(
            'key' => '_thumbnail_id',
            'compare' => 'EXISTS'
        );

    // условие 4: сортировка по цене
    if( isset( $_POST['grid-price']) ) {
        $args['meta_query'][] = array(
            'field' => 'price',
            'meta_key' => 'price',
            'meta_value' => 'price',
            'type' => 'numeric',
        );
    }

    if( $_POST['stars1'] && $_POST['stars2'] && $_POST['stars3']
        && $_POST['stars4'] && $_POST['stars5'] ) {
        $args['meta_query'][] = array(
//            'key' => 'price',
            'field' => 'average_rating',
            'value' => array($_POST['stars1'], $_POST['stars2'],
                             $_POST['stars3'], $_POST['stars4'],
                             $_POST['stars5']),
            'type' => 'numeric',
            'compare' => 'between'
        );
    }

    if ( $_POST['taxonomy_item'] ) {
//        $GLOBALS["item_tax"];
//        $item_tax = [];
//        foreach ( $_POST['taxonomy_item'] as $k => $item) {
//            $item_tax[] = $item;
//        }
        $args['tax_query'][] = array(
                'relation ' => 'AND',
                array(
                    'taxonomy' => 'villa_facilities',
                    'field' => 'slug',
                    'terms' => $_POST['taxonomy_item']),
                );
//        var_dump($item_tax);
    }




    query_posts( $args );

//    echo json_encode($_POST);
//    echo '<br>';
////    var_dump($_POST['grid-price']);
//    echo '<pre>';
//    var_dump($args);
//    echo '</pre>';

    if (have_posts()) :

        while (have_posts()): the_post();
            // adapted for Twenty Seventeen theme
            ?>
            <div class="villas-item">
                <a href="<?php the_permalink(); ?>" class="link-page"></a>
                <a href="<?php the_permalink(); ?>" class="villas-item__image">
                    <?php the_post_thumbnail(); ?>
                </a>
                <?php $villa_data = get_field('villa_data'); ?>
                <div class="villas-item__info">
                    <div class="villas-item__info_col">
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title() ?></h4></a>
                        <a href="<?php echo $villa_data['addres_link'] ?>"  target="_blank" class="villas-item__address"><?php echo $villa_data['address'] ?></a>
                        <?php the_excerpt(); ?>
                        <span class="villas-item__see-m">100 m to the sea</span>
                    </div>
                    <div class="villas-item__info_col rating-price">
                        <div class="rating-group">
                            <?php echo do_shortcode('[average_rating]') ?>
<!--                            <span class="rating-group_count-villa">9.2</span>-->
<!--                            <div class="rating-group_reviews">-->
<!--                                <div class="star-block">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg"-->
<!--                                         alt="">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg"-->
<!--                                         alt="">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg"-->
<!--                                         alt="">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg"-->
<!--                                         alt="">-->
<!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg"-->
<!--                                         alt="">-->
<!--                                </div>-->
<!--                                <span class="rating-group_reviews-count">-->
<!--                                    57 reviews-->
<!--                                </span>-->
<!--                            </div>-->
                        </div>
                        <div class="villas-item__price">
                            <span class="villas-item__price-count"><?php echo $villa_data['price'] ?></span><span>$</span>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="choose-room-btn">Choose a room</a>
                    </div>

                </div>
<!--                <a class="like-btn" href="#"><img-->
<!--                        src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/blue-heart.svg"-->
<!--                        alt=""></a>-->
                <?php echo do_shortcode('[favorite_button]') ?>
            </div>

<!--        --><?php //var_dump($villa_data); ?>
        <?php endwhile;

    else: ?>
        <p>Nothing found for your criteria.</p>
        <a href="<?php basename(); ?>/villas/">At the beginning</a>
    <?php
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

        echo str_replace('wp-admin/admin-ajax.php', 'villas', $pagination); ?>

    </div>
    </div>

    <?php


//    $value = get_field_object('villa_data');


//    echo json_encode($_POST);
//    var_dump($_POST['taxonomy_item']);
wp_reset_query();

    wp_die();

}