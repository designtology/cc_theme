<div class="container">
  	<div class="wrapper">
  		<div class="article <?php if($variable) {echo $variable;} ?>">

			<div class="text-wrapper">
				<div class="title"><h2><?php single_post_title(); ?></h2></div>
				<div class="subtitle">We would love to move some apes with you! Wherever you want it.</div>
				<?php the_content(); ?>
			</div>

			<div class="image-wrapper">
				<?php
				if($img_var == ""){
					echo "<img src='wp-content/themes/cc_movinapes/images/articles/team.png'></img>";
					}else{
						echo "<img src='wp-content/themes/cc_movinapes/" . $img_var . "'></img>";
					}
				?>
			</div>

		</div>
	</div>
</div>