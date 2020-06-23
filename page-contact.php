<?php
/**
 * Template name: Contacts
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
                <div class="row">
                    <?php
                    while ( have_posts() ) :
                        the_post(); ?>
                    <div class="col-md-4">

                        <h1 class="h1 contacts__h1"><?php the_title(); ?></h1>
                                                <?php if (get_field('contact_phone')): ?>
                            <p><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/phone.svg" alt="">
                                <a class="contacts__link contacts__phone-link"
                                   href="tel:<?php the_field('contact_phone'); ?>"><?php the_field('contact_phone'); ?></a>
                            </p>
                        <?php endif; ?>
                        <?php if (get_field('contact_mail')): ?>
                            <p><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/mail.svg" alt="">
                                <a class="contacts__link contacts__phone-mail"
                                   href="mailto:<?php the_field('contact_mail'); ?>"><?php the_field('contact_mail'); ?></a>
                            </p>
                        <?php endif; ?>

                        <?php endwhile; // End of the loop.
                        ?>
                    </div>
                    <div class="col-md-8">
                        <h4 class="h4 contacts__h4">Write to us</h4>
                        <?php echo do_shortcode('[contact-form-7 id="463" title="Contacts"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();