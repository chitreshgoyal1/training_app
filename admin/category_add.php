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
	$query = "select * from category where id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "edit";
}
?>
<form id="catForm" name="catForm" action="category_save.php" method="post">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
<table cellspacing="0" width="100%" align="center">
<tr>
	<td align="right">Select Menu Link</td>
    <td align="center">:</td>
    <td><?php 
	
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
	if($menu_link_id == $row['menu_link_id'])
	{?>
    <option value="<?php echo $menu_link_id; ?>" selected="selected"><?php echo $menu_link_name; ?></option>
    <?php 
	}
	else
	{ ?>
	<option value="<?php echo $menu_link_id; ?>"><?php echo $menu_link_name; ?></option>
	<?php } ?>
	<?php } ?>
	</select>
	Category will redirect on this page.
	</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td align="right">Select Super Category</td>
    <td align="center">:</td>
    <td><?php 
	
	$querysc = "select name,id from supercategory order by name";
	$resultsc = mysql_query($querysc);
	?>
	<select name="supcat_name">
	<?php
	while($datasc=mysql_fetch_array($resultsc))
	{
	extract($datasc);
	$cat_name=$name;
	if($id == $row['supercategory_id'])
	{?>
	<option value="<?php echo $id; ?>" selected="selected"><?php echo $cat_name; ?></option>
    <?php
	}
	else 
	{?>
    <option value="<?php echo $id; ?>"><?php echo $cat_name; ?></option>
    
	<?php 
	} ?>	
	<?php } ?>
	</select>
	
	</td>
</tr>

<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="right">Name of Category</td>
    <td align="center">:</td>
    <td><input type="text" id="c_name" name="c_name" value="<?php echo $row['name']; ?>" style="width:200px;" /></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="button" id="btnAdd" name="btnAdd" value="Save" onclick="addCatSubmit();" />&nbsp;&nbsp;
    <input type="button" id="btnCancel" name="btnCancel" value="Back" onclick="divswitch('category.php',1);" />
    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>
</form>