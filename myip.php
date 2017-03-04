<!DOCTYPE html>
<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
	<title>What's my IP ?</title>
<link rel="icon" type="image/png" href="/images/favicon.png">
<link rel="stylesheet" href="css/tab.css" type="text/css" />
<link rel="stylesheet" href="css/body.css" type="text/css" /> 
</head>
	<body>
<div id="navcontainer">
    	<ul id="navlist">
    <!-- CSS Tabs -->
    		<li><a href="http://www.situstarget.com">Blog</a></li>
    		<li><a href="http://forum.situstarget.com">Forum</a></li>
    		<li><a href="http://wiki.situstarget.com">Wiki</a></li>
    		<li><a href="http://upload.situstarget.com/gallery.php">Gallery</a></li>
		<li><a href="http://proxy.situstarget.com">Proxy</a></li>
		<li><a href="http://code.google.com/p/the-target/">Project</a></li>
	</ul>
</div>

		<div id="tools" class="tools">
			<p>Your IP:</p>
		</div>
		<div id="ip-lookup" class="tools">
			<?php if ($_SERVER["HTTP_X_FORWARDED_FOR"] != "") {
				$IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
				$proxy = $_SERVER["REMOTE_ADDR"];
				$host = @gethostbyaddr($_SERVER["HTTP_X_FORWARDED_FOR"]);
			} else {
				$IP = $_SERVER["REMOTE_ADDR"];
				$host = @gethostbyaddr($_SERVER["REMOTE_ADDR"]);
			} ?>
			<h1><?php echo $IP; ?></h1>
		</div>
		<div id="more" class="tools">
			<p><a id="more-link" title="More information" href="javascript:toggle();">More info</a></p>
		</div>
		<div id="more-info" class="tools">
			<ul>
			<?php
				echo '<li><strong>Remote Port:</strong> <span>'.$_SERVER["REMOTE_PORT"].'</span></li>';
				echo '<li><strong>Request Method:</strong> <span>'.$_SERVER["REQUEST_METHOD"].'</span></li>';
				echo '<li><strong>Server Protocol:</strong> <span>'.$_SERVER["SERVER_PROTOCOL"].'</span></li>';
				echo '<li><strong>Server Host:</strong> <span>'.$host.'</span></li>';
				echo '<li><strong>User Agent:</strong> <span>'.$_SERVER["HTTP_USER_AGENT"].'</span></li>';
				if ($proxy) echo '<li><strong>Proxy: <span>'.($proxy) ? $proxy : ''.'</span></li>';

				$time_start = microtime(true);
				usleep(100);
				$time_end = microtime(true);
				$time = $time_end - $time_start;
			?>
			</ul>
			<p><small>It took <?php echo $time; ?> seconds to share this info.</small></p>
		</div>
<script type="text/javascript">
	function hideStuff(){
		if (document.getElementById){
			var x = document.getElementById('more-info');
			x.style.display="none";
		}
	}
	function toggle(){
		if (document.getElementById){
			var x = document.getElementById('more-info');
			var y = document.getElementById('more-link');
			if (x.style.display == "none"){
				x.style.display = "";
				y.innerHTML = "Less info";
			} else {
				x.style.display = "none";
				y.innerHTML = "More info";
			}
		}
	}
	window.onload = hideStuff;
</script>
	</body>
</html>