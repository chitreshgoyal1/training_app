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
<?php
if ($_REQUEST['submit'])
{
	$query = "update clients set menu_link_id ='".$_REQUEST['menu_link_name']."'";
	$result = mysql_query($query);
	
	 $_REQUEST['menu_link_name'] = NULL;
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clients</title>
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
<a href="javascript:void(0);" onclick="addCategory('client_add.php','');" style="color:#333333;" title="Click">Add New Client</a>
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
	<td width="49%" class="msg_text" colspan="2">You Have Successfully added a Client.</td>
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
	<td width="49%" class="msg_text" colspan="2" style="color:#0000CC;">You Have Successfully edited a Client.</td>
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
	<td width="49%" class="errmsg_text" colspan="2">You Have Successfully deleted a Client.</td>
</tr>
<?php
}
?>
<tr>
    <td>
	<form action="clients.php" method="post">
	<?php 
		$query3 = "select name,id from menu_link order by ordering";
		$result3 = mysql_query($query3);
		?>
		<select name="menu_link_name">
		<?php
		while($data3=mysql_fetch_array($result3))
		{
		extract($data3);
		$menu_link_name=$name;
		$menu_link_id = $id;
		?>
		<option value="<?php echo $menu_link_id; ?>" selected="selected"><?php echo $menu_link_name; ?></option>
	<?php } ?>
		</select>
        <input type="submit" value="submit" name="submit" />
		Clients will be shown on this page.
    </form>&nbsp;
    </td>
</tr>
</table>

<table align="center" width="80%" cellspacing="0">
<tr>
	<th align="left">Image </th>
	<th align="left">Page Name</th>
    <th align="left">Client Name</th>
    <th align="center">Action</th>
</tr>
<?php
$result = mysql_query("select * from clients");
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
	<td align="left" ><img src="../images/clients/<?php echo $row['image'];?>" height="80" width="100" /></td>
	<td>
    <?php 
		$query3 = "select name from menu_link where id = '".$row['menu_link_id']."'";
		$result3 = mysql_query($query3);
		while($data3=mysql_fetch_array($result3))
		{
		extract($data3);
		echo $name;
		}
	?>
    </td>
    <td align="left" class="tddata"><?php echo $row['name'];?></td>
    <td align="center" class="tddata"><a href="javascript:void(0);" onClick="addCategory('client_add.php','<?php echo $row['id']; ?>')">
    <img src="../images/edit-icon.png" width="21" height="15" border="0" alt="Edit" title="Edit" /></a> / <a href="clients_save.php?hidid=<?php echo $row['id'];?>&mode=delete&imgurl=<?php echo $row['image']; ?>" onclick="return confirm('Do You want to sure delete?');"><img src="../images/delete-icon.png" width="21" height="17" border="0" alt="Delete" title="Delete" /></a></td>
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
