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
                            <li class="breadcrumb-item active" aria-current="page">Tours</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="block-title-page">
                        <h1 class="main-title-page">Tours</h1>
<!--                        <div class="filter-grid">-->
<!--                            -->
<!--                            <p>sorting:</p>-->
<!--                            <ul>-->
<!--                                <li class="filter-grid__active">rating</li>-->
<!--                                <li>around the area</li>-->
<!--                            </ul>-->
<!--                        </div>-->

                        <form class="tours-form" name="average-rating">
                            <p>filter: </p>
                            
                            <select class="filter-grid-tours__average-rating" name="average-rating">
                                    <option value="">-Average rating-</option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Terrible</option>
                                    
                            </select>
                            <img class="mobile-filter" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/sort.svg" alt="">
                        </form>
                    </div>
                </div>
                
                <div class="row villas-grid">

                    <div class="col-lg-3 search-villas" id="search-villas">

                        <!-- <div class="search-date">
                            <form action="">
                                <div class="search-date__check-in search-date__item">
                                    <h6>Departure date</h6>
                                    <div>12.11.2019</div>
                                </div>
                                <div class="search-date__check-out search-date__item">
                                    <h6>Arrival date</h6>
                                    <div>13.11.2019</div>
                                </div>
                                <button class="search-date__search-btn">Search</button>
                            </form>
                        </div> -->

                        <div class="search-type-of-housing search-filter search-tours">
                            <h5 class="search-reviews__heading slideup-parent">Type of tour</h5>
                            <ul class="search-reviews__list slideup-child">
                                <li><label>
                                        Restaurant
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li><label>
                                        Bistro
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li><label>
                                        Dessert
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li><label>
                                        Coffe
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                                <li><label>
                                        Fast-food
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label></li>
                            </ul>
                        </div>
                        <div class="search-subdistrict search-filter search-tours">
                        <form>
                            <h5 class="search-reviews__heading slideup-parent">South of Bali</h5>
                            <ul class="search-reviews__list slideup-child">
                                <?php
                                $south_terms = get_terms([
                                    'taxonomy' => 'south_of_bali',
                                    'hide_empty' => false,
                                    // 'childless'     => false,
                                ]);

                                foreach ($south_terms as $term) { ?>
                                    <li><label>
                                            <?= $term->name ?>
                                            <input type="checkbox" value="<?= $term->slug ?>">
                                            <span class="checkmark"></span>
                                        </label></li>
                                <?php }
                                ?>
                            </ul>
                        </form>
                        <div class="search-tours__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-tours">
                        <form>
                            <h5 class="search-reviews__heading slideup-parent">South-West of Bali</h5>
                            <ul class="search-reviews__list slideup-child">
                                <?php
                                $south_terms = get_terms([
                                    'taxonomy' => 'south_west_of_bali',
                                    'hide_empty' => false,
                                    // 'childless'     => false,
                                ]);

                                foreach ($south_terms as $term) { ?>
                                    <li><label>
                                            <?= $term->name ?>
                                            <input type="checkbox" value="<?= $term->slug ?>">
                                            <span class="checkmark"></span>
                                        </label></li>
                                <?php }
                                ?>
                            </ul>
                        </form>
                        <div class="search-tours__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-tours">
                        <form>
                            <h5 class="search-reviews__heading slideup-parent">West of Bali</h5>
                            <ul class="search-reviews__list slideup-child">
                                <?php
                                $south_terms = get_terms([
                                    'taxonomy' => 'west_of_bali',
                                    'hide_empty' => false,
                                    // 'childless'     => false,
                                ]);

                                foreach ($south_terms as $term) { ?>
                                    <li><label>
                                            <?= $term->name ?>
                                            <input type="checkbox" value="<?= $term->slug ?>">
                                            <span class="checkmark"></span>
                                        </label></li>
                                <?php }
                                ?>
                            </ul>
                        </form>
                        <div class="search-tours__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-tours">
                        <form>
                            <h5 class="search-reviews__heading slideup-parent">North of Bali</h5>
                            <ul class="search-reviews__list slideup-child">
                                <?php
                                $south_terms = get_terms([
                                    'taxonomy' => 'north_of_bali',
                                    'hide_empty' => false,
                                    // 'childless'     => false,
                                ]);

                                foreach ($south_terms as $term) { ?>
                                    <li><label>
                                            <?= $term->name ?>
                                            <input type="checkbox" value="<?= $term->slug ?>">
                                            <span class="checkmark"></span>
                                        </label></li>
                                <?php }
                                ?>
                            </ul>
                        </form>
                        <div class="search-tours__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-tours">
                        <form>
                            <h5 class="search-reviews__heading slideup-parent">East of Bali</h5>
                            <ul class="search-reviews__list slideup-child">
                                <?php
                                $south_terms = get_terms([
                                    'taxonomy' => 'east_of_bali',
                                    'hide_empty' => false,
                                    // 'childless'     => false,
                                ]);

                                foreach ($south_terms as $term) { ?>
                                    <li><label>
                                            <?= $term->name ?>
                                            <input type="checkbox" value="<?= $term->slug ?>">
                                            <span class="checkmark"></span>
                                        </label></li>
                                <?php }
                                ?>
                            </ul>
                        </form>
                        <div class="search-tours__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-tours">
                        <form>
                            <h5 class="search-reviews__heading slideup-parent">Center of Bali</h5>
                            <ul class="search-reviews__list slideup-child">
                                <?php
                                $south_terms = get_terms([
                                    'taxonomy' => 'center_of_bali',
                                    'hide_empty' => false,
                                    // 'childless'     => false,
                                ]);

                                foreach ($south_terms as $term) { ?>
                                    <li><label>
                                            <?= $term->name ?>
                                            <input type="checkbox" value="<?= $term->slug ?>">
                                            <span class="checkmark"></span>
                                        </label></li>
                                <?php }
                                ?>
                            </ul>
                        </form>
                        <div class="search-tours__overlay" style="display:none;"></div>
                    </div>

                    </div>

                    <div class="col-lg-9">
                        <div class="row" id="response-tours">

                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <!-- post -->
                                <?php $tours = get_field('tours'); ?>
                                <div class="col-lg-4 col-sm-6 d-flex justify-content-center">
                                    <div class="restaurants-preview__item">
                                        <a href="<?php the_permalink(); ?>" class="restaurants-preview__item_image">
                                            <?php the_post_thumbnail(); ?>
                                        </a>

                                        <div class="restaurants-preview__item_content">
                                            <a href="<?php the_permalink(); ?>">
                                                <h5><?php the_title(); ?></h5>
                                            </a>
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
                                            <div class="price-in-grid">
                                                <span><?php echo esc_html( $tours['price'] ); ?></span>
                                                <span>$</span>
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

                                    echo str_replace('wp-admin/admin-ajax.php', 'tours', $pagination); ?>

                                </div>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </main>



<?php
get_footer();
