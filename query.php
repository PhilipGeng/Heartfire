
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
                <div id="account">
                    <?php
					echo "<p>Your account: ".$ACCOUNT."  Mode: ".$MODE."<a href='logout.php'> Log Out</a></p>";
				 	?>
                </div>
                <div id="page">
                    <div id="content">
                        <div class="title"><a>Data Query</a></div>
                        <div class="detail">
                            Search the data<br>
                            <form name="input" action="query_result.php" method="get">
                                <select name="category" >
                                    <option value="MEMBER">Member</option>
                                    <option value="COMMITTEE">Committee member</option>
                                    <option value="COOPERATIVE">Cooperative</option>
                                    <option value="ACTIVITY">Activity</option>
                                    <option value="FUNDING">Funding</option>
                                    
                                </select>
                                <br><br>
                                Keyword:<br>
                                <input type="text" name="keyword" /><br>
                                    <input type="submit" name="action" value="search" /></a>
                            </form>   
			     </div>           
                    </div>
                    
                    <!-- end #content -->
                    <div id="sidebar" style="margin:bottom:200px">
                        <ul>
                            <li>
                            <?php
                            	if($MODE=="ADMINISTRATOR")
                                	echo "<a href='homepage_admin.php'><h2>Homepage</h2></a>";
                                else if($MODE=="MEMBER")
                                	echo "<a href='homepage_mem.php'><h2>Home Page</h2></a>";
                             ?>
                            </li>
                            <li>
                            <?php
                            	if($MODE=="ADMINISTRATOR"){
                                	echo "<a href='query.php'><h2>Query</h2></a>";
									echo "<a href='maintain.php'><p>Data Maintenance </p></a>";
								}
                                else if($MODE=="MEMBER")
                                	echo "<a href='query.php'><h2>Query</h2></a>";
                             ?>
                            </li>
                            <li>
                            <?php
                                if($MODE=="ADMINISTRATOR"){
                                	echo "<a href='calendar_admin.php'><h2>Activity Calendar</h2></a>";
									echo "<a href='calendar_edit.php'><p>Edit Activities</p></a>";
								}
                                else if($MODE=="MEMBER")
                                	echo "<a href='calendar.php'><h2>Activity Calendar</h2></a>";
                             ?>
                            </li>
                            <li>
                            <?php
                                if($MODE=="ADMINISTRATOR")
                                	echo "<a href='activity.php'><h2>Activity Record</h2></a>";
                                else if($MODE=="MEMBER")
                                	echo "<a href='activity.php'><h2>Activity Record</h2></a>";
                             ?>
                            </li>
                            <li>
                            <?php
                            	if($MODE=="ADMINISTRATOR")
                            		echo "<a href='team_building.php'><h2>Team Building Toolkit</h2></a>";
                             ?>
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
