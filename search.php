<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
                <div class="search-grid">

                    <?php if ( have_posts() ) : ?>

                        <?php 
                            global $wp_query;
                            $post_count = $wp_query->found_posts; ?>

<!--            			<header class="page-header">-->
            				<h1 class="page-title-search">
            					<?php
            					/* translators: %s: search query. */
            					printf( esc_html__( 'Founded '.$post_count. ' results for: %s', 'double' ), '<span>' . get_search_query() . '</span>' );
            					?>
            				</h1>
<!--            			</header>-->
                        <!-- .page-header -->
                        <div class="row">
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
            //				get_template_part( 'template-parts/content', 'search' );
                        ?>
                        <div class="col-md-4" style="margin-bottom:30px">
                            <div class="search-item">
                                <a href="<?php the_permalink(); ?>" class="link-page"></a>

                                <?php the_post_thumbnail(); ?>
                                <div class="search-item-content">
                                    <h4><?php the_title(); ?></h4>
                                    <?php the_excerpt(); ?>
                                    <div class="rating-group">
                                        <?php echo do_shortcode('[average_rating]') ?>
<!--                                        <span>9.2</span>-->
<!--                                        <div class="star-block">-->
<!--                                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""><img-->
<!--                                                    src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""></div>-->
                                    </div>
                                </div>
<!--                                <a class="like-btn" href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/blue-heart.svg" alt=""></a>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>
                        </div>

                        <?php

                        endwhile; ?>
                        </div>
                        <div class="pagination-block">
                            <div class="pagination-left">
                                <form action="" method="POST">
                                    <p>Show</p>
                                    <label>10
                                        <input type="radio" id="page10" name="count_page" value="10"></label>
                                    <label>20
                                        <input type="radio" id="page20" name="count_page" value="20"></label>
                                    <label>30
                                        <input type="radio" id="page30" name="count_page" value="30"></label>
                                </form>
                            </div>
                            <div class="pagination-right">
<?php

        $args = array(
        'show_all' => false, // показаны все страницы участвующие в пагинации
        'end_size' => 1,     // количество страниц на концах
        'mid_size' => 1,     // количество страниц вокруг текущей
        'prev_next' => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
        'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-left.svg" alt="">',
        'next_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-right.svg" alt="">',
        'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
        'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.

    );

        the_posts_pagination($args);

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
                </div>

                        </div>
                    
                </div>
            </div>
        </div>
    </main><!-- #main -->

<?php
//get_sidebar();
get_footer();
