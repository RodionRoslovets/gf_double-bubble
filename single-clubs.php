<?php
/**
 * Template Post Type: clubs
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
                            <li class="breadcrumb-item"><a href="/clubs">Clubs</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="block-title-page title-club">
                        <h1 class="main-title-page"><?php the_title(); ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="block-info">

                        <div class="clubs-item-rating">
                            <div class="rating-group">
                                <?php echo do_shortcode('[average_rating]') ?>
                                <!--                            <span>9.2</span>-->
                                <!--                            <div class="star-block">-->
                                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""></div>-->
                                <!--                            <div class="count-rating-review">-->
                                <a href="#"><?php comments_popup_link('0 Reviews', '1 Reviews', '% Reviews', '', ''); ?> </a>
                                <!--                            </div>-->
                            </div>
                            <!--                        <ul class="share-socials">-->
                            <!--                            <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/vk.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                            <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/fb.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                            <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/insta.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                        </ul>-->
                            <div class="clubs-item-rating__social">
                                <div class="addthis_inline_share_toolbox"></div>
                                <span class="mobile-visible clubs-item-rating__social--favorite"><?php echo do_shortcode('[favorite_button]') ?></span>
                            </div>


                        </div>
                        <?php $panorama = get_field('club_tour') ?>
                        <?php if ($panorama): ?>
                        <a href="#" class="club-panorama">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                            <p><?php echo esc_html__('See the panorama club','double')?></p>
                        </a>
                        <?php endif; ?>

                    </div>
                </div>


                <?php
                $images = get_field('gallery');
                if( $images ): ?>
                    <div class="row gallery-club">
                        <div class="swiper-container main-slider loading">
                            <div class="swiper-wrapper">
                                <?php foreach( $images as $image ): ?>
                                    <div class="swiper-slide">
                                        <div class="swiper-zoom-container">
                                            <figure class="slide-bgimg swiper-zoom-target" style="background-image:url(<?php echo esc_url($image['url']); ?>)">
                                                <img src="<?php // echo esc_url($image['url']); ?>" alt="<?php // echo esc_attr($image['alt']); ?>" />
                                                <p><?php // echo esc_html($image['caption']); ?></p>
                                            </figure>
                                        </div>
                                        <div class="content">
                                            <p class="title"></p>
                                            <span class="caption"></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev swiper-button-white"></div>
                            <div class="swiper-button-next swiper-button-white"></div>
                        </div>


                        <!-- Thumbnail navigation -->
                        <div class="swiper-container nav-slider loading">
                            <div class="swiper-wrapper" role="navigation">
                                <?php foreach( $images as $image ): ?>

                                    <div class="swiper-slide">
                                        <figure class="slide-bgimg" style="background-image:url(<?php echo esc_url($image['sizes']['thumbnail']); ?>)">
                                            <img src="<?php // echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php // echo esc_url($image['alt']); ?>" />
                                        </figure>
                                        <div class="content">
                                            <p class="title"></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>


                <div class="row">

                    <?php $fields = get_field('club'); ?>

                    <div class="col-md-4 col-middle-check">
                        <div class="middle-check">
                            <div class="middle-check-price">
                                <p><?php echo esc_html( $fields['ticket_price'] ); ?><span>&#36;</span></p>
                                <p>middle check</p>
                            </div>
                            <?php if ($fields['address']): ?>
                                <div class="middle-check-address">
                                    <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/mark.svg" alt=""></p>
                                    <ul>
                                        <li><?php echo esc_html( $fields['address'] ); ?></li>
                                        <?php if ($fields['link_address']): ?>
                                            <li><a href="<?php echo esc_html( $fields['link_address'] ); ?>" target="_blank"><?php echo esc_html__('View on the map','double');?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <div class="middle-check-phone">
                                <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/phone.svg" alt=""></p>
                                <a href="tel:<?php echo esc_html( $fields['phone'] ); ?>"><?php echo esc_html( $fields['phone'] ); ?></a>
                            </div>
                            <div class="middle-check-favorites desktop-visible">
                                <!--                            <p><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <!--                            <a href="#">--><?php //echo esc_html__('To favorites','double');?><!--</a>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-middle-check">
                        <div class="club-kitchen">
                            <h4>Kitchen</h4>
                            <p>
                                <?php $post = get_post() ?>
                                <?php $terms = get_terms( [
                                    'taxonomy' => 'club_kitchen',
                                    'hide_empty' => false,
                                    'get'           => 'all',
                                    'childless'     => true,
                                    'object_ids' => $post->ID,
                                ] ); ?>

                                <?php
                                    $count = count($terms);
                                    foreach ($terms as $k => $term) {
                                        if($count == 1 || $k + 1 == $count){
                                            echo $term->name;
                                        } else {
                                            echo $term->name . ', ';
                                        }
                                    } ?>
                            </p>
                            <h5>Special menu</h5>
                            <p>
                                <?php $terms = get_terms( [
                                    'taxonomy' => 'club_special_menu',
                                    'hide_empty' => false,
                                    'get'           => 'all',
                                    'childless'     => true,
                                    'object_ids' => $post->ID,
                                ] ); ?>

                                <?php
                                    $count = count($terms);
                                    foreach ($terms as $k => $term) {
                                        if($count == 1 || $k + 1 == $count){
                                            echo $term->name;
                                        } else {
                                            echo $term->name . ', ';
                                        }
                                    } ?>
                            </p>

                            <p><strong>Working hours: </strong><?php echo esc_html( $fields['working_hours'] ); ?></p>
                            <?php $menu = get_field('club_menu');
                            if($menu):?>
                            <div class="restaurant-top-page__info-menu desktop-visible">
                                <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/menu.svg" alt=""></p>
                                <a href="#" class="open-menu">Open menu</a>
                            </div>
                            <div class="restaurant-top-page__info-menu mobile-visible" style="margin-top: 20px;">
                                <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/menu.svg" alt=""></p>
                                <a href="#" class="open-menu">Open menu</a>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-md-4 col-middle-check">
                        <?php $cam = get_field('club_web_cam'); ?>
                        <?php if ($cam): ?>
                        <div class="web-cam-club">
                            <div class="web-video">
                                <?php the_field('club_web_cam'); ?>
                            </div>
                            <h5>Web-cam in restaurant</h5>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row content-club">
                    <h2 class="titles-page">About club</h2>
                    <?php the_content(); ?>
                </div>

                <div class="row events-in-club">
                    <h2 class="titles-page">Events</h2>
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

                            <div>
                                <?php $event = get_field('event'); ?>
                                <div class="slider-events-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>                                </a>
                                    <?php echo do_shortcode('[favorite_button]') ?>
                                    <span class="date-label-red"><?php echo esc_html( $event['date'] ); ?></span>
                                </div>
                            </div>

                            <?php
                        }

                        wp_reset_postdata(); // сброс ?>

                    </div>
                </div>

                <div class="row">
                    <h2 class="titles-page title-page-hr">Video <hr /></h2>
                    <div class="slider-video owl-theme owl-carousel">
                        <?php for ($i = 0; $i < 20; $i++ ){
                            $video = get_field("video_carousel_clubs_$i");
                            if ($video['video'] || $video['title']) { ?>
                                <div class="slider-video-item">
                                    <?php echo $video['video']; ?>
                                    <h5><?php echo esc_html($video['title']) ?></h5>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>

                <div class="row">
                    <!--                <h2 class="titles-page title-page-hr">Reviews <span>56</span> <hr /></h2>-->

                    <!--                <div class="rating-club">-->
                    <!--                    <div class="rating-club-count">-->
                    <!--                        <span>9.2</span>-->
                    <!--                        <div class="star-block">-->
                    <!--                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                    <!--                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                    <!--                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                    <!--                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="rating-club-progress">-->
                    <!--                        <div class="club-progress-row">-->
                    <!--                            <span class="club-progress-row-title">--><?php //echo esc_html__('Kitchen','double'); ?><!--</span>-->
                    <!--                            <div class="progress">-->
                    <!--                                <div class="progress-bar" role="progressbar" style="width: 49%" aria-valuenow="49" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                            </div>-->
                    <!--                            <span class="rating-percent">49%</span>-->
                    <!--                        </div>-->
                    <!--                        <div class="club-progress-row">-->
                    <!--                            <span class="club-progress-row-title">--><?php //echo esc_html__('Service','double');?><!--</span>-->
                    <!--                            <div class="progress">-->
                    <!--                                <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                            </div>-->
                    <!--                            <span class="rating-percent">87%</span>-->
                    <!--                        </div>-->
                    <!--                        <div class="club-progress-row">-->
                    <!--                            <span class="club-progress-row-title">--><?php //echo esc_html__('Price/quality','double');?><!--</span>-->
                    <!--                            <div class="progress">-->
                    <!--                                <div class="progress-bar" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                            </div>-->
                    <!--                            <span class="rating-percent">74%</span>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->

                    <!--            <div class="row">-->
                    <!--                <div class="block-comments">-->
                    <!--                    <div class="item-comment">-->
                    <!--                        <div class="item-comment-avatar">-->
                    <!--                            <div class="user-comment-avatar"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/comments/1.jpg" alt=""></div>-->
                    <!--                            <div class="user-rating-avatar"><span>9.5</span></div>-->
                    <!--                        </div>-->
                    <!--                        <div class="comment-content">-->
                    <!--                            <h5>Alex</h5>-->
                    <!--                            <span>11.12.2019</span>-->
                    <!--                            <div class="comment-text">-->
                    <!--                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="item-comment">-->
                    <!--                        <div class="item-comment-avatar">-->
                    <!--                            <div class="user-comment-avatar"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/comments/2.jpg" alt=""></div>-->
                    <!--                            <div class="user-rating-avatar"><span>9.5</span></div>-->
                    <!--                        </div>-->
                    <!--                        <div class="comment-content">-->
                    <!--                            <h5>Segey Ivanov</h5>-->
                    <!--                            <span>11.12.2019</span>-->
                    <!--                            <div class="comment-text">-->
                    <!--                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="item-comment">-->
                    <!--                        <div class="item-comment-avatar">-->
                    <!--                            <div class="user-comment-avatar"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/comments/3.jpg" alt=""></div>-->
                    <!--                            <div class="user-rating-avatar"><span>9.5</span></div>-->
                    <!--                        </div>-->
                    <!--                        <div class="comment-content">-->
                    <!--                            <h5>Julia</h5>-->
                    <!--                            <span>11.12.2019</span>-->
                    <!--                            <div class="comment-text">-->
                    <!--                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!---->
                    <!---->
                    <!--                    <div class="more-reviews">-->
                    <!--                        <a href="#">More rewiews</a>-->
                    <!--                    </div>-->
                    <!---->
                    <!--                    <div class="write-review-block">-->
                    <!--                        <div class="title-review">-->
                    <!--                            <h4>Write a review</h4>-->
                    <!--                        </div>-->
                    <!--                        <div class="review-write">-->
                    <!--                            <div class="col-review-write">-->
                    <!--                                <p>--><?php //echo esc_html__('Kitchen','double'); ?><!--</p>-->
                    <!--                                <div class="star-block">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                            <div class="col-review-write">-->
                    <!--                                <p>--><?php //echo esc_html__('Service','double');?><!--</p>-->
                    <!--                                <div class="star-block">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                            <div class="col-review-write">-->
                    <!--                                <p>--><?php //echo esc_html__('Price/quality','double');?><!--</p>-->
                    <!--                                <div class="star-block">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="form-comment">-->
                    <!--                            <form action="" method="POST">-->
                    <!--                                <div class="input-group">-->
                    <!--                                    <label for="">-->
                    <!--                                        <span class="icon-input">-->
                    <!--                                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/user-input.svg" alt="">-->
                    <!--                                        </span>-->
                    <!--                                        <input type="text" name="name" placeholder="Name">-->
                    <!--                                    </label>-->
                    <!--                                    <label for="">-->
                    <!--                                        <span class="icon-input">-->
                    <!--                                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/mail-input.svg" alt="">-->
                    <!--                                        </span>-->
                    <!--                                        <input type="email" name="email" placeholder="E-mail">-->
                    <!--                                    </label>-->
                    <!--                                </div>-->
                    <!--                                <textarea name="textarea" id="" cols="30" rows="3" placeholder="Your massage"></textarea>-->
                    <!--                                <input type="submit" value="Send" placeholder="Your massage">-->
                    <!--                            </form>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->


                </div>

                <?php if ( comments_open() || get_comments_number() ) {
                    comments_template();
                } ?>
            </div>
    </main>

    <section class="panorama-slider">
        <div class="container">
            <div class="row">
                <?php the_field('club_tour'); ?>
            </div>
        </div>
        <a class="close-panorama-slider" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
        </a>

    </section>
    <section class="menu-slider">
        <div class="container">
            <div class="row">
                <?php
                $menu = get_field('club_menu');
                if( $menu ): ?>
                    <div class="menu-foto-slider" data-width="100%" data-nav="thumbs" data-autoplay="false" data-allowfullscreen="native" style="width:100%">
                        <?php foreach( $menu as $image ): ?>
                            <a href="<?php echo esc_url($image['url']); ?>"><img src="<?php echo esc_url($image['url']); ?>"></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <a class="close-menu-slider" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
        </a>

    </section>

<?php

//			the_post_navigation();

    // If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;

endwhile; // End of the loop.
?>


<?php
//get_sidebar();
get_footer();
?>

