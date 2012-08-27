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
	$query = "select * from sproduct where id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "edit";
}
?>
<form id="spForm" name="spForm" action="sproduct_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
<table cellspacing="0" width="100%" align="center">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="right" class="tddata">Name of Special Product</td>
    <td align="center">:</td>
    <td><input type="text" id="sp_name" name="sp_name" value="<?php echo $row['name']; ?>" style="width:200px;" /></td>
</tr>
<tr>
	<td align="right" class="tddata">Type of special Product</td>
    <td align="center">:</td>
    <td><input type="text" id="sp_type" name="sp_type" value="<?php echo $row['type']; ?>" style="width:200px;" /></td>
</tr>

<tr>
	<td align="right" class="tddata">Code of Special Product</td>
    <td align="center">:</td>
    <td><input type="text" id="sp_code" name="sp_code" value="<?php echo $row['p_code']; ?>" style="width:200px;" onKeyPress="return blockNonNumbers(this,event,true,false);"/>(In Rupess.)</td>
</tr>

<tr>
	<td align="right" class="tddata">Price</td>
    <td align="center">:</td>
    <td><input type="text" id="sp_price" name="sp_price" value="<?php echo $row['price']; ?>" style="width:200px;" onKeyPress="return blockNonNumbers(this,event,true,false);"/>(In Rupess.)</td>
</tr>

<tr>
	<td align="right" class="tddata">Category of special Product</td>
    <td align="center">:</td>
    <td><select id="cat" name="cat" style="width:204px;">
    <option value="0">Select</option>
    <?php
	$rs = mysql_query("select * from category order by name");
	while($rw = mysql_fetch_assoc($rs))
	{
	?>
		<option value="<?php echo $rw['id'];?>"
        <?php
		if($row['category']==$rw['id'])
		{
			echo "selected";
		}
		?>
        ><?php echo $rw['name'];?></option>
    <?php
	}
	?>
    </select></td>
</tr>
<tr>
	<td align="right" class="tddata">Company of special Product</td>
    <td align="center">:</td>
    <td><input type="text" id="sp_com" name="sp_com" value="<?php echo $row['co_name']; ?>" style="width:200px;" /></td>
</tr>
<tr>
	<td align="right" class="tddata">Description of special Product</td>
    <td align="center">:</td>
    <td><textarea id="sp_desc" name="sp_desc" style="width:200px;height:50px;"><?php echo $row['description'];?></textarea></td>
</tr>

    <?php
	if($_REQUEST['cid']!='')
	{
	?>
<tr>
	<td align="right" class="tddata">Old Image</td>
    <td align="center">:</td>
    <td><img src="../images/<?php echo $row['imgurl']; ?>" width="204" height="83" /></td>
</tr>
<?php
}
?>
<tr>
	<td align="right" class="tddata">New Image of Speical Product</td>
    <td align="center">:</td>
    <td><input type="file" id="photourl" name="photourl" style="width:200px;"></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="button" id="btnAdd" name="btnAdd" value="Save" onClick="addspSubmit();" />&nbsp;&nbsp;
    <input type="button" id="btnCancel" name="btnCancel" value="Back" onClick="divswitch('sproduct.php',1);" />
    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>
</form>