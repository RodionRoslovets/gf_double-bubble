<?php
// если вы вставляете код не в новый файл, то <?php нужно удалить
function true_add_ajax_comment(){
    global $wpdb;
    $comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

    $post = get_post($comment_post_ID);

    if ( empty($post->comment_status) ) {
        do_action('comment_id_not_found', $comment_post_ID);
        exit;
    }

    $status = get_post_status($post);

    $status_obj = get_post_status_object($status);

    /*
     * различные проверки комментария
     */
    if ( !comments_open($comment_post_ID) ) {
        do_action('comment_closed', $comment_post_ID);
        wp_die( __('Sorry, comments are closed for this item.') );
    } elseif ( 'trash' == $status ) {
        do_action('comment_on_trash', $comment_post_ID);
        exit;
    } elseif ( !$status_obj->public && !$status_obj->private ) {
        do_action('comment_on_draft', $comment_post_ID);
        exit;
    } elseif ( post_password_required($comment_post_ID) ) {
        do_action('comment_on_password_protected', $comment_post_ID);
        exit;
    } else {
        do_action('pre_comment_on_post', $comment_post_ID);
    }

    $comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
    $comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
    $comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
    $comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;

    /*
     * проверяем, залогинен ли пользователь
     */
    $user = wp_get_current_user();
    if ( $user->exists() ) {
        if ( empty( $user->display_name ) )
            $user->display_name=$user->user_login;
        $comment_author       = $wpdb->escape($user->display_name);
        $comment_author_email = $wpdb->escape($user->user_email);
        $comment_author_url   = $wpdb->escape($user->user_url);
        $user_ID = get_current_user_id();
        if ( current_user_can('unfiltered_html') ) {
            if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
                kses_remove_filters(); // start with a clean slate
                kses_init_filters(); // set up the filters
            }
        }
    } else {
        if ( get_option('comment_registration') || 'private' == $status )
            wp_die( 'Вы должны зарегистрироваться или войти, чтобы оставлять комментарии.' );
    }

    $comment_type = '';

    /*
     * проверяем, заполнил ли пользователь все необходимые поля
      */
    if ( get_option('require_name_email') && !$user->exists() ) {
        if ( 6 > strlen($comment_author_email) || '' == $comment_author )
            wp_die( 'Ошибка: заполните необходимые поля (Имя, Email).' );
        elseif ( !is_email($comment_author_email))
            wp_die( 'Ошибка: введенный вами email некорректный.' );
    }

    if ( '' == trim($comment_content) ||  '<p><br></p>' == $comment_content )
        wp_die( 'Вы забыли про комментарий.' );

    /*
     * добавляем новый коммент и сразу же обращаемся к нему
     */
    $comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
    $commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');
    $comment_id = wp_new_comment( $commentdata );
    $comment = get_comment($comment_id);

    /*
     * выставляем кукисы
     */
    do_action('set_comment_cookies', $comment, $user);

    /*
     * вложенность комментариев
     */
    $comment_depth = 1;
    while($comment_parent){
        $comment_depth++;
        $parent_comment = get_comment($comment_parent);
        $comment_parent = $parent_comment->comment_parent;
    }

    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $comment_depth;
    /*
     * ниже идет шаблон нового комментария, вы можете настроить его для себя,
     * а можете воспользоваться функцией(которая скорее всего уже есть в теме) для его вывода
     */
    ?>
<article id="div-comment-<?php comment_ID(); ?>" class="item-comment">
    <footer class="item-comment-avatar">
        <!--                <div class="user-comment-avatar">-->
        <?php
        $comment_author_url = get_comment_author_url( $comment );
        $comment_author     = get_comment_author( $comment );
        $avatar             = get_avatar( $comment, $args['avatar_size'] );
        if ( 0 != $args['avatar_size'] ) {
            if ( empty( $comment_author_url ) ) {
                echo $avatar;
            } else {
                printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url );
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



        if ( ! empty( $comment_author_url ) ) {
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
                        __( '%s <span class="screen-reader-text says">says:</span>', 'double' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    $comment_author
                );?>
            </h5>
            <span class="mobile-visible">
                        <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                        <?php
                        /* translators: 1: Comment date, 2: Comment time. */
                        $comment_timestamp = sprintf( __( '%1$s', 'double' ), get_comment_date( '', $comment ), get_comment_time() );
                        ?>
                        <time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo $comment_timestamp; ?>">
                            <?php echo $comment_timestamp; ?>
                        </time>
                    </a>
                    </span>
        </div>



        <?php
        $commenter = wp_get_current_commenter();
        if ( $commenter['comment_author_email'] ) {
            $moderation_note = __( 'Your comment is awaiting moderation.', 'double' );
        } else {
            $moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.', 'double' );
        }
        ?>

        <?php if ( '0' == $comment->comment_approved ) : ?>
            <p class="comment-awaiting-moderation"><?php echo $moderation_note; ?></p>
        <?php endif; ?>

    </footer><!-- .comment-meta -->

    <div class="comment-content">
        <h5 class="desktop-visible">
            <?php printf(
                wp_kses(
                /* translators: %s: Comment author link. */
                    __( '%s <span class="screen-reader-text says">says:</span>', 'double' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                $comment_author
            );?>
        </h5>
        <span class="desktop-visible">
                    <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                        <?php
                        /* translators: 1: Comment date, 2: Comment time. */
                        $comment_timestamp = sprintf( __( '%1$s', 'double' ), get_comment_date( '', $comment ), get_comment_time() );
                        ?>
                        <time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo $comment_timestamp; ?>">
                            <?php echo $comment_timestamp; ?>
                        </time>
                    </a>
                    <?php
                    //                    $edit_comment_icon = double_get_icon_svg( 'edit', 16 );
                    edit_comment_link( __( 'Edit', 'double' ), '<span class="edit-link-sep">&mdash;</span> <span class="edit-link">' . $edit_comment_icon, '</span>' );
                    ?>
                </span>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
    </div>

    <div class="comment-content">

    </div><!-- .comment-content -->

</article><!-- .comment-body -->
    <?php die();
}

add_action('wp_ajax_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_{значение параметра action}
add_action('wp_ajax_nopriv_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_nopriv_{значение параметра action}