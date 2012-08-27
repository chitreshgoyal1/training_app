<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

	$query = "select * from reviews_comment where id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "comment";
?>

<h1 align="center">Approve Comment</h1>

<form id="commentForm" name="commentForm" action="review_save.php" method="post">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
	<input type="hidden" id="hidcat_name" name="hidcat_name" value="<?php echo $_REQUEST["cat_name"]; ?>"/> 
    <input type="hidden" id="hidrecstart" name="hidrecstart" value="<?php echo $_REQUEST["rec_start"]; ?>"/> 
<table width="70%" align="center">
<tr>
	<td align="right" class="tddata">Name</td>
    <td align="center">:</td>
	<td><?php echo $row['name']; ?></td>
</tr>

<tr>
	<td align="right" class="tddata">Blog Title</td>
    <td align="center">:</td>
    <?php
		$rs = mysql_query("select * from reviews where review_id = ". $row['review_id']);
		$rw = mysql_fetch_assoc($rs);
	?>
	<td><?php echo $rw['title']; ?></td>
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
	<td colspan="3" align="center"><input type="button" id="btnAdd" name="btnAdd" value="Approve" onClick="addComment();" />&nbsp;&nbsp;
    <input type="button" id="btnCancel" name="btnCancel" value="Back" onClick="divswitch('review.php',1);" />
    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>

</form>