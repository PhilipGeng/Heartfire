
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org">
<?php
	session_start();
	$ACCOUNT=$_SESSION['ACCOUNT'];
	$MODE=$_SESSION['MODE'];
	if(!$MODE=="ADMINISTRATOR"){
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
					echo "<p>Your account: ".$ACCOUNT."  Mode: ".$MODE."<a href='logout.php'> Log Out</a></p>";
				 ?>
			</div>
		<div id="page">
			<div id="content">
				<div class="title"><a>Dear Administrator</a></div>
				<div class="detail">
					<p>Here are the functions provide for you:<br><br><br>
						<b>Query</b>: search for something with keywords<br>
						<b>Data Maintenance</b>: insert/update/delete information about people and fundings in heartfire<br>
						<b>Activity Calendar</b>: see what will happen recently<br>
						<b>Edit Activities</b>: insert/update/delete information about activities in heartfire<br>
						<b>Activity Record</b>: look back at your heartfire footprint<br>
					</p>
				</div>
			</div>

			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
						<a href="homepage_admin.php"><h2>Home Page</h2></a>
					</li>
					<li>
						<a href="query.php"><h2>Query</h2></a>
						<a href="maintain.php"><p>Data Maintenance </p></a>
					</li>
					<li>
						<a href="calendar_admin.php"><h2>Activity Calendar</h2></a>
						<a href="calendar_edit.php"><p>Edit Activities</p></a>
					</li>
					<li>
						<a href="activity.php"><h2>Activity Record</h2></a>
					</li>
					<li>
						<a href="team_building.php"><h2>Team Building Toolkit</h2></a>
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
