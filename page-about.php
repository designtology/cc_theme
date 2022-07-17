<?php /* Template Name: about_template */ ?>

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
          <div class="header_subtitle">We offer commercial services for documentaries, narratives & coverage stories</div>


        </div>

    </div>


<?php 

  $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'category_name' => 'About Us',
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

<div class="core_monkeys container">
  <div class="wrapper title">   
    <div class="section_title"><h4>movinapes</h4></div>
  </div>
  <div class="wrapper padding_top_20">

    <?php 

    $posts = get_posts(array(
      'posts_per_page'  => -1,
      'post_type'     => 'movinapes_members',
      'category_name' => 'Main Monkey'
    ));

    if( $posts ): ?>
      
      <?php foreach( $posts as $post ): 
        
        setup_postdata( $post );
        $crew_type = get_field('crew_type');
?>
      <div class="user_profile">
        <div class="user_picture" style="background-image:url('<?php the_field('image'); ?>');"></div>
        <div class="user_name"><?php the_field('name'); ?></div>
        <div class="user_position"><?php the_field('company_position'); ?></div>
        <div class="user_mail"><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></div>
      </div>
      
      <?php 
            endforeach; ?>
      
      
      <?php wp_reset_postdata(); ?>

    <?php endif; ?>



  </div>
</div>




<div class="core_monkeys helpful_monkeys container">
<div class="wrapper title">   
  <div class="section_title"><h4>Supporting Apes</h4></div>
</div>
  <div class="wrapper padding_top_20">
    <?php 

    $posts = get_posts(array(
      'posts_per_page'  => -1,
      'post_type'     => 'movinapes_members',
      'category_name' => 'Freelance Monkey'
    ));

    if( $posts ): ?>
      
        
      <?php foreach( $posts as $post ): 
        
        setup_postdata( $post );
        
        ?>
      <div class="user_profile">
        <div class="user_picture" style="background-image:url('<?php the_field('image'); ?>');"></div>
        <div class="user_name"><?php the_field('name'); ?></div>
        <div class="user_position"><?php the_field('company_position'); ?></div>
      </div>
      
      <?php endforeach; ?>
      
      
      <?php wp_reset_postdata(); ?>

    <?php endif; ?>

  </div>
</div>




<?php include "brands.php"; ?>


<?php
include 'contact_form.php'; ?>



<?php get_footer(); ?>
