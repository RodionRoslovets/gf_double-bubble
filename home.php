<?php

/**
 * Template Name: Main
 * Template Post Type: post, page
 */

// esc_html_e

get_header(); ?>
<section class="main-banner desktop-visible" style="background: url('<?php the_field('image_desktop'); ?>') 0 0 no-repeat; background-size: cover;">
    <p class="double-string">Double bubble</p>
    <h2>Bali</h2>
    <div class="bottom-row">
        <div class="bottom-row-list">
            <?php // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts' => 20,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'DESC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'events',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <?php $event = get_field('event'); ?>
                <div><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span><?php echo esc_html($event['date']); ?></span></a></div>
            <?php
            }

            wp_reset_postdata(); // сброс 
            ?>
            <!--                <li><a href="/event/we-are-the-night-3/">Chemical brothers<span>16th Aug</span></a></li>-->
            <!--                <li><a href="#">Skyline Sound<span>24th Aug</span></a></li>-->
            <!--                <li><a href="#">Lorem Ipsum Night Pa ...<span>25th Aug</span></a></li>-->
            <!--                <li><a href="#">Chemical brothers<span>16th Aug</span></a></li>-->
            <!--                <li><a href="#">Skyline Sound<span>24th Aug</span></a></li>-->
            <!--                <li><a href="#">Night Party<span>25th Aug</span></a></li>-->
        </div>
        <a class="btn-down" href="#events">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow_down.svg" alt="">
        </a>
    </div>
</section>

<section class="main-banner mobile-visible" style="background: url('<?php the_field('image_mobile'); ?>') center no-repeat; background-size: cover;">
    <p class="double-string">Double bubble</p>
    <h2>Bali</h2>
    <div class="bottom-row">
        <div class="bottom-row-list">
            <?php // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts' => 20,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'DESC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'events',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <?php $event = get_field('event'); ?>
                <div><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span><?php echo esc_html($event['date']); ?></span></a></div>
            <?php
            }

            wp_reset_postdata(); // сброс 
            ?>
            <!--                <li><a href="/event/we-are-the-night-3/">Chemical brothers<span>16th Aug</span></a></li>-->
            <!--                <li><a href="#">Skyline Sound<span>24th Aug</span></a></li>-->
            <!--                <li><a href="#">Lorem Ipsum Night Pa ...<span>25th Aug</span></a></li>-->
            <!--                <li><a href="#">Chemical brothers<span>16th Aug</span></a></li>-->
            <!--                <li><a href="#">Skyline Sound<span>24th Aug</span></a></li>-->
            <!--                <li><a href="#">Night Party<span>25th Aug</span></a></li>-->
        </div>
        <a class="btn-down" href="#events">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow_down.svg" alt="">
        </a>
    </div>
</section>
<section class="events" id="events">

    <div class="wrapper">
        <div class="block-title">
            <h2>Events</h2>
            <hr />
            <a href="/events">all events</a>
        </div>
    </div>

    <div class="block-row">
        <div class="navigation-row">
            <div class="arrow-block">
                <a href="#" class="arrow-right-btn arrow-circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right-bnt.svg" alt="">
                </a>
                <a href="#" class="arrow-left-btn arrow-circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-left-btn.svg" alt="">
                </a>
            </div>
            <div class="count-block">
                <p><span class="count-block__current">03</span><span class="count-block__all">/03</span></p>
            </div>
        </div>

        <div class="events-slider">

            <?php // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts' => 20,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'DESC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'events',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>

                <div>
                    <div class="slider-events-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(array(275, 412)); ?>
                        </a>
                        <!--                            <a class="like-btn" href="#"><img-->
                        <!--                                        src="--><?php //echo get_template_directory_uri(); 
                                                                            ?>
                        <!--/assets/img/icons/blue-heart.svg"-->
                        <!--                                        alt=""></a>-->
                        <?php echo do_shortcode('[favorite_button]') ?>
                        <?php $event = get_field('event');
                        if ($event["date"]) : ?>
                            <div class="date-label">
                                <span class="date-label-red"><?php echo $event["date"]; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php
            }

            wp_reset_postdata(); // сброс 
            ?>


        </div>

    </div>

