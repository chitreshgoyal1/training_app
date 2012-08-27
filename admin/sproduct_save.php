<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

$filename = $_REQUEST['sp_name']."_".$_FILES['photourl']['name'];
move_uploaded_file($_FILES['photourl']['tmp_name'],"../images/".$filename);

if($_REQUEST['mode']=="edit")
{
	$result = mysql_query("select * from sproduct where id = '".$_REQUEST['hidid']."'");
	while($row=mysql_fetch_assoc($result))
	{

	$imgname = "../images/".$row['imgurl'];
	unlink($imgname);
	}
	
	$query = "update sproduct set name = '" . $_REQUEST['sp_name'] . "', p_code = '" . $_REQUEST['sp_code'] ."', price = '" . $_REQUEST['sp_price']. "', imgurl = '" . $filename . "', co_name = '" . $_REQUEST['sp_com'] . "', description = '" . $_REQUEST['sp_desc'] . "', category = '" . $_REQUEST['cat'] . "', type = '" . $_REQUEST['sp_type'] . "' where id = '" . $_REQUEST['hidid'] . "'";
	mysql_query($query) or die("Could Not Execute".MYSQL_ERROR().$query);
	$_SESSION['last_error_id'] = 2;
}

header("Location: sproduct.php");

?>
