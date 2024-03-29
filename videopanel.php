<?php include('video_functions.php'); ?>


<svg class="defs" id="play-button-shape" >
<circle style="fill:#A51515;" cx="29" cy="29" r="29"/>
<g>
	<polygon style="fill:#FFFFFF;" points="44,29 22,44 22,29.273 22,14 	"/>
	<path style="fill:#FFFFFF;" d="M22,45c-0.16,0-0.321-0.038-0.467-0.116C21.205,44.711,21,44.371,21,44V14
		c0-0.371,0.205-0.711,0.533-0.884c0.328-0.174,0.724-0.15,1.031,0.058l22,15C44.836,28.36,45,28.669,45,29s-0.164,0.64-0.437,0.826
		l-22,15C22.394,44.941,22.197,45,22,45z M23,15.893v26.215L42.225,29L23,15.893z"/>
</g>
</svg>


<div class="container video_panel">
  	<div class="wrapper">
		<div class="section_title">Our very finest selection</div>
		<div class="video_element">

			<div class="video_tile">
				<div class="video_area" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php echo getVimeoThumb('302154517'); ?>') center/cover"></div>
				<div class="video_text_overlay">
					<div class="video_title">
						<div><?php echo getVimeoTitle('302154517'); ?></div>
						<div class="time_stamp"><?php echo getVimeoLength('302154517'); ?> MIN</div>
					</div>
					<div>
						<div class="video_play relative popup_play" data-id="302154517">
							<div class="btn_icon"></div>WATCH CLIP
						</div>
					</div>
				</div>
			</div>

			<div class="video_tile">
				<div class="video_area" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php echo getVimeoThumb('307626569'); ?>') center/cover"></div>
				<div class="video_text_overlay">
					<div class="video_title">
						<div><?php echo getVimeoTitle('307626569'); ?></div>
						<div class="time_stamp"><?php echo getVimeoLength('307626569'); ?> MIN</div>				
					</div>
					<div>
						<div class="video_play relative popup_play" data-id="307626569">
							<div class="btn_icon"></div>WATCH CLIP
						</div>				
					</div>
				</div>
			</div>

			<div class="video_tile">
				<div class="video_area" style="background: linear-gradient(0deg, #000000 0%, rgba(0, 0, 0, 0) 100%), url('<?php echo getVimeoThumb('252252694'); ?>') center/cover"></div>
				<div class="video_text_overlay">
					<div class="video_title">
						<div><?php echo getVimeoTitle('252252694'); ?></div>
						<div class="time_stamp"><?php echo getVimeoLength('252252694'); ?> MIN</div>
					</div>
					<div>
						<div class="video_play relative popup_play" data-id="252252694">
							<div class="btn_icon"></div>WATCH CLIP
						</div>				
					</div>
				</div>
			</div>

		</div>
	</div>
</div>