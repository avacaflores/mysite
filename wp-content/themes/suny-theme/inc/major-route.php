<?php

add_action('rest_api_init', 'majorRoutes');

function majorRoutes()
{
    register_rest_route('university/v1', 'manageMajor', array(
    'methods' => 'POST',
    'callback' => 'changeMajor'
  ));
}

function changeMajor($data)
{
    if (is_user_logged_in()) {
        $major = sanitize_text_field($data['major']);

        $currentUser = wp_get_current_user();
        $currentUserId = $currentUser->ID;
     
        $args = array(
        'include' => $currentUserId
    );
    
        $query = new WP_User_Query($args);
        $existQuery = $query->get_results();

        if ($existQuery) {
            return update_metadata('user', $currentUserId, 'major', $major);
        } else {
            die("Invalid user");
        }
    } else {
        die("Only logged in users can modify major");
    }
}
