 <?php

 
 
  if (have_posts()) : while (have_posts()) : the_post(); ?>
       archive-portfolio.php
         <h2><?php the_title(); ?></h2>
         <div class="entry">
            <br>
<video>
  <source src="<?php echo $video_url; ?>" type="video/mp4">
Your browser does not support the video tag.
</video><br>
<?php echo $description; ?>
         </div>
      <?php endwhile; ?>
       
         <p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p>
          
      <?php endif; ?>
