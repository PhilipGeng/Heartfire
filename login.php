<?php
    $database = "Driver={IBM DB2 ODBC DRIVER};Database=c2130783;HOSTNAME=158.132.50.235;PORT=50000;PROTOCOL=TCPIP;UID=c2130783;PWD=r4rfd5hk;";
    $dbc = db2_connect($database, '', '');
    session_start();
    $sid=session_id();
    $error = "error.html";
    //not yet log in 
    if(!isset($_SESSION['PID'])){
        if(isset($_GET['login'])){//submit the form
            $user_account = $_GET['account'];
            $user_password = $_GET['password'];
            
            if(!empty($user_account)&&!empty($user_password)){
                $query1 = "SELECT PID, ACCOUNT, MODE  FROM c2130783.ACCOUNT WHERE ACCOUNT = '$user_account' AND PASSWORD = '$user_password';";
                $query2 = "SELECT COUNT(*) FROM c2130783.ACCOUNT WHERE ACCOUNT = '$user_account' AND PASSWORD = '$user_password';";
                //用用户名和密码进行查询
                $stmt = db2_exec($dbc, $query1);
                $stmt2 = db2_exec($dbc, $query2);
				//get array
                $row = db2_fetch_array($stmt);
                $cont = db2_fetch_array($stmt2);
                //echo $row[0]."\n".$row[1]."\n".$row[2]."\n".$cont[0];
                //find the account
                if($cont[0]==1){
                    $_SESSION['PID']=$row[0];
                    $_SESSION['ACCOUNT']=$row[1];
                    $_SESSION['MODE']=$row[2];
                    if($_SESSION['MODE']=="ADMINISTRATOR")
                    	header('Location: '."homepage_admin.php");
                    else if($_SESSION['MODE']=="MEMBER")
                    	header('Location: '."homepage_mem.php");
                    //$home_url = "loged.php";
                	//header('Location: '.$home_url);
                }else{// Error found
                    header('Location: '.$error);
                }
            }else{
                header('Location: '.$error);
            }
        }
    }else{//如果用户已经登录，则直接跳转到已经登录页面
    	if($_SESSION['MODE']=="ADMINISTRATOR")
            header('Location: '."homepage_admin.php");
        else if($_SESSION['MODE']=="VISITOR")
            header('Location: '."homepage_mem.php");
    }
?>