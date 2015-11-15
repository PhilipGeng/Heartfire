 <?php
session_start();
$ACCOUNT=$_SESSION['ACCOUNT'];
$MODE=$_SESSION['MODE'];
$PID = $_SESSION['PID'];
               $database = "Driver={IBM DB2 ODBC DRIVER};Database=c2130783;HOSTNAME=158.132.50.235;PORT=50000;PROTOCOL=TCPIP;UID=c2130783;PWD=r4rfd5hk;";
               $conn = db2_connect($database, '', ''); 
               if ($conn) { 
              			$GENDER=$_GET["GENDER"];
			if(strlen($MODE)<2){
				$PID = $_GET["PID"];
				$AID=$_GET["AID"];
           			$NAME=$_GET["NAME"];
               			$GRAD_YEAR=$_GET["GRAD_YEAR"];
               			$EMAIL=$_GET["EMAIL"];
               			$PHONE=$_GET["PHONE"];
				$NATIONALITY=$_GET["NATIONALITY"];
				$DEPARTMENT=$_GET["DEPARTMENT"];
                  		$sql = "INSERT INTO c2130783.CANDIDATE VALUES ('$PID','$NAME','$EMAIL','$GRAD_YEAR','$DEPARTMENT','$NATIONALITY','$PHONE','INVALID','$GENDER')"; 
			}
			else{
				$sql = "SELECT * FROM c2130783.MEMBER WHERE PID = '$PID'";
				$rc = db2_exec($conn, $sql); 
				$row = db2_fetch_array($stmt);
                   		$sql = "INSERT INTO c2130783.CANDIDATE VALUES ('$PID','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','INVALID','$GENDER')"; 		                			       

			}
                     $rc = db2_exec($conn, $sql);
			$AID=$_GET["AID"];
                 	$sql = "INSERT INTO c2130783.CANDIDATE_FOR VALUES ('$PID','$AID','INVALID','INVALID')"; 
			$rc = db2_exec($conn, $sql);
			header('Location: calendar.php?result=finish');
                     db2_close($conn);             
                  } 
                else { 
                     echo "Connection failed\n"; 
                     echo "db2_conn_errormsg = " . db2_conn_errormsg() . "\n"; 
                     echo "db2_conn_error = " . db2_conn_error() . "\n"; 
                  } 
            
         ?> 
         
         