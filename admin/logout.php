<?php
include_once './../connection.php';
session_start();
$c_date = strftime("%Y-%m-%d %H:%M:%S");
mysql_query("update admininfo set logout = '". $c_date . "', login_status = 2 where username = '" . $_SESSION['username'] . "'");
session_destroy();
header("Location: index.php?err=10");
?>