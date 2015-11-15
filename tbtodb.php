<?php
session_start();
$ACCOUNT=$_SESSION['ACCOUNT'];
$MODE=$_SESSION['MODE'];
if(!$MODE=="ADMINISTRATOR"){
	header("Location: "."access_denied.html");
}
$ID=$_GET['ID'];
$MSG=$_GET['PASSMSG'];

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
                        <div class="title"><a>Database change log</a></div>
                        <div class="detail">
				accept candidate id:<?php echo $MSG; ?><br>
				1.update status of activity with id <?php echo $ID; ?> to meeting<br>
				2.candidates become members, delete from candidate list and please give them one membership account<br>
				3.add attend record to database with status: preparing<br>
				<?php
					$sql = "UPDATE c2130783.ACTIVITY SET STATUS='MEETING' WHERE AID = '$ID'";
					$stmt = db2_exec($conn, $sql);

					$idseries = explode(" ",$MSG);
					$i=0;
					while($i<count($idseries)){
						if(strlen($idseries[$i])<1){
							$i++;
							continue;
						}
						$sql = "SELECT * FROM c2130783.CANDIDATE WHERE PID = '$idseries[$i]'";
						$stmt = db2_exec($conn, $sql);						
						$row = db2_fetch_array($stmt);
						$sql = "INSERT INTO c2130783.MEMBER VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]');";
						$stmt = db2_exec($conn, $sql);
						$sql = "INSERT INTO c2130783.ATTEND VALUES ('$idseries[$i]','$ID','No yet','PREPARING',' ');";
						$stmt = db2_exec($conn, $sql);
						$sql = "DELETE FROM c2130783.CANDIDATE WHERE PID = '$idseries[$i]'";
						$stmt = db2_exec($conn, $sql);
						$i++;
					}
				?>
			     </div>           
                    </div>
                    
                    <!-- end #content -->
                    <div id="sidebar" style = "margin-bottom:200px">
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