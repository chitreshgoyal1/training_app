<?php

session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}
if ( isset( $_SESSION['last_error_id']))
{    
	$err = $_SESSION['last_error_id'];  
    unset( $_SESSION['last_error_id'] );  
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="../css/sarita.css" />
<script type="text/javascript" language="javascript" src="../js/admin.js"></script>
<script type="text/javascript" language="javascript" src="../js/Common.js"></script></head>

<body>
<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:500px;">
<div style="height:50px;"></div>
<?php
include_once("header.php");
?>
<div style="padding-top:20px;text-align:center;padding-right:30px;font-weight:bold;">Change Your Password
</div>
<div id="divTable">
<table align="center" width="78%" cellspacing="0">
<tr>
	<td width="49%">&nbsp;</td>
</tr>
<?php
if($err==1)
{
?>
<tr>
	<td width="49%" class="msg_text" colspan="2">You Have Successfully Changed Password.</td>
</tr>
<tr>
	<td width="49%">&nbsp;</td>
</tr>
<?php
}
?>
<?php
if($err==3)
{
?>
<tr>
	<td width="49%" class="errmsg_text" colspan="2">Your Old Password is Wrong.</td>
</tr>
<tr>
	<td width="49%">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<td>
    <form id="passForm" name="passForm" action="changepassword_save.php" method="post">
<table width="100%" align="center" cellspacing="0">
<tr>
	<td align="right" class="tddata">Old Password</td>
    <td class="tddata">:</td>
    <td><input type="password" name="opass" id="opass" class="inputBox" /></td>
</tr>
<tr>
	<td align="right" class="tddata">New Password</td>
    <td class="tddata">:</td>
    <td><input type="password" name="npass" id="npass" class="inputBox" /></td>
</tr>
<tr>
	<td align="right" class="tddata">Confirm Password</td>
    <td class="tddata">:</td>
    <td><input type="password" name="cpass" id="cpass" class="inputBox" /></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center">
    <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" onclick="submitPass();" />
    <input type="reset" name="reset" id="reset" value="Reset" />
    </td>
</tr>
</table>
	</form>

	</td>
</tr>
    	
</table>
</div>
<div id="divAdd"></div>
</div>
</body>
</html>
