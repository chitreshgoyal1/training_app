<?php
include_once '../connection.php';
session_start();

if(!$_SESSION['userid'])
{
	header('Location: index.php');
}


$query = "select * from admininfo WHERE username='" . $_SESSION['username']  . "' AND password='" .md5($_REQUEST['opass'])  . "' ";

$result=mysql_query($query);
//echo $k = mysql_num_rows($result); 
if(mysql_num_rows($result)==0)
{
	$_SESSION['last_error_id'] = 3;
}
else
{
	$q = "update admininfo set password = '". md5($_REQUEST['npass'])."' where username = '" .$_SESSION['username']."'";
	mysql_query($q);
	
	$_SESSION['last_error_id'] = 1;

}
header('Location: changepassword.php');
?>
