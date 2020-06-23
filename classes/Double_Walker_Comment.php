<?php


class Double_Walker_Comment extends Walker_Comment
{

    /**
     * Outputs a comment in the HTML5 format.
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function html5_comment($comment, $depth, $args)
    {

        $tag = ('div' === $args['style']) ? 'div' : 'li';

?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
        
            <article id="div-comment-<?php comment_ID(); ?>" class="item-comment">
                <footer class="item-comment-avatar">
                    <!--                <div class="user-comment-avatar">-->
                    <?php
                    $comment_author_url = get_comment_author_url($comment);
                    $comment_author     = get_comment_author($comment);
                    $avatar             = get_avatar($comment, $args['avatar_size']);
                    if (0 != $args['avatar_size']) {
                        if (empty($comment_author_url)) {
                            echo $avatar;
                        } else {
                            printf('<a href="%s" rel="external nofollow" class="url">', $comment_author_url);
                            echo $avatar;
                        }
                    }

                    /*
                     * Using the `check` icon instead of `check_circle`, since we can't add a
                     * fill color to the inner check shape when in circle form.
                     */
                    //                    if ( double_is_comment_by_post_author( $comment ) ) {
                    //                        printf( '<span class="post-author-badge" aria-hidden="true">%s</span>', double_get_icon_svg( 'check', 24 ) );
                    //                    }



                    if (!empty($comment_author_url)) {
                        echo '</a>';
                    }
                    ?>
                    <!--                </div>-->
                    <!-- .comment-author -->

                    <div class="comment-content">
                        <h5 class="mobile-visible">
                            <?php printf(
                                wp_kses(
                                    /* translators: %s: Comment author link. */
                                    __('%s <span class="screen-reader-text says">says:</span>', 'double'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                $comment_author
                            ); ?>
                        </h5>
                        <span class="mobile-visible">
                            <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                                <?php
                                /* translators: 1: Comment date, 2: Comment time. */
                                $comment_timestamp = sprintf(__('%1$s', 'double'), get_comment_date('', $comment), get_comment_time());
                                ?>
                                <time datetime="<?php comment_time('c'); ?>" title="<?php echo $comment_timestamp; ?>">
                                    <?php echo $comment_timestamp; ?>
                                </time>
                            </a>
                        </span>
                    </div>



                    <?php
                    $commenter = wp_get_current_commenter();
                    if ($commenter['comment_author_email']) {
                        $moderation_note = __('Your comment is awaiting moderation.', 'double');
                    } else {
                        $moderation_note = __('Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.', 'double');
                    }
                    ?>

                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php echo $moderation_note; ?></p>
                    <?php endif; ?>

                </footer><!-- .comment-meta -->

                <div class="comment-content">
                    <div class="comment-data">
                        <span class="desktop-visible">
                            <?php printf(
                                wp_kses(
                                    /* translators: %s: Comment author link. */
                                    __('%s <span class="screen-reader-text says">says:</span>', 'double'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                $comment_author
                            ); ?>
                        </span>
                        <span class="desktop-visible comment-date">
                            <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                                <?php
                                /* translators: 1: Comment date, 2: Comment time. */
                                $comment_timestamp = sprintf(__('%1$s', 'double'), get_comment_date('', $comment), get_comment_time());
                                ?>
                                <time datetime="<?php comment_time('c'); ?>" title="<?php echo $comment_timestamp; ?>">
                                    <?php echo $comment_timestamp; ?>
                                </time>
                            </a>
                            <?php
                            //                    $edit_comment_icon = double_get_icon_svg( 'edit', 16 );
                            edit_comment_link(__('Edit', 'double'), '<span class="edit-link-sep">&mdash;</span> <span class="edit-link">' . $edit_comment_icon, '</span>');
                            ?>
                        </span>
                    </div>
                    <h5 class="comment-theme"><?php $comment_theme =  get_comment_meta(get_comment_ID(), 'question_theme', true);
                        echo $comment_theme;
                        ?></h5>
                    <p class='comment-answer'>Answer</p>
                    <div class="comment-text">
                        <h5 class="comment-answer-name">Aleksandr Konstantinopolsky</h5>
                        <?php comment_text(); ?>
                    </div>
                </div>

                

                <div class="comment-content">

                </div><!-- .comment-content -->

                <?php
                // comment_reply_link(
                //     array_merge(
                //         $args,
                //         array(
                //             'add_below' => 'div-comment',
                //             'depth'     => $depth,
                //             'max_depth' => $args['max_depth'],
                //             'before'    => '<div class="comment-reply">',
                //             'after'     => '</div>',
                //         )
                //     )
                // );
                ?>

            </article><!-- .comment-body -->
    <?php
    }
}
