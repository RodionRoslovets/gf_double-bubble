<?php

add_action( 'comment_form_logged_in_after', 'comm_rating_rating_field' );
add_action( 'comment_form_after_fields', 'comm_rating_rating_field' );
function comm_rating_rating_field () { ?>
    <div class="com_block_star">
        <label for="rating"><?php _e('Rating', 'double') ?><span class="required">*</span></label>
        <fieldset class="comments-rating">
<span class="rating-container">
            <?php for ( $i = 5; $i >= 1; $i-- ) : ?>

                <input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" />
<!--                    --><?php //echo esc_html( $i ); ?>
<label for="rating-<?php echo esc_attr( $i ); ?>"></label>
            <?php endfor; ?>
<!--<input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>-->
</span>
        </fieldset>
    </div>
    <?php
}
//СОХРАНЯЕМ РЕЗУЛЬТАТ
add_action( 'comment_post', 'comm_rating_save_comment_rating' );
function comm_rating_save_comment_rating( $comment_id ) {
    if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
        $rating = intval( $_POST['rating'] );

    add_comment_meta( $comment_id, 'rating', $rating );

    //Пересчет среднего рейтинга и запись в мета-данные поста
    $comment = get_comment($comment_id);
    
    $all_comments_for_post = get_comments(array('post_id' => $comment->comment_post_ID));

    $ratings = 0;
    $count = 0;

    foreach($all_comments_for_post as $post_comment){
        $comment_rating = get_comment_meta($post_comment->comment_ID, 'rating');

        if($comment_rating){
            $ratings += $comment_rating[0];
            $count += 1;
        }
    }

    $average_rating = 0;

    if($ratings > 0 && $count > 0){
        $average_rating = round( $ratings / $count , 1);
    }

    update_post_meta($comment->comment_post_ID, 'average_rating', $average_rating);
}

//ОБЯЗАТЕЛЬНОСТЬ РЕЙТИНГА
add_filter( 'preprocess_comment', 'comm_rating_require_rating' );
function comm_rating_require_rating( $commentdata ) {
    if ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) )
        wp_die('Ошибка: Вы не добавили оценку. Нажмите кнопку «Назад» в своем веб-браузере и повторно отправьте свой комментарий с оценкой.');
    return $commentdata;
}

//ВЫВОДИМ РЕЙТИНГ В ОПУБЛИКОВАННОМ КОММЕНТАРИИ
add_filter( 'get_avatar', 'comm_rating_display_rating');
function comm_rating_display_rating( $get_avatar ){
    if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
//        $stars = '<div class="com_star">';
////        for ( $i = 1; $i <= $rating; $i++ ) {
////            $stars .= '<img src="' . get_template_directory_uri() . '/assets/img/icons/star-full.svg" alt="">';
////        }
////        $stars .= '</div>';
////        $get_avatar = $get_avatar . $stars;
        echo '<div class="user-rating-avatar"><span>';
        echo $rating;
        echo '</span></div>';
        return $get_avatar;
    } else {return $get_avatar;}
}

//ПОДКЛЮЧАЕМ СТИЛИ DASHICONS
add_action( 'wp_enqueue_scripts', 'comm_rating_styles' );
function comm_rating_styles() {
    wp_enqueue_style( 'dashicons');
}

//ПОДСЧЕТ ОБЩЕЙ ОЦЕНКИ.
function comm_rating_get_average_ratings( $id ) {
    $comments = get_approved_comments( $id );
    if ( $comments ) {
        $i = 0;
        $total = 0;
        foreach( $comments as $comment ){
            $rate = get_comment_meta( $comment->comment_ID, 'rating', true );
            if( isset( $rate ) && '' !== $rate ) {
                $i++;
                $total += $rate;
            }
        }

        if ( 0 === $i ) {
            return false;
        } else {
            return round( $total / $i, 1 );
        }
    } else {
        return false;
    }
}

// ВЫВОД ОЦЕНКИ ПЕРЕД ПОСТОМ
add_shortcode( 'average_rating', 'comm_rating_display_average_rating' );
function comm_rating_display_average_rating( $content ) {
    global $post;
    if ( false === comm_rating_get_average_ratings( $post->ID ) ) {
        return $content;
    }
    $stars   = '';
    $average = comm_rating_get_average_ratings( $post->ID );

    for ( $i = 1; $i <= $average + 1; $i++ ) { $width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );

        if ( 0 === $width ) {
            continue;
        }

        $stars .= '<img src="' . get_template_directory_uri() . '/assets/img/icons/star-full.svg" alt="">';

        if ( $i - $average > 0 ) {
//            $stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="dashicons dashicons-star-empty"></span>';
        }
    }

    $custom_content  = '<span>' . $average .'</span><div class="star-block">' . $stars .'</div>';
    $custom_content .= $content;
    return $custom_content;
}

//add_shortcode('average_rating', 'average_rating_on_page');
//function average_rating_on_page () {
//    return 'Hello';
//}