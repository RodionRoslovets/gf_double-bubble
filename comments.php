<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package double
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="row">
    <h2 class="titles-page title-page-hr">Reviews <span></span>
        <hr/>
    </h2>
    <div class="block-comments">
        <div class="form-comment">
<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
<!--		<h2 class="comments-title">-->
<!--			--><?php
//			$double_comment_count = get_comments_number();
//			if ( '1' === $double_comment_count ) {
//				printf(
//					/* translators: 1: title. */
//					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'double' ),
//					'<span>' . get_the_title() . '</span>'
//				);
//			} else {
//				printf( // WPCS: XSS OK.
//					/* translators: 1: comment count number, 2: title. */
//					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $double_comment_count, 'comments title', 'double' ) ),
//					number_format_i18n( $double_comment_count ),
//					'<span>' . get_the_title() . '</span>'
//				);
//			}
//			?>
<!--		</h2>-->
        <!-- .comments-title -->


		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
            <?php
			wp_list_comments( array(
                'walker'      => new Double_Walker_Comment(),
				'style'      => 'ol',
				'short_ping' => true,
            ));
			?>
		</ol><!-- .comment-list -->

        <div class="write-review-block">
            <div class="title-review">
                <h4>Write a review</h4>
            </div>
<!--            <div class="review-write">-->
<!--                <div class="col-review-write">-->
<!--                    <p>Кухня</p>-->
<!--                    <div class="star-block">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-review-write">-->
<!--                    <p>Обслуживание</p>-->
<!--                    <div class="star-block">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-review-write">-->
<!--                    <p>Цена/качество</p>-->
<!--                    <div class="star-block">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/star-empty.svg" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!--                            <div class="form-comment">-->
            <!--                                <form action="" method="POST">-->
            <!--                                    <div class="input-group">-->
            <!--                                        <label for="">-->
            <!--                                        <span class="icon-input">-->
            <!--                                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/user-input.svg" alt="">-->
            <!--                                        </span>-->
            <!--                                            <input type="text" name="name" placeholder="Name">-->
            <!--                                        </label>-->
            <!--                                        <label for="">-->
            <!--                                        <span class="icon-input">-->
            <!--                                            <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/icons/mail-input.svg" alt="">-->
            <!--                                        </span>-->
            <!--                                            <input type="email" name="email" placeholder="E-mail">-->
            <!--                                        </label>-->
            <!--                                    </div>-->
            <!--                                    <textarea name="textarea" id="" cols="30" rows="3" placeholder="Your massage"></textarea>-->
            <!--                                    <input type="submit" value="Send" placeholder="Your massage">-->
            <!--                                </form>-->
            <!--                            </div>-->
        </div>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'double' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().


    $args = array(
        'fields'               => array(
            'author' => '<div class="input-group">
                            <label for="">
                                        <span class="icon-input">
                                            <img src="' . get_template_directory_uri() .
                                                '/assets/img/icons/user-input.svg" alt="">
                                        </span>
                                        <input id="author" name="author" type="text" placeholder="Name" 
                                        value="' . esc_attr( $commenter['comment_author'] ) . '" 
                                            ' . $aria_req . $html_req . '>
                                </label>',
            'email'  => '<label for="email">
                                <span class="icon-input">
                                    <img src="' . get_template_directory_uri() . '/assets/img/icons/mail-input.svg" alt="">
                                </span>
                                    <input type="email" id="email" name="email" 
                                    ' . ( $html5 ? 'type="email"' : 'type="text"' ) .
                                    ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '"
                                     aria-describedby="email-notes"' . $aria_req . $html_req  . ' placeholder="E-mail">
                            </label>
                            <input type="hidden" name="comment_post_ID" />
		                    <input type="hidden" name="comment_parent" />
                        </div>',

        ),
        'comment_field'        => '<p class="comment-form-comment"><label for="comment"> </label>
                                    <textarea id="comment" name="comment" cols="30" rows="3" placeholder="Your massage" aria-required="true" required="required"></textarea>
                                    </p>',
        'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'logged_in_as'         => '<p class="logged-in-as" style="display: none;">' . sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes" style="display: none;"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
        'comment_notes_after'  => '',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_form'           => 'comment-form',
        'class_submit'         => 'submit',
        'name_submit'          => 'submit',
        'title_reply'          => __( 'Leave a Reply' ),
        'title_reply_to'       => __( 'Leave a Reply to %s' ),
        'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title" style="display: none;">',
        'title_reply_after'    => '</h3>',
        'cancel_reply_before'  => ' <small>',
        'cancel_reply_after'   => '</small>',
        'cancel_reply_link'    => __( 'Cancel reply' ),
        'label_submit'         => __( 'Send' ),
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
        'format'               => 'xhtml',
    );
?>

            <?php
            comment_form( $args );
            ?>


</div><!-- #comments -->
        </div>
    </div>
</div>
