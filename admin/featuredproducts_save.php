<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

if($_REQUEST['mode']=="insert")
{
	if($_REQUEST['imgurl'] != NULL){
	$filename = $_REQUEST['fp_name']."_".$_FILES['photourl']['name'];
	}
move_uploaded_file($_FILES['photourl']['tmp_name'],"../images/featureproduct/".$filename);


	$query = "insert into fproduct set heading = '" . $_REQUEST['fp_name'] ."', imgurl = '" . $filename ."', description = '" . $_REQUEST['fp_desc'] ."'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 1;
}


if($_REQUEST['mode']=="edit")
{

		$result = mysql_query("select * from fproduct where id = '".$_REQUEST['hidid']."'");
		while($row=mysql_fetch_assoc($result))
		{
		$image = "../images/featureproduct/".$row['imgurl'];
		unlink($image);
		}


$filename = $_FILES['photourl']['name'];
move_uploaded_file($_FILES['photourl']['tmp_name'],"../images/featureproduct/".$filename);


	$query = "update fproduct set heading = '" . $_REQUEST['fp_name']. "', imgurl = '" . $filename ."', description = '" . $_REQUEST['fp_desc']. "' where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 2;
}

if($_REQUEST['mode']=="delete")
{
	$id = $_REQUEST['hidid'];

	$query2 = "Select * From fproduct where id = '$id'";
	$result = mysql_query($query2) or die("Could Not Execute".MYSQL_ERROR().$query);
while($row=mysql_fetch_assoc($result))
{
	
	$image = "../images/featureproduct/".$row['imgurl'];
#	echo $_POST['imgurl'];
	unlink($image);

}	


	$query = "DELETE FROM fproduct where id = '$id'" ;
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);

	
	$_SESSION['last_error_id'] = 3;
}


header("Location: featuredproducts.php");

?>
