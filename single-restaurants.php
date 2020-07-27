<?php
/**
 * Template Post Type: restaurants
 */

get_header('secondary');
?>



<?php
while (have_posts()) :
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
                            <li class="breadcrumb-item"><a href="/restaurants">Restaurants</a></li>
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
                                <!--                                    <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img-->
                                <!--                                            src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg"-->
                                <!--                                                                                      alt=""><img-->
                                <!--                                            src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""></div>-->
                                <!--                                <div class="count-rating-review">-->
                                <!--                                    <a href="#">56 Reviews</a>-->
                                <!--                                </div>-->
                            </div>
                            <!--                            <ul class="share-socials">-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/vk.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/fb.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                                <li><a href="#"><span><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/insta.svg" alt=""></span><span>16</span></a>-->
                            <!--                                </li>-->
                            <!--                            </ul>-->
                            <div class="addthis_inline_share_toolbox"></div>
                            <div class="villa-blue-heart mobile-visible">
                                <!--                                <p><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>
                        </div>
                        <?php
                        if(get_field('restaurant_tour')):
                            ?>
                            <a href="#" class="club-panorama desktop-visible">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                <p>See the panorama</p>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row villa-top-page restaurant-top-page ">
                    <div class="col-lg-8">

                        <?php
                        $images = get_field('gallery_restaurants');
                        if( $images ): ?>
                            <div class="villas-slider" data-nav="thumbs" data-autoplay="true">
                                <?php foreach( $images as $image ): ?>
                                    <a href="<?php echo esc_url($image['url']); ?>"><img src="<?php echo esc_url($image['url']); ?>"></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>


                        <?php
                        if(get_field('restaurant_tour')):
                            ?>
                            <a class="club-panorama mobile-visible">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                <p>See the panorama</p>
                            </a>
                        <?php endif; ?>

                        <div class="content-club desktop-visible">
                            <h2 class="titles-page">About restaurant</h2>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="villa-top-page__info">
                            <?php
                            $info = get_field('restaurant_info'); ?>
                            <div class="restaurant-top-page__info-block">
                                <div class="middle-check-price">
                                    <p><?php echo $info['price']?><span><?php echo $info['price_symbol'] ? $info['price_symbol'] : '$';?></span></p>
                                    <p><?php echo $info['price_description'] ? $info['price_description'] : 'middle check';?></p>
                                </div>
                                <div class="restaurant-top-page__info-address">
                                    <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/mark.svg" alt=""></p>
                                    <ul>
                                        <li><?php echo $info['address']?></li>
                                        <li><a href="<?php echo $info['address_link']?>" target="_blank">View on the map</a></li>
                                    </ul>
                                </div>
                                <?php if($info['number_phone']):?>
                                    <div class="villa-top-page__tel">
                                        <p>
                                            <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/img/icons/tel.svg" alt=""> -->
                                        <svg style="margin-right: 21px;" width="14" height="22" viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="1" y="1" width="12" height="20" rx="2" stroke="#EB5757" stroke-width="2"/>
                                                            <circle cx="7" cy="17" r="1" fill="#EB5757"/>
                                                            <rect x="5" y="2" width="4" height="2" fill="#EB5757"/>
                                                        </svg></p>
                                        <a href="tel:<?php echo $info['number_phone']?>"><?php echo $info['number_phone']?></a>
                                    </div>
                                <?php endif;?>
                                <?php if($info['sitename']):?>
                                    <div class="villa-top-page__site">
                                        <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/planet.svg" alt=""></p>
                                        <a href="<?php echo $info['sitename']?>" target="_blank"><?php echo $info['sitename']?></a>
                                    </div>
                                <?php endif;?>
                                <div class="villa-top-page__social">
                                    <?php if($info['vk_link']):?>
                                        <a href="<?php echo $info['vk_link']?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/vk-gray.svg" alt=""></a>
                                    <?php endif;?>

                                    <?php if($info['fb_link']):?>
                                        <a href="<?php echo $info['fb_link']?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/fb-gray.svg" alt=""></a>
                                    <?php endif;?>

                                    <?php if($info['insta_link']):?>
                                        <a href="<?php echo $info['insta_link']?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/insta-gray.svg" alt=""></a>
                                    <?php endif;?>

                                    <?php if($info['whatsapp_link']):?>
                                        <a href="https://api.whatsapp.com/send?phone=<?php echo $info['whatsapp_link']?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/whatsupp-grey.svg" alt=""></a>
                                    <?php endif;?>

                                    <?php if($info['telegram_link']):?>
                                        <a href="https://t.me/<?php echo $info['telegram_link']?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/telegram-grey.svg" alt=""></a>
                                    <?php endif;?>

                                </div>
                            </div>
                            <div class="restaurant-top-page__info-favorites desktop-visible">
                                <!--                                <p><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <!--                                <a href="#">To favorites</a>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>
                            <?php
                                $menu = get_field('menu');
                                if( $menu ): ?>
                                    <div class="restaurant-top-page__info-menu desktop-visible">
                                        <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/menu.svg" alt=""></p>
                                        <a href="#" class="open-menu">Open menu</a>
                                    </div>
                                    <div class="restaurant-top-page__info-menu mobile-visible" style="margin-top: 20px;">
                                        <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/menu.svg" alt=""></p>
                                        <a href="#" class="open-menu">Open menu</a>
                                    </div>
                                <?php endif; ?>
                            <div class="restaurant-top-page__info-kitchen">
                                <h3>Kitchen</h3>
                                <p>
                                    <?php $post = get_post() ?>
                                    <?php $terms = get_terms( [
                                        'taxonomy' => 'restaurant_kitchen',
                                        'hide_empty' => true,
                                        'childless'     => false,
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
                                <p>
                                    <?php //$post = get_post() ?>
                                    <?php //echo  get_the_term_list($post->ID, 'restaurant_kitchen' ); ?>
                                </p>
                            </div>
                            <div class="restaurant-top-page__info-special-menu">
                                <h4>Special menu</h4>
                                <p>
                                    <?php $spec_menu = get_terms( [
                                        'taxonomy' => 'restaurant_special_menu',
                                        'hide_empty' => true,
                                        'childless'     => false,
                                        'object_ids' => $post->ID,
                                    ] ); ?>

                                    <?php
                                    $count_spec = count($spec_menu);
                                    foreach ($spec_menu as $k => $term) {
                                        if($count_spec == 1 || $k + 1 == $count_spec){
                                            echo $term->name;
                                        } else {
                                            echo $term->name . ', ';
                                        }
                                    } ?>
                                </p>
                            </div>
                            <div class="restaurant-top-page__info-work">
                                <p><strong>Working hours: </strong><?php echo $info['working_hours']?></p>
                            </div>
                            <?php $cam = get_field('restaurant_web_cam'); ?>
                            <?php if ($cam): ?>
                            <div class="web-cam-restaurant">
                                <div class="web-video">
                                    
                                </div>
                                <h5>Web-cam in restaurant</h5>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="content-club mobile-visible">
                        <h2 class="titles-page">About restaurant</h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                            ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                            consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                            arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
                            pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Nulla
                            consequat massa quis enim.</p> -->
                        <?php the_content(); ?>
                    </div>
                </div>
                <!-- 
                                <div class="row">
                                    <div class="facilities-villas">
                                        <h2 class="titles-page">Facilities</h2>
                                        <div class="facilities-villas__block">
                
                                        </div>
                                        <ul class="facilities-villas__list">
                                            <li>Air Conditioner</li>
                                            <li>Restaurant</li>
                                            <li>Air Transport</li>
                                            <li>Smoking Room</li>
                                            <li>Pool</li>
                                            <li>Spa & Sauna</li>
                                        </ul>
                                    </div>
                                </div> -->


                <!--                <div class="row">-->
                <!--                    <h2 class="titles-page title-page-hr">Reviews <span>56</span>-->
                <!--                        <hr/>-->
                <!--                    </h2>-->
                <!---->
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
                <!--                                    <div class="progress-bar" role="progressbar" style="width: 49%" aria-valuenow="49"-->
                <!--                                         aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--                                </div>-->
                <!--                                <span class="rating-percent">49%</span>-->
                <!--                            </div>-->
                <!--                            <div class="club-progress-row">-->
                <!--                                <span class="club-progress-row-title">Обслуживание</span>-->
                <!--                                <div class="progress">-->
                <!--                                    <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87"-->
                <!--                                         aria-valuemin="0" aria-valuemax="100"></div>-->
                <!--                                </div>-->
                <!--                                <span class="rating-percent">87%</span>-->
                <!--                            </div>-->
                <!--                            <div class="club-progress-row">-->
                <!--                                <span class="club-progress-row-title">Цена/качество</span>-->
                <!--                                <div class="progress">-->
                <!--                                    <div class="progress-bar" role="progressbar" style="width: 74%" aria-valuenow="74"-->
                <!--                                         aria-valuemin="0" aria-valuemax="100"></div>-->
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
                <!--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula-->
                <!--                                        eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient-->
                <!--                                        montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque-->
                <!--                                        eu, pretium quis, sem.</p>-->
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
                <!--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula-->
                <!--                                        eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient-->
                <!--                                        montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque-->
                <!--                                        eu, pretium quis, sem.</p>-->
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
                <!--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula-->
                <!--                                        eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient-->
                <!--                                        montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque-->
                <!--                                        eu, pretium quis, sem.</p>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!---->
                <!---->
                <!--                        <div class="more-reviews">-->
                <!--                            <a href="#">More rewiews</a>-->
                <!--                        </div>-->
                <!---->
                <!--                        <div class="write-review-block">-->
                <!--                            <div class="title-review">-->
                <!--                                <h4>Write a review</h4>-->
                <!--                            </div>-->
                <!--                            <div class="review-write">-->
                <!--                                <div class="col-review-write">-->
                <!--                                    <p>Кухня</p>-->
                <!--                                    <div class="star-block">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                                <div class="col-review-write">-->
                <!--                                    <p>Обслуживание</p>-->
                <!--                                    <div class="star-block">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                                <div class="col-review-write">-->
                <!--                                    <p>Цена/качество</p>-->
                <!--                                    <div class="star-block">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div class="form-comment">-->
                <!--                                <form action="" method="POST">-->
                <!--                                    <div class="input-group">-->
                <!--                                        <label for="">-->
                <!--                                        <span class="icon-input">-->
                <!--                                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/user-input.svg" alt="">-->
                <!--                                        </span>-->
                <!--                                            <input type="text" name="name" placeholder="Name">-->
                <!--                                        </label>-->
                <!--                                        <label for="">-->
                <!--                                        <span class="icon-input">-->
                <!--                                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/mail-input.svg" alt="">-->
                <!--                                        </span>-->
                <!--                                            <input type="email" name="email" placeholder="E-mail">-->
                <!--                                        </label>-->
                <!--                                    </div>-->
                <!--                                    <textarea name="textarea" id="" cols="30" rows="3"-->
                <!--                                              placeholder="Your massage"></textarea>-->
                <!--                                    <input type="submit" value="Send" placeholder="Your massage">-->
                <!--                                </form>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

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

                <?php if ( comments_open() || get_comments_number() ) {
                    comments_template();
                } ?>

                <div class="row">
                    <h2 class="titles-page">Restaurants nearby</h2>

                    <div class="restaurants-nearby-slider owl-theme owl-carousel">

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
                            'post_type'   => 'restaurants',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );

                        foreach( $posts as $post ){
                            setup_postdata($post);
                            ?>

                            <div class="restaurants-preview__item">
                                <a href="<?php the_permalink(); ?>" class="restaurants-preview__item_image">
                                    <?php the_post_thumbnail(); ?>
                                </a>

                                <div class="restaurants-preview__item_content">
                                    <h5><?php the_title(); ?></h5>
                                    <p><?php the_excerpt(); ?></p>
                                    <div class="rating-group">
                                        <span>9.2</span>
                                        <div class="star-block">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-full.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-empty.svg" alt="">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/star-empty.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }

                        wp_reset_postdata(); // сброс ?>


                    </div>
                </div>


            </div>
        </div>
    </main>
    <?php
    if(get_field('restaurant_tour')):
        ?>
        <section class="panorama-slider">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
            <a class="close-panorama-slider" href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
            </a>
        </section>
    <?php endif; ?>


    <!--    <section class="panorama-slider">

        <div class="container">
            <div class="row">
                <?php
    $gallery = get_field('panorama_gallery');
    ?>
                <?php if ($gallery): ?>
                    <?php $count = 1 ?>
                    <ul id="lightSlider">
                        <?php foreach ($gallery as $image): ?>
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
        <a class="close-panorama-slider" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
        </a>

    </section>-->

    <section class="menu-slider">
        <div class="container">
            <div class="row">
                <?php
                $menu = get_field('menu');
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

<?php if (get_field('restaurant_tour') || get_field('restaurant_web_cam') ) { ?>
    <script>
        window.addEventListener('load', () => {
            let dayRespBlock = document.querySelector('.panorama-slider .container .row'),
                webcamResponseBlock = document.querySelector('.web-cam-restaurant .web-video');

            setTimeout(() => {
                fetch(`${document.location.origin}/wp-admin/admin-ajax.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    },
                    body: 'action=villas_extra&post_id=<?php echo $post->ID; ?>&type=restaurant'
                })
                .then(res=>res.json())
                .then((res)=>{
                    
                    if(res.day_tour){
                        dayRespBlock.innerHTML = res.day_tour;
                    }

                    if(res.webcam){
                        webcamResponseBlock.innerHTML = res.webcam;
                    }
                })
                .catch(err=>console.log(err));
            }, 3000);

        });
    </script>
<?php } ?>

<?php
//get_sidebar();
get_footer();
?>