</section>
<section class="villas">

    <div class="wrapper">
        <div class="block-title">
            <h2>Villas</h2>
            <hr />
            <a href="/villas">all villas</a>
        </div>
    </div>

    <div class="villas-block-row">
        <div class="navigation-row dark-bg">
            <div class="arrow-block">
                <a href="#" class="villas-arrow-right-btn arrow-circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right-bnt-white.svg" alt="">
                </a>
                <a href="#" class="villas-arrow-left-btn arrow-circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-left-btn-white.svg" alt="">
                </a>
            </div>
            <div class="count-block">
                <p><span class="count-block__current">03</span><span class="count-block__all">/03</span></p>
            </div>
        </div>

        <div class="villas-slider-main">

            <?php // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts' => 15,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'DESC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'villas',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>

                <?php $villa_data = get_field('villa_data'); ?>

                <div class="slider-villas-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <h4><?php the_title(); ?></h4>
                    <?php the_excerpt(); ?>
                    <div class="bottom-slide-villas">
                        <div class="rating-villas">
                            <?php echo do_shortcode('[average_rating]') ?>
                            <!--                                    <span>9.2</span>-->
                            <!--                                    <div class="star-block">-->
                            <!--                                        <img src="--><?php //echo get_template_directory_uri(); 
                                                                                        ?>
                            <!--/assets/img/icons/star-full.svg" alt="">-->
                            <!--                                        <img src="--><?php //echo get_template_directory_uri(); 
                                                                                        ?>
                            <!--/assets/img/icons/star-full.svg" alt="">-->
                            <!--                                        <img src="--><?php //echo get_template_directory_uri(); 
                                                                                        ?>
                            <!--/assets/img/icons/star-full.svg" alt="">-->
                            <!--                                        <img src="--><?php //echo get_template_directory_uri(); 
                                                                                        ?>
                            <!--/assets/img/icons/star-empty.svg" alt="">-->
                            <!--                                        <img src="--><?php //echo get_template_directory_uri(); 
                                                                                        ?>
                            <!--/assets/img/icons/star-empty.svg" alt="">-->
                            <!--                                    </div>-->
                        </div>
                        <div class="price-villas">
                            <?php echo $villa_data['price'] ?> <span>&#36;</span>
                        </div>
                    </div>
                    <!--                            <a class="like-btn" href="#"><img-->
                    <!--                                    src="--><?php //echo get_template_directory_uri(); 
                                                                    ?>
                    <!--/assets/img/icons/blue-heart.svg"-->
                    <!--                                    alt=""></a>-->
                    <?php echo do_shortcode('[favorite_button]') ?>
                </div>


            <?php
            }

            wp_reset_postdata(); // сброс 
            ?>








        </div>

    </div>

</section>

<section class="clubs">
    <div class="wrapper">
        <div class="block-title">
            <h2>Clubs</h2>
            <hr />
            <a href="/clubs">all clubs</a>
        </div>
    </div>

    <div class="clubs-block-row">
        <div class="clubs-slider-main">



            <?php // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts' => 20,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'DESC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'clubs',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <div>
                    <div class="slider-villas-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                        <div class="bottom-slide-villas">
                            <div class="rating-villas">
                                <?php echo do_shortcode('[average_rating]') ?>
                            </div>
                            <div class="price-villas">

                            </div>
                        </div>
                        <?php echo do_shortcode('[favorite_button]') ?>
                    </div>
                </div>

            <?php
            }

            wp_reset_postdata(); // сброс 
            ?>

        </div>


        <div class="navigation-row red-bg">
            <div class="count-block">
                <p><span class="count-block__current">03</span><span class="count-block__all">/03</span></p>
            </div>
            <div class="arrow-block">
                <a href="#" class="arrow-right-btn-clubs arrow-circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right-bnt-white.svg" alt="">
                </a>
                <a href="#" class="arrow-left-btn-clubs arrow-circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-left-btn-white.svg" alt="">
                </a>

            </div>
        </div>

    </div>
</section>


<section class="restaurants">
    <div class="wrapper">
        <div class="block-title">
            <h2>Restaurants</h2>
            <hr />
            <a href="/restaurants">all restaurants</a>
        </div>
    </div>

    <div class="restaurants-block-row">
        <div class="restaurants-slider-main">



            <?php // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts' => 20,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'DESC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'restaurants',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
                <div>
                    <div class="slider-villas-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                        <div class="bottom-slide-villas">
                            <div class="rating-villas">
                                <?php echo do_shortcode('[average_rating]') ?>
                            </div>
                            <div class="price-villas">

                            </div>
                        </div>
                        <?php echo do_shortcode('[favorite_button]') ?>
                    </div>
                </div>

            <?php
            }

            wp_reset_postdata(); // сброс 
            ?>

        </div>


        <div class="navigation-row red-bg" style="background:#FFD600">
            <div class="count-block">
                <p><span class="count-block__current">03</span><span class="count-block__all">/03</span></p>
            </div>
            <div class="arrow-block">
                <a href="#" class="arrow-right-btn-restaurants arrow-circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right-bnt-white.svg" alt="">
                </a>
                <a href="#" class="arrow-left-btn-restaurants arrow-circle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-left-btn-white.svg" alt="">
                </a>

            </div>
        </div>

    </div>
</section>



