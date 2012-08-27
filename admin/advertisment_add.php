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
	$query = "select * from clients where id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "edit";
}
?>


<h1 align="center">Add New Advertisment</h1>

<form id="npForm" name="npForm" action="advertisment_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
    <input type="hidden" id="hidrecstart" name="hidrecstart" value="<?php echo $_REQUEST["rec_start"]; ?>"/> 
<table cellspacing="0" width="100%" align="center">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="right" class="tddata">Name of Advertisment</td>
    <td align="center">:</td>
    <td><input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" style="width:200px;" /></td>
</tr>

<tr>
	<td align="right" class="tddata">Address of Advertisment Company</td>
    <td align="center">:</td>
    <td><textarea id="add" name="add" style="width:200px;height:50px;"><?php echo $row['address'];?></textarea></td>
</tr>
<tr>
	<td align="right" class="tddata">Image of Advertisment</td>
    <td align="center">:</td>
    <td><input type="file" id="photourl" name="photourl" style="width:200px;"></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="submit" id="btnAdd" name="btnAdd" value="Save"/>&nbsp;&nbsp;
    <input type="button" id="btnCancel" name="btnCancel" value="Back" onClick="divswitch('nproducts.php',1);" />
    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>
</form>