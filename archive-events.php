<?php

get_header('secondary');

?>

    <main class="main-content">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="block-title-page">
                        <h1 class="main-title-page">Events</h1>
<!--                        <div class="filter-grid">-->
<!--                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/sort.svg" alt="">-->
<!--                            <p>sorting:</p>-->
<!--                            <ul>-->
<!--                                <li class="filter-grid__active">rating</li>-->
<!--                                <li>around the area</li>-->
<!--                            </ul>-->
<!--                        </div>-->
                        <div class="filter-grid-events">
                        <form action="" class="events-form" method="POST">
                            <p>filter: </p>
                            <select class="filter-grid-events__district" name="grid-district">
                                    <option value="">-District-</option>
                                    <?php
                                        $districts_terms = get_terms( [
                                            'taxonomy' => 'events_district',
                                            'hide_empty' => true,
                                            'childless'     => false,
                                        ] );
                                        foreach($districts_terms as $term){
                                            echo "<option value='{$term->name}'>{$term->name}</option>";
                                        }
                                    ?>
                            </select>
                            <select class="filter-grid-events__day-night" name="grid-day-night">
                                    <option value="">-Day/Night-</option>
                                    <?php
                                        $districts_terms = get_terms( [
                                            'taxonomy' => 'events_day_night',
                                            'hide_empty' => true,
                                            'childless'     => false,
                                        ] );
                                        foreach($districts_terms as $term){
                                            echo "<option value='{$term->name}'>{$term->name}</option>";
                                        }
                                    ?>
                            </select>
                            <img class="mobile-filter" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/sort.svg" alt="">
                            <p>sorting:</p>
                            
<!--                                <label class="filter-grid__active">rating-->
<!--                                    <input type="checkbox" name="rating_sort">-->
<!--                                </label>-->
                                <select class="filter-grid-events__date" name="grid-date">
                                    <option value="">date</option>
                                    <option value="ASC">low</option>
                                    <option value="DESC">high</option>
                                </select>
<!--                                <select class="filter-grid-events__price" name="grid-price">-->
<!--                                    <option value="night">night</option>-->
<!--                                    <option value="day">day</option>-->
<!--                                </select>-->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row event-grid" id="response-events">


                    <?php if ( have_posts() ) : ?>

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            ?>
                            <?php $event = get_field('event'); ?>
                            <div class="event-grid-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(array(275,412)); ?>
                                </a>
                                <h5><?php the_title(); ?></h5>
                                <span class="date-other-event"><?php echo esc_html( $event['date'] ); ?></span>
<!--                                <a class="like-btn" href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/blue-heart.svg" alt=""></a>-->
                                <?php echo do_shortcode('[favorite_button]') ?>
                            </div>

                        <?php endwhile;

                        //the_posts_navigation();

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>

                    <div class="pagination-block">
                        <div class="pagination-left">
                            <form action="" method="POST">
                                <p>Show</p>
                                <label>10
                                    <input type="radio" id="page12" name="count_page" value="10"></label>
                                <label>20
                                    <input type="radio" id="page24" name="count_page" value="20"></label>
                                <label>30
                                    <input type="radio" id="page36" name="count_page" value="30"></label>

                                <!--            <span>10</span>-->
                                <!--            <a href="#">20</a>-->
                                <!--            <a href="#">30</a>-->
                            </form>
                        </div>
                        <div class="pagination-right">
                            <?php $args = array(
                                'show_all' => false, // показаны все страницы участвующие в пагинации
                                'end_size' => 1,     // количество страниц на концах
                                'mid_size' => 1,     // количество страниц вокруг текущей
                                'prev_next' => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                                'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-left.svg" alt="">',
                                'next_text' => '<img src="' . get_template_directory_uri() . '/assets/img/icons/pagin-arr-right.svg" alt="">',
                                'add_args' => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                                'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.

                            );

                            $pagination = get_the_posts_pagination($args);

                            echo str_replace('wp-admin/admin-ajax.php', 'events', $pagination); ?>

                        </div>
                    </div>

                </div>


            <div class="row">

                </div>
            </div>
        </div>
        </div>
    </main>




<?php
get_footer();
