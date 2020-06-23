<?php
/**
 * Template name: Question Answer
 */

get_header('secondary');
?>

    <main class="main-content lawyer">
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
                <div class="row contacts">
                    <?php
                    while (have_posts()) :
                    the_post(); ?>
                    <div class="col-12">

                        <div class="lawyer-page-heading">
                            <h1 class="h1 contacts__h1"><?php the_title(); ?></h1>
                            <div class="lawyer-card">
                                <div class="lawyer-card__description">
                                    <div class="lawyer-card__description-avatar">
                                        <img src="<?php echo get_home_url() ?>/wp-content/uploads/2020/06/ellipse-398.png" alt="">
                                    </div>
                                    <div class="lawyer-card__description-data">
                                        <p class="lawyer-card__description-profession">lawyer</p>
                                        <p class="lawyer-card__description-name">Aleksandr Konstantinopolsky</p>
                                    </div>
                                </div>
                                <div class="lawyer-card__button">
                                    <button class="btn btn-block btn-danger" type="button">Ask a Question</button>
                                </div>
                            </div>
                        </div>

                        <div class = "comments-categories">
                            <ul>
                                <li class="comments-categories__category comments-categories__category_active">Category 1</li>
                                <li class="comments-categories__category">Category 2</li>
                                <li class="comments-categories__category">Category 3</li>
                                <li class="comments-categories__category">Category 4</li>
                                <li class="comments-categories__category">Category 5</li>
                            </ul>
                        </div>
                        <div class="comments-block">
                        <?php // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template('/comments-lawyer.php');

                        endif; ?>
                        </div>

                        <?php endwhile; // End of the loop.
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        $(document).ready(function(){
            if($('.comment').children('.children')){
                let arrow = '<svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 5L9 1" stroke="#EB5757" stroke-width="2"/></svg>';

                $('.children').before('<div class="show-child-comment">Read answer <span class="arrow">' + arrow + '</span></div>');

                $('.show-child-comment').click(function(){
                    if(!this.classList.contains('show-child-comment__active')){
                        $(this).siblings('.children').slideDown().siblings('.show-child-comment').addClass('show-child-comment__active').html('Close answer <span class="comment-arrow comment-arrow-active">' + arrow + '</span>');
                    } else {
                        $(this).removeClass('show-child-comment__active').siblings('.children').slideUp().siblings('.show-child-comment').addClass('show-child-comment').html('Read answer <span class="comment-arrow">' + arrow + '</span>');
                    }
                })
            }
        })
        </script>
    </main>

<div class="lawyer-form__overlay" style="display:none">
    
    <div class="lawyer-form__form">
        <div class="lawyer-form__overlay-close">x</div>
        <h2 class="lawyer-form__heading">Ask a question</h2>
        <?php echo do_shortcode('[contact-form-7 id="1179" title="Lawyer form"]'); ?>
    </div>
</div>

<script>
    $('.lawyer-card__button button').on('click', function(){
        $('.lawyer-form__overlay').fadeIn();
    });

    $('.lawyer-form__overlay').on('click', function(e){
        if(e.target.classList.contains('lawyer-form__overlay')){
            $('.lawyer-form__overlay').fadeOut();
        }
    });

    $('.lawyer-form__overlay-close').on('click', function(){
        $('.lawyer-form__overlay').fadeOut();
    });
</script>

<?php
get_footer();

