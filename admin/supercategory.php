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
<title>SuperCategory</title>
<link rel="stylesheet" type="text/css" href="../css/sarita.css" />
<script type="text/javascript" language="javascript" src="../js/admin.js"></script>
<script type="text/javascript" language="javascript" src="../js/Common.js"></script>
</head>

<body>
<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:auto;">
<div style="height:50px;"></div>
<?php
include_once("header.php");
?>

<div style="padding-top:20px;text-align:right;padding-right:30px;font-weight:bold;">
<a href="javascript:void(0);" onclick="addCategory('supercategory_add.php','');" style="color:#333333;" title="Click">Add Side Panel Title</a>
</div>
<div id="divTable">
<table align="center" width="80%" cellspacing="0">
<tr>
	<td width="49%">&nbsp;</td>
</tr>
<?php
if($err==1)
{
?>
<tr>
	<td width="49%" class="msg_text" colspan="2">You Have Successfully added a sidebar header Category.</td>
</tr>
<tr>
	<td width="49%">&nbsp;</td>
</tr>
<?php
}
?>
<?php
if($err==2)
{
?>
<tr>
	<td width="49%" class="msg_text" colspan="2" style="color:#0000CC;">You Have Successfully edited a Sidebar header Category.</td>
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
	<td width="49%" class="errmsg_text" colspan="2">You Have Successfully deleted a sidebar header Category.</td>
</tr>
<tr>
	<td width="49%">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<th align="left">Side Panel Title</th>
    <th width="51%">Action</th>
</tr>
<?php
$result = mysql_query("select * from supercategory order by name");
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
	<td align="left" class="tddata"><?php echo $row['name'];?></td>
    <td width="51%" align="center" class="tddata"><a href="javascript:void(0);" onClick="addCategory('supercategory_add.php','<?php echo $row['id']; ?>')">
    <img src="../images/edit-icon.png" width="21" height="17" border="0" alt="Edit" title="Edit" /></a> / <a href="supercategory_save.php?hidid=<?php echo $row['id'];?>&cat_name=<?php echo $row['name'];?>&mode=delete" onclick="return confirm('Do You want to sure delete?');"><img src="../images/delete-icon.png" width="21" height="17" border="0" alt="Delete" title="Delete" /></a></td>
</tr>
<?php
}
?>
</table>
<br /><br />
</div>
<div id="divAdd"></div>
</div>
</body>
</html>
