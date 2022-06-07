<?php /* Template Name: cc_homepage */ ?>

<?php get_header(); ?>

<?php include "video_overlay.php"; $img_var = ""; ?>

<div class="background_scroll_wrapper">



<?php

  $bg_video = get_field('background_video');

?>

  <div class="scroll_wrapper">

    <div class="container ghost gradient ">
            
      <iframe class="fullvid" id="fullvid" src="<?php echo $bg_video->video_url; ?>?api=1&controls=0&background=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; fullscreen"> </iframe> 

      <div class="header_index">
        <svg class="video_unmute" data-id="530265076"><use href="#mute-button-shape"></svg>
        <svg class="video_fullscreen" data-id="530265076"><use href="#fullscreen-button-shape"></svg>
      </div>

    </div>


<?php $bg_color = "blue_bg"; ?>


<div class="container">
    <div class="wrapper">
      <div class="article ">

      <div class="text-wrapper">
        <div class="title"><h2><?php single_post_title(); ?></h2></div>
        <div class="subtitle"><?php the_field('header_subtitle'); ?></div>
        <?php the_content(); ?>
      </div>

      <div class="image-wrapper">

        <?php

          if($img_var == ""){
            echo "<img src='" . get_field('first_articles_image') . "'></img>";
          }else{
            echo "<img src='wp-content/themes/cc_movinapes/" . $img_var . "'></img>";
          }

        ?>
      </div>

    </div>
  </div>
</div>


<?php include "leistungen.php"; ?>

<?php 

  $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'category_name' => 'Homepage',
      'posts_per_page' => 4
  );
 
  $custom_query = new WP_Query($args); 
  if ($custom_query->have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post();

?> 

<!-- Start der geloopten Inhalte -->

<div class="container">
    <div class="wrapper">
      <div class="article reverse <?php if ( !has_post_thumbnail() ) { echo "text-article";} ?>">

      <div class="text-wrapper">
        <div class="title"><h2><?php the_title(); ?></h2></div>
        <div class="subtitle"><?php the_content();?></div>
      </div>


        <?php

          if ( has_post_thumbnail() ) {
            echo "<div class='image-wrapper'>";
            the_post_thumbnail();
            echo "</div>";
          }

        ?>

    </div>
  </div>
</div>

 <h1></h1> 
                
<!-- Ende der geloopten Inhalte -->


<?php endwhile; else : ?>
  <p>Keine Beiträge</p>
<?php endif; wp_reset_postdata(); ?>






<?php include "selected_work_embed_play.php"; ?>




<?php include "brands.php"; ?>


<?php
include 'contact_form.php'; ?>



<?php get_footer(); ?>

</body>
</html>
