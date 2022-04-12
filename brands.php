
<div class="container brands_container padding_bottom_100">
  	<div class="wrapper">

		<div class="section_title">Partners and customers</div>
			<div>
				<ul class="brands">


					<?php 

					  $args = array(
					      'post_type' => 'brand_logos',
					      'post_status' => 'publish',
					      'posts_per_page' => 30
					  );
					 

					  $custom_query = new WP_Query($args); 
					  if ($custom_query->have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post();

					?> 

					<!-- Start der geloopten Inhalte -->

					<?php

					  if ( has_post_thumbnail()) {
					    echo "<li class='brands_item'>
		   						<a href='#'>";
					    			the_post_thumbnail();
			    		echo "</a></li>";
					  }

					?>
					        
					<!-- Ende der geloopten Inhalte -->


					<?php endwhile; else : ?>
					  <p>Keine Beiträge</p>
				<?php endif; wp_reset_postdata(); ?>




					
							

				</ul>
			</div>
			<div class="partner_links">



				<?php 

				  $args = array(
				      'post_type' => 'brand_logos',
				      'post_status' => 'publish',
				      'posts_per_page' => 30
				  );
				 

				  $custom_query = new WP_Query($args); 
				  if ($custom_query->have_posts()) : while($custom_query->have_posts()) : $custom_query->the_post();

				  if ( !has_post_thumbnail()) {
				  	$url = get_field('brands_url');
				  	$title = get_the_title();
				    echo "<a href='" . $url . "'>" . $title;
				    			
		    		echo "</a><p>&nbsp;//&nbsp;</p>";
				  }

				?>
				        
				<!-- Ende der geloopten Inhalte -->


				<?php endwhile; else : ?>
				  <p>Keine Beiträge</p>
				<?php endif; wp_reset_postdata(); ?>
			</div>

	</div>
</div>