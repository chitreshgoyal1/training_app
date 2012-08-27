<?php
include_once("../connection.php");
session_start();
$rec_start=0;
$c_date = strftime("%Y-%m-%d %H:%M:%S");


if($_REQUEST['mode']=="insert")
{
$query = "insert into reviews(title,description,date) values ('" . $_REQUEST['title'] . "', '" . $_REQUEST['description'] . "', '" . $c_date . "')";

mysql_query($query) or die("Could Not".MYSQL_ERROR().$query);
$_SESSION['last_error_id']=1;
}

if($_REQUEST['mode']=="edit")
{
	$query = "update reviews set title = '" . $_REQUEST['title'] . "', description =  '" . $_REQUEST['description'] . "' where review_id = " . $_REQUEST['hidid'];
	mysql_query($query) or die("Could Not".MYSQL_ERROR().$query);
	$_SESSION['last_error_id']=2;
}


if($_REQUEST['mode']=="delete")
{
	$query = "delete from reviews where review_id = " . $_REQUEST['hidid'];
	mysql_query($query) or die("Could Not".MYSQL_ERROR().$query);
	$_SESSION['last_error_id']=3;
}


if($_REQUEST['mode']=="comment")
{
	$query = "update reviews_comment set status = 1, description = '" . $_REQUEST['description'] . "' where id = " . $_REQUEST['hidid'];
	mysql_query($query) or die("Could Not".MYSQL_ERROR().$query);
	$_SESSION['last_error_id']=4;
}



header("Location: review.php");

?>