<?php /* Template Name: impressum_template */ ?>

<?php get_header(); ?>


<div class="background_scroll_wrapper">

  <div class="scroll_wrapper">



<!-- Start der geloopten Inhalte -->

<div class="container single_text agbdi" style="padding-top: 200px;"">
    <div class="wrapper">
      <div class="article reverse <?php if ( !has_post_thumbnail() ) { echo "text-article";} ?>">

      <div class="text-wrapper">
        <div class="title"><h2><?php single_post_title(); ?></h2></div>
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

<?php include "brands.php"; ?>


<?php
include 'contact_form.php'; ?>



<?php get_footer(); ?>
