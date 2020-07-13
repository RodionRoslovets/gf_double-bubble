<?php
/**
 * Template Post Type: tours
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
                            <li class="breadcrumb-item"><a href="/tours">Tours</a></li>
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
                                <!--                                <span>9.2</span>-->
                                <!--                                <div class="star-block">-->
                                <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""><img-->
                                <!--                                            src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""></div>-->
                                <!--                                <div class="count-rating-review">-->
                                <!--                                    <a href="#">56 Reviews</a>-->
                                <!--                                </div>-->
                            </div>
                            <!--                            <ul class="share-socials">-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/vk.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/fb.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/insta.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                            </ul>-->
                            <div class="addthis_inline_share_toolbox"></div>
                            <div class="villa-blue-heart mobile-visible">
                                <!--                                <p><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <!--                                --><?php //if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>
                            <div class="day-tour-panorama">
                                <?php if(get_field('tours_day_tour')):?>
                                    <a href="#" class="club-panorama desktop-visible">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                        <p><?php echo esc_html__('Day Tour', 'double'); ?></p>
                                    </a>
                                <?php endif; ?>
                                <?php if(get_field('tours_night_tour')):?>
                                    <a href="#" class="club-panorama2 desktop-visible">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                        <p><?php echo esc_html__('Night Tour', 'double'); ?></p>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row villa-top-page">
                    <div class="col-lg-8">

                        <?php
                        $images = get_field('gallery_tours');
                        if( $images ): ?>
                            <div class="villas-slider" data-nav="thumbs" data-autoplay="true">
                                <?php foreach( $images as $image ): ?>
                                    <a href="<?php echo esc_url($image['url']); ?>"><img src="<?php echo esc_url($image['url']); ?>"></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>


                        <div class="row content-club desktop-visible">
                            <h2 class="titles-page">About tour</h2>
                            <?php the_content(); ?>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <?php $tours = get_field('tours'); ?>
                        <div class="villa-top-page__info">
                            <div class="villa-top-page__info-block">
                                <div class="tour-top-page__price">
                                    <p><?php echo esc_html( $tours['price'] ); ?><span>&#36;</span></p>
                                    <p>count person</p>
                                    <div class="tour-top-page__info-count">
                                <span class="tour-top-page__info-count-dec">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/minus.svg" alt="">
                                </span>
                                        <input class="tour-top-page__info-count-val" type="text" value="1" readonly>
                                        <span class="tour-top-page__info-count-inc">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/plus.svg" alt="">
                                </span>
                                    </div>
                                </div>

                                <div class="villa-top-page__book-btns">
                                    <a href="#" class="book-btn bg-btn-red call-contact-owner">
                                        Book now
                                    </a>
                                </div>

                            </div>

                            <div class="tour-top-page__info-options">
                                <ul>
                                    <li>By car</li>
                                    <li>2-2.5 hours</li>
                                    <li>Destination А - Destination B</li>
                                </ul>
                            </div>

                            <div class="villa-top-page__info-favorites desktop-visible">
                                <!--                                <p><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <!--                                <a href="#">To favorites</a>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                                <!--                                --><?php //if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
                            </div>
                            <!--                            --><?php //do_shortcode('[favorite-post]') ?>
                        </div>
                    </div>
                </div>


                <div class="row content-club mobile-visible">
                    <h2 class="titles-page">About tour</h2>
                    <p><?php the_content(); ?></p>
                </div>



                <!--                <div class="row">-->
                <!--                    <div class="col-md-8 p-0">-->
                <!--                        <h2 class="titles-page title-page-hr">Reviews <span>56</span> <hr /></h2>-->
                <!---->
                <!--                    </div>-->

                <!--                    <div class="rating-club">-->
                <!--                        <div class="rating-club-count">-->
                <!--                            <span>9.2</span>-->
                <!--                            <div class="star-block">-->
                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt="">-->
                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        <div class="rating-club-progress">-->
                <!--                            <div class="club-progress-row">-->
                <!--                                <span class="club-progress-row-title">Кухня</span>-->
                <!--                                <div class="progress">-->
                <!--                                    <div class="progress-bar" role="progressbar" style="width: 49%" aria-valuenow="49" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--                                </div>-->
                <!--                                <span class="rating-percent">49%</span>-->
                <!--                            </div>-->
                <!--                            <div class="club-progress-row">-->
                <!--                                <span class="club-progress-row-title">Обслуживание</span>-->
                <!--                                <div class="progress">-->
                <!--                                    <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--                                </div>-->
                <!--                                <span class="rating-percent">87%</span>-->
                <!--                            </div>-->
                <!--                            <div class="club-progress-row">-->
                <!--                                <span class="club-progress-row-title">Цена/качество</span>-->
                <!--                                <div class="progress">-->
                <!--                                    <div class="progress-bar" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--                                </div>-->
                <!--                                <span class="rating-percent">74%</span>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

                <!--                <div class="row">-->
                <!--                    <div class="block-comments">-->
                <!--                        <div class="item-comment">-->
                <!--                            <div class="item-comment-avatar">-->
                <!--                                <div class="user-comment-avatar"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/comments/1.jpg" alt=""></div>-->
                <!--                                <div class="comment-content">-->
                <!--                                    <h5 class="mobile-visible">Alex</h5>-->
                <!--                                    <span class="mobile-visible">11.12.2019</span>-->
                <!--                                </div>-->
                <!--                                <div class="user-rating-avatar"><span>9.5</span></div>-->
                <!--                            </div>-->
                <!--                            <div class="comment-content">-->
                <!--                                <h5 class="desktop-visible">Alex</h5>-->
                <!--                                <span class="desktop-visible">11.12.2019</span>-->
                <!--                                <div class="comment-text">-->
                <!--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!---->
                <!--                        <div class="item-comment">-->
                <!--                            <div class="item-comment-avatar">-->
                <!--                                <div class="user-comment-avatar"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/comments/2.jpg" alt=""></div>-->
                <!--                                <div class="comment-content">-->
                <!--                                    <h5 class="mobile-visible">Segey Ivanov</h5>-->
                <!--                                    <span class="mobile-visible">11.12.2019</span>-->
                <!--                                </div>-->
                <!--                                <div class="user-rating-avatar"><span>9.5</span></div>-->
                <!--                            </div>-->
                <!--                            <div class="comment-content">-->
                <!--                                <h5 class="desktop-visible">Segey Ivanov</h5>-->
                <!--                                <span class="desktop-visible">11.12.2019</span>-->
                <!--                                <div class="comment-text">-->
                <!--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!---->
                <!--                        <div class="item-comment">-->
                <!--                            <div class="item-comment-avatar">-->
                <!--                                <div class="user-comment-avatar"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/comments/3.jpg" alt=""></div>-->
                <!--                                <div class="comment-content">-->
                <!--                                    <h5 class="mobile-visible">Julia</h5>-->
                <!--                                    <span class="mobile-visible">11.12.2019</span>-->
                <!--                                </div>-->
                <!--                                <div class="user-rating-avatar"><span>9.5</span></div>-->
                <!--                            </div>-->
                <!--                            <div class="comment-content">-->
                <!--                                <h5 class="desktop-visible">Julia</h5>-->
                <!--                                <span class="desktop-visible">11.12.2019</span>-->
                <!--                                <div class="comment-text">-->
                <!--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!---->
                <!---->
                <!--                        <div class="more-reviews">-->
                <!--                            <a href="#">More rewiews</a>-->
                <!--                        </div>-->
                <!---->
                <!---->
                <!--                    </div>-->
                <!--                </div>-->

                <!--                <div class="row">-->
                <!--                    <div class="block-comments">-->
                <!--                    <div class="form-comment">-->

                <?php if (comments_open() || get_comments_number()) {
                    comments_template();
                } ?>
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

            </div>
        </div>
    </main>

    <?php if(get_field('tours_day_tour')):?>
    <section class="panorama-slider">
        <div class="container">
            <div class="row">
                <?php the_field('tours_day_tour'); ?>
            </div>
        </div>
        <a class="close-panorama-slider" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
        </a>

    </section>
<?php endif; ?>
    <?php if(get_field('tours_night_tour')):?>

    <section class="panorama-slider2">
        <div class="container">
            <div class="row">
                <?php the_field('tours_night_tour'); ?>
            </div>
        </div>
        <a class="close-panorama-slider2" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
        </a>

    </section>
<?php endif; ?>

<?php if ( get_field('email_owner_villa') ): ?>
    <section class="modal-contact-owner">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="form-contact-owner">
                        <h4>Contact owner</h4>
                        <form action="" method="post" id="form-contact-owner">
                            <label for="">
                                <span class="icon-input">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/user-input.svg" alt="">
                                </span>
                                <input name="name" type="text" placeholder="Name" required="required">
                            </label>
                            <label for="">
                                <span class="icon-input">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/mail-input.svg" alt="">
                                </span>
                                <input name="email" type="email" placeholder="Email" required="required">
                            </label>
                            <label for="">
                                <span class="icon-input">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/mail-input.svg" alt="">
                                </span>
                                <input name="date" type="date" value="<?php echo date('Y-m-d'); ?>" required="required">
                            </label>
                            <textarea name="text" placeholder="Your massage"></textarea>
                            <label>
                                <input type="checkbox" name="checkbox" value="check" id="agree" required="required" /><p> I have read and agree to the <a href="#">Terms and Conditions and Privacy Policy</a></p>
                            </label>
                            <input type="email" name="email_owner" hidden value="<?php the_field('email_owner_villa') ?>">
                            <input type="submit" value="send">
                        </form>
                        <div class="close-contact-owner">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <!-- <section class="panorama-slider">
        <div class="container">
            <div class="row">
                <?php
    //$gallery = get_field('panorama_gallery');
    ?>
                <?php //if( $gallery ): ?>
                <?php //$count = 1 ?>
                    <ul id="lightSlider">
                        <?php //foreach( $gallery as $image ): ?>
                            <li class="lightSlider-item" data-thumb="<?php //echo esc_url($image['url']); ?>">
                                <div id="panorama<?php //echo $count; ?>" class="panorama-item"></div>
                                <script>
                                    pannellum.viewer('panorama<?php //echo $count; ?>', //{
                                        "type": "equirectangular",
                                        "panorama": "<?php //echo esc_url($image['url']); ?>",
                                        "autoLoad": true,
                                        "scale": false
                                    //});
                                </script>
                            </li>
                            <?php //$count++ ?>
                        <?php //endforeach; ?>
                    </ul>
                <?php //endif; ?>
            </div>
        </div>

    </section> -->

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