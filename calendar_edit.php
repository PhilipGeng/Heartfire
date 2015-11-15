<?php
session_start();
$ACCOUNT=$_SESSION['ACCOUNT'];
$MODE=$_SESSION['MODE'];
if(!$MODE=="ADMINISTRATOR"){
	header("Location: "."access_denied.html");
}
$result = $_GET["result"];
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
                    <p>Your account: 12345  Mode: Administrator  <a href="/#">logout</a></p>
                </div>
                <div id="page">
                    <div id="content">
				<div id="contenttext" style="width: 400px;margin: 0;margin-bottom: 25px; float:left">
					<div class="title"><a>Activity Calendar</a></div>
					<div class="detail">	
						<table border="1">			
						<?php                     
                			            echo "<tr><td>ID</td><td>Start Date</td><td>End Date</td><td>Location</td><td>Status</td></tr>";
                	  			     $sql="SELECT * FROM C2130783.ACTIVITY ORDER BY Status DESC";
                			            $stmt=db2_exec($conn, $sql);
                			            while ($row = db2_fetch_array($stmt)) 
		     		     	            echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td width = '200'>$row[3]</td><td>$row[4]</td></tr>";		                       		                   
          	 					echo "</table>";
						?>
					</div>          
				</div>
				<div id="lcontainer" style="width: 400px;margin-right:100px;margin-bottom: 25px; float:right">
						<div class="title"><a>Edit Calendar</a></div>
						<div class="detail">
						<?php
							if($result == "addfail")
								echo "Your previous add activity request failed, please check";
							if($result == "delfail")
								echo "Your previous delete activity request failed, please check";
						?><font color = "black">
                        			<p>Add<br/>
						
						<form action="calendar_insert.php" method="get">
							<table border="1"">
							<tr><td>ID</td><td><input type="text" name="id" size="50"/></td></tr>
							<tr><td>Start Date</td><td><input type="text" name="start" value = "YYYY-MM-DD" size="50"/></td></tr>
							<tr><td>End Date</td><td><input type="text" name="end" value = "YYYY-MM-DD" size="50"/></td></tr>
							<tr><td width = '200'>Location</td><td><input type="text" name="location" size="50" /></td></tr>
							<tr><td>Status</td><td><select name = "status" id = "status">
 								<option value ="PREPARING">PREPARING</option>
								<option value ="MEETING">MEETING</option>
								<option value="FINISHED">FINISHED</option>
							</select></td></tr>
							</table>
							<button type="submit" value="add">add</button>
                 			   	</form>
                 			</p>
					<p>Delete<br/>
						<form action="calendar_delete.php" method="get">
							<table border="1">
							<tr><td>ID</td><td><input type="text" name="id" size="50"/></td></tr>
							</table>
							<button type="submit" value="delete">delete</button>
                   			 	</form>
                  			</p> </font>                  
					</div>
				</div>          
                    </div>

                    <!-- end #content -->
                    <div id="sidebar" style = "margin-bottom: 200px">
                        <ul>
                            <li>
                                <a href="homepage_admin.html"><h2>Homepage</h2></a>
                            </li>
                            <li>
                                <a href="query.html"><h2>Data Query</h2></a>
                            </li>
                            <li>
                                <a href="activity.php"><h2>My Activity</h2></a>
                            </li>
                            <li>
                                <a href="calendar_admin.php"><h2>Calendar</h2></a>
                            </li>
                        </ul>
                    </div>                    <!-- end #sidebar -->
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