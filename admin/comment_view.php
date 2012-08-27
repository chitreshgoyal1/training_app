<?php
session_start();
include_once("../connection.php");
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}

	$query = "select * from reviews_comment where status = 2 and review_id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$mode = "comment";

?>


<h1 align="center">Approve Comment</h1>

<form id="reviewForm" name="reviewForm" action="review_save.php" method="post">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
	<input type="hidden" id="hidcat_name" name="hidcat_name" value="<?php echo $_REQUEST["cat_name"]; ?>"/> 
    <input type="hidden" id="hidrecstart" name="hidrecstart" value="<?php echo $_REQUEST["rec_start"]; ?>"/> 
<div id="divTable">
<table cellspacing="0" width="47%" align="center">
<?php
$i=1;
while($row = mysql_fetch_assoc($result))
{
?>
<tr>
	<td style="padding:10px;"><?php echo $i;?></td>
	<td><a href="javascript:void(0);" onClick="addNews('comment_add.php','<?php echo $row['id'];?>');">From <?php echo $row['name'];?></a></td>
</tr>
<?php
$i++;
}
?>
</table>
</div>

<div id="divAdd">

</div>
</form>