<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

if($_REQUEST['mode']=="insert")
{
	$query = "insert into menu_link (name,ordering) values ('" . $_REQUEST['c_name'] ."','". $_REQUEST['ordering_name'] . "')";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	
	/*$query="select id from category where name= '".$_REQUEST['c_name']."'";
	$fetched=mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	while($data=mysql_fetch_array($fetched))
	{
	extract($data);
	$id=$id;
	}

	$query = "insert into subcategory (cat_name,cat_id) values ('" . $_REQUEST['c_name'] . "','$id')";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);*/
	
	$_SESSION['last_error_id'] = 1;
}
if($_REQUEST['mode']=="edit")
{
	$query = "update menu_link set name = '" . $_REQUEST['c_name'] ."',ordering = '". $_REQUEST['ordering_name'] . "' where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	
	$_SESSION['last_error_id'] = 2;
}

if($_REQUEST['mode']=="delete")
{
	$query = "delete from menu_link where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 3;
}

	header("Location: menulink.php");

?>
