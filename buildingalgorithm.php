<?php
session_start();
$ACCOUNT=$_SESSION['ACCOUNT'];
$MODE=$_SESSION['MODE'];
if(!$MODE=="ADMINISTRATOR"){
	header("Location: "."access_denied.html");
}
function getCombinationToArray($arr,$m)
{
    $result = array();
    if ($m ==1)
    {
        foreach ($arr as $s)
        {
            $result[]=array($s);
        }
        return $result;
    }
    
    if ($m == count($arr))
    {
        $result[] = $arr;
        return $result;
    }
        
    $temp_firstelement = $arr[0];
    unset($arr[0]);
    $arr = array_values($arr);
    $temp_list1 = getCombinationToArray($arr, ($m-1));
    
    foreach ($temp_list1 as $s)
    {
        $s[] = $temp_firstelement;
        $result[] = $s; 
    }
    unset($temp_list1);

    $temp_list2 = getCombinationToArray($arr, $m);
    foreach ($temp_list2 as $s)
    {
        $result[] = $s;
    }    
    unset($temp_list2);
    
    return $result;
}

$ID=$_GET['ID'];
$FM=$_GET['female'];
$NM=$_GET['nm'];
$YOUNG=$_GET['young'];
$TOTAL=$_GET['total'];

$database = "Driver={IBM DB2 ODBC DRIVER};Database=c2130783;HOSTNAME=158.132.50.235;PORT=50000;PROTOCOL=TCPIP;UID=c2130783;PWD=r4rfd5hk;";
$conn = db2_connect($database, '', '');
if ($conn) {
$sql = "SELECT c2130783.CANDIDATE_FOR.PID,NAME,NATIONALITY,GENDER,GRAD_YEAR FROM c2130783.CANDIDATE_FOR,c2130783.CANDIDATE WHERE AID='$ID' AND c2130783.CANDIDATE_FOR.PID = c2130783.CANDIDATE.PID";
$stmt = db2_exec($conn, $sql);
$i=0;
while ($row = db2_fetch_array($stmt)) {
$candidate[$i][0]=$row[0];
$candidate[$i][1]=$row[1];
$candidate[$i][2]=$row[2];
$candidate[$i][3]=$row[3];
$candidate[$i][4]=$row[4];
$arr[$i]=$i;
$i++;	
}
$num = $TOTAL;
$res = getCombinationToArray($arr, $num); 
$i=0;
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
                    <p>Your account: 12345  Mode: Administrator  <a href="/#">logout</a></p>
                </div>
                <div id="page">
                    <div id="content">
                        <div class="title"><a>Team Building Result</a></div>
                        <div class="detail">
                           <?php
				echo "Your request:<br><b>$FM</b> female candidates<br><b>$NM</b> local or international candidates<br><b>$YOUNG</b> year1 or year2 students<br><table border = '1'><tr><td>candidate id</td><td>name</td><td>nationality</td><td>gender</td><td>graduate year</td></tr>";
				while($i<count($res)){
				$j=0;
				$cntf=0;
				$cntnm=0;
				$cntyoung=0;
				while($j<count($res[$i])){
					if($candidate[$res[$i][$j]][2]!="MAINLAND")
						$cntnm++;
					if($candidate[$res[$i][$j]][3]=='F    ')
						$cntf++;
					if($candidate[$res[$i][$j]][4]>2015)
						$cntyoung++;
					$j++;
				}
				if($cntf>=$FM && $cntnm>=$NM && $cntyoung>=$YOUNG){
					$j=0;
					while($j<count($res[$i])){
						if(strlen($candidate[$res[$i][$j]][0])>0)
							echo "<tr><td>".$candidate[$res[$i][$j]][0]."</td><td>".$candidate[$res[$i][$j]][1]."</td><td>".$candidate[$res[$i][$j]][2]."</td><td>".$candidate[$res[$i][$j]][3]."</td><td>".$candidate[$res[$i][$j]][4]."</td></tr>";
						$passmsg = $passmsg." ".$candidate[$res[$i][$j]][0];
						$j++;	
					}
					break;		
				}
				$i++;
				}
				?> 
				</table>
				<form action="tbtodb.php" method="get">
				<input type="hidden" name="ID" value="<?php echo $ID;?>" />
				<input type="hidden" name="PASSMSG" value="<?php echo $passmsg;?>" />
				<input type="submit" value="update to database" />
				 </form>
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