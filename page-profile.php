<?php

/**
 * Template name: Profile
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
            <h1 class="profile-heading">Personal Area</h1>
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
                <div class="col-md-9">
                    <?php if (is_user_logged_in()) : ?>
                        <div class="user-data">
                            <div class="user-avatar">
                                <?php
                                $cur_user_id = get_current_user_id();
                                echo get_avatar($cur_user_id, 144, '', '', array('class' => 'user-avatar__image'));
                                ?>
                            </div>
                            <div class="user-name">
                                <?php
                                $current_user = wp_get_current_user();
                                ?>
                                <h2><?php echo $current_user->user_firstname . '<br>' . $current_user->user_lastname; ?></h2>
                            </div>
                            <div class="user-contacts">

                                <?php if ($current_user->user_email) : ?>
                                    <div class="user-contacts__email">
                                        <div class="user-contacts__icon">
                                            <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1" y="1" width="18" height="13" rx="2" stroke="#EB5757" stroke-width="2" />
                                                <path d="M1.10938 1.77777L9.99826 7.99999L18.8872 1.77777" stroke="#EB5757" stroke-width="2" />
                                            </svg>
                                        </div>
                                        <a href="mailto:<?php echo $current_user->user_email; ?>"><?php echo $current_user->user_email; ?></a>
                                    </div>
                                <?php endif; ?>

                                <?php if (get_user_meta($cur_user_id, 'billing_phone', true)) : ?>
                                    <div class="user-contacts__phone">
                                        <div class="user-contacts__icon">
                                            <svg width="14" height="22" viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1" y="1" width="12" height="20" rx="2" stroke="#EB5757" stroke-width="2" />
                                                <circle cx="7" cy="17" r="1" fill="#EB5757" />
                                                <rect x="5" y="2" width="4" height="2" fill="#EB5757" />
                                            </svg>
                                        </div>
                                        <a href="tel:<?php echo get_user_meta($cur_user_id, 'billing_phone', true); ?>"><?php echo get_user_meta($cur_user_id, 'billing_phone', true); ?></a>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="user-address">

                                <?php if (get_user_meta($cur_user_id, 'billing_city', true)) : ?>
                                    <div class="user-address__city">
                                        <div class="user-contacts__icon">
                                            <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 7.99979C15 9.92245 13.9803 12.4394 12.4373 14.9131C11.1085 17.0433 9.47033 19.0163 8 20.3813C6.52967 19.0163 4.89154 17.0433 3.56274 14.9131C2.01966 12.4394 1 9.92245 1 7.99979C1 4.13379 4.13401 0.999786 8 0.999786C11.866 0.999786 15 4.13379 15 7.99979Z" stroke="#EB5757" stroke-width="2" />
                                                <circle cx="8" cy="8.35672" r="2" stroke="#EB5757" stroke-width="2" />
                                            </svg>
                                        </div>
                                        <span><?php echo get_user_meta($cur_user_id, 'billing_city', true); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (get_user_meta($cur_user_id, 'billing_address_1', true)) : ?>
                                    <div class="user-address__address">
                                        <div class="user-contacts__icon">
                                            <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 7.99979C15 9.92245 13.9803 12.4394 12.4373 14.9131C11.1085 17.0433 9.47033 19.0163 8 20.3813C6.52967 19.0163 4.89154 17.0433 3.56274 14.9131C2.01966 12.4394 1 9.92245 1 7.99979C1 4.13379 4.13401 0.999786 8 0.999786C11.866 0.999786 15 4.13379 15 7.99979Z" stroke="#EB5757" stroke-width="2" />
                                                <circle cx="8" cy="8.35672" r="2" stroke="#EB5757" stroke-width="2" />
                                            </svg>
                                        </div>
                                        <span><?php echo get_user_meta($cur_user_id, 'billing_address_1', true); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
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
                <div class="col-md-3">

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
