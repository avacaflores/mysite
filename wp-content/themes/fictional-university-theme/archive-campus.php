<?php

get_header();
pageBanner(array(
  'title' => 'Our Campuses',
  'subtitle' => 'We have several conveniently located campuses.'
));
 ?>

<div class="container container--narrow page-section">


<div class="acf-map">

<?php
  while(have_posts()) {
    the_post();
    $mapLocation = get_field('map_location');
   ?>
    <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <?php echo $mapLocation['address']; 
      $target = str_replace(' ','+',$mapLocation['address']);
      $fulltarget = "https://www.google.com/maps/dir/?api=1&origin=current+location&destination=" . $target . "&travelmode=walking";?>
      <p>
      <a class="directions-box" href="<?php echo $fulltarget ?>" target="_blank">
      <i class="fas fa-route fa-lg" style="margin-right: 10px;"></i>Get Directions in Google Maps</a></p>
    </div>
  <?php } ?>


</div>



</div>


<?php get_footer();

?>