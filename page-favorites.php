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
                <h1>Personal Area</h1>
                <?php
                        wp_nav_menu(array(
                            'theme_location' => 'profile_menu',
                            'menu'=>'Profile Menu',
                        ));
                        ?>
                <div class="row">
                    <div class="col-md-9">
                        <?php if(is_user_logged_in(  )) :?>
                        <?php echo do_shortcode('[user_favorites]'); ?>
                        <?php echo do_shortcode('[clear_favorites_button]'); ?>
                        <?php else : ?>
                            <?php 
                            $args = array(
                                'echo' => true,
                                'redirect' => site_url( $_SERVER['REQUEST_URI'] ),
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

                            wp_login_form( $args );?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                      
                    </div>
                </div>
            </div>
        </div>
    </main>





<?php
//get_sidebar();
get_footer();
