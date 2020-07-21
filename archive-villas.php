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
                        <li class="breadcrumb-item active" aria-current="page">Villas</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="block-title-page">
                    <h1 class="main-title-page">Villas</h1>
                    <div class="filter-grid">
                        <img class="mobile-filter" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/sort.svg" alt="">

                        <form action="" method="POST">
                            <!-- <p>filter: </p>
                            <select class="filter-grid-clubs__district" name="grid-district">
                                <option value="">-District-</option>
                                <option value="south_of_bali">South of Bali</option>
                                <option value="south_west_of_bali">South-West of Bali</option>
                                <option value="west_of_bali">West of Bali</option>
                                <option value="north_of_bali">North of Bali</option>
                                <option value="east_of_bali">East of Bali</option>
                                <option value="center_of_bali">Center of Bali</option>
                            </select> -->
                            <p>sorting:</p>
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

                    <!--                        <form action="" method="POST" id="filter">-->
                    <!--                            <label><input type="radio" name="date" value="ASC" /> Дата: по возрастанию</label>-->
                    <!--                            <label><input type="radio" name="date" value="DESC" /> Дата: по убыванию</label>-->
                    <!--                            <label><input type="checkbox" name="featured_image" /> Только с миниатюрой</label>-->
                    <!--                            <button>Применить фильтр</button>-->
                    <!--                            <input type="hidden" name="action" value="myfilter">-->
                    <!--                        </form>-->



                    <!-- <div class="search-date">
                            <form action="" method="POST">
                                <div class="search-date__check-in search-date__item">
                                    <h6>Check-in</h6>
                                    <div>12.11.2019</div>
                                </div>
                                <div class="search-date__check-out search-date__item">
                                    <h6>Check-out</h6>
                                    <div>13.11.2019</div>
                                </div>
                                <div class="search-date__guests search-date__item">
                                    <h6>Check-in</h6>
                                    <div>2 Adult, 0 Child</div>
                                </div>
                                <button class="search-date__search-btn">Search</button>
                                <button class="search-date__map-btn">View on the map</button>
                            </form>
                        </div> -->

                    <?php $res = gf_get_min_max_by_type('villas', 'villa_data_price'); ?>

                    <div class="search-price">
                        <form action="" method="POST">
                            <h5>Price</h5>
                            <div class="search-price__price">
                                <div class="search-price__price-in">
                                    <span><input type="text" id="amount" name="min_price" value=<?php echo $res["min_price"] ?> readonly />
                                    </span><span>$</span>
                                </div>
                                <div class="search-price__price-out">
                                    <span><input type="text" id="amount2" name="max_price" value=<?php echo $res["max_price"] ?> readonly />
                                    </span><span>$</span>
                                </div>
                            </div>

                            <div id="slider-range"></div>
                            <div class="search-villas__overlay" style="display:none;"></div>
                        </form>
                    </div>

                    <div class="search-reviews search-filter search-villas">
                        <form action="" method="POST">
                            <h5 class="search-reviews__heading slideup-parent">Facilities</h5>
                            <?php $terms = get_terms([
                                'taxonomy' => 'villa_facilities',
                                'hide_empty' => false,
                                'get'           => 'all',
                                'childless'     => true,
                            ]); ?>
                            <ul class="search-reviews__list slideup-child">
                                <?php $i = 1; ?>
                                <?php foreach ($terms as $k => $term) : ?>
                                    <li><label>
                                            <?php echo $term->name ?>
                                            <input type="checkbox" name="taxonomy_item[]" value="<?php echo $term->slug ?>">
                                            <span class="checkmark"></span>
                                        </label></li>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </ul>
                        </form>
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>

                    <div class="search-stars search-filter search-villas">
                        <h5 class="search-stars__heading slideup-parent">Hotel Star</h5>
                        <ul class="search-stars__list slideup-child">
                            <li><label>
                                    <span class="search-filter__stars">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                    </span>
                                    <input type="checkbox" name="stars5" value="5">
                                    <span class="checkmark"></span>
                                </label></li>
                            <li><label>
                                    <span class="search-filter__stars">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                    </span>
                                    <input type="checkbox" name="stars4" value="4">
                                    <span class="checkmark"></span>
                                </label></li>
                            <li><label>
                                    <span class="search-filter__stars">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                    </span>
                                    <input type="checkbox" name="stars3" value="3">
                                    <span class="checkmark"></span>
                                </label></li>
                            <li><label>
                                    <span class="search-filter__stars">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                    </span>
                                    <input type="checkbox" name="stars2" value="2">
                                    <span class="checkmark"></span>
                                </label></li>
                            <li><label>
                                    <span class="search-filter__stars">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                    </span>
                                    <input type="checkbox" name="stars1" value="1">
                                    <span class="checkmark"></span>
                                </label></li>
                        </ul>
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>

                    <div class="search-distance search-filter search-villas">
                        <h5 class="search-reviews__heading slideup-parent">Distance to the sea</h5>
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>

                    <div class="search-lions search-filter search-villas">
                        <h5 class="search-reviews__heading slideup-parent">lions</h5>
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>

                    <div class="search-type-of-housing search-filter search-villas">
                        <h5 class="search-reviews__heading slideup-parent">Type of housing</h5>
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-villas">
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-villas">
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-villas">
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-villas">
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-villas">
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>
                    <div class="search-subdistrict search-filter search-villas">
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
                        <div class="search-villas__overlay" style="display:none;"></div>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div id="response">
                        <?php if (have_posts()) :

                            while (have_posts()) : the_post();
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
                                            <a href="<?php the_permalink(); ?>">
                                                <h4><?php the_title() ?></h4>
                                            </a>
                                            <a href="<?php echo $villa_data['addres_link'] ?>" target="_blank" class="villas-item__address"><?php echo $villa_data['address'] ?></a>
                                            <?php the_excerpt(); ?>
                                            <span class="villas-item__see-m">100 m to the sea</span>
                                        </div>
                                        <div class="villas-item__info_col rating-price">
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
                                            <a href="<?php the_permalink(); ?>" class="choose-room-btn">Choose a room</a>
                                        </div>

                                    </div>
                                    <!--                <a class="like-btn" href="#"><img-->
                                    <!--                        src="--><?php //echo get_template_directory_uri(); 
                                                                        ?>
                                    <!--/assets/img/icons/blue-heart.svg"-->
                                    <!--                        alt=""></a>-->
                                    <?php echo do_shortcode('[favorite_button]') ?>
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

                    </div>
                </div>


            </div>
            <?php
            //                <div class="row">
            //
            //
            //
            //                    <div class="pagination-block">
            //<!--                        <div class="pagination-left">-->
            //<!--                            <p>Show</p>-->
            //<!--                            <span>12</span>-->
            //<!--                            <a href="#">24</a>-->
            //<!--                            <a href="#">36</a>-->
            //<!--                        </div>-->
            //                        <div class="pagination-right">
            //                            <?php
            //
            //                            $args = array(
            //                                'show_all'     => false, // показаны все страницы участвующие в пагинации
            //                                'end_size'     => 1,     // количество страниц на концах
            //                                'mid_size'     => 1,     // количество страниц вокруг текущей
            //                                'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
            //                                'prev_text'    => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-left.svg" alt="">',
            //                                'next_text'    => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-right.svg" alt="">',
            //                                'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
            //                                'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
            //
            //                            );
            //
            //                            the_posts_pagination($args);
            //
            //
            //                        </div>

            ?>

        </div>

    </div>
    </div>
    </div>
</main>



<?php get_footer(); ?>