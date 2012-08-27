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
<title>subcategory</title>
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
<a href="javascript:void(0);" onclick="addCategory('subcategory_add.php','');" style="color:#333333;" title="Click">Add New SubCategory</a>
</div>
<div id="divTable">
<table align="center" border="0" width="80%" cellspacing="0">

<?php
if($err==1)
{
?>
<tr>
	<td colspan="4" class="msg_text" colspan="2">You Have Successfully added a SubCategory.</td>
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
	<td colspan="4" class="msg_text" colspan="2" style="color:#0000CC;">You Have Successfully edited a SubCategory.</td>
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
	<td colspan="4" class="errmsg_text" colspan="2">You Have Successfully deleted a SubCategory.</td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<th align="left" width="25%" >Sub Category Name</th>
	<th align="left" width="25%">Category Name</th>
    <th align="left" width="15%">Page Name </th>
	<th align="left" width="15%">Subcategory Image </th>    
    <th width="35%">Action</th>
</tr>
<?php
$result = mysql_query("select * from subcategory order by cat_name");
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
	<td align="left" class="tddata"><?php echo $row['subcat_name'];?></td>
	<td align="left" class="tddata"><?php echo $row['cat_name'];?></td>
	<?php
	$page = $row['menu_link_id'];
    $result3 = mysql_query("select * from menu_link where id ='$page'");
    while($row3=mysql_fetch_assoc($result3))
    {
    ?>
    <td align="left" class="tddata"><?php echo $row3['name'];?></td>
	<?php
    }
    ?>
    <td align="center"><img src="../images/subcat_img/<?php echo $row['subcat_url']; ?>" width="80" height="70" border="0" /></td>
    <td width="51%" align="center" class="tddata">
	
	<a href="javascript:void(0);" onClick="addCategory('subcategory_add.php','<?php echo $row['subcat_id']; ?>')">
    <img src="../images/edit-icon.png" width="21" height="17" border="0" alt="Edit" title="Edit" /></a> / 
	
	<a href="subcategory_save.php?hidid=<?php echo $row['subcat_id'];?>&mode=delete&imgname=<?php echo $row['subcat_url']; ?>" onclick="return confirm('Do You want to sure delete?');"><img src="../images/delete-icon.png" width="21" height="17" border="0" alt="Delete" title="Delete" /></a></td>
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
