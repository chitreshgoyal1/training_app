<?php
include_once './../connection.php';
session_start();

if(!$_SESSION['username'])
{
	header('Location: index.php');
}

$query = "update contacts set status = 2 where id = " .$_REQUEST['id'];
mysql_query($query);
header("Location: query.php?hidrecstart=".$_REQUEST['hidrecstart']);
?>