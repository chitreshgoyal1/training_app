<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

$filename = $_REQUEST['subcat_name']."_".$_FILES['photourl']['name'];
move_uploaded_file($_FILES['photourl']['tmp_name'],"../images/subcat_img/".$filename);


if($_REQUEST['mode']=="insert")
{
	$query = "insert into subcategory (cat_name,subcat_name,subcat_url,menu_link_id) values ('" . $_REQUEST['cat_name'] . "','" . $_REQUEST['subcat_name'] ."','".$filename."','".$_REQUEST['menu_link_name']."')";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 1;
}
if($_REQUEST['mode']=="edit")
{

			$result = mysql_query("select * from subcategory where subcat_id ='".$_REQUEST['hidid']."'");
			while($row=mysql_fetch_array($result))
			{
				$imgname = "../images/subcat_img/".$row['subcat_url'];
				unlink($imgname);
			
			}	

	$query = "update subcategory set subcat_name = '" . $_REQUEST['subcat_name'] ."',subcat_url='".$filename."',menu_link_id='".$_REQUEST['menu_link_name']."',cat_name='".$_REQUEST['cat_name']. "' where subcat_id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 2;
}

if($_REQUEST['mode']=="delete")
{
	$imgname = "../images/subcat_img/".$_REQUEST['imgname'];
	unlink($imgname);
	$query = "delete from subcategory where subcat_id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 3;
}

	header("Location: subcategory.php");

?>
