<?php
/**
 * Template Post Type: clubs
 */

get_header('secondary');
?>



<?php
while ( have_posts() ) :
    the_post();

//			get_template_part( 'template-parts/content', get_post_type() );
    ?>

    <main class="main-content">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="block-title-page title-club">
                        <h1 class="main-title-page"><?php the_title(); ?></h1>
                    </div>
                </div>

                <div class="row content-club">
                    <?php the_content(); ?>
                </div>

<?php endwhile;?>


<?php
//get_sidebar();
get_footer();
?>