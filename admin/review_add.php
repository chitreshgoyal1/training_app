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
	$query = "select * from reviews where review_id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "edit";
}
?>


<h1 align="center">Add New Review</h1>

<form id="reviewForm" name="reviewForm" action="review_save.php" method="post">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
	<input type="hidden" id="hidcat_name" name="hidcat_name" value="<?php echo $_REQUEST["cat_name"]; ?>"/> 
    <input type="hidden" id="hidrecstart" name="hidrecstart" value="<?php echo $_REQUEST["rec_start"]; ?>"/> 
<table cellspacing="0" width="100%" align="center">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="right" class="tddata">Title</td>
    <td align="center">:</td>
	<td><input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" class = "textbox"/></td>
</tr>

<tr>
	<td align="right" class="tddata">Description</td>
    <td align="center">:</td>
    <td>
    <textarea id="description" name="description" class = "textBoxarea"><?php echo $row['description'];?></textarea></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="button" id="btnAdd" name="btnAdd" value="Save" onClick="addBlog();" />&nbsp;&nbsp;
    <input type="button" id="btnCancel" name="btnCancel" value="Back" onClick="divswitch('review.php',1);" />
    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>
</form>