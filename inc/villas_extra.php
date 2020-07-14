<?php
add_action('wp_ajax_villas_extra', 'villas_extra');
add_action('wp_ajax_nopriv_villas_extra', 'villas_extra');

function villas_extra(){

    $response = [
        'day_tour' => '',
        'night_tour' => '',
        'webcam' => '',
    ];

    

    if($_POST['type'] == 'restaurant'){
        if (get_field('restaurant_tour', $_POST['post_id'])){

            $response["day_tour"] = get_field('restaurant_tour', $_POST['post_id']);
            
        }

        if(get_field('restaurant_web_cam', $_POST['post_id'])){

            $response["webcam"] = get_field('restaurant_web_cam', $_POST['post_id']);

        }
    }
    if($_POST['type'] == 'club'){
        if (get_field('club_tour', $_POST['post_id'])){

            $response["day_tour"] = get_field('club_tour', $_POST['post_id']);
            
        }

        if(get_field('club_web_cam', $_POST['post_id'])){

            $response["webcam"] = get_field('club_web_cam', $_POST['post_id']);

        }
    }

    if (get_field('villa_day_tour', $_POST['post_id'])){

        $response["day_tour"] = get_field('villa_day_tour', $_POST['post_id']);
        
    }

    if (get_field('villa_night_tour', $_POST['post_id'])){

        $response["night_tour"] = get_field('villa_night_tour', $_POST['post_id']);
        
    }

    echo json_encode($response);

    wp_die();
}