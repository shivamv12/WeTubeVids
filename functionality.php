<?php
	$maxResults = "26";
	$channel_id = "UCquKWI0N6icYpqL66IOsHmg"; // 4K timelapse
	// $channel_id = "UCGpdSarF_FdCygiA1tOl6Cg"; // Sea timelapse
	$api_key = "YOUR_KEY_HERE";
	$url = "https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=";
	$videoList = json_decode(file_get_contents($url.$channel_id.'&maxResults='.$maxResults.'&key='.$api_key));
?>