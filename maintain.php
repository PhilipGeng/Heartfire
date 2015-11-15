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
<link href="css/login.css" rel="stylesheet" type="text/css" media="screen" />
<script src="jsp/function.js"></script>
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
				<div id="contenttext">
				<div class="title" style="width: 300px;margin: 0;margin-bottom: 25px; float:left"><a>Data Maintenance</a></div>
				<div class="detail" style="width: 300px;margin: 0; float:left">
					<?php
 						$instruction = array("member","committee","public","funding");
					?>
					<table border="1" cellpadding="10">
 					<tr>
  					<th>dataset</th>
 					<th colspan="3">manipulations</th>
 					</tr>
					<tr>
					<?php
						foreach($instruction as $value){
					?>
					<tr><td>
					<?php
							echo "$value";
					?>
					</td>
					<td><a onclick="<?php echo "$value"; ?>insert()" href="javascript:void(0)">insert</a></td>
					<td><a onclick="<?php echo "$value"; ?>update()" href="javascript:void(0)">update</a></td>
					<td><a onclick="<?php echo "$value"; ?>delete()" href="javascript:void(0)">delete</a></td>
					</tr>
					<? } ?>
					</table>
				</div>
				</div>
				<div id="lcontainer" style="margin-top: 50px;" >
				<x id = "changehere" style="font-family:Serif;color:#000000;font-size:25px"></x>

				</div>

			</div>
			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
						<h2>Home Page</h2>
					</li>
					<li>
						<a href="query.php"><h2>Query</h2></a>
						<a href="maintain.php"><p>Data Maintenance </p></a>

					</li>
					<li>
						<a href="calendar.php"><h2>Activity Calendar</h2></a>
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
