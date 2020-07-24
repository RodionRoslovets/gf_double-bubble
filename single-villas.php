<?php

/**
 * Template Post Type: villas
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
                            <li class="breadcrumb-item"><a href="/villas">Villas</a></li>
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
                                <!--                                    <img src="-->
                                <?php //echo get_template_directory_uri();
                                ?>
                                <!--/assets/img/icons/star-full.svg" alt="">-->
                                <!--                                    <img src="-->
                                <?php //echo get_template_directory_uri();
                                ?>
                                <!--/assets/img/icons/star-full.svg" alt="">-->
                                <!--                                    <img src="-->
                                <?php //echo get_template_directory_uri();
                                ?>
                                <!--/assets/img/icons/star-full.svg" alt="">-->
                                <!--                                    <img src="-->
                                <?php //echo get_template_directory_uri();
                                ?>
                                <!--/assets/img/icons/star-empty.svg" alt="">-->
                                <!--                                    <img src="-->
                                <?php //echo get_template_directory_uri();
                                ?>
                                <!--/assets/img/icons/star-empty.svg" alt="">-->
                                <!--                                </div>-->
                                <div class="count-rating-review">
                                    <!--                                    <a href="#">56 Reviews</a>-->
                                </div>
                            </div>
                            <!--                            <ul class="share-socials">-->
                            <!--                                <li><a href="#"><span><img src="-->
                            <?php //echo get_template_directory_uri();
                            ?>
                            <!--/assets/img/icons/vk.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                                <li><a href="#"><span><img src="-->
                            <?php //echo get_template_directory_uri();
                            ?>
                            <!--/assets/img/icons/fb.svg" alt=""></span><span>16</span></a></li>-->
                            <!--                                <li><a href="#"><span><img src="-->
                            <?php //echo get_template_directory_uri();
                            ?>
                            <!--/assets/img/icons/insta.svg" alt=""></span><span>16</span></a>-->
                            <!--                                </li>-->
                            <!--                            </ul>-->
                            <div class="addthis_inline_share_toolbox"></div>
                            <div class="villa-blue-heart mobile-visible">
                                <!--                                <p><img src="-->
                                <?php //echo get_template_directory_uri();
                                ?>
                                <!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>

                        </div>

                        <div class="day-tour-panorama">
                            <?php if (get_field('villa_day_tour')) : ?>
                                <a href="#" class="club-panorama desktop-visible">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                    <p><?php echo esc_html__('Day Tour', 'double'); ?></p>
                                </a>
                            <?php endif; ?>
                            <?php if (get_field('villa_night_tour')) : ?>
                                <a href="#" class="club-panorama2 desktop-visible">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                    <p><?php echo esc_html__('Night Tour', 'double'); ?></p>
                                </a>
                            <?php endif; ?>
                        </div>



                    </div>
                </div>


                <div class="row villa-top-page">
                    <div class="col-lg-8">
                        <?php
                        $images = get_field('gallery_villas');
                        if ($images) : ?>
                            <div class="villas-slider" data-nav="thumbs" data-autoplay="true">
                                <?php foreach ($images as $image) : ?>
                                    <a href="<?php echo esc_url($image['url']); ?>"><img src="<?php echo esc_url($image['url']); ?>"></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_field('villa_day_tour')) : ?>

                            <a class="club-panorama mobile-visible">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                <p><?php echo esc_html__('Day Tour', 'double'); ?></p>
                            </a>

                        <?php endif; ?>
                        <?php if (get_field('villa_night_tour')) : ?>

                            <a class="club-panorama2 mobile-visible">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                <p><?php echo esc_html__('Night Tour', 'double'); ?></p>
                            </a>
                        <?php endif; ?>

                        <div class="villa-top-page__info mobile-visible">
                            <div class="villa-top-page__info-block">
                                <?php $villa_data = get_field('villa_data') ?>
                                <div class="middle-check-price">
                                    <p><?php echo $villa_data['price'] ?><span>&#36;</span></p>
                                    <p>per day</p>
                                </div>
                                <div class="villa-top-page__info-address">
                                    <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/mark.svg" alt=""></p>
                                    <ul>
                                        <li><?php echo $villa_data['address'] ?></li>
                                        <li><a href="<?php echo $villa_data['addres_link'] ?>" target="_blank">View on
                                                the map</a></li>
                                    </ul>
                                </div>
                                <?php if ($villa_data['phone']) : ?>
                                    <div class="villa-top-page__phone">
                                        <a href="tel:<?php echo $villa_data['phone'] ?>">
                                            <!-- <img
                                                    src="<?php //echo get_template_directory_uri(); 
                                                            ?>/assets/img/icons/tel.svg"
                                                    alt="" style="width:auto"> -->
                                            <svg style="margin-right: 16px;" width="14" height="22" viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1" y="1" width="12" height="20" rx="2" stroke="#EB5757" stroke-width="2" />
                                                <circle cx="7" cy="17" r="1" fill="#EB5757" />
                                                <rect x="5" y="2" width="4" height="2" fill="#EB5757" />
                                            </svg>
                                            <?php echo $villa_data['phone'] ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="villa-top-page__book-btns">
                                    <a href="#" class="book-btn bg-btn-red">
                                        Book now
                                    </a>
                                    <?php if (get_field('email_owner_villa')) : ?>
                                        <a href="#" class="book-btn bg-btn-white call-contact-owner">
                                            Contact owner
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if ($villa_data['go_to_website']) : ?>
                                    <div class="villa-top-page__to-site">
                                        <a href="<?php echo $villa_data['go_to_website'] ?>" target="_blank">Go to
                                            website</a>
                                    </div>
                                <?php endif; ?>
                                <div class="villa-top-page__social-list">
                                    <ul><?php if ($villa_data['whatsapp']) : ?>
                                            <li><a href="<?php echo $villa_data['whatsapp'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/whatsup.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($villa_data['telegram']) : ?>
                                            <li><a href="<?php echo $villa_data['telegram'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/telegram.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($villa_data['viber']) : ?>
                                            <li><a href="<?php echo $villa_data['viber'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/viber.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($villa_data['facebook']) : ?>
                                            <li><a href="<?php echo $villa_data['facebook'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/facebook.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($villa_data['instagram']) : ?>
                                            <li><a href="<?php echo $villa_data['instagram'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/instagram.svg" alt=""></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php
                        $villa_logo = get_field('villa_logo'); ?>
                        <?php if ($villa_logo) : ?>
                            <div class="row villa-logo">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="<?php echo $villa_logo ?>" alt="">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="villa-top-page__info-block mobile-visible">
                            <?php $price_day = get_field('price_day') ?>
                            <table class="price-day">
                                <tr>
                                    <td>Monday:</td>
                                    <td><?php echo $price_day['monday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Tuesday:</td>
                                    <td><?php echo $price_day['tuesday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Wednesday:</td>
                                    <td><?php echo $price_day['wednesday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Thursday:</td>
                                    <td><?php echo $price_day['thursday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Friday:</td>
                                    <td><?php echo $price_day['friday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Saturday:</td>
                                    <td><?php echo $price_day['saturday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Sunday:</td>
                                    <td><?php echo $price_day['sunday'] ?> <span>&#36;</span></td>
                                </tr>
                            </table>
                        </div>

                        <div class="row content-club">
                            <h2 class="titles-page">About villa</h2>
                            <div class="col-12">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="villa-top-page__info-block mobile-visible">
                            <div class="facilities-villas">
                                <h2 class="">Facilities</h2>
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
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="villa-top-page__info desktop-visible">
                            <div class="villa-top-page__info-block">
                                <?php $villa_data = get_field('villa_data') ?>
                                <div class="middle-check-price">
                                    <p><?php echo $villa_data['price'] ?><span>&#36;</span></p>
                                    <p>per day</p>
                                </div>
                                <div class="villa-top-page__info-address">
                                    <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/mark.svg" alt=""></p>
                                    <ul>
                                        <li><?php echo $villa_data['address'] ?></li>
                                        <li><a href="<?php echo $villa_data['addres_link'] ?>" target="_blank">View on
                                                the map</a></li>
                                    </ul>
                                </div>
                                <?php if ($villa_data['phone']) : ?>
                                    <div class="villa-top-page__phone">
                                        <a href="tel:<?php echo $villa_data['phone'] ?>">
                                            <!-- <img
                                                    src="<?php //echo get_template_directory_uri(); 
                                                            ?>/assets/img/icons/tel.svg"
                                                    alt="" style="width:auto"> -->
                                            <svg style="margin-right: 16px;" width="14" height="22" viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1" y="1" width="12" height="20" rx="2" stroke="#EB5757" stroke-width="2" />
                                                <circle cx="7" cy="17" r="1" fill="#EB5757" />
                                                <rect x="5" y="2" width="4" height="2" fill="#EB5757" />
                                            </svg>
                                            <?php echo $villa_data['phone'] ?></a>
                                    </div>
                                <?php endif; ?>

                                <?php if (get_field('email_owner_villa')) : ?>
                                    <div class="villa-top-page__book-btns">
                                        <a href="#" class="book-btn bg-btn-red">
                                            Book now
                                        </a>
                                        <a href="#" class="book-btn bg-btn-white call-contact-owner">
                                            Contact owner
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($villa_data['go_to_website']) : ?>
                                    <div class="villa-top-page__to-site">
                                        <a href="<?php echo $villa_data['go_to_website'] ?>" target="_blank">Go to
                                            website</a>
                                    </div>
                                <?php endif; ?>
                                <div class="villa-top-page__social-list">
                                    <ul><?php if ($villa_data['whatsapp']) : ?>
                                            <li><a href="https://api.whatsapp.com/send?phone=<?php echo $villa_data['whatsapp'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/whatsup.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($villa_data['telegram']) : ?>
                                            <li><a href="https://t.me/<?php echo $villa_data['telegram'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/telegram.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($villa_data['viber']) : ?>
                                            <li><a href="<?php echo $villa_data['viber'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/viber.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($villa_data['facebook']) : ?>
                                            <li><a href="<?php echo $villa_data['facebook'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/facebook.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($villa_data['instagram']) : ?>
                                            <li><a href="<?php echo $villa_data['instagram'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/instagram.svg" alt=""></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                        $menu = get_field('villa_menu');
                        if ($menu) : ?>
                            <div class="restaurant-top-page__info-menu desktop-visible">
                                <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/menu.svg" alt=""></p>
                                <a href="#" class="open-menu">Open menu</a>
                            </div>
                            <div class="restaurant-top-page__info-menu mobile-visible" style="margin-top: 20px;">
                                <p><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/menu.svg" alt=""></p>
                                <a href="#" class="open-menu">Open menu</a>
                            </div>
                        <?php endif; ?>
                        <div class="villa-top-page__info-favorites desktop-visible">
                            <!--                                <p><img src="-->
                            <?php //echo get_template_directory_uri();
                            ?>
                            <!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                            <!--                                <a href="#">To favorites</a>-->
                            <p><?php echo do_shortcode('[favorite_button]') ?></p>
                        </div>
                        <div class="villa-top-page__info-block desktop-visible">
                            <?php $price_day = get_field('price_day') ?>
                            <table class="price-day">
                                <tr>
                                    <td>Monday:</td>
                                    <td><?php echo $price_day['monday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Tuesday:</td>
                                    <td><?php echo $price_day['tuesday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Wednesday:</td>
                                    <td><?php echo $price_day['wednesday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Thursday:</td>
                                    <td><?php echo $price_day['thursday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Friday:</td>
                                    <td><?php echo $price_day['friday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Saturday:</td>
                                    <td><?php echo $price_day['saturday'] ?> <span>&#36;</span></td>
                                </tr>
                                <tr>
                                    <td>Sunday:</td>
                                    <td><?php echo $price_day['sunday'] ?> <span>&#36;</span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="villa-top-page__info-block desktop-visible">
                            <div class="facilities-villas">
                                <h2 class="">Facilities</h2>
                                <div class="facilities-villas__block">

                                </div>
                                <?php $post = get_post() ?>
                                <?php $terms = get_terms([
                                    'taxonomy' => 'villa_facilities',
                                    'hide_empty' => false,
                                    'get'           => 'all',
                                    'childless'     => true,
                                    'object_ids' => $post->ID,
                                ]); ?>

                                <ul class="facilities-villas__list">
                                    <?php
                                    foreach ($terms as $k => $term) {
                                        echo '<li>' . $term->name . ' </li>';
                                    } ?>
                                </ul>
                            </div>
                        </div>
                        <?php $cam = get_field('restaurant_web_cam'); ?>
                            <?php if ($cam): ?>
                            <div class="web-cam-restaurant">
                                <div class="web-video">
                                    <?php echo $cam;?>
                                </div>
                                <h5>Web-cam in villa</h5>
                            </div>
                            <?php endif; ?>
                    </div>
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


            <div class="row">

            </div>

            <?php if (comments_open() || get_comments_number()) {
                comments_template();
            } ?>


        </div>
        </div>
    </main>
    <?php if (get_field('villa_day_tour')) : ?>
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
    <?php if (get_field('villa_night_tour')) : ?>

        <section class="panorama-slider2">
            <div class="container">
                <div class="row">

                </div>
            </div>
            <a class="close-panorama-slider2" href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
            </a>

        </section>
    <?php endif; ?>


    <?php if (get_field('email_owner_villa')) : ?>
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
                                <span>From:</span>
                                <label for="">
                                    <span class="icon-input">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/mail-input.svg" alt="">
                                    </span>
                                    <input name="date-from" type="date" value="<?php echo date('Y-m-d'); ?>" required="required">
                                </label>
                                <span>To:</span>
                                <label for="">
                                    <span class="icon-input">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/mail-input.svg" alt="">
                                    </span>
                                    <input name="date-to" type="date" value="<?php echo date('Y-m-d'); ?>" required="required">
                                </label>
                                <textarea name="text" placeholder="Your massage"></textarea>
                                <label>
                                    <input type="checkbox" name="checkbox" value="check" id="agree" required="required" />
                                    <p> I have read and agree to the <a href="#">Terms and Conditions and Privacy Policy</a></p>
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

    <section class="menu-slider">
        <div class="container">
            <div class="row">
                <?php
                $menu = get_field('villa_menu');
                if ($menu) : ?>
                    <div class="menu-foto-slider" data-width="100%" data-nav="thumbs" data-autoplay="false" data-allowfullscreen="native" style="width:100%">
                        <?php foreach ($menu as $image) : ?>
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


<?php if (get_field('villa_day_tour') || get_field('villa_night_tour')) { ?>
    <script>
        window.addEventListener('load', () => {
            let dayRespBlock = document.querySelector('.panorama-slider .container .row'),
                nightRespBlock = document.querySelector('.panorama-slider2 .container .row');

            setTimeout(() => {
                fetch(`${document.location.origin}/wp-admin/admin-ajax.php`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        body: 'action=villas_extra&post_id=<?php echo $post->ID; ?>&type=villa'
                    })
                    .then(res => res.json())
                    .then((res) => {
                        if (res.day_tour) {
                            dayRespBlock.innerHTML = res.day_tour;
                        }
                        if (res.night_tour) {
                            nightRespBlock.innerHTML = res.night_tour;
                        }
                    })
                    .catch(err => console.log(err));
            }, 3000);

        });
    </script>
<?php } ?>
<?php
//get_sidebar();
get_footer();
?>