<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

if($_REQUEST['mode']=="insert")
{
	$query = "insert into pagecontent (content,htag,menu_link_id) values ('" . $_REQUEST['c_name'] . "','".$_REQUEST['htag']. "','".$_REQUEST['menu_link_name']."')";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	
	$_SESSION['last_error_id'] = 1;
}
if($_REQUEST['mode']=="edit")
{
	$query = "update pagecontent set content = '" . $_REQUEST['c_name'] . "',htag='".$_REQUEST['htag']."',menu_link_id='".$_REQUEST['menu_link_name']."' where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
		
	$_SESSION['last_error_id'] = 2;
}

if($_REQUEST['mode']=="delete")
{
	$query = "delete from pagecontent where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 3;
}

	header("Location: pagecontent.php");

?>
