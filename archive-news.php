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
                            <li class="breadcrumb-item active" aria-current="page">News</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="block-title-page">
                        <h1 class="main-title-page">News</h1>
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
                <div class="row news-grid" id="response-clubs">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- post -->
                    <div class="col-md-4" style="margin-bottom:30px">
                        <div class="news-item">
                            <a href="<?php the_permalink(); ?>" class="link-page"></a>

                            <?php the_post_thumbnail(); ?>
                            <div class="news-item-content">
                                <h4><?php the_title(); ?></h4>
                                <?php the_excerpt(); ?>
                                <div class="news-date-row">
                                    <div class="news-img">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/icons/clock.svg">
                                    </div>
                                    <span class="news-date"><?php the_time('d.m.Y') ?></span>
                                </div>
                            </div>
                            
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
