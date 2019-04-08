<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Black cat player</title>

		<link rel="stylesheet" href="css/style.css">
		<!-- style -->
		<link rel="stylesheet" type="text/css" href="css/component.css" />

		<script src="js/segment.min.js"></script>
	<script src="js/ease.min.js"></script>
	<!-- script -->
	<script src="js/jquery-3.3.1.min.js"></script>
	</head>
	<body>
	<!-- sidebar -->
		<ul id="sidebar" class="sidebar">
			<li>Page</li>
			<li>Getout</li>
			<li>Login</li>
			<li>Logout</li>
		</ul>

<div id="lyrics" class="content">
		<div class="lyrics"></div>
</div>


	<div id="player" class="player">
		<div id="menu-icon-wrapper" class="menu-icon-wrapper left" style="visibility: hidden;">
			<svg width="1000px" height="1000px">
				<path id="pathA" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
				<path id="pathB" d="M 300 500 L 700 500"></path>
				<path id="pathC" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
			</svg>
			<button id="menu-icon-trigger" class="menu-icon-trigger"></button>
		</div>
			<div class="right">
					<span class="song">Let's Go To the Forest</span>
			<div class="bottom">
				<video controls="" _autoplay="" name="media"><source src="./songs/st.mp3" type="audio/mpeg"></video>
			</div>
			</div>
		</div>

	</div>
<script>
	<?php
		if (!empty($_GET['song'])) {
			$song = $_GET['song'];
			$url ='./lyrics/'.$song.'.json';
			$lyrics = file($url); 
		}else{
			header('Location: home.php');
		}
	?>
		var _data = <?php 
		foreach ($lyrics as $value) {
			echo $value;
		}
		?>;
		</script>
			<!-- script -->
		<script src="js/main.js"></script>
		<script  src="js/index.js"></script>
	</body>
</html>
