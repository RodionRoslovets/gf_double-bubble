<?php

/**
 * Template Post Type: tours
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
                            <li class="breadcrumb-item"><a href="/rent-transport">Rent transport</a></li>
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
                    <div class="block-info" style="justify-content:flex-end">

                        <div class="clubs-item-rating">
                            <div class="rating-group">
                                <?php echo do_shortcode('[average_rating]') ?>
                            </div>
                            <div class="addthis_inline_share_toolbox"></div>
                            <div class="villa-blue-heart mobile-visible">
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>
                        </div>

                        <div class="day-tour-panorama">
                            <?php if (get_field('transport_tour')) : ?>
                                <a href="#" class="club-panorama">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt="">
                                    <p><?php echo esc_html__('Tour 360', 'double'); ?></p>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="row villa-top-page car-top-page">
                    <div class="col-lg-8">
                        <?php
                        $images = get_field('gallery_cars');
                        if ($images) : ?>
                            <div class="villas-slider" data-nav="thumbs" data-autoplay="true">
                                <?php foreach ($images as $image) : ?>
                                    <a href="<?php echo esc_url($image['url']); ?>"><img src="<?php echo esc_url($image['url']); ?>"></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>


                        <div class="row content-club desktop-visible">
                            <h2 class="titles-page">About transport</h2>
                            <?php the_content(); ?>
                        </div>
                        <?php
                        if (get_field('map_link')) {
                        ?>
                            <div class="map">
                                <?php
                                the_field('map_link');
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="col-lg-4">
                        <?php $tours = get_field('rent_transport_data'); 
                        $tours['price_multiplier'] = $tours['price_multiplier'] ? $tours['price_multiplier'] : 30;?>
                        <div class="villa-top-page__info">
                            <div class="villa-top-page__info-block">
                                <div class="tour-top-page__price">
                                    <p><?php echo esc_html($tours['price']); ?><span>&#36;</span></p>
                                    <p style="flex-grow:1">per day if rented for <?php echo $tours['price_multiplier']; ?> days <br> Total <?php echo $tours['price_multiplier']; ?> days: <?php echo esc_html($tours['price'] * $tours['price_multiplier']); ?> $</p>
                                </div>

                                <?php if (get_field('email_owner_villa')) : ?>
                                    <div class="villa-top-page__book-btns">
                                        <a href="#" class="book-btn bg-btn-red">
                                            Book now
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if (get_field('rent_transport_data')) :
                                    $transport_data = get_field('rent_transport_data');
                                    if ($transport_data['address']) {
                                        echo '<p>' . $transport_data['address'] . '</p>';
                                    }
                                    if ($transport_data['addres_link']) {
                                        echo '<p><a href="' . $transport_data['addres_link'] . '">Go to map page</a></p>';
                                    }
                                    if ($transport_data['phone']) {
                                        echo '<p><a href="tel:' . $transport_data['phone'] . '">' . $transport_data['phone'] . '</a></p>';
                                    }
                                    if ($transport_data['go_to_website']) {
                                        echo '<p><a href="' . $transport_data['go_to_website'] . '">Go to website</a></p>';
                                    }

                                ?><?php endif; ?>
                                <div class="villa-top-page__social-list">
                                    <ul><?php if ($transport_data['whatsapp']) : ?>
                                            <li><a href="https://api.whatsapp.com/send?phone=<?php echo $transport_data['whatsapp'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/whatsup.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($transport_data['telegram']) : ?>
                                            <li><a href="https://t.me/<?php echo $transport_data['telegram'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/telegram.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($transport_data['viber']) : ?>
                                            <li><a href="<?php echo $transport_data['viber'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/viber.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($transport_data['facebook']) : ?>
                                            <li><a href="<?php echo $transport_data['facebook'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/facebook.svg" alt=""></a></li>
                                        <?php endif; ?>
                                        <?php if ($transport_data['instagram']) : ?>
                                            <li><a href="<?php echo $transport_data['instagram'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/instagram.svg" alt=""></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>


                            </div>

                            <div class="tour-top-page__info-options">
                                <?php $post = get_post() ?>
                                <?php $terms = get_terms([
                                    'taxonomy' => 'rent_transport_facilities',
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

                            <div class="restaurant-top-page__info-favorites desktop-visible">
                                <!--                                <p><img src="--><?php //echo get_template_directory_uri(); 
                                                                                    ?>
                                <!--/assets/img/icons/heart-favorite.svg" alt=""></p>-->
                                <!--                                <a href="#">To favorites</a>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>
                            <?php $price_day = get_field('price_per');
                                if ($price_day) : ?>
                            <div class="villa-top-page__info-block desktop-visible" style="margin-top:16px">
                                
                                    <table class="price-day">
                                        <thead>
                                            <tr>
                                                <th>Price per:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($price_day['day'])  : ?>
                                            <tr>
                                                <td>Day:</td>
                                                <td><?php echo $price_day['day'] ?> <span>&#36;</span></td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php if ($price_day['week'])  : ?>
                                            <tr>
                                                <td>Week:</td>
                                                <td><?php echo $price_day['week'] ?> <span>&#36;</span></td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php if ($price_day['month'])  : ?>
                                            <tr>
                                                <td>Month:</td>
                                                <td><?php echo $price_day['month'] ?> <span>&#36;</span></td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>

                                    </table>
                                
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row content-club mobile-visible">
                    <h2 class="titles-page">About transport</h2>
                    <p><?php the_content(); ?></p>
                </div>
                <div class="row">
                    <h2 class="titles-page">Other transport</h2>
                    <div class="other-cars__slider owl-theme owl-carousel">

                        <?php // параметры по умолчанию
                        $posts = get_posts(array(
                            'numberposts' => 15,
                            'category'    => 0,
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'include'     => array(),
                            'exclude'     => array(),
                            'meta_key'    => '',
                            'meta_value'  => '',
                            'post_type'   => 'rent-transport',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ));

                        foreach ($posts as $post) {
                            setup_postdata($post);
                            $data = get_field('rent_transport_data');
                        ?>

                            <div class="restaurants-preview__item">
                                <a href="<?php the_permalink(); ?>" class="restaurants-preview__item_image">
                                    <?php the_post_thumbnail(); ?>
                                </a>

                                <div class="restaurants-preview__item_content">
                                    <h5><?php the_title(); ?></h5>
                                    <div class="rent_transport__price">
                                        <p><?php echo $data['price'] ?>$</p>
                                        <p>&nbsp;per day</p>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }

                        wp_reset_postdata(); // сброс 
                        ?>


                    </div>
                </div>
            </div>
        </div>

    </main>

    <section class="panorama-slider">
        <div class="container">
            <div class="row">
                <?php
                $gallery = get_field('panorama_gallery');
                ?>
                <?php if ($gallery) : ?>
                    <?php $count = 1 ?>
                    <ul id="lightSlider">
                        <?php foreach ($gallery as $image) : ?>
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

<?php

endwhile; // End of the loop.
?>

<?php if (get_field('transport_tour')) : ?>
    <section class="panorama-slider">
        <div class="container">
            <div class="row">
                <?php the_field('transport_tour'); ?>
            </div>
        </div>
        <a class="close-panorama-slider" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
        </a>

    </section>
<?php endif; ?>
<?php
//get_sidebar();
get_footer();
?>