
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org">
<?php
	session_start();
	$ACCOUNT=$_SESSION['ACCOUNT'];
	$MODE=$_SESSION['MODE'];
	if(!$MODE=="MEMBER"){
		header("Location: "."access_denied.html");
	}
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>HeartFire</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
<div id="wrapper2">
		<div id="header">
			<div id="logo">
				<img src  = "images/weblogo1.png" />
			</div>
			<div id="name">
				<p style="height: 70px;">Follow your heart</p>
				<d>heartfire management system</d>
			</div>

		</div>
		<!-- end #header -->
			<div id="account">
				<?php
					echo "<p>Your account: ".$ACCOUNT."  Mode: ".$MODE." <a href='logout.php'> Log Out</a></p>";
				 ?>
			</div>
		<div id="page">
			<div id="content">
				<div class="title"><a>Dear Heartfire old member</a></div>
				<div class="detail">
					Welcome your visit !<br><br><br>
					<p>
					<b>Use our functions! <br></b>
					<b>Query</b>: search for something with keywords<br>
					<b>Activity Calendar</b>: see what will happen recently<br>
					<b>Activity Record</b>: look back at your heartfire footprint<br>
					</p>
				</div>
			</div>

			<!-- end #content -->
			<div id="sidebar" style = "margin-bottom:200px">
				<ul>
					<li>
						<a href="homepage_mem.php"><h2>Home Page</h2></a>
					</li>
					<li>
						<a href="query.php"><h2>Query</h2></a>
					</li>
					<li>
						<a href="calendar.php"><h2>Activity Calendar</h2></a>
					</li>
					<li>
						<a href="activity.php"><h2>Activity Record</h2></a>
					</li>

				</ul>
				
			</div>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #page -->
		<div id="footer">
			<p>HeartFire Education Service information System -- term project of Kita, Raphael, Quentin and Philip</p>
		</div>
</div>
</div>
<!-- end #footer -->
</body>
</html>
