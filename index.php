<!DOCTYPE html>
<html>
<head>
	<title>wetubeVids - Videos from youtube</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<link rel="icon" type="image/x-ico" href="assets/images/icon.png">
	<!-- External CSS Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/external.css">
	<!-- External Js Link -->
	<script type="text/javascript" src="assets/js/external.js"></script>

	<!-- Bootstrap Link -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<!-- jQuery Link -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Pooper Js Link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!-- Font Awesome Link -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	

</head>
<body>
	<div class="container-fluid m-0 p-0">
		<!-- Image and text Nav bar-->
		<nav class="navbar navbar-dark bg-dark justify-content-between">
		  <a class="navbar-brand" href="index.php">
		    <img src="assets/images/logo1.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">&nbsp;
		    <span style="font-family: cursive;">WeTubeVids</span>
		  </a>
		  <form autocomplete="off" id="yt-search-box" action="https://www.youtube.com/results" class="form-inline" method="get" target="_blank">
		    <input id="yt-search-text" maxlength="128" name="search_query" class="form-control mr-sm-2" type="search" placeholder="Search youtube videos" aria-label="Search" style="margin-left: -30%; width: 110%;">
		    <!-- <select id="yt-search-option" name="search_type" class="form-control search">
		    	<option>Videos</option>
		    	<option>Channel</option>
		    </select> -->
		    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
		  </form>
		</nav>
	</div>
	<div class="container mt-4">
		<div class="row">
		<!--?php
		include_once('functionality.php');
		foreach ($videoList->items as $item) { ?>
			<div class="col-md-4 p-1 text-center">
				<h4><!?php echo $item->snippet->title; ?></h4>
				<div class="youtube-video">
					<!?php echo '<iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>'; ?>
					<p><!?php echo $item->snippet->description; ?></p>
				</div>
			</div>
		<!?php } ?-->
		<!-- Button to Open the Modal -->
		<?php include_once('functionality.php');
			foreach ($videoList->items as $item) { ?>
			<div class="col-md-3 text-center mb-3">
				<img class="img img-thumbnail img-fluid rounded" src="<?php echo $item->snippet->thumbnails->medium->url; ?>">
				<button type="button" class="btn btn-block btn-info mt-2" onclick="sendData(this.id);" data-toggle="modal" data-target="#videoModal" id="<?php echo $item->id->videoId; ?>">
					<i class="fa fa-play"></i> Watch Now
				</button>
				<span class="title"><?php echo "<br/>".$item->snippet->title; ?></span>
			</div>
		<?php } ?>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row bg-dark text-center p-3 text-white">
			<div class="col-md-12">&copy;2018 Copyright : <a href="https://www.teamscorpion.in/">Team Scorpion</a></div>
		</div>
	</div>
	<!-- The Modal -->
	<div class="modal fade" id="videoModal">
		<div class="modal-dialog">
		  <div class="modal-content">
		    <!-- Modal Header -->
		    <div class="modal-header">
		      <h4 class="modal-title">
		      	<span id="vidTitle"></span>
		      </h4>
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
		    
		    <!-- Modal body -->
		    <div class="modal-body">
		    	<!-- <object width="100%" height="200%" data="https://www.youtube.com/embed/tgbNymZ7vqY" id="yt-player"></object> -->
		    	<embed width="100%" height="270px" src="" id="yt-player">
		    	<!-- <video id="" width="100%" height="270px" controls>
                    <source src="" id="yt-player" type="video/mp4">
                </video> -->
		    </div>
		    
		    <!-- Modal footer -->
		    <div class="modal-footer">
		      <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
		      	<div class="row">
		      		<div class="col-md-3">
		      			<i class="fa fa-eye"></i>&nbsp;&nbsp;
		      			<span id="views"></span>
		      		</div>
		      		<div class="col-md-3">
		      			<i class="fa fa-thumbs-up"></i></i>&nbsp;&nbsp;
		      			<span id="likes"></span>
		      		</div>
		      		<div class="col-md-3">
		      			<i class="fa fa-thumbs-down"></i></i>&nbsp;&nbsp;
		      			<span id="dislikes"></span>
		      		</div>
		      		<div class="col-md-3">
		      			<i class="fa fa-comment"></i></i>&nbsp;&nbsp;
		      			<span id="comments"></span>
		      		</div>
		      		<div class="col-md-12 mt-2">
		      			<span class="text-secondary">
		      				<span id="vidDesc"></span>
		      			</span>
		      		</div>
		      	</div>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
	var element1 = document.getElementById("yt-search-text");
	if (isMobile) {
		element1.style.marginLeft = "0%";
	} else {
		element1.style.marginLeft = "-30%";
	}

	function sendData(obj) {
		document.getElementById('yt-player').src = "https://www.youtube.com/v/"+obj;
		$.ajax({
			url : 'statistics.php',
			type : 'POST',
			data : { id:obj },
			dataType : "json",
			success : function(data) {
				$("#views").html(data['vidStats'][0]);
				$("#likes").html(data['vidStats'][1]);
				$("#dislikes").html(data['vidStats'][2]);
				$("#comments").html(data['vidStats'][3]);
				$("#vidTitle").html(data['vidInfo'][0]);
				$("#vidDesc").html(data['vidInfo'][1]);
			}
		});
	}

</script>