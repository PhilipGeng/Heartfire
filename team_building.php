<?php
session_start();
$ACCOUNT=$_SESSION['ACCOUNT'];
$MODE=$_SESSION['MODE'];
if(!$MODE=="ADMINISTRATOR"){
	header("Location: "."access_denied.html");
}
$action = $_GET["action"];
$database = "Driver={IBM DB2 ODBC DRIVER};Database=c2130783;HOSTNAME=158.132.50.235;PORT=50000;PROTOCOL=TCPIP;UID=c2130783;PWD=r4rfd5hk;";
$conn = db2_connect($database, '', '');
if ($conn) {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org">

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
                        <div class="title"><a>Team Building Toolkit</a></div>
                        <div class="detail">
                            <p>Team building list</p>
					<table border = "1">
					<tr><td>activity id</td><td>start date</td><td>end date</td><td>location</td></tr>
					<?php
						$sql = "SELECT * FROM c2130783.ACTIVITY WHERE STATUS='PREPARING'";
						$stmt = db2_exec($conn, $sql);
						while ($row = db2_fetch_array($stmt)) {
							echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td><a href=tbprocess.php?ID=$row[0]'>$row[3]</a></td></tr>";
						}
					?>
					</table>   
			     </div>           
                    </div>
                    
                    <!-- end #content -->
                    <div id="sidebar" style = "margin-bottom:200px">
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
<?php
db2_close($conn);
}
else {
echo "Connection failed\n";
echo "db2_conn_errormsg = " . db2_conn_errormsg() . "\n";
echo "db2_conn_error = " . db2_conn_error() . "\n";
}
?>