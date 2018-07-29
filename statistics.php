<?php
	$obj = $_POST['id'];
	$api_key = "YOUR_KEY_HERE";

	$videoAnalytics = "https://www.googleapis.com/youtube/v3/videos?part=statistics&id=".$obj."&key=".$api_key;
	$videoStatistics = json_decode(file_get_contents($videoAnalytics));

	$statistics = array();
	$statistics[0] = $videoStatistics->items[0]->statistics->viewCount;
	$statistics[1] = $videoStatistics->items[0]->statistics->likeCount;
	$statistics[2] = $videoStatistics->items[0]->statistics->dislikeCount;
	$statistics[3] = $videoStatistics->items[0]->statistics->commentCount;
	// echo json_encode($statistics);

	$videoInfo = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=".$obj."&key=".$api_key;
	$videoInformation = json_decode(file_get_contents($videoInfo));

	$information = array();
	$information[0] = $videoInformation->items[0]->snippet->title;
	$information[1] = $videoInformation->items[0]->snippet->description;
	// echo json_encode($statistics);
	echo json_encode(array('vidStats'=>$statistics,'vidInfo'=>$information));
?>