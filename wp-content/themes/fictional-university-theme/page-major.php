<?php

get_header();
pageBanner(array(
    'title' => 'Majors',
    'subtitle' => 'Select your major'
));

$user = wp_get_current_user();
$theMajor = get_user_meta($user->ID, 'major', true);
?>

  <div class="container container--narrow page-section">


  <p>



  </p>

<?php if (is_user_logged_in()) { ?>
    

        <span class="major-box" data-major="major1" data-selected=<?php if (
            $theMajor == 'major1'
        ) {
            echo 'yes';
        } ?>>major1</span>
        <span class="major-box" data-major="major2" data-selected=<?php if (
            $theMajor == 'major2'
        ) {
            echo 'yes';
        } ?>>major2</span> 
        <span class="major-box" data-major="major3" data-selected=<?php if (
            $theMajor == 'major3'
        ) {
            echo 'yes';
        } ?>>major3</span> 
        <span class="major-box" data-major="major4" data-selected=<?php if (
            $theMajor == 'major4'
        ) {
            echo 'yes';
        } ?>>major4</span> 
      
<?php } else { ?>

  <p>Login to access this section</p> 
  

<?php } 



    ?>
  </div>
  
<?php get_footer();

?>
