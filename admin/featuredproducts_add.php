<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

$mode = "insert";
if($_REQUEST['cid']!='insert')
{
	$query = "select * from fproduct where id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "edit";
}
?>

<form id="fpForm" name="fpForm" action="featuredproducts_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<?php
if($_REQUEST['cid']!='insert')
{
?>
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
<?php

}
?>
<table cellspacing="0" width="100%" align="center">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="right" class="tddata">Heading</td>
    <td align="center">:</td>
    <td><input type="text" id="fp_name" name="fp_name" value="<?php echo $row['heading']; ?>" style="width:200px;" /></td>
</tr>
<tr>
	<td align="right" class="tddata">Description </td>
    <td align="center">:</td>
    <td><textarea id="fp_desc" name="fp_desc" style="width:200px;height:50px;"><?php echo $row['description'];?></textarea></td>
</tr>
    <?php
	if($_REQUEST['cid']!= 'insert')
	{
	?>
<tr>
	<td align="right" class="tddata">Old Image</td>
    <td align="center">:</td>
    <td><img src="../images/featureproduct/<?php echo $row['imgurl'];?>" width="204" height="83" /><br>
	<input type="file" id="photourl" name="photourl" value="<?php echo $row['imgurl'];?>" style="width:200px;"></td>
</tr>
	<?php
	}
	else{
	?>
		<tr>
			<td align="right" class="tddata">Image</td>
			<td align="center">:</td>
			<td><input type="file" id="photourl" name="photourl" style="width:200px;"></td>
		</tr>
	<?php }  ?>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="button" id="btnAdd" name="btnAdd" value="Save" onclick="addfpSubmit();" />&nbsp;&nbsp;
    <input type="button" id="btnCancel" name="btnCancel" value="Back" onclick="divswitch('featuredproducts.php',1);" />
    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>
</form>