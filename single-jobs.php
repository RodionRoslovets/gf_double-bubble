<?php

/**
 * Template Post Type: events
 */

get_header('secondary');
?>

<div id="primary" class="content-area job-page">
    <main id="main" class="site-main">

        <?php
        while (have_posts()) :
            the_post();
        ?>

            <div class="wrapper">
                <div class="container-fluid">
                    <h1 class="h1"><?php the_title(); ?></h1>

                    <div class="job-info">
                        <p class="job-info__price">
                            <strong class="job-info__price--strong"><?php the_field('job_price'); ?></strong> $
                        </p>
                        <p class="job-info__place"><?php the_field('job_place_of_work'); ?></p>
                        <p class="job-info__address"><?php the_field('job_address'); ?></p>
                    </div>
                    <div class="row">
                        <div class="col-md-9">


                            <div class="job-contact col-md-9">
                                <h5 class="job-contact__title">Contact Information</h5>
                                <div class="job-contact__row">
                                    <div class="job-contact__phone">
                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1" y="1" width="8" height="14" rx="2" stroke="#EB5757" stroke-width="2" />
                                            <circle cx="5" cy="12" r="1" fill="#EB5757" />
                                            <rect x="3" y="3" width="4" height="1" fill="#EB5757" />
                                        </svg>
                                        <a href="tel:<?php the_field('job_phone'); ?>"><?php the_field('job_phone'); ?></a>
                                    </div>
                                    <div class="job-contact__email">
                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1" y="1" width="14" height="10" rx="2" stroke="#EB5757" stroke-width="2" />
                                            <path d="M1.33203 1.33331L7.9987 5.99998L14.6654 1.33331" stroke="#EB5757" stroke-width="2" />
                                        </svg>
                                        <a href="mailto:<?php the_field('job_mail'); ?>"><?php the_field('job_mail'); ?></a>
                                    </div>
                                    <div class="job-contact__name">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 15V10.8333H14.3333V15" stroke="#EB5757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="7.66667" cy="4.16667" r="3.16667" stroke="#EB5757" stroke-width="2" />
                                        </svg>
                                        <?php the_field('job_name'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="job-content col-md-9">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-sidebar similar-vacancies">
                                <h3 class="similar-vacancies__title">Similar vacancies</h3>
                                <?php $catquery = new WP_Query('cat=$id&posts_per_page=4&post_type=jobs'); ?>
                                <ul>
                                    <?php while ($catquery->have_posts()) : $catquery->the_post(); ?>
                                        <li>
                                            <a href="<?php the_permalink() ?>" rel="bookmark"><h3 class="vacancy-title"><?php the_title(); ?></h3></a>
                                            <p class="vacancy-payment"><?php the_field('job_price'); ?> $</p>
                                            <p class="vacancy-place"><?php the_field('job_place_of_work'); ?></p>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
