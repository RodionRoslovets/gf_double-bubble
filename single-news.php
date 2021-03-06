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
                            <li class="breadcrumb-item"><a href="/news">News</a></li>
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
                    <div class="block-info col-lg-8">

                        <!-- <div class="clubs-item-rating"> -->
                            <!-- <div class="rating-group"> -->
                                <?php //echo do_shortcode('[average_rating]') ?>
                                <!--                                <span>9.2</span>-->
                                <!--                                <div class="star-block">-->
                                <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""><img-->
                                <!--                                            src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""></div>-->
                                <!--                                <div class="count-rating-review">-->
                                <!--                                    <a href="#">56 Reviews</a>-->
                                <!--                                </div>-->
                            <!-- </div> -->
                            <!--                            <ul class="share-socials">-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/vk.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/fb.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/insta.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                            </ul>-->
                            <div class="news-date-row">
                                <div class="news-img">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/img/icons/clock.svg">
                                </div>
                                <span class="news-date"><?php the_time('d.m.Y') ?></span>
                            </div>
                            <div class="addthis_inline_share_toolbox"></div>
                            <!-- <div class="villa-blue-heart mobile-visible"> -->
                                <!--                                <p><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <!--                                --><?php //if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
                                <?php //echo do_shortcode('[favorite_button]') ?>
                            <!-- </div> -->
                        <!-- </div> -->

                    </div>
                </div>

                <div class="row news-page">
                    <div class="col-lg-8">

                        <?php
                        // $images =get_field('gallery_tours');
                       // if( $images ): ?>
                            <!-- <div class="villas-slider" data-nav="thumbs" data-autoplay="true"> -->
                                <?php //foreach( $images as $image ): ?>
                                    <!-- <a href="<?php // echo esc_url($image['url']); ?>"><img src="<?php //echo esc_url($image['url']); ?>"></a> -->
                                <?php //endforeach; ?>
                            <!-- </div> -->
                        <?php //endif; ?>
                        <?php echo get_the_post_thumbnail(); ?>

                        <div class="row content-club desktop-visible">
                            <?php the_content(); ?>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <?php //$tours = get_field('tours'); ?>
                        <!-- <div class="villa-top-page__info"> -->
                            <!-- <div class="villa-top-page__info-block"> -->
                                <!-- <div class="tour-top-page__price"> -->
                                    <!-- <p><?php //echo esc_html( $tours['price'] ); ?><span>&#36;</span></p> -->
                                    <!-- <p>count person</p> -->
                                    <!-- <div class="tour-top-page__info-count"> -->
                                <!-- <span> -->
                                    <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/img/icons/minus.svg" alt=""> -->
                                <!-- </span> -->
                                        <!-- <input type="text" value="1"> -->
                                        <!-- <span> -->
                                    <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/img/icons/plus.svg" alt=""> -->
                                <!-- </span> -->
                                    <!-- </div> -->
                                <!-- </div> -->

                                <!-- <div class="villa-top-page__book-btns"> -->
                                    <!-- <a href="#" class="book-btn bg-btn-red"> -->
                                        <!-- Book now -->
                                    <!-- </a> -->
                                <!-- </div> -->

                            <!-- </div> -->

                            <!-- <div class="tour-top-page__info-options"> -->
                                <!-- <ul> -->
                                    <!-- <li>By car</li> -->
                                    <!-- <li>2-2.5 hours</li> -->
                                    <!-- <li>Destination А - Destination B</li> -->
                                <!-- </ul> -->
                            <!-- </div> -->

                            <!-- <div class="villa-top-page__info-favorites desktop-visible"> -->
                                <!--                                <p><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <!--                                <a href="#">To favorites</a>-->
                                <?php //echo do_shortcode('[favorite_button]') ?>
                                <!--                                --><?php //if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
                            <!-- </div> -->
                            <!--                            --><?php //do_shortcode('[favorite-post]') ?>
                        </div>
                    </div>
                </div>


                <!-- <div class="row content-club mobile-visible">
                    <h2 class="titles-page">About villa</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Nulla consequat massa quis enim.</p>
                </div> -->



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

                <?php // if (comments_open() || get_comments_number()) {
                    //comments_template();
                //} ?>
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

            </div>
        </div>
    </main>

    <section class="panorama-slider">
        <div class="container">
            <div class="row">
                <?php
                $gallery = get_field('panorama_gallery');
                ?>
                <?php if( $gallery ): ?>
                    <?php $count = 1 ?>
                    <ul id="lightSlider">
                        <?php foreach( $gallery as $image ): ?>
                            <li class="lightSlider-item" data-thumb="<?php echo esc_url($image['url']); ?>">
                                <div id="panorama<?php echo $count; ?>" class="panorama-item"></div>
                                <script>
                                    pannellum.viewer('panorama<?php echo $count; ?>', {
                                        "type": "equirectangular",
                                        "panorama": "<?php echo esc_url($image['url']); ?>",
                                        "autoLoad": true,
                                        "scale": false
                                    });
                                </script>
                            </li>
                            <?php $count++ ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

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