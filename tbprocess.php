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
	<link href="css/login.css" rel="stylesheet" type="text/css" media="screen" />
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
		
			<div id="lcontainer" style="width: 400px;margin-right:200px;margin-bottom: 25px; float:right">
				<div class="title"><a>all candidates list</a></div>
				<div class="detail" style = "color:black">	
			<?php
					$ID = $_GET['ID'];
					$i = 0;
					$FM=0;
					$YOT=0;
					$NM=0;
					$sql = "SELECT c2130783.CANDIDATE_FOR.PID,NAME,NATIONALITY,GENDER,GRAD_YEAR FROM c2130783.CANDIDATE_FOR,c2130783.CANDIDATE WHERE AID='$ID' AND c2130783.CANDIDATE_FOR.PID = c2130783.CANDIDATE.PID";
					$stmt = db2_exec($conn, $sql);
					echo "<p><table border = '1'><tr><td>id</td><td>name</td><td>nationality</td><td>gender</td><td>graduate year</td></tr>";
					while ($row = db2_fetch_array($stmt)) {
						echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>";
						$i++;
						if($row[4]>2015)
							$YOT++;
						if($row[3]=='F    ')
							$FM++;
						if($row[2]!='MAINLAND')
							$NM++;
					}
					echo "</table><p>totally<b> $i</b> candidates</p></p>";
					?>
				</div>
			   </div>
				<div id="contenttext" style="width: 300px;margin: 0;margin-bottom: 25px; float:left">
                        <div class="title"><a>Team Building Toolkit</a></div>
                        <div class="detail">
                        	<?php


					$sql = "SELECT * FROM c2130783.ACTIVITY WHERE AID='$ID'";
					$stmt = db2_exec($conn, $sql);
					while ($row = db2_fetch_array($stmt)) {
						echo "activity id: $row[0]<br>start date: $row[1]<br>end date: $row[2]<br>location: $row[3]<br>";
					}
				 ?><br>
				<form action="buildingalgorithm.php" method="get">
				<input type="hidden" name="ID" value="<?php echo $ID;?>" />
				<b><font size = "4">Criterion to be considered:<br></font></b><br>
					-- least number of female candidates<br>
					<?php echo $FM ; ?> in the list
					<input type="text" name="female" value = "0"/>
					<br><br>
					--least number of local and international candidates<br>
					<?php echo $NM ; ?> in the list
					<input type="text" name="nm" value = "0"/>					
					<br><br>
					--least number of year1 and year2 students<br>
					<?php echo $YOT ; ?> in the list
					<input type="text" name="young" value = "0"/>
					<br><br>
					--total number of members<br>
					<?php echo $i ; ?> in the list
					<input type="text" name="total" value = "0"/>
					<br><br>
					<input type="submit" value="build" />
				</form>

			</div>
			</div>          
                    </div>
                    
                    <!-- end #content -->
                    <div id="sidebar" style = "margin-bottom: 200px">
                        <ul>
                            <li>
                                <a href="homepage_admin.php"><h2>Homepage</h2></a>
                            </li>
                            <li>
                                <a href="query.php"><h2>Data Query</h2></a>
                            </li>
                            <li>
                                <a href="activity.php"><h2>My Activity</h2></a>
                            </li>
                            <li>
                                <a href="calendar_admin.php"><h2>Calendar</h2></a>
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