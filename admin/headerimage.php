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
<title>Header Image</title>
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
  <table align="center" width="88%" cellspacing="0">
<tr>
	<td width="32%">&nbsp;</td>
</tr>
<?php
if($err==2)
{
?>
<tr>
	<td class="msg_text" colspan="3" style="color:#0000CC;">You Have Successfully edited a Header Image.</td>
</tr>
<tr>
	<td width="32%">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<th align="left">Image Name</th>
    <th width="45%" align="left">Image</th>
    <th width="23%">Action</th>
</tr>
<?php
$result = mysql_query("select * from header order by name");
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
	<td align="left" class="tddata"><?php echo $row['name'];?></td>
    <td align="left"><img src="../images/<?php echo $row['imageurl'];?>" width="77" height="46" /></td>
    <td width="23%" align="center" class="tddata"><a href="javascript:void(0);" onClick="addCategory('header_add.php','<?php echo $row['id']; ?>')">
    <img src="../images/edit-icon.png" width="21" height="17" border="0" alt="Edit" title="Edit" /></a></td>
</tr>
<tr>
	<td>&nbsp;</td>
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
