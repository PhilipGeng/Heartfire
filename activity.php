
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org">
<?php
	session_start();
	$ACCOUNT=$_SESSION['ACCOUNT'];
	$MODE=$_SESSION['MODE'];
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
<?php
	echo "<div id='account'><p>Your account: ".$ACCOUNT."Mode: ".$MODE."<a href='logout.php'> Log Out</a></p></div>";
?>
<div id='page'>
<div id='content'>
<div class='title'><a>Activity</a></div>
<div class='detail'>The activities you are involved<br>

<?php
	$PID=$_SESSION['PID'];
    $database = "Driver={IBM DB2 ODBC DRIVER};Database=c2130783;HOSTNAME=158.132.50.235;PORT=50000;PROTOCOL=TCPIP;UID=c2130783;PWD=r4rfd5hk;";
    
    $conn = db2_connect($database, '', '');
    
    
    if ($conn) {
        $sql="SELECT * FROM C2130783.ACTIVITY,C2130783.ATTEND WHERE ATTEND.PID=$PID AND ATTEND.AID=ACTIVITY.AID;";
        $stmt=db2_exec($conn, $sql);
        echo"<table border='1'>";
        echo "<tr><td>NAME</td><td>START DATE</td><td>END DATE</td><td>LOCATION</td><td>STATUS</td></tr>";
        while ($row = db2_fetch_array($stmt))
        {
            echo"<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
        }
        db2_close($conn);
        echo"</table></div>";
    }
    else {
        echo "Connection failed\n";
        echo "db2_conn_errormsg = " . db2_conn_errormsg() . "\n";
        echo "db2_conn_error = " . db2_conn_error() . "\n";
    }    
        
?>

</div>

<!-- end #content -->
<div id="sidebar">
<ul>
<li>
<a href="homepage_mem.php"><h2>Homepage</h2></a>
<p>Description.</p>
</li>
<li>
<a href="query.php"><h2>Data Query</h2></a>
<p>Description.</p>
</li>
<li>
<a href="activity.php"><h2>My Activity</h2></a>
<p>Description.</p>
</li>
<li>
<a href="calendar.php"><h2>Calendar</h2></a>
<p>Description.</p>
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
