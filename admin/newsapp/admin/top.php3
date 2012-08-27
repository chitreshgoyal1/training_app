<?php

session_start();
include_once("../../../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News</title>
<link rel="stylesheet" type="text/css" href="../../../css/sarita.css" />
<script type="text/javascript" language="javascript" src="../../../js/admin.js"></script>
<script type="text/javascript" language="javascript" src="../../../js/Common.js"></script>
</head>

<body>
<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:500px;">
<div style="height:50px;"></div>
<?php
include_once("../../header.php");
?>

