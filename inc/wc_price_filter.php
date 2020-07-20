<?php
add_action('wp_enqueue_scripts', 'new_filters');
function new_filters()
{
    global $wp_query;

    wp_register_script('new_filters', get_template_directory_uri() . '/assets/js/new_filters.js', array('jquery'), '', true);

    wp_localize_script('new_filters', 'ajax_new_filters', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
        'posts' => json_encode($wp_query->query_vars),
    ));
    wp_enqueue_script('new_filters');
}


// Приём и обработка запроса
add_action('wp_ajax_price_filter_wc', 'price_filter_wc');
add_action('wp_ajax_nopriv_price_filter_wc', 'price_filter_wc');

function price_filter_wc()
{
    /* 
        Если сортировка по дате - $sort_param = date, $meta_key = '';
        Если сортировка по цене - $sort_param = meta_value_num, $meta_key = '_price';
    */
    $sort_param = $_POST['orderby'] == 'date' ? 'date' : 'meta_value_num';
    $meta_key = $sort_param == 'meta_value_num' ? '_price' : '';

    $link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;
    $paged = $link ? wp_basename($link) : false;

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $_POST['perPage'],
        'order' => $_POST['order'],
        'orderby' => $sort_param,
        'meta_key' => $meta_key,
        'paged' => $paged,
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => 'product_cat',
                'terms'    => $_POST['cat'],
            ],
        ]
    );

    if ($_POST['attrs']) {
        $attrs = [];
        foreach ($_POST['attrs'] as $elem) {
            $attrs[] = [
                'taxonomy' => 'product_attributes',
                'field' => 'name',
                'terms'    => $elem,
                'operator' => 'IN'
            ];
        }

        $args['tax_query'][] = [
            'relation' => 'AND',
        ];

        $args['tax_query'][1][0] = $attrs;
    }


    $args['meta_query'] = array(
        'relation' => 'AND'
    );

    $args['meta_query'][] = array(
        'key' => '_price',
        'value' => $_POST['min'],
        'compare' => '>=',
        'type' => 'NUMERIC'
    );
    $args['meta_query'][] = array(
        'key' => '_price',
        'value' => $_POST['max'],
        'compare' => '<=',
        'type' => 'NUMERIC'
    );

    // echo'<pre>';
    // var_dump($args);
    // echo'</pre>';

    query_posts($args);

    if (have_posts()) {
?>
        <ul class="row products columns-3">
            <?php
            while (have_posts()) {
                the_post();
                wc_get_template_part('content', 'product');
            }
            ?>
        </ul>
        <div class="products-pagination__block">
            <div class="pagination-left products-pagination">
                <form action="" method="POST">
                    <p>Show</p>
                    <label class="<?php echo $_POST['perPage'] == 10 ? 'active' : null; ?>">10
                        <input type="radio" id="page10" name="count_page" value="10"></label>
                    <label class="<?php echo $_POST['perPage'] == 20 ? 'active' : null; ?>">20
                        <input type="radio" id="page20" name="count_page" value="20"></label>
                    <label class="<?php echo $_POST['perPage'] == 30 ? 'active' : null; ?>">30
                        <input type="radio" id="page30" name="count_page" value="30"></label>
                </form>
            </div>
            <div class="pagination-right products-pagination">
                <?php $args_pag = array(
                    'show_all' => false, // показаны все страницы участвующие в пагинации
                    'end_size' => 1,     // количество страниц на концах
                    'mid_size' => 1,     // количество страниц вокруг текущей
                    'prev_next' => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-left.svg" alt="">',
                    'next_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-right.svg" alt="">',
                    'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                    'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.

                );

                $pagination = get_the_posts_pagination($args_pag);

                echo str_replace('wp-admin/admin-ajax.php', 'product-category/all-products', $pagination); ?>

            </div>
        </div>
    <?php

    } else { ?>
        <p>Nothing found for your criteria.</p>
<?php
    }
    // echo '<pre>';
    // var_dump($args);
    // echo '</pre>';

    wp_die();
}
?>