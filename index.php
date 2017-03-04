<!DOCTYPE html>
<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
	<title>What's my IP ?</title>
<link rel="icon" type="image/png" href="/images/favicon.png">
<link rel="stylesheet" href="/css/tab.css" type="text/css" />
<link rel="stylesheet" href="/css/body.css" type="text/css" /> 
<link rel="icon" type="image/png" href="http://www.tkj-43.web.id/images/favicon.png">
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
<SCRIPT LANGUAGE="JavaScript">

<! >
<! >

<!-- Begin
var xy = navigator.appVersion;
xz = xy.substring(0,4);
document.write("<center><table border=1 cellpadding=2><tr><td>");
document.write("<center><b>", navigator.appName,"</b>");
document.write("</td></tr><tr><td>");
document.write("<center><table border=1 cellpadding=2><tr>");
document.write("<td>Code Name: </td><td><center>");
document.write("<b>", navigator.appCodeName,"</td></tr>");
document.write("<tr><td>Version: </td><td><center>");
document.write("<b>",xz,"</td></tr>");
document.write("<tr><td>Platform: </td><td><center>");
document.write("<b>", navigator.platform,"</td></tr>");
document.write("<tr><td>Pages Viewed: </td><td><center>");
document.write("<b>", history.length," </td></tr>");
document.write("<tr><td>Java enabled: </td><td><center><b>");
if (navigator.javaEnabled()) document.write("sure is!</td></tr>");
else document.write("not today</td></tr>")
document.write("<tr><td>Screen Resolution: </td><td><center>");
document.write("<b>",screen.width," x ",screen.height,"</td></tr>");
document.write("</table></tr></td></table></center>");
// End -->
</script>

	</body>
</html>