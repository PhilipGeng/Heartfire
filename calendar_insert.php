      
        <?php

               $database = "Driver={IBM DB2 ODBC DRIVER};Database=c2130783;HOSTNAME=158.132.50.235;PORT=50000;PROTOCOL=TCPIP;UID=c2130783;PWD=r4rfd5hk;";
               $conn = db2_connect($database, '', ''); 
               $ID=$_GET["id"];
               $START=$_GET["start"];
               $END=$_GET["end"];
               $LOCATION=$_GET["location"];
               $STATUS=$_GET["status"];
               if ($conn) {                 
                     $sql = "INSERT INTO c2130783.ACTIVITY VALUES('$ID','$START','$END','$LOCATION','$STATUS','not filled','1');"; 
                     $rc = db2_exec($conn, $sql); 
			if($rc){
				header('Location: calendar_edit.php');
				echo "insert success, redirecting to previous page";
			}
			else{
				header('Location: calendar_edit.php?result=addfail');
			}
                  db2_close($conn); 
                  } 
                else { 
                     echo "Connection failed\n"; 
                     echo "db2_conn_errormsg = " . db2_conn_errormsg() . "\n"; 
                     echo "db2_conn_error = " . db2_conn_error() . "\n"; 
                  } 
		
            		
         ?> 
         
         