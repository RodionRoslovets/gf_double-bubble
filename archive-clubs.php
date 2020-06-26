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
                            <li class="breadcrumb-item active" aria-current="page">Clubs</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="block-title-page clubs-title">
                        <h1 class="main-title-page">Clubs</h1>
                        <form action="" class="clubs-form" method="POST">
                            <p>filter: </p>
                            <select class="filter-grid-clubs__district" name="grid-district">
                                    <option value="">-District-</option>
                                    <?php
                                        $districts_terms = get_terms( [
                                            'taxonomy' => 'clubs_district',
                                            'hide_empty' => true,
                                            'childless'     => false,
                                        ] );
                                        foreach($districts_terms as $term){
                                            echo "<option value='{$term->name}'>{$term->name}</option>";
                                        }
                                    ?>
                            </select>
                            <select class="filter-grid-clubs__day-night" name="grid-day-night">
                                    <option value="">-Day/Night-</option>
                                    <?php
                                        $districts_terms = get_terms( [
                                            'taxonomy' => 'clubs_day_night',
                                            'hide_empty' => true,
                                            'childless'     => false,
                                        ] );
                                        foreach($districts_terms as $term){
                                            echo "<option value='{$term->name}'>{$term->name}</option>";
                                        }
                                    ?>
                            </select>
                            </form>
                        <div class="filter-grid" style="display: none;">
                        
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/sort.svg" alt="">
                            <p>sorting:</p>
                            <ul>
                                <li class="filter-grid__active">rating</li>
                                <li>around the area</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clubs-grid" id="response-clubs">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- post -->
                    <div class="col-md-4" style="margin-bottom:30px">
                        <div class="clubs-item">
                            <a href="<?php the_permalink(); ?>" class="link-page"></a>

                            <?php the_post_thumbnail(); ?>
                            <div class="clubs-item-content">
                                <h4><?php the_title(); ?></h4>
                                <?php the_excerpt(); ?>
                                <div class="rating-group">
                                    <?php echo do_shortcode('[average_rating]') ?>
<!--                                    <span>9.2</span>-->
<!--                                    <div class="star-block">-->
<!--                                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-full.svg" alt=""><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""><img-->
<!--                                                src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt=""></div>-->
                                </div>
                            </div>
<!--                            <a class="like-btn" href="#"><img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/blue-heart.svg" alt=""></a>-->
                            <?php echo do_shortcode('[favorite_button]') ?>
                        </div>
                    </div>

                    <?php endwhile; ?>
                    <!-- post navigation -->
                    <?php else: ?>
                    <!--no posts found-->
                    <?php endif; ?>

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

                            echo str_replace('wp-admin/admin-ajax.php', 'clubs', $pagination); ?>

                        </div>
                    </div>

                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </main>



<?php
get_footer();
