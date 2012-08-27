<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

$filename = $_REQUEST['np_name']."_".$_FILES['photourl']['name'];
move_uploaded_file($_FILES['photourl']['tmp_name'],"../images/newproducts/".$filename);

if($_REQUEST['mode']=="insert")
{
	$query = "insert into nproduct (name,p_code,imgurl,category,co_name,description,type,price) values ('" . $_REQUEST['np_name'] . "','" . $_REQUEST['np_price'] . "', '" . $filename . "','" . $_REQUEST['cat'] . "','" . $_REQUEST['np_com'] . "','" . $_REQUEST['np_desc'] . "','" . $_REQUEST['np_type'] ."','".$_REQUEST['price']."')";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 1;
}
if($_REQUEST['mode']=="edit")
{
	$rs = mysql_query("select * from nproduct where id = '" . $_REQUEST['hidid'] . "'");
	while($row = mysql_fetch_array($rs))
	{
	$path="../images/newproducts/". $row['imgurl'];
	unlink($path);
	}
	$query = "update nproduct set name = '" . $_REQUEST['np_name'] . "', p_code = '" . $_REQUEST['np_price'] . "', imgurl = '" . $filename . "', category = '" . $_REQUEST['cat'] . "', co_name = '" . $_REQUEST['np_com'] . "', description = '" . $_REQUEST['np_desc'] . "', type = '" . $_REQUEST['np_type'] ."', price = '" . $_REQUEST['price'] . "'  where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 2;
}

if($_REQUEST['mode']=="delete")
{
	$path="../images/newproducts/".$_REQUEST['imgurl'];
	unlink($path);

	$query = "delete from nproduct where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 3;
}

	header("Location: nproducts.php?hidcat_name=" . $_REQUEST["hidcat_name"] ."&hidrecstart=".$_REQUEST["hidrecstart"]);

?>
