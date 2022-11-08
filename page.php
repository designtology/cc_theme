<?php /* Template Name: standard_template */ ?>

<?php get_header(); ?>



<?php include "video_overlay.php" ?>

<div class="background_scroll_wrapper">



<?php

  $bg_video = get_field('background_video');

?>

  <div class="scroll_wrapper">

    <div class="container ghost">
            
      <iframe class="fullvid" src="<?php echo $bg_video->video_url; ?>?api=1&controls=0&background=1" frameborder="0" allowfullscreen></iframe>

        <div class="header_text_intro">
          <div class="header_title"><?php single_post_title(); ?></div>
          <div class="header_subtitle">We offer services for documentaries, narratives & coverage stories</div>


        </div>

    </div>


<?php 

  $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'category_name' => 'Feature Films',
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
        <div class="subtitle"><?php the_field('first_article_subtitle') ?></div>
        <?php the_content();?>
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




<?php include('video_functions.php'); ?>


<svg class="defs" id="play-button-shape" >
<circle style="fill:#A51515;" cx="29" cy="29" r="29"/>
<g>
  <polygon style="fill:#FFFFFF;" points="44,29 22,44 22,29.273 22,14  "/>
  <path style="fill:#FFFFFF;" d="M22,45c-0.16,0-0.321-0.038-0.467-0.116C21.205,44.711,21,44.371,21,44V14
    c0-0.371,0.205-0.711,0.533-0.884c0.328-0.174,0.724-0.15,1.031,0.058l22,15C44.836,28.36,45,28.669,45,29s-0.164,0.64-0.437,0.826
    l-22,15C22.394,44.941,22.197,45,22,45z M23,15.893v26.215L42.225,29L23,15.893z"/>
</g>
</svg>


<div class="container video_panel">
    <div class="wrapper">
    <div class="section_title">Our very finest selection</div>
    <div class="video_element">


  <?php

    $featured_post = get_field('post_object_selected_work_left');
    if( $featured_post ): 
      $custom_bg_image = get_field('video_thumbnail', $featured_post->ID);
      $video_id = getVimeoVideoIdFromUrl( $featured_post->video_url );
  ?>

  
      <div class="video_tile">
        <div class="video_area" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php echo getVimeoThumb($video_id); ?>') center/cover"></div>
        <div class="video_text_overlay">
          <div class="video_title">
            <div><?php echo getVimeoTitle($video_id); ?></div>
            <div class="time_stamp"><?php echo getVimeoLength($video_id); ?> MIN</div>
          </div>
          <div>
            <div class="video_play relative popup_play" data-id="<?php echo $video_id ?>">
              <div class="btn_icon"></div>WATCH CLIP
            </div>
          </div>
        </div>
      </div>

  <?php
    endif;
  ?>



  <?php

    $featured_post = get_field('post_object_selected_work_center');
    if( $featured_post ): 
      $custom_bg_image = get_field('video_thumbnail', $featured_post->ID);
      $video_id = getVimeoVideoIdFromUrl( $featured_post->video_url );
  ?>

  
      <div class="video_tile">
        <div class="video_area" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php echo getVimeoThumb($video_id); ?>') center/cover"></div>
        <div class="video_text_overlay">
          <div class="video_title">
            <div><?php echo getVimeoTitle($video_id); ?></div>
            <div class="time_stamp"><?php echo getVimeoLength($video_id); ?> MIN</div>
          </div>
          <div>
            <div class="video_play relative popup_play" data-id="<?php echo $video_id ?>">
              <div class="btn_icon"></div>WATCH CLIP
            </div>
          </div>
        </div>
      </div>

  <?php
    endif;
  ?>



  <?php

    $featured_post = get_field('post_object_selected_work_right');
    if( $featured_post ): 
      $custom_bg_image = get_field('video_thumbnail', $featured_post->ID);
      $video_id = getVimeoVideoIdFromUrl( $featured_post->video_url );
  ?>

  
      <div class="video_tile">
        <div class="video_area" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php echo getVimeoThumb($video_id); ?>') center/cover"></div>
        <div class="video_text_overlay">
          <div class="video_title">
            <div><?php echo getVimeoTitle($video_id); ?></div>
            <div class="time_stamp"><?php echo getVimeoLength($video_id); ?> MIN</div>
          </div>
          <div>
            <div class="video_play relative popup_play" data-id="<?php echo $video_id ?>">
              <div class="btn_icon"></div>WATCH CLIP
            </div>
          </div>
        </div>
      </div>

  <?php
    endif;
  ?>



    </div>
  </div>
</div>



<?php include "brands.php"; ?>


<?php
include 'contact_form.php'; ?>



<?php get_footer(); ?>
