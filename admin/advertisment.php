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
<title>Advertisment</title>
<link rel="stylesheet" type="text/css" href="../css/sarita.css" />
<script type="text/javascript" language="javascript" src="../js/admin.js"></script>
<script type="text/javascript" language="javascript" src="../js/Common.js"></script>
</head>

<body>
<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:500px;">
<div style="height:50px;"></div>
<?php
include_once("header.php");
?>
<div style="padding-top:20px;text-align:right;padding-right:30px;font-weight:bold;">
<a href="javascript:void(0);" onclick="addCategory('advertisment_add.php','');" style="color:#333333;" title="Click">Add New Advertisment</a>
</div>
<div id="divTable">
<table align="center" width="80%" cellspacing="0">
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<?php
if($err==1)
{
?>
<tr>
	<td class="msg_text" colspan="4">You Have Successfully added a Advertisment.</td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<?php
}
?>
<?php
if($err==2)
{
?>
<tr>
	<td  class="msg_text" colspan="4" style="color:#0000CC;">You Have Successfully edited a Advertisment.</td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<?php
}
?>
<?php
if($err==3)
{
?>
<tr>
	<td class="errmsg_text" colspan="4">You Have Successfully deleted a Advertisment.</td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<th align="center">Advertisment Name</th>
    <th align="center">Address </th>
    <th align="center">Image </th>
    <th align="center">Action</th>
</tr>
<?php
$result = mysql_query("select * from advertisment");
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
	<td align="center"><?php echo $row['name'];?></td>
	<td align="center"><?php echo $row['address'];?></td>
    <td align="center" ><img src="../images/advertisment/<?php echo $row['image'];?>" height="70" width="80" /></td>
    <td align="center" class="tddata">
    	<a href="javascript:void(0);" onClick="addCategory('advertisment_add.php','<?php echo $row['id']; ?>')">
    	<img src="../images/edit-icon.png" width="21" height="17" border="0" alt="Edit" title="Edit" /></a> / 
        <a href="advertisment_save.php?hidid=<?php echo $row['id'];?>&mode=delete&imgurl=<?php echo $row['image']; ?>" onclick="return confirm('Do You want to sure delete?');">
        <img src="../images/delete-icon.png" width="21" height="17" border="0" alt="Delete" title="Delete" /></a></td>
</tr>
<?php
}
?>
</table>
</div>
<div id="divAdd"></div>
</div>
</body>
</html>
