<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">
<head profile="http://gmpg.org/xfn/11">
   <!-- wird noch ausgefüllt --> 
<?php
wp_head();
?>    
</head>
<body>
 
<div id="wrapper">
    
   <div id="header"></div><!-- header -->
    
   <div id="main">
            <?php

            $customer_name = get_field('customer_name');
            $video_url = get_field('video_url');
            $description = get_field('description');
            
            ?>
                     
            
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       single_portfolio.php
         <h2><?php echo $customer_name; ?></h2>
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
       
   </div><!-- main -->
    
   <div id="sidebar"></div><!-- sidebar -->  
    
   <div id="footer"></div><!-- footer -->
    
</div><!-- wrapper -->
    
</body>
</html>