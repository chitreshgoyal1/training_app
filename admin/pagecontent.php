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
<title>Page Content</title>
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
<a href="javascript:void(0);" onclick="addCategory('pagecontent_add.php','');" style="color:#333333;" title="Click">Add Content For Page</a>
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
	<td colspan="5"class="msg_text">You Have Successfully added Page Content.</td>
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
	<td colspan="5"class="msg_text" style="color:#0000CC;">You Have Successfully added Page Content.</td>
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
	<td colspan="5" class="errmsg_text" >You Have Successfully deleted Page Content.</td>
</tr>
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<th align="center" width="15%">Header</th>
    <th align="center" width="60%">Content</th>
    <th align="center" width="15%">Page Name </th>
    <th align="center" width="10%" >Action</th>
</tr>
<?php
$result = mysql_query("select * from pagecontent order by id");
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
	<td align="left" class="tddata"><?php echo $row['htag'];?></td>
	<td align="left" class="tddata"><div style="overflow:scroll; height:200px; width:450px; widows:200px;"><?php echo $row['content'];?></div></td>
    <?php 	$mlid = $row['menu_link_id'];
			$resultml = mysql_query("select * from menu_link where id = '$mlid'");	
			while($rowml=mysql_fetch_assoc($resultml))
			{
	?>
	<td align="left" class="tddata"><?php echo $rowml['name'];?></td>
	<?php	}
			?>

    <td width="51%" align="center" class="tddata"><a href="javascript:void(0);" onClick="addCategory('pagecontent_add.php','<?php echo $row['id']; ?>')">
    <img src="../images/edit-icon.png" width="21" height="17" border="0" alt="Edit" title="Edit" /></a> / <a href="pagecontent_save.php?hidid=<?php echo $row['id'];?>&mode=delete" onclick="return confirm('Do You want to sure delete?');"><img src="../images/delete-icon.png" width="21" height="17" border="0" alt="Delete" title="Delete" /></a></td>
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
