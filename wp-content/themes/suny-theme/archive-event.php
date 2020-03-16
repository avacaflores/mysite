<?php

get_header();
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in our world.'
));





$currentUser = wp_get_current_user();
$currentUserId = $currentUser->ID;
echo get_current_user_id();
 
$args = array(
    'include' => $currentUserId
);

$my_user_query = new WP_User_Query($args);
 
// Get query results.
$editors = $my_user_query->get_results();
 
// Check for editors
if (! empty($editors)) {
    echo '<ul class="editors-list">';
 
    // Loop over editors.
    foreach ($editors as $editor) {
     
            // Get each editor's data.
        $editor_info = get_userdata($editor->ID);
     
        // Show editor's name.
        echo '<li>' . $editor_info->ID . '</li>';
        echo '<li>' . $editor_info->display_name . '</li>';
        echo '<li>' . $editor_info->major . '</li>';
    }
 
    echo '</ul>';
} else {
 
    // Display "no editors found" message.
    echo __('No editors found!', 'tutsplus');
}



//update_metadata( 'user', $currentUserId, 'major', 'major2' );

//$existQuery = new WP_User_Query(array(
//  'blog_id' => 2
//  )
//);

//$meta = get_user_meta( $existQuery);




$user = wp_get_current_user();
$meta = get_user_meta($user->ID);

$field = get_field_object('major', 1);
?>
<p><?php print_r($field); ?>----->>>>> ?></p>
<p><?php print_r($user->major); ?>----->>>>> ?></p>

<?php


$user = wp_get_current_user();
$meta = get_user_meta($user->ID);
$major = $meta->nickname;
echo get_user_meta($user->ID, 'nickname', true);
echo get_user_meta($user->ID, 'major', true);
print_r($major);

echo the_author_meta('nickname', $current_user->ID);
$current_user = wp_get_current_user();
echo $current_user->nickname ;



 ?>


<p>mydata:<?php the_field('field_name', '<?php ID ?>'); ?></p>



<?php

$users = get_users(array( 'fields' => array( 'ID' ) ));
foreach ($users as $user_id) {
    print_r(get_user_meta($user_id->ID));

    $field = get_field_object('field_5e654d221bf1f');
    echo "<hr>";
    print_r($field);
    echo "<hr>";
}


$field = get_field_object('field_5e654d221bf1f');
?>


<?php
$field = get_field_object('field_5e654d221bf1f', 10);
?>
<p><?php echo $field['label']; ?>: <?php echo $field['value']; ?></p>





<hr class="section-break">

<p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events') ?>">Check out our past events archive</a>.</p>

</div>

<?php get_footer();

?>