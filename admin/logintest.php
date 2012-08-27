<?php
include_once './../connection.php';
session_start();
$myusername = $_REQUEST['username'];
$mypassword = md5($_REQUEST['password']);
$c_date = strftime("%Y-%m-%d %H:%M:%S");
	
$sql="SELECT * FROM admininfo WHERE username ='" . $myusername . "' and password ='" . $mypassword . "'";

$result=mysql_query($sql);
if(mysql_num_rows($result)==0)
	{
		header('Location: index.php?err=1');
	}
	else
	{
		$row=mysql_fetch_assoc($result);
		$_SESSION['last_login'] = $row['login'];
		$_SESSION['last_logout'] = $row['logout'];
		mysql_query("update admininfo set login = '". $c_date . "', login_status = 1 where username = '" . $myusername . "'");
		$_SESSION['userid'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['rec_per_page']=10;
		header('Location: welcome.php');
	}
?>
