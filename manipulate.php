
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
				<?php 	
					$headmsg = $action."<br>successful!";
					$reqmsg = "your request:<br>";	
					$dtlmsg = "";
					if ($action=="insert_member"){
						$ID = $_GET["ID"];
						$NAME = $_GET["NAME"];
						$EMAIL = $_GET["EMAIL"];
						$GRAD_YEAR = $_GET ["GRAD_YEAR"];
						$DEPARTMENT = $_GET["DEPARTMENT"];
						$NATIONALITY = $_GET["NATIONALITY"];
						$PHONE = $_GET ["PHONE"];
						$reqmsg = $reqmsg."id: $ID<br>name: $NAME<br>email: $EMAIL<br>graduate year: $GRAD_YEAR<br>department: $DEPARTMENT<br>nationality: $NATIONALITY<br>phone: $PHONE<br>";
						$sql = "INSERT INTO c2130783.MEMBER VALUES ('$ID','$NAME','$EMAIL','$GRAD_YEAR','$DEPARTMENT','$NATIONALITY','$PHONE');";
						$stmt = db2_exec($conn, $sql);
						if(!$stmt){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>duplilcated id already exist: </b><br>";
							$sql = "SELECT * FROM c2130783.MEMBER WHERE PID = '$ID'";
							$stmt = db2_exec($conn, $sql);
							while ($row = db2_fetch_array($stmt)) {
							$dtlmsg = $dtlmsg."id: $row[0]<br> name: $row[1]<br>email: $row[2]<br>graduate year: $row[3]<br>department: $row[4]<br>nationality: $row[5]<br>phone: $row[6]<br>";
							}
						}
						if(strlen($ID) == 0)
							$dtlmsg = "<b>please input a valid id</b><br>";
					}
					elseif($action=="insert_committee"){
						$ID = $_GET["ID"];
						$NAME = $_GET["NAME"];
						$EMAIL = $_GET["EMAIL"];
						$PHONE = $_GET["PHONE"];
						$JOB = $_GET["JOB"];
						$STATUS = $_GET["STATUS"];		
						$reqmsg = $reqmsg."id: $ID<br>name: $NAME<br>email: $EMAIL<br>phone: $PHONE<br>job: $JOB<br>status: $STATUS<br>";
						$sql = "INSERT INTO c2130783.COMMITTEE VALUES ('$ID','$NAME','$EMAIL','$PHONE','$JOB','$STATUS');";
						$stmt = db2_exec($conn, $sql);
						if(!$stmt){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>duplilcated id already exist: </b><br>";
							$sql = "SELECT * FROM c2130783.COMMITTEE WHERE PID = '$ID'";
							$stmt = db2_exec($conn, $sql);
							while ($row = db2_fetch_array($stmt)) {
							$dtlmsg = $dtlmsg."id: $row[0]<br> name: $row[1]<br>email: $row[2]<br>phone: $row[3]<br>job: $row[4]<br>status: $row[5]<br>";
							}
						}
						if(strlen($ID) == 0)
							$dtlmsg = "<b>please input a valid id</b><br>";


					}
					elseif($action=="insert_public"){
						$ID = $_GET["ID"];
						$NAME = $_GET["NAME"];
						$EMAIL = $_GET["EMAIL"];	
						$TYPE = $_GET["TYPE"];
						$reqmsg = $reqmsg."id: $ID<br>name: $NAME<br>email: $EMAIL<br>type: $TYPE<br>";
						if($TYPE=="DONOR")
							$sql = "INSERT INTO c2130783.DONOR VALUES ('$ID','$NAME','$EMAIL');";
						else
							$sql = "INSERT INTO c2130783.SUPERVISOR VALUES ('$ID','$NAME','$EMAIL');";
						$stmt = db2_exec($conn, $sql);
						if(!$stmt){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>duplilcated id already exist: </b><br>";
							if($TYPE=="DONOR")
								$sql = "SELECT * FROM c2130783.DONOR WHERE PID = '$ID'";
							else
								$sql = "SELECT * FROM c2130783.SUPERVISOR WHERE PID = '$ID'";
							$stmt = db2_exec($conn, $sql);
							while ($row = db2_fetch_array($stmt)) {
							$dtlmsg = $dtlmsg."id: $row[0]<br> name: $row[1]<br>email: $row[2]<br>type: $row[3]<br>";
							}
						}
						if(strlen($ID) == 0)
							$dtlmsg = "<b>please input a valid id</b><br>";

					}
					elseif($action=="insert_funding"){
						$NAME = $_GET["NAME"];
						$START_DATE = $_GET["START_DATE"];
						$EXPIRE_DATE = $_GET["EXPIRE_DATE"];
						$AMOUNT = $_GET["AMOUNT"];
						$DETAIL = $_GET["DETAIL"];
						$STATUS = $_GET["STATUS"];
						$DONORID = $_GET["DONORID"];
						$reqmsg = $reqmsg."name: $NAME<br>start date: $START_DATE<br>expire date: $EXPIRE_DATE<br>amount: $AMOUNT<br>detail: $DETAIL<br>status: $STATUS<br>donor id: $DONORID<br>";
						$sql = "INSERT INTO c2130783.FUNDING VALUES ('$NAME','$START_DATE','$EXPIRE_DATE','$AMOUNT','$DETAIL','$STATUS','$DONORID');";
						$stmt = db2_exec($conn, $sql);
						if(strlen($NAME) == 0)
							$dtlmsg = "<b>please input valid name and start date</b><br>";
						$sql = "SELECT * FROM c2130783.DONOR WHERE PID = '$DONORID'";
						$res = db2_exec($conn, $sql);
						$row = db2_fetch_array($res);
						if(strlen($row[0])==0){
							$dtlmsg = $dtlmsg."donor do not exist, please further complete donor information<br><form action='manipulate.php' method='get'><table border ='0' style ='font-size:15px'><tr><td>id </td><td><input type= 'text ' name='ID' value = '$DONORID' /></td></tr><tr><td>name </td><td><input type= 'text ' name='NAME' /></td></tr><tr><td>email </td><td><input type= 'text ' name='EMAIL' /></td></tr><tr><td>Type </td><td><select name='TYPE' id = 'type'><option value = 'DONOR'>donor</option></select></td></tr></td></tr></table><br><input type='submit' name = 'action' value = 'insert_public' /></form>";
						
						}

					}
					elseif($action=="update_member"){
						$ID = $_GET["ID"];
						$ITEM = $_GET["item"];
						$VALUE = $_GET["value"];
						$sql = "SELECT * FROM c2130783.MEMBER WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);
						$reqmsg = $reqmsg."id: $ID<br>change $ITEM to $VALUE<br>";
						$row = db2_fetch_array($stmt);						
						if(strlen($row[0]) == 0){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>id do not exist</b><br>";
						}
						else{
						$sql = "UPDATE c2130783.MEMBER SET $ITEM='$VALUE' WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);							
						}
					}
					elseif($action=="update_committee"){
						$ID = $_GET["ID"];
						$ITEM = $_GET["item"];
						$VALUE = $_GET["VALUE"];
						$sql = "SELECT * FROM c2130783.COMMITTEE WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);
						$reqmsg = $reqmsg."id: $ID<br>change $ITEM to $VALUE<br>";
						$row = db2_fetch_array($stmt);						
						if(strlen($row[0]) == 0){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>id do not exist</b><br>";
						}
						else{
						$sql = "UPDATE c2130783.COMMITTEE SET $ITEM='$VALUE' WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);
						}	
					}
					elseif($action=="update_public"){
						$ID = $_GET["ID"];
						$ITEM = $_GET["item"];
						$TYPE = $_GET["TYPE"];
						$VALUE = $_GET["VALUE"];
						$sql = "SELECT * FROM c2130783.$TYPE WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);
						$row = db2_fetch_array($stmt);	
						$reqmsg = $reqmsg.$TYPE." id: ".$ID."<br>change ".$ITEM." to "."$VALUE";
						if(strlen($row[0]) == 0){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>id do not exist</b><br>";
						}
						else{
						$sql = "UPDATE c2130783.$TYPE SET $ITEM='$VALUE' WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);
						}	
					}
					elseif($action=="update_funding"){
						$NAME = $_GET["name"];
						$START_DATE = $_GET["start_date"];
						$ITEM = $_GET["item"];
						$VALUE = $_GET["value"];
						$reqmsg = $reqmsg."name: $NAME  start date: $START_DATE<br>change $ITEM to $VALUE<br>";
						$sql = "SELECT * FROM c2130783.FUNDING WHERE (NAME = '$NAME' AND START_DATE = '$START_DATE')";
						$stmt = db2_exec($conn, $sql);
						$row = db2_fetch_array($stmt);	
						if(strlen($row[0]) == 0){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>funding do not exist</b><br>";
						}
						else{						
						$sql = "UPDATE c2130783.FUNDING SET $ITEM='$VALUE' WHERE (NAME = '$NAME' AND START_DATE = '$START_DATE')";
						$stmt = db2_exec($conn, $sql);
						}
					}
					elseif($action=="delete_member"){
						$ID = $_GET["ID"];
						$reqmsg = $reqmsg."delete member with id $ID<br>";
						$sql = "SELECT * FROM c2130783.MEMBER WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);
						$row = db2_fetch_array($stmt);
						if(strlen($row[0]) == 0){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>member do not exist</b><br>";
						}
						else{	
							$dtlmsg = $dtlmsg."delete member record: <br>";
							$dtlmsg = $dtlmsg."id: $row[0]<br> name: $row[1]<br>email: $row[2]<br>graduate year: $row[3]<br>department: $row[4]<br>nationality: $row[5]<br>phone: $row[6]<br>";
							$sql = "DELETE FROM c2130783.MEMBER WHERE PID = '$ID'";
							$stmt = db2_exec($conn, $sql);
						}
					}
					elseif($action=="delete_committee"){
						$ID = $_GET["ID"];
						$reqmsg = $reqmsg."delete committee with id $ID<br>";
						$sql = "SELECT * FROM c2130783.COMMITTEE WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);
						$row = db2_fetch_array($stmt);
						if(strlen($row[0]) == 0){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>committee do not exist</b><br>";
						}
						else{	
							$dtlmsg = $dtlmsg."delete committee record: <br>";
							$dtlmsg = $dtlmsg."id: $row[0]<br> name: $row[1]<br>email: $row[2]<br>phone: $row[3]<br>job: $row[4]<br>status: $row[5]<br>";
							$sql = "DELETE FROM c2130783.COMMITTEE WHERE PID = '$ID'";
							$stmt = db2_exec($conn, $sql);
						}
					}
					elseif($action=="delete_public"){
						$ID = $_GET["ID"];
						$TYPE = $_GET["TYPE"];
						$reqmsg = $reqmsg."delete $TYPE with id $ID<br>";
						$sql = "SELECT * FROM c2130783.$TYPE WHERE PID = '$ID'";
						$stmt = db2_exec($conn, $sql);
						$row = db2_fetch_array($stmt);
						if(strlen($row[0]) == 0){
							$headmsg = $action."<br>fail!";
							$dtlmsg = $dtlmsg."<b>$TYPE do not exist</b><br>";
						}
						else{	
							$dtlmsg = $dtlmsg."delete $TYPE record: <br>";
							$dtlmsg = $dtlmsg."id: $row[0]<br> name: $row[1]<br>email: $row[2]<br>type: $row[3]<br>";
							$sql = "DELETE FROM c2130783.$TYPE WHERE PID = '$ID'";
							$stmt = db2_exec($conn, $sql);
						}
					}
					elseif($action=="delete_funding"){
						$NAME = $_GET["NAME"];
						$START_DATE = $_GET["START_DATE"];
						$reqmsg = $reqmsg."delete funding with name: $NAME and start date: $START_DATE<br>";
						$sql = "SELECT * FROM c2130783.FUNDING WHERE (NAME = '$NAME' AND START_DATE = '$START_DATE')";
						$stmt = db2_exec($conn, $sql);
						$row = db2_fetch_array($stmt);
						if(strlen($row[0]) == 0){
							$headmsg = $action."<br>fail! ";
							$dtlmsg = $dtlmsg."<b>Funding do not exist</b><br>";

						}
						else{
							$dtlmsg = $dtlmsg."delete funding record: <br>";
							$dtlmsg = $dtlmsg."id: $row[0]<br> start date: $row[1]<br>expire date: $row[2]<br>amount: $row[3]<br>detail: $row[4]<br>status: $row[5]<br>donor id: $row[6]<br>";
							$sql = "DELETE FROM c2130783.FUNDING WHERE (NAME = '$NAME' AND START_DATE = '$START_DATE')";
							$stmt = db2_exec($conn, $sql);
						}
					}
					if(!$stmt)
						$headmsg = $action."<br>fail";

				?>
				<div class="title"><a><?php echo $headmsg; ?></a></div>
				<div class="detail"><a><?php echo $dtlmsg."<br>".$reqmsg ; ?></a>
					<br><a href="maintain.php"><-- go back !</a>

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
<?php
db2_close($conn);
}
else {
echo "Connection failed\n";
echo "db2_conn_errormsg = " . db2_conn_errormsg() . "\n";
echo "db2_conn_error = " . db2_conn_error() . "\n";
}
?>