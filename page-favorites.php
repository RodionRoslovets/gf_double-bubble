<?php

/**
 * Template name: Favorites
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package double
 */

get_header('secondary');
?>

<main class="main-content">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
            <h1 class="profile-heading">Favorites</h1>
            <div class="menu-and-logout">
                <div class="profile-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'profile_menu',
                        'menu' => 'Profile Menu',
                    ));
                    ?>
                </div>
                <div class="desctop-logout">
                    <?php if (is_user_logged_in()) : ?>
                        <a href="<?php echo wp_logout_url(get_home_url()); ?>">Log out</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <ul class="favorites-posts-menu">
                        <li class="favorites-posts-menu_active">
                            <a href="/" data-type="villas">Villas</a>
                        </li>
                        <li>
                            <a href="/" data-type="rent-transport">Rent transport</a>
                        </li>
                        <li>
                            <a href="/" data-type="events">Events</a>
                        </li>
                        <li>
                            <a href="/" data-type="clubs">Clubs</a>
                        </li>
                        <li>
                            <a href="/" data-type="restaurants">Restaurants</a>
                        </li>
                        <li>
                            <a href="/" data-type="tours">Tours</a>
                        </li>
                        <li>
                            <a href="/" data-type="product">Product</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <?php if (is_user_logged_in()) : ?>
                        <?php
                        $favorites = get_user_favorites();
                        ?>

                        <div class="row favorites-posts">
                            <?php
                            $posts = get_posts(array(
                                'include'     => $favorites,
                                'exclude'     => array(),
                                'meta_key'    => '',
                                'meta_value'  => '',
                                'post_type'   => 'villas',
                                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                            ));

                            // echo '<pre>';
                            // var_dump($posts);
                            // echo '</pre>';

                            foreach ($posts as $post) {
                                setup_postdata($post);
                            ?>

                                <div class="col-lg-4 col-sm-6 d-flex justify-content-center">
                                    <div class="restaurants-preview__item">
                                        <a href="<?php the_permalink(); ?>" class="restaurants-preview__item_image">
                                            <?php the_post_thumbnail(); ?>
                                        </a>

                                        <div class="restaurants-preview__item_content">
                                            <a href="<?php the_permalink(); ?>">
                                                <h5><?php the_title(); ?></h5>
                                            </a>
                                            <?php the_excerpt(); ?>
                                            <div class="rating-group">
                                                <?php echo do_shortcode('[average_rating]') ?>
                                            </div>
                                        </div>
                                        <?php echo do_shortcode('[favorite_button]') ?>
                                    </div>
                                </div>

                            <?php
                            }

                            wp_reset_postdata(); ?>
                        </div>




                        <?php echo do_shortcode('[clear_favorites_button]'); ?>
                    <?php else : ?>
                        <div class="log-in-form col-md-6">
                            <?php
                            $args = array(
                                'echo' => true,
                                'redirect' => get_home_url() . '/profile',
                                'form_id' => 'loginform',
                                'label_username' => 'Login',
                                'label_password' => 'Password',
                                'label_remember' => 'Remember me',
                                'label_log_in' => 'Sign up',
                                'id_username' => 'user_login',
                                'id_password' => 'user_pass',
                                'id_remember' => 'rememberme',
                                'id_submit' => 'wp-submit',
                                'remember' => true,
                                'value_username' => NULL,
                                'value_remember' => false
                            );

                            wp_login_form($args); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="mobile-logout">
            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo wp_logout_url(get_home_url()); ?>">Log out</a>
            <?php endif; ?>
        </div>
    </div>
    </div>
</main>





<?php
//get_sidebar();
get_footer();