<section class="tours">
    <div class="wrapper">
        <div class="block-title">
            <h2>Tours</h2>
            <hr />
            <a href="/tours/">all tours</a>
        </div>
    </div>

    <!-- <div class="clubs-block-row"> -->
    <div class="tours-slider-main">

        <?php // параметры по умолчанию
        $posts = get_posts(array(
            'numberposts' => 5,
            'category' => 0,
            'orderby' => 'date',
            'order' => 'DESC',
            'include' => array(),
            'exclude' => array(),
            'meta_key' => '',
            'meta_value' => '',
            'post_type' => 'tours',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ));

        foreach ($posts as $post) {
            setup_postdata($post);
        ?>
            <div>
                <div class="slider-villas-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <h4><?php the_title(); ?></h4>
                    <?php the_excerpt(); ?>
                    <div class="bottom-slide-villas">
                        <div class="rating-villas">
                            <?php echo do_shortcode('[average_rating]') ?>
                        </div>
                        <div class="price-villas">

                        </div>
                    </div>
                    <?php echo do_shortcode('[favorite_button]') ?>
                </div>
            </div>
        <?php
        }
        wp_reset_postdata(); // сброс 
        ?>
    </div>

    <div class="navigation-row blue-bg">
        <div class="count-block">
            <p><span class="count-block__current">03</span><span class="count-block__all">/03</span></p>
        </div>
        <div class="arrow-block">
            <a href="#" class="arrow-right-btn-tours arrow-circle">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right-bnt-white.svg" alt="">
            </a>
            <a href="#" class="arrow-left-btn-tours arrow-circle">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-left-btn-white.svg" alt="">
            </a>
        </div>
    </div>
    <!-- </div> -->
</section>

<section class="rent-car">

    <div class="wrapper">
        <div class="block-title">
            <h2>Rent transport</h2>
            <hr />
            <a href="/rent-transport">all transport</a>
        </div>
    </div>

    <div class="wrapper">
        <div class="rent-car-slider-row">
            <div class="filtering">

                <?php
                $posts = get_posts(array(
                    'numberposts' => 20,
                    'category' => 0,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'include' => array(),
                    'exclude' => array(),
                    'meta_key' => '',
                    'meta_value' => '',
                    'post_type' => 'rent-transport',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ));

                foreach ($posts as $post) {
                    setup_postdata($post);
                    $rent_transport_data = get_field('rent_transport_data');
                ?>

                    <div>
                        <div class="rent-car-slider-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(array(231, 107)); ?>
                            </a>
                            <p><?php the_title(); ?></p>

                            <p class="price-rent-car"><?php echo $rent_transport_data["price"] ?> <span>&#36;</span><span class="sub-price-rent-car">per day</span></p>
                            <?php echo do_shortcode('[favorite_button]') ?>
                        </div>
                    </div>

                <?php
                }
                wp_reset_postdata(); // сброс 
                ?>

                <!-- <div>
                        <div class="rent-car-slider-item">
                            <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/cars/1.png" alt="">
                            <p>Nissan Almera (2013)</p>
                            <p class="price-rent-car">100 <span>&#36;</span><span
                                        class="sub-price-rent-car">per day</span></p>
                            <a class="like-btn" href="#"><img
                                        src="<?php //echo get_template_directory_uri(); 
                                                ?>/assets/img/icons/blue-heart.svg"
                                        alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="rent-car-slider-item">
                            <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/cars/2.png" alt="">
                            <p>Mazda 2 (M/T, 2012)</p>
                            <p class="price-rent-car">90 <span>&#36;</span><span
                                        class="sub-price-rent-car">per day</span></p>
                            <a class="like-btn" href="#"><img
                                        src="<?php //echo get_template_directory_uri(); 
                                                ?>/assets/img/icons/blue-heart.svg"
                                        alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="rent-car-slider-item">
                            <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/cars/3.png" alt="">
                            <p>Mitsubishi Mirage (2014)</p>
                            <p class="price-rent-car">90 <span>&#36;</span><span
                                        class="sub-price-rent-car">per day</span></p>
                            <a class="like-btn" href="#"><img
                                        src="<?php //echo get_template_directory_uri(); 
                                                ?>/assets/img/icons/blue-heart.svg"
                                        alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="rent-car-slider-item">
                            <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/cars/4.png" alt="">
                            <p>Toyota Yaris (2014)</p>
                            <p class="price-rent-car">90 <span>&#36;</span><span
                                        class="sub-price-rent-car">per day</span></p>
                            <a class="like-btn" href="#"><img
                                        src="<?php //echo get_template_directory_uri(); 
                                                ?>/assets/img/icons/blue-heart.svg"
                                        alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="rent-car-slider-item">
                            <img src="<?php// echo get_template_directory_uri(); ?>/assets/img/cars/1.png" alt="">
                            <p>Nissan Almera (2013)</p>
                            <p class="price-rent-car">100 <span>&#36;</span><span
                                        class="sub-price-rent-car">per day</span></p>
                            <a class="like-btn" href="#"><img
                                        src="<?php //echo get_template_directory_uri(); 
                                                ?>/assets/img/icons/blue-heart.svg"
                                        alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="rent-car-slider-item">
                            <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/cars/2.png" alt="">
                            <p>Mazda 2 (M/T, 2012)</p>
                            <p class="price-rent-car">90 <span>&#36;</span><span
                                        class="sub-price-rent-car">per day</span></p>
                            <a class="like-btn" href="#"><img
                                        src="<?php //echo get_template_directory_uri(); 
                                                ?>/assets/img/icons/blue-heart.svg"
                                        alt=""></a>
                        </div>
                    </div>
                </div> -->
                
            </div>
            <a href="#" class="car-arrow-right"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right-car.svg" alt=""></a>
                <a href="#" class="car-arrow-left"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-left-car.svg" alt=""></a>
        </div>


</section>

<?php get_footer(); ?>