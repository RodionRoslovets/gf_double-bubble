<?php
/**
 * Template Post Type: events
 */

get_header('secondary');
?>



<?php
while ( have_posts() ) :
the_post();

//			get_template_part( 'template-parts/content', get_post_type() );
?>

<main class="main-content">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/events">Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="row">

                <div class="top-event-page">
                    <div class="poster">
                        <?php the_post_thumbnail(); ?>
                    </div>

                    <div class="event-info">
                        <div class="block-title-page title-event">
                            <h1 class="main-title-page"><?php the_title(); ?></h1>
                        </div>

                        <?php $event = get_field('event'); ?>

                        <div class="sub-title-event">
                            <h4><?php echo esc_html( $event['subtitle'] ); ?></h4>
                        </div>

                        <div class="event-date">
                            <p><?php echo esc_html( $event['date'] ); ?></p>
                        </div>

                        <div class="price-event">
                            <p class="mini-title-event">Ticket</p>
                            <p class="price-event-cost"><?php echo esc_html( $event['price'] ); ?> <span>&#36;</span></p>
                        </div>
                        
                        <?php if($event['club_link']):?>
                            <div class="to-club-event">
                                <p><a href="<?php echo esc_html( $event['club_link'] ); ?>">To event venue</a></p>
                            </div>
                        <?php endif; ?>

                        <div class="name-event">
                            <p class="mini-title-event">Location</p>
                            <h5><?php echo esc_html( $event['location'] ); ?></h5>
                        </div>

                        <div class="address-event">
                            <p class="mini-title-event">Address</p>
                            <p class="address-map"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/mark.svg" alt=""><a href="<?php echo esc_html( $event['address'] ); ?>" target="blank"><?php echo esc_html( $event['address'] ); ?></a></p>
                        </div>

                    </div>

                    <div class="event-social">
<!--                        <ul class="share-socials">-->
<!--                            <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/vk.svg" alt=""></span><span>16</span></a></li>-->
<!--                            <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/fb.svg" alt=""></span><span>16</span></a></li>-->
<!--                            <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/insta.svg" alt=""></span><span>16</span></a></li>-->
<!--                        </ul>-->

                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>


                        <div class="to-favorites" style="width:101%; text-align: right;">
<!--                            <a href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""> To favorites</a>-->
                            <?php echo do_shortcode('[favorite_button]') ?>
                        </div>
                    </div>

                </div>


                <div class="top-event-page top-event-page-mobile">
                    <div class="event-info">
                        <div class="block-title-page title-event">
                            <h1 class="main-title-page"><?php the_title(); ?></h1>
                        </div>

                        <div class="sub-title-event">
                            <h4><?php echo esc_html( $event['subtitle'] ); ?></h4>
                        </div>

                        <div class="event-social">
                            <ul class="share-socials">
                                <li><a href="#"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vk.svg" alt=""></span><span>16</span></a></li>
                                <li><a href="#"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fb.svg" alt=""></span><span>16</span></a></li>
                                <li><a href="#"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/insta.svg" alt=""></span><span>16</span></a></li>
                            </ul>

                            <div class="to-favorites">
<!--                                <a href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""></a>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>
                        </div>

                        <div class="poster">
                            <?php the_post_thumbnail(); ?>
                        </div>

                        <div class="event-date">
                            <p><?php echo esc_html( $event['date'] ); ?></p>
                        </div>

                        <?php if($event['club_link']):?>
                            <div class="to-club-event">
                                <p><a href="<?php echo esc_html( $event['club_link'] ); ?>">To event venue</a></p>
                            </div>
                        <?php endif; ?>

                        <div class="block-price-event">
                            <div class="price-event">
                                <p class="mini-title-event">Ticket</p>
                                <p class="price-event-cost"><?php echo esc_html( $event['price'] ); ?> <span>&#36;</span></p>
                            </div>

                            <div class="name-event">
                                <p class="mini-title-event">Location</p>
                                <h5><?php echo esc_html( $event['location'] ); ?></h5>
                            </div>
                        </div>

                    </div>



                </div>
            </div>

            <div class="row">
                <h2 class="titles-page">About event</h2>
                <?php the_content(); ?>
            </div>

            <div class="row event-org">
                <?php $images = get_field('dj_gallery');
                ?>
                <?php if( $images ): ?>
                    <?php foreach( $images as $image ): ?>
                        <div class="col-md-3 col-6">
                            <div class="event-org-avatar">
                                <a href="<?php echo $image['caption']; ?>" target="_blank">
                                    <img src="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>" alt="<?php echo $image['title']; ?>">
                                </a>
                            </div>
                            <h5><a href="<?php echo $image['caption']; ?>" target="_blank"><?php echo $image['title']; ?></a></h5>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="slider-event-foto owl-theme owl-carousel">
                    <?php $gallery_event = get_field('gallery_event');
                    ?>
                    <?php if( $images ): ?>
                        <?php foreach( $gallery_event as $image ): ?>

                            <div class="slider-video-item">
                                <img src="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>" alt="<?php echo $image['title']; ?>">
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php 
                if(get_field('map_link')){
                    ?>
                        <div class="map">
                            <?php
                                the_field('map_link');
                            ?>
                        </div>
                    <?php
                }
                ?>

            <div class="row events-in-club">
                <h2 class="titles-page">Other event</h2>

                <div class="slider-events-club owl-theme owl-carousel">

                    <?php // параметры по умолчанию
                    $posts = get_posts( array(
                        'numberposts' => 15,
                        'category'    => 0,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'meta_key'    => '',
                        'meta_value'  =>'',
                        'post_type'   => 'events',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post);
                        ?>

                        <?php $event = get_field('event'); ?>

                        <div class="slider-events-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <h5><?php the_title(); ?></h5>
                            <span class="date-other-event"><?php echo esc_html( $event['date'] ); ?></span>
<!--                            <a class="like-btn" href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/blue-heart.svg" alt=""></a>-->
                            <?php echo do_shortcode('[favorite_button]') ?>                        </div>


                        <?php
                    }

                    wp_reset_postdata(); // сброс ?>

                </div>
            </div>

        </div>
    </div>
</main>

<?php

//			the_post_navigation();

    // If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;

endwhile; // End of the loop.
?>

<?php get_footer(); ?>