<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package double
 */

?>
<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">

    <title><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon.ico">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/@1x/preview.jpg">

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">

    <!-- Fotorama from CDNJS, 19 KB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">


    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e7c61fd209cf022"></script>



    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header class="header header-dark">
        <div class="header-left">
            <div class="logo-header bg-logo-header">
                <?php if (has_custom_logo()) : the_custom_logo() ?>
                <?php else : ?>
                    <p><?php bloginfo('name'); ?></p>
                <?php endif; ?>
            </div>

            <?php wp_nav_menu(
                array(
                    'theme_location'  => 'header_menu_left',
                    'container' => false,
                    'menu_class' => 'navbar-top nav-top-left',
                    'walker' => new Header_Menu_Left,
                )
            ); ?>
        </div>
        <div class="header-right">
            <ul class="navbar-top nav-top-right">
                <li>
                    <a href="/favorites">
                        <?php echo do_shortcode('[user_favorite_count]') ?>
                        <!-- <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/icons/heart-white.svg" alt=""> -->
                        <svg class="header-item__icon" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="header-item__icon_stroke" d="M2.97518 10L9.96144 17L16.9827 10C18.4981 8.45698 20.4087 4.56382 17.4395 2.10367C14.5986 -0.25016 11.1262 2.10367 9.91595 3.5472C8.71613 2.18426 5.44233 -0.521521 2.48353 2.10367C-0.112794 4.40726 1.11986 8.03308 2.97518 10Z" stroke="white" stroke-width="2" stroke-linejoin="round" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="search-header-btn">
                        <!-- <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/icons/search-white.svg" alt=""> -->
                        <svg class="header-item__icon" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle class="header-item__icon_stroke" cx="7.5" cy="7.5" r="6.5" stroke="white" stroke-width="2" />
                            <path class="header-item__icon_stroke" d="M12.5 12.5L16 16" stroke="white" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </a>
                    <?php get_search_form(); ?>
                </li>
                <li>
                    <a href="/cart">
                        <span class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        <!-- <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/icons/cart-white.svg" alt=""> -->
                        <svg class="header-item__icon" width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="header-item__icon_stroke" d="M1 1H4L9 12H18L21 5H10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <circle class="header-item__icon_filled" cx="9.5" cy="15.5" r="1.5" fill="white" />
                            <circle class="header-item__icon_filled" cx="17.5" cy="15.5" r="1.5" fill="white" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="/profile/">
                        <!-- <img src="<?php //echo get_template_directory_uri(); 
                                        ?>/assets/img/icons/user-white.svg" alt=""> -->
                        <svg class="header-item__icon" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="header-item__icon_stroke" d="M1 16V12H15V16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <circle class="header-item__icon_stroke" cx="8" cy="5" r="4" stroke="white" stroke-width="2" />
                        </svg>
                    </a>
                </li>
            </ul>
            <a class="btn-main-menu" href="#">
                <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/img/icons/btn-menu.svg" alt=""> -->
                <svg class="header-item__menu-icon" width="24" height="10" viewBox="0 0 24 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="2" transform="matrix(-1 0 0 1 24 0)" fill="#1F1F24" />
                    <rect width="14" height="2" transform="matrix(-1 0 0 1 24 8)" fill="#1F1F24" />
                </svg>
            </a>
        </div>
    </header>

    <section>
        <div class="right-full-menu">

            <?php wp_nav_menu(
                array(
                    'theme_location'  => 'header_menu_right',
                    'container' => false,
                    'menu_class' => '',
                    'walker' => new Header_Menu_Right,
                )
            );  ?>

            <a href="#" class="cross-close"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt=""></a>
        </div>
    </section>