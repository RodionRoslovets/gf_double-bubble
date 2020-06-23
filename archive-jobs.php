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
                        <li class="breadcrumb-item active" aria-current="page">Job</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="block-title-page">
                    <h1 class="main-title-page">Job</h1>
                    <!--                        <div class="filter-grid">-->
                    <!--                            <img src="--><?php //echo get_template_directory_uri(); 
                                                                    ?>
                    <!--/assets/img/icons/sort.svg" alt="">-->
                    <!--                            <p>sorting:</p>-->
                    <!--                            <ul>-->
                    <!--                                <li class="filter-grid__active">rating</li>-->
                    <!--                                <li>around the area</li>-->
                    <!--                            </ul>-->
                    <!--                        </div>-->
                    <div class="filter-grid-events">
                        <!-- <img class="mobile-filter" src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/sort.svg" alt="">
                        <p>sorting:</p>
                        <form action="" method="POST"> -->
                            <!--                                <label class="filter-grid__active">rating-->
                            <!--                                    <input type="checkbox" name="rating_sort">-->
                            <!--                                </label>-->
                            <!-- <select class="filter-grid-events__date" name="grid-date">
                                <option value="">date</option>
                                <option value="ASC">low</option>
                                <option value="DESC">high</option>
                            </select> -->
                            <!--                                <select class="filter-grid-events__price" name="grid-price">-->
                            <!--                                    <option value="night">night</option>-->
                            <!--                                    <option value="day">day</option>-->
                            <!--                                </select>-->
<!--                         </form>
 -->                    </div>
                </div>
            </div>
            <div class="job-list" id="">


                <?php if (have_posts()) : ?>

                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                    ?>
                        <?php //$event = get_field('event'); 
                        ?>
                        <div class="job-list-item">
                            <div class="job-list-item__heading">
                            <a href="<?php echo the_permalink(); ?>"><h5 class="job-list-item__heading-title"><?php the_title(); ?></h5></a>
                                <div class="job-list-item__heading-payment"><?php the_field('job_price'); ?> <span>$</span></div>
                            </div>
                            <div class="job-list-item__data">
                                <span class="job-list-item__data-place"><?php the_field('job_place_of_work'); ?></span>
                                <!-- <span class="job-list-item__data-map">
                                    <a href="#">Посмотреть на карте</a>
                                </span> -->
                            </div>
                            <div class="job-list-item__content">
                                <p><? the_excerpt();?></p>
                            </div>
                            <div class="job-list-item__contacts-and-date">
                                <div class="job-list-item__contacts">
                                    <div class="job-list-item__contacts-phone">
                                        <span class="job-list-item__contacts-icon">
                                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1" y="1" width="8" height="14" rx="1" stroke="#EB5757" stroke-width="2" />
                                                <circle cx="5" cy="12" r="1" fill="#EB5757" />
                                                <rect x="3" y="3" width="4" height="1" fill="#EB5757" />
                                            </svg>
                                        </span>
                                        <a href="tel:<?php the_field('job_phone'); ?>"><?php the_field('job_phone'); ?></a>
                                    </div>
                                    <div class="job-list-item__contacts-mail">
                                        <span class="job-list-item__contacts-icon">
                                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1" y="1" width="14" height="10" rx="1" stroke="#EB5757" stroke-width="2"/>
                                                <path d="M1.33203 1.33331L7.9987 5.99998L14.6654 1.33331" stroke="#EB5757" stroke-width="2"/>
                                            </svg>
                                        </span>
                                        <a href="mailto:<?php the_field('job_mail'); ?>"><?php the_field('job_mail'); ?></a>
                                    </div>
                                    <div class="job-list-item__contacts-name">
                                        <span class="job-list-item__contacts-icon">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 15V10.8333H14.3333V15" stroke="#EB5757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <circle cx="7.66667" cy="4.16667" r="3.16667" stroke="#EB5757" stroke-width="2" />
                                            </svg>
                                        </span>
                                        <span>
                                            <?php the_field('job_name'); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="job-list-item__date">
                                    <p>12th of december</p>
                                </div>
                            </div>
                        </div>

                <?php endwhile;

                //the_posts_navigation();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>

                <div class="pagination-block">
                    <!-- <div class="pagination-left">
                            <form action="" method="POST">
                                <p>Show</p>
                                <label>10
                                    <input type="radio" id="page12" name="count_page" value="10"></label>
                                <label>20
                                    <input type="radio" id="page24" name="count_page" value="20"></label>
                                <label>30
                                    <input type="radio" id="page36" name="count_page" value="30"></label>

                                    <span>10</span>-->
                    <!--            <a href="#">20</a>-->
                    <!--            <a href="#">30</a>-->
                    <!-- </form>
                </div> -->
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

                    echo str_replace('wp-admin/admin-ajax.php', 'jobs', $pagination); ?>

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
