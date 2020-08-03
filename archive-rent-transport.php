<?php

get_header('secondary');

?>

<main class="main-content rent-transport">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rent Transport</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="block-title-page">
                    <h1 class="main-title-page">Rent Transport</h1>
                    <div class="filter-grid">
                        <img class="mobile-filter" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/sort.svg" alt="">
                        <p>sorting:</p>
                        <form action="" method="POST">
                            <label class="filter-grid__active">rating
                                <input type="checkbox" name="rating_sort">
                            </label>
                            <select class="filter-grid__price" name="grid-price">
                                <option value="">price</option>
                                <option value="ASC">low</option>
                                <option value="DESC">high</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row villas-grid">
                <div class="col-lg-3 search-villas" id="search-villas">
                    <?php $res = gf_get_min_max_by_type('rent-transport', 'rent_transport_data_price'); ?>
                    <div class="search-price search-price__transport ">
                        <form action="" method="POST">
                            <h5>Price</h5>
                            <div class="search-price__price">
                                <div class="search-price__price-in">
                                    <span><input type="text" id="amount" name="min_price" value="<?php echo $res["min_price"] ?>" readonly />
                                    </span><span>$</span>
                                </div>
                                <div class="search-price__price-out">
                                    <span><input type="text" id="amount2" name="max_price" value="<?php echo $res["max_price"] ?>" readonly />
                                    </span><span>$</span>
                                </div>
                            </div>

                            <div id="slider-range-rent-transport"></div>
                        </form>
                    </div>
                    
                    <div class="search-car search-filter search-transport">
                        <form>
                            <h5 class="search-reviews__heading slideup-parent">Car</h5>
                            <ul class="search-reviews__list slideup-child">
                                <li>
                                    <div class="search-car-body">
                                        <h5 class="search-reviews__heading slideup-parent">Body</h5>
                                        <ul class="search-reviews__list slideup-child">
                                            <?php
                                            $car_body_terms = get_terms([
                                                'taxonomy' => 'car_body',
                                                'hide_empty' => false,
                                                // 'childless'     => false,
                                            ]);

                                            foreach ($car_body_terms as $term) { ?>
                                                <li><label>
                                                        <?= $term->name ?>
                                                        <input type="checkbox" value="<?= $term->slug ?>">
                                                        <span class="checkmark"></span>
                                                    </label></li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="search-car-transmission">
                                        <h5 class="search-reviews__heading slideup-parent">Transmission</h5>
                                        <ul class="search-reviews__list slideup-child">
                                            <?php
                                            $car_transmission_terms = get_terms([
                                                'taxonomy' => 'car_transmission',
                                                'hide_empty' => false,
                                                // 'childless'     => false,
                                            ]);

                                            foreach ($car_transmission_terms as $term) { ?>
                                                <li><label>
                                                        <?= $term->name ?>
                                                        <input type="checkbox" value="<?= $term->slug ?>">
                                                        <span class="checkmark"></span>
                                                    </label></li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="search-car-seats">
                                        <h5 class="search-reviews__heading slideup-parent">Seats</h5>
                                        <ul class="search-reviews__list slideup-child">
                                            <?php
                                            $car_seats_terms = get_terms([
                                                'taxonomy' => 'car_seats',
                                                'hide_empty' => false,
                                                // 'childless'     => false,
                                            ]);

                                            foreach ($car_seats_terms as $term) { ?>
                                                <li><label>
                                                        <?= $term->name ?>
                                                        <input type="checkbox" value="<?= $term->slug ?>">
                                                        <span class="checkmark"></span>
                                                    </label></li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </form>
                        <div class="search-transport__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-motorcycle search-filter search-transport">
                        <form>
                            <h5 class="search-reviews__heading slideup-parent">Motorcycle</h5>
                            <ul class="search-reviews__list slideup-child">
                                <li>
                                    <div class="search-motorcycle-type">
                                        <h5 class="search-reviews__heading slideup-parent">Type</h5>
                                        <ul class="search-reviews__list slideup-child">
                                            <?php
                                            $motorcycle_type = get_terms([
                                                'taxonomy' => 'motorcycle_type',
                                                'hide_empty' => false,
                                                // 'childless'     => false,
                                            ]);

                                            foreach ($motorcycle_type as $term) { ?>
                                                <li><label>
                                                        <?= $term->name ?>
                                                        <input type="checkbox" value="<?= $term->slug ?>">
                                                        <span class="checkmark"></span>
                                                    </label></li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </form>
                        <div class="search-transport__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-transport">
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
                        <div class="search-transport__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-transport">
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
                        <div class="search-transport__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-transport">
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
                        <div class="search-transport__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-transport">
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
                        <div class="search-transport__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-transport">
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
                        <div class="search-transport__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-transport">
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
                        <div class="search-transport__overlay" style="display:none;"></div>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div id="response-rent-transport">
                        <?php if (have_posts()) :

                            while (have_posts()) : the_post();
                                // adapted for Twenty Seventeen theme
                        ?>
                                <div class="rent-transport-item">
                                    <a href="<?php the_permalink(); ?>" class="link-page"></a>
                                    <a href="<?php the_permalink(); ?>" class="villas-item__image rent-transport__image">
                                        <?php the_post_thumbnail(array(274, 190)); ?>
                                    </a>
                                    <?php $villa_data = get_field('rent_transport_data'); ?>
                                    <div class="villas-item__info rent-transport__info">
                                        <div class="rent-transport-item__info_col rent-transport-item__info_col-left">
                                            <a href="<?php the_permalink(); ?>">
                                                <h4><?php the_title() ?></h4>
                                            </a>
                                            <a href="<?php echo $villa_data['addres_link'] ?>" target="_blank" class="villas-item__address"><?php echo $villa_data['address'] ?></a>
                                            <?php //the_excerpt(); 
                                            ?>
                                            <!-- <span class="villas-item__see-m">100 m to the sea</span> -->
                                            <?php
                                            // $post = get_post();
                                            $rent_transport_terms = get_terms([
                                                'taxonomy' => 'rent_transport_facilities',
                                                'hide_empty' => false,
                                                'get'           => 'all',
                                                'childless'     => true,
                                                'object_ids' => get_the_ID(),
                                            ]);
                                            ?>
                                            <div class="rent-transport-item__facilities">
                                                <ul class="rent-transport-item__facilities-list">
                                                    <?php
                                                    foreach ($rent_transport_terms as $k => $term) {
                                                        if ($k < 3) {
                                                            echo '<li>' . $term->name . '</li>';
                                                        } else {
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                                <ul class="rent-transport-item__facilities-list">
                                                    <?php
                                                    foreach ($rent_transport_terms as $k => $term) {
                                                        if ($k >= 3 && $k < 6) {
                                                            echo '<li>' . $term->name . '</li>';
                                                        } else {
                                                            continue;
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="rent-transport-item__info_col rating-price">
                                            <?php echo do_shortcode('[favorite_button]') ?>
                                            <div class="rating-group">
                                                <?php echo do_shortcode('[average_rating]') ?>
                                                <!--                            <span class="rating-group_count-villa">9.2</span>-->
                                                <!--                            <div class="rating-group_reviews">-->
                                                <!--                                <div class="star-block">-->
                                                <!--                                    <img src="--><?php //echo get_template_directory_uri(); 
                                                                                                        ?>
                                                <!--/assets/img/icons/star-full.svg"-->
                                                <!--                                         alt="">-->
                                                <!--                                    <img src="--><?php //echo get_template_directory_uri(); 
                                                                                                        ?>
                                                <!--/assets/img/icons/star-full.svg"-->
                                                <!--                                         alt="">-->
                                                <!--                                    <img src="--><?php //echo get_template_directory_uri(); 
                                                                                                        ?>
                                                <!--/assets/img/icons/star-full.svg"-->
                                                <!--                                         alt="">-->
                                                <!--                                    <img src="--><?php //echo get_template_directory_uri(); 
                                                                                                        ?>
                                                <!--/assets/img/icons/star-empty.svg"-->
                                                <!--                                         alt="">-->
                                                <!--                                    <img src="--><?php //echo get_template_directory_uri(); 
                                                                                                        ?>
                                                <!--/assets/img/icons/star-empty.svg"-->
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
                                            <a href="<?php the_permalink(); ?>" class="choose-room-btn">Book now</a>
                                        </div>

                                    </div>
                                    <!--                <a class="like-btn" href="#"><img-->
                                    <!--                        src="--><?php //echo get_template_directory_uri(); 
                                                                        ?>
                                    <!--/assets/img/icons/blue-heart.svg"-->
                                    <!--                        alt=""></a>-->

                                </div>

                                <!--        --><?php //var_dump($villa_data); 
                                                ?>
                            <?php endwhile;

                        else : ?>
                            <p>Nothing found for your criteria.</p>
                            <a href="<?php basename(); ?>/villas/">At the beginning</a>
                        <?php
                        endif;

                        ?>




                        <?php
                        //                <div class="row">
                        //
                        //
                        //
                        //    <div class="pagination-block">
                        //<!--                        <div class="pagination-left">-->
                        //<!--                            <p>Show</p>-->
                        //<!--                            <span>12</span>-->
                        //<!--                            <a href="#">24</a>-->
                        //<!--                            <a href="#">36</a>-->
                        //<!--                        </div>--> 
                        ?>
                        <div class="pagination-right">
                            <?php

                            $args = array(
                                'show_all'     => false, // показаны все страницы участвующие в пагинации
                                'end_size'     => 1,     // количество страниц на концах
                                'mid_size'     => 1,     // количество страниц вокруг текущей
                                'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                                'prev_text'    => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-left.svg" alt="">',
                                'next_text'    => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-right.svg" alt="">',
                                'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                                'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.

                            );

                            the_posts_pagination($args);
                            ?>

                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</main>



<?php get_footer(); ?>