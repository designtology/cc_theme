<?php

			    function getVimeoVideoIdFromUrl($url) {
			        $regs = array();
			        $id = '';
			    
			        if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
			            $id = $regs[3];
			        }
			        return $id;
			    }

				function getVimeoThumb($id)
				{
				    $arr_vimeo = unserialize(file_get_contents("https://vimeo.com/api/v2/video/$id.php"));
				    //return $arr_vimeo[0]['thumbnail_small']; // returns small thumbnail
				    // return $arr_vimeo[0]['thumbnail_medium']; // returns medium thumbnail
				     return $arr_vimeo[0]['thumbnail_large']; // returns large thumbnail
				}

				function getVimeoTitle($id)
				{
				    $arr_vimeo = unserialize(file_get_contents("https://vimeo.com/api/v2/video/$id.php"));
				    //return $arr_vimeo[0]['thumbnail_small']; // returns small thumbnail
				    // return $arr_vimeo[0]['thumbnail_medium']; // returns medium thumbnail
				     return $arr_vimeo[0]['title']; // returns large thumbnail
				}

				function getVimeoLength($id)
				{
				    $arr_vimeo = unserialize(file_get_contents("https://vimeo.com/api/v2/video/$id.php"));
			    	$seconds = $arr_vimeo[0]['duration'];
			    	$duration =   sprintf('%02d:%02d', ($seconds/ 60 % 60), $seconds% 60);
				    return $duration; // returns duration
				}

?>
