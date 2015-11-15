
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org">
<?php
	session_start();
	$ACCOUNT=$_SESSION['ACCOUNT'];
	$MODE=$_SESSION['MODE'];
	$category = $_GET["category"];
	$keyword = $_GET["keyword"];
	$database = "Driver={IBM DB2 ODBC DRIVER};Database=c2130783;HOSTNAME=158.132.50.235;PORT=50000;PROTOCOL=TCPIP;UID=c2130783;PWD=r4rfd5hk;";
	$conn = db2_connect($database, '', '');
	if ($conn) {
		echo "Connection succeeded.<br>";

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
				
				<div class="title"><a>Data Query Result</a></div>
				<div class="detail"><p>
					<?php echo "category : $category <br> keyword : $keyword"; ?><br></p>
					<table border = "1">
					<?php
					switch($category){
						case "MEMBER":
							echo "<tr><td>&nbsp id &nbsp</td><td>&nbsp name &nbsp</td><td>&nbsp email &nbsp</td><td>&nbsp graduate year &nbsp</td><td>&nbsp department &nbsp</td><td>&nbsp nationality &nbsp</td><td>&nbsp phone &nbsp</td></tr>";
							$sql = "SELECT * FROM c2130783.MEMBER WHERE NAME LIKE '%$keyword%'";
							$stmt = db2_exec($conn, $sql);
							while ($row = db2_fetch_array($stmt)) {
							echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
							}
						break;
						case "COMMITTEE":
							echo "<tr><td>&nbsp id &nbsp</td><td>&nbsp name &nbsp</td><td>&nbsp email &nbsp</td><td>&nbsp phone &nbsp</td><td>&nbsp job &nbsp</td><td>&nbsp status &nbsp</td></tr>";
							$sql = "SELECT * FROM c2130783.COMMITTEE WHERE NAME LIKE '%$keyword%'";
							$stmt = db2_exec($conn, $sql);
							while ($row = db2_fetch_array($stmt)) {
							echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
							}
						break;
						case "COOPERATIVE":
							echo "<tr><td>&nbsp name &nbsp</td><td>&nbsp contact &nbsp</td></tr>";	
							$sql = "SELECT * FROM c2130783.COOPERATIVE WHERE NAME LIKE '%$keyword%'";
							$stmt = db2_exec($conn, $sql);
							while ($row = db2_fetch_array($stmt)) {
							echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
							}
						break;
						case "ACTIVITY":
							echo "<tr><td>&nbsp id &nbsp</td><td>&nbsp name &nbsp</td><td>&nbsp start date &nbsp</td><td>&nbsp end date &nbsp</td><td>&nbsp location &nbsp</td><td>&nbsp status &nbsp</td></tr>";
							$sql = "SELECT * FROM c2130783.ACTIVITY WHERE LOCATION LIKE '%$keyword%'";
							$stmt = db2_exec($conn, $sql);
							while ($row = db2_fetch_array($stmt)) {
							echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
							}
						break;
						case "FUNDING":
							echo "<tr><td>&nbsp name &nbsp</td><td>&nbsp start date &nbsp</td><td>&nbsp expire date &nbsp</td><td>&nbsp amount &nbsp</td><td>&nbsp status &nbsp</td></tr>";
							$sql = "SELECT * FROM c2130783.FUNDING WHERE NAME LIKE '%$keyword%'";
							$stmt = db2_exec($conn, $sql);
							while ($row = db2_fetch_array($stmt)) {
							echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
							}
						break;
					}
					?>
					</table>
				</div>
			</div>

			<!-- end #content -->
			<div id="sidebar">
                        <ul>
                            <li>
                            <?php
                            	if($MODE=="ADMINISTRATOR")
                                	echo "<a href='homepage_admin.php'><h2>Homepage</h2></a>";
                                else if($MODE=="MEMBER")
                                	echo "<a href='homepage_mem.php'><h2>Home Page</h2></a>";
                             ?>
                            </li>
                            <li>
                            <?php
                            	if($MODE=="ADMINISTRATOR"){
                                	echo "<a href='query.php'><h2>Query</h2></a>";
									echo "<a href='maintain.php'><p>Data Maintenance </p></a>";
								}
                                else if($MODE=="MEMBER")
                                	echo "<a href='query.php'><h2>Query</h2></a>";
                             ?>
                            </li>
                            <li>
                            <?php
                                if($MODE=="ADMINISTRATOR"){
                                	echo "<a href='calendar_admin.php'><h2>Activity Calendar</h2></a>";
									echo "<a href='calendar_edit.php'><p>Edit Activities</p></a>";
								}
                                else if($MODE=="MEMBER")
                                	echo "<a href='calendar.php'><h2>Activity Calendar</h2></a>";
                             ?>
                            </li>
                            <li>
                            <?php
                                if($MODE=="ADMINISTRATOR")
                                	echo "<a href='activity.php'><h2>Activity Record</h2></a>";
                                else if($MODE=="MEMBER")
                                	echo "<a href='activity.php'><h2>Activity Record</h2></a>";
                             ?>
                            </li>
                            <li>
                            <?php
                            	if($MODE=="ADMINISTRATOR")
                            		echo "<a href='team_building.php'><h2>Team Building Toolkit</h2></a>";
                             ?>
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
<?php
db2_close($conn);
}
else {
echo "Connection failed\n";
echo "db2_conn_errormsg = " . db2_conn_errormsg() . "\n";
echo "db2_conn_error = " . db2_conn_error() . "\n";
}
?>
