<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

if($_REQUEST['mode']=="insert")
{
	$query = "insert into headercontent (content,htag) values ('" . $_REQUEST['c_name'] . "','".$_REQUEST['htag']."')";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	
	$_SESSION['last_error_id'] = 1;
}
if($_REQUEST['mode']=="edit")
{
	$query = "update headercontent set content = '" . $_REQUEST['c_name'] . "',htag='".$_REQUEST['htag']."' where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
		
	$_SESSION['last_error_id'] = 2;
}

if($_REQUEST['mode']=="delete")
{
	$query = "delete from headercontent where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 3;
}

	header("Location: headercontent.php");

?>
