<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

$filename = $_REQUEST['name']."_".$_FILES['photourl']['name'];
move_uploaded_file($_FILES['photourl']['tmp_name'],"../images/advertisment/".$filename);

if($_REQUEST['mode']=="insert")
{
	$query = "insert into advertisment (name,address,image) values ('" . $_REQUEST['name'] . "','" . $_REQUEST['add'] . "', '" . $filename ."')";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 1;
}
if($_REQUEST['mode']=="edit")
{
		$result = mysql_query("select * from advertisment where id='".$_REQUEST['hidid']."'");
		while($row=mysql_fetch_assoc($result))
		{
		$image = "../images/advertisment/".$row['image'];
		unlink($image);
		}
	$query = "update advertisment set name = '" . $_REQUEST['name'] . "', address = '" . $_REQUEST['add'] . "', image = '" . $filename ."'  where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 2;
}

if($_REQUEST['mode']=="delete")
{
		$image = "../images/advertisment/".$_REQUEST['imgurl'];
		unlink($image);

	$query = "delete from advertisment where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 3;
}

	header("Location: advertisment.php");

?>
