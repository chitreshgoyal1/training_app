<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

$mode = "insert";
if($_REQUEST['cid']!='')
{
	$query = "select * from header where id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "edit";
}
?>
<form id="hForm" name="hForm" action="header_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
<table cellspacing="0" width="100%" align="center">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="right" class="tddata">Name of Header Imaget</td>
    <td align="center">:</td>
    <td><input type="text" id="h_name" name="h_name" value="<?php echo $row['name']; ?>" style="width:200px;" /></td>
</tr>

<tr>
	<td align="right" class="tddata">Old Image</td>
    <td align="center">:</td>
    <td><img src="../images/<?php echo $row['imageurl']; ?>" width="204" height="83" /></td>
</tr>

<tr>
	<td align="right" class="tddata">New Image For Headert</td>
    <td align="center">:</td>
    <td><input type="file" id="photourl" name="photourl" style="width:200px;"></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="button" id="btnAdd" name="btnAdd" value="Save" onclick="addhSubmit();" />&nbsp;&nbsp;
    <input type="button" id="btnCancel" name="btnCancel" value="Back" onclick="divswitch('featuredproducts.php',1);" />
    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>
</form>