<?php include('video_functions.php'); ?>



<div class="container selected_work ">
  	<div class="wrapper">
		<div class="section_title">Our very finest selection</div>
		<div class="video_element">

	<?php
		$left_video_id = get_field('left_video_id');
		$center_video_id = get_field('center_video_id');
		$right_video_id = get_field('right_video_id');

		$featured_post = get_field('post_object_big_video');
		if( $featured_post ): 
			$custom_bg_image = get_field('video_thumbnail', $featured_post->ID);
			$big_video_url = getVimeoVideoIdFromUrl( $featured_post->video_url );
	?>

			<div class="video_tile desktop_tile" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php
			
			if($featured_post->get_thumbnail_from_provider){
				echo getVimeoThumb($big_video_url);
			}
			else{
				print_r($custom_bg_image['url']);
			}
			
			?>') center/cover">
				<div class="video_text_overlay">
					<div class="video_title">
						<?php
							if($featured_post->auto_name){
								echo getVimeoTitle($big_video_url);
							}
							else{
								echo $featured_post->video_title;
							}
						?>
					</div>
					<div class="video_controls">
						<svg class="video_play popup_play" data-id="<?php echo $big_video_url; ?>">
							<use href="#play-button-shape">
						</svg>				
					</div>
					<div class="ghost_tile">&nbsp;</div>					
				</div>
			</div>

			<div class="video_tile mobile_tile" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php
			if($featured_post->get_thumbnail_from_provider){
				echo getVimeoThumb($big_video_url);
			}
			else{
				print_r($custom_bg_image['url']);
			}
			
			?>') center/cover">
				<div class="video_text_overlay">
					<div class="video_title" id="overlay_<?php echo $big_video_url; ?>">
						<?php
							if($featured_post->auto_name){
								echo getVimeoTitle($big_video_url);
							}
							else{
								echo $featured_post->video_title;
							}

						?>					</div>
					<div class="video_controls">									
						<svg class="video_play popup_play" data-id="<?php echo $big_video_url; ?>">
							<use href="#play-button-shape">
						</svg>			
					</div>
					<div class="ghost_tile">&nbsp;
					</div>					
				</div>
			</div>

	<?php
 		endif;
 	?>

	<?php
		$featured_post = get_field('post_object_left_video');
		if( $featured_post ): 
			$custom_bg_image = get_field('video_thumbnail', $featured_post->ID);
			$left_video_url = getVimeoVideoIdFromUrl( $featured_post->video_url );
	?>
			<div class="video_tile" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php
			if($featured_post->get_thumbnail_from_provider){
				echo getVimeoThumb($left_video_url);
			}
			else{
				print_r($custom_bg_image['url']);
			}
			
			?>') center/cover">
				<div class="video_text_overlay">
					<div class="video_title" id="overlay_<?php echo $left_video_url; ?>">
						<?php
							if($featured_post->auto_name){
								echo getVimeoTitle($left_video_url);
							}
							else{
								echo $featured_post->video_title;
							}

						?>						</div>
					<div class="video_controls">									
						<svg class="video_play popup_play" data-id="<?php echo $left_video_url; ?>">
							<use href="#play-button-shape">
						</svg>			
					</div>
					<div class="ghost_tile">&nbsp;
					</div>					
				</div>
			</div>

	<?php
 		endif;
 	?>

	<?php
		$featured_post = get_field('post_object_center_video');
		if( $featured_post ): 
			$custom_bg_image = get_field('video_thumbnail', $featured_post->ID);
			$center_video_url = getVimeoVideoIdFromUrl( $featured_post->video_url );
	?>
			<div class="video_tile" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php
			if($featured_post->get_thumbnail_from_provider){
				echo getVimeoThumb($center_video_url);
			}
			else{
				print_r($custom_bg_image['url']);
			}
			
			?>') center/cover">
				<div class="video_text_overlay">
					<div class="video_title" id="overlay_<?php echo $center_video_url; ?>">
						<?php
							if($featured_post->auto_name){
								echo getVimeoTitle($center_video_url);
							}
							else{
								echo $featured_post->video_title;
							}

						?>						</div>
					<div class="video_controls">									
						<svg class="video_play popup_play" data-id="<?php echo $center_video_url; ?>">
							<use href="#play-button-shape">
						</svg>			
					</div>
					<div class="ghost_tile">&nbsp;
					</div>					
				</div>
			</div>

	<?php
 		endif;
 	?>

	<?php
		$featured_post = get_field('post_object_right_video');
		if( $featured_post ): 
			$custom_bg_image = get_field('video_thumbnail', $featured_post->ID);
			$right_video_url = getVimeoVideoIdFromUrl( $featured_post->video_url );
	?>
			<div class="video_tile" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php
			if($featured_post->get_thumbnail_from_provider){
				echo getVimeoThumb($right_video_url);
			}
			else{
				print_r($custom_bg_image['url']);
			}
			
			?>') center/cover">
			    <iframe class="video_player" id="<?php echo $right_video_url; ?>" src="https://player.vimeo.com/video/<?php echo $right_video_url; ?>?api=1&controls=0"frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; fullscreen"> </iframe>
				<div class="video_text_overlay">
					<div class="video_title" id="overlay_<?php echo $right_video_url; ?>">
						<?php
							if($featured_post->auto_name){
								echo getVimeoTitle($right_video_url);
							}
							else{
								echo $featured_post->video_title;
							}

						?>						</div>
					<div class="video_controls">									
						<svg class="video_play popup_play" data-id="<?php echo $right_video_url; ?>">
							<use href="#play-button-shape">
						</svg>			
					</div>
					<div class="ghost_tile">&nbsp;</div>
				</div>
			</div>

	<?php
 		endif;
 	?>

		</div>
	</div>
</div>