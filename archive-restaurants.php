<?php

get_header('secondary');

?>

    <main class="main-content">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Restaurants</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="block-title-page">
                        <h1 class="main-title-page">Restaurants</h1>
                        <div class="filter-grid-restaurants">
                            <img class="mobile-filter" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/sort.svg" alt="">
                            <p>sorting:</p>
                            <form action="" method="POST">
                                <!--                                <label class="filter-grid__active">rating-->
                                <!--                                    <input type="checkbox" name="rating_sort">-->
                                <!--                                </label>-->
                                <select class="filter-grid-restaurants__date" name="grid-date">
                                    <option value="">rating</option>
                                    <option value="ASC">low</option>
                                    <option value="DESC">high</option>
                                </select>
<!--                                <select class="filter-grid-restaurants__price" name="grid-price">-->
<!--                                    <option value="night">night</option>-->
<!--                                    <option value="day">day</option>-->
<!--                                </select>-->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row villas-grid">

                    <div class="col-lg-3 search-villas" id="search-villas">

                        <div class="search-distance search-filter">
                            <form action="">
                                <h5 class="search-reviews__heading slideup-parent">Kitchen</h5>
                                <?php $terms = get_terms( [
                                    'taxonomy' => 'restaurant_kitchen',
                                    'hide_empty' => false,
                                    'get'           => 'all',
                                    'childless'     => true,
                                ] ); ?>
                                <ul class="search-reviews__list slideup-child">
                                    <?php $i = 1; ?>
                                    <?php foreach ($terms as $k => $term): ?>
                                        <li><label>
                                                <?php echo $term->name ?>
                                                <input type="checkbox" name="taxonomy_item[]" value="<?php echo $term->slug ?>">
                                                <span class="checkmark"></span>
                                            </label></li>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </ul>
                            </form>
                        </div>

                        <div class="search-lions search-filter">
                            <h5 class="search-reviews__heading slideup-parent">Review Score</h5>
                            <ul class="search-reviews__list slideup-child">
                                <li><label>
                                        Excellent
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li><label>
                                        Very good
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li><label>
                                        Average
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li><label>
                                        Poor
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li><label>
                                        Terrible
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                            </ul>
                        </div>

<!--                        <div class="search-type-of-housing search-filter">-->
<!--                            <h5 class="search-reviews__heading slideup-parent">Kitchen</h5>-->
<!--                            <ul class="search-reviews__list slideup-child">-->
<!--                                <li><label>-->
<!--                                        European-->
<!--                                        <input type="checkbox">-->
<!--                                        <span class="checkmark"></span>-->
<!--                                    </label></li>-->
<!--                                <li><label>-->
<!--                                        Japanese-->
<!--                                        <input type="checkbox">-->
<!--                                        <span class="checkmark"></span>-->
<!--                                    </label></li>-->
<!--                                <li><label>-->
<!--                                        Chinese-->
<!--                                        <input type="checkbox">-->
<!--                                        <span class="checkmark"></span>-->
<!--                                    </label></li>-->
<!--                                <li><label>-->
<!--                                        Russian-->
<!--                                        <input type="checkbox">-->
<!--                                        <span class="checkmark"></span>-->
<!--                                    </label></li>-->
<!--                                <li><label>-->
<!--                                        American-->
<!--                                        <input type="checkbox">-->
<!--                                        <span class="checkmark"></span>-->
<!--                                    </label></li>-->
<!--                            </ul>-->
<!--                        </div>-->

                    </div>

                    <div class="col-lg-9">
                        <div class="row" id="response-restaurants">

                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
<!--                                                <span>9.2</span>-->
<!--                                                <div class="star-block">-->
<!--                                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
<!--                                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
<!--                                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
<!--                                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                                                </div>-->
                                            </div>
                                        </div>
<!--                                        <a class="like-btn" href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/blue-heart.svg" alt=""></a>-->
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

                        </div>


                    </div>


                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </main>



<?php
get_footer();
