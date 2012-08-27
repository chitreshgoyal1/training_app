<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}


$filename = $_REQUEST['c_name']."_".$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"../images/".$filename);

if($_REQUEST['mode']=="insert")
{
	$query = "insert into companies (name,image) values ('" . $_REQUEST['c_name'] . "', '" . $filename . "')";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 1;
}
if($_REQUEST['mode']=="edit")
{
	$query = "update companies set name = '" . $_REQUEST['c_name'] . "', image = '" . $filename . "' where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 2;
}

if($_REQUEST['mode']=="delete")
{
	$query = "delete from companies where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 3;
}

	header("Location: company.php");

?>
