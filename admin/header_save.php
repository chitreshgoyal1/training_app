<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

$filename = $_REQUEST['h_name']."_".$_FILES['photourl']['name'];
move_uploaded_file($_FILES['photourl']['tmp_name'],"../images/".$filename);


	/*$rs = mysql_query("select * from header where id = '" . $_REQUEST['hidid'] . "'");
	$row = mysql_fetch_assoc($rs);
	$path="../images/". $row['imgurl'];
	if(unlink($path))
	{
	}*/
	$query = "update header set name = '" . $_REQUEST['h_name'] . "', imageurl = '" . $filename . "' where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 2;

	header("Location: headerimage.php");
?>