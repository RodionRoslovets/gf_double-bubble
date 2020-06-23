<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package double
 */

?>

<section class="country-modal">
    <div class="country-modal__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="country-modal__item">
                        <a href="/">Thailand</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="country-modal__item">
                        <a href="/">Bali</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="country-modal__item">
                        <a href="/">Sri Lanka</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="country-modal__close" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cross-modal.svg" alt="">
        </a>
    </div>
</section>


<footer class="footer">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-xl-3 col-12 footer-column">
                    <div class="logo-footer">
                        <?php the_custom_logo( $blog_id ); ?>
                        <p>Double<br />bubble</p>
                    </div>
                    <p class="slogan-footer">© Double bubble, <?php the_date('Y'); ?>,<br /><?php echo esc_html__('All rights reserved','double');?></p>
                </div>
                <div class="col-md-6 col-lg-3 col-12 footer-column">

                    <?php wp_nav_menu( array(
                            'theme_location'  => 'footer_menu_1',
                            'container' => false,
                            'menu_class' => '',
                            'walker' => new Footer_Menu_1,
                        )
                    ); ?>

                </div>
                <div class="col-md-6 col-lg-3 col-12 footer-column">

                    <?php wp_nav_menu( array(
                            'theme_location'  => 'footer_menu_2',
                            'container' => false,
                            'menu_class' => '',
                            'walker' => new Footer_Menu_2,
                        )
                    ); ?>

                </div>
                <div class="col-md-6 col-lg-3 col-12 footer-column footer-subscribe">
                    <p>Subscribe</p>
                    <form class="form-subscribe" action="">
                        <input type="email" placeholder="Enter your e-mail">
                        <input type="button" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="copyright-block">
                        <div class="copyright-item">
                            <a href="https://goodfellazz.ru/" class="dev" target="_blank"><?php echo esc_html__('Developed by Good Fellazz','double');?></a>
                        </div>
                        <div class="copyright-item">
                            <a href="#">Privacy policy</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="shadow-screen"></div>

<!--<script src="libs/bootstrap/js/bootstrap.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>


<?php wp_footer(); ?>
</body>
</html>

