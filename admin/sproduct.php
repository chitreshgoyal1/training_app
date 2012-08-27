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
<title>Special Product</title>
<link rel="stylesheet" type="text/css" href="../css/sarita.css" />
<script type="text/javascript" language="javascript" src="../js/admin.js"></script>
<script type="text/javascript" language="javascript" src="../js/Common.js"></script></head>

<body>
<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:500px;">
<div style="height:50px;"></div>
<?php
include_once("header.php");
?>
<div id="divTable">
<table align="center" width="80%" cellspacing="0">
<tr>
	<td width="38%">&nbsp;</td>
</tr>
<?php
if($err==2)
{
?>
<tr>
	<td class="msg_text" colspan="4" style="color:#0000CC;">You Have Successfully edited a Special Product.</td>
</tr>
<tr>
	<td width="38%">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<th>Product Name</th>
    <th width="22%">Price</th>
    <th width="22%">Image</th>
    <th width="18%">Action</th>
</tr>
<?php
$result = mysql_query("select * from sproduct order by name");
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
	<td align="center" class="tddata"><?php echo $row['name'];?></td>
    <td align="center" class="tddata">Rs. <?php echo $row['price'];?> /-</td>
    <td align="center" class="tddata"><img src="../images/<?php echo $row['imgurl'];?>" width="36" height="31" /></td>
    <td align="center" class="tddata"><a href="javascript:void(0);" onClick="addCategory('sproduct_add.php','<?php echo $row['id']; ?>')">
    <img src="../images/edit-icon.png" width="21" height="17" border="0" alt="Edit" title="Edit" /></a></td>
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
