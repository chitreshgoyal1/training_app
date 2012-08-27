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
<title>Category</title>
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
<a href="javascript:void(0);" onclick="addCategory('category_add.php','');" style="color:#333333;" title="Click">Add New Category</a>
</div>
<div id="divTable">
<table align="center" width="80%" cellspacing="0">
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
<?php
if($err==1)
{
?>
<tr>
	<td colspan="5"class="msg_text">You Have Successfully added a Category.</td>
</tr>
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
<?php
}
?>
<?php
if($err==2)
{
?>
<tr>
	<td colspan="5"class="msg_text" style="color:#0000CC;">You Have Successfully edited a Category.</td>
</tr>
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
<?php
}
?>
<?php
if($err==3)
{
?>
<tr>
	<td colspan="5" class="errmsg_text" >You Have Successfully deleted a Category.</td>
</tr>
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<th align="left" width="20%">Category Name</th>
    <th align="left" width="25%">Title</th>
    <th align="left" width="25%">Page Name</th>
    <th align="center" width="30%" >Action</th>
</tr>
<?php
$result = mysql_query("select * from category order by supercategory_id");
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
	<td align="left" class="tddata"><?php echo $row['name'];?></td>
    <?php 	$sid = $row['supercategory_id'];
			$results = mysql_query("select * from supercategory where id = '$sid'");	
			while($row2=mysql_fetch_assoc($results))
			{
	?>
	<td align="left" class="tddata"><?php echo $row2['name'];?></td>
	<?php	}
			?>
    <?php 	$mlid = $row['menu_link_id'];
			$resultml = mysql_query("select * from menu_link where id = '$mlid'");	
			while($rowml=mysql_fetch_assoc($resultml))
			{
	?>
	<td align="left" class="tddata"><?php echo $rowml['name'];?></td>
	<?php	}
			?>

    <td width="51%" align="center" class="tddata"><a href="javascript:void(0);" onClick="addCategory('category_add.php','<?php echo $row['id']; ?>')">
    <img src="../images/edit-icon.png" width="21" height="17" border="0" alt="Edit" title="Edit" /></a> / <a href="category_save.php?hidid=<?php echo $row['id'];?>&cat_name=<?php echo $row['name'];?>&mode=delete" onclick="return confirm('Do You want to sure delete?');"><img src="../images/delete-icon.png" width="21" height="17" border="0" alt="Delete" title="Delete" /></a></td>
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
