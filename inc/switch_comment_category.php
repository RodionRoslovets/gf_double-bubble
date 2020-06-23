<?php
add_action('wp_enqueue_scripts', 'switch_comment_category_script');
function switch_comment_category_script()
{
    // global $wp_query;

    wp_register_script('switch_comment_category', get_template_directory_uri() . '/assets/js/comments_switch.js', array('jquery'), '', true);

    // wp_localize_script('switch_comment_category', 'ajax_new_filters', array(
    //     'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
    //     'posts' => json_encode($wp_query->query_vars),
    // ));
    wp_enqueue_script('switch_comment_category');
}

add_action('wp_ajax_switch_comment_category', 'switch_comment_category');
add_action('wp_ajax_nopriv_switch_comment_category', 'switch_comment_category');

function switch_comment_category(){

    $comm_args = array(
        'meta_key'            => 'question_category',
        'meta_value'          => $_POST['category'],
    );

    $parent_comms = get_comments($comm_args);

    $ids = array();

    foreach($parent_comms as $comment){
        $ids[] = $comment->comment_ID;
    }

    foreach($ids as $parent){

        $arr = array();

        $par = get_comments(array(
            "comment__in" => $parent,
        ));

        $arr[] = $par[0];

        $children = get_comments(array(
            "parent" => $parent,
            'hierarchical'  => 'threaded'
        ));

        foreach($children as $child){
            $arr[] = $child;
        }

        wp_list_comments( array(
            'walker'      => new Double_Walker_Comment(),
            'style'      => 'ol',
            'short_ping' => true,
        ), $arr);
    }

    echo "<script>
        if($('.comment').children('.children')){
            let arrow = `<svg width='10' height='7' viewBox='0 0 10 7' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M1 1L5 5L9 1' stroke='#EB5757' stroke-width='2'/></svg>`;

            $('.children').before(`<div class='show-child-comment'>Read answer <span class='arrow'>` + arrow + `</span></div>`);

            $('.show-child-comment').click(function(){
                if(!this.classList.contains('show-child-comment__active')){
                    $(this).siblings('.children').slideDown().siblings('.show-child-comment').addClass('show-child-comment__active').html(`Close answer <span class='comment-arrow comment-arrow-active'>` + arrow + `</span>`);
                } else {
                    $(this).removeClass('show-child-comment__active').siblings('.children').slideUp().siblings('.show-child-comment').addClass('show-child-comment').html(`Read answer <span class='comment-arrow'>` + arrow + `</span>`);
                }
            })
        }
    </script>";

    if(!$parent_comms){
        echo 'No results';
    }

    wp_die();
}
?>