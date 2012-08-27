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
	$query = "select * from headercontent where id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "edit";
}
?>

<form id="catForm" name="catForm" action="headercontent_save.php" method="post">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
<table cellspacing="0" width="100%" align="center">
<tr>
	<td align="right">Header tag :</td>
    <td align="center">:</td>
    <td>
<?php 
include_once("fckeditor/fckeditor.php") ;
			$oFCKeditor = new FCKeditor('htag') ;
			$oFCKeditor->BasePath = 'fckeditor/';
			$oFCKeditor->Value = $row['htag'];
			$oFCKeditor->Width = 800;
			$oFCKeditor->Height = 200;
			$oFCKeditor->Create() ;
?>   
</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="right">Content :</td>
    <td align="center">:</td>
    <td>

<?php 

include_once("fckeditor/fckeditor.php") ;
			$oFCKeditor = new FCKeditor('c_name') ;
			$oFCKeditor->BasePath = 'fckeditor/';
			$oFCKeditor->Value = $row['content'];
			$oFCKeditor->Width = 800;
			$oFCKeditor->Height = 400;
			$oFCKeditor->Create() ;
?>   
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="button" id="btnAdd" name="btnAdd" value="Save" onclick="addCatSubmit();" />&nbsp;&nbsp;
    <input type="button" id="btnCancel" name="btnCancel" value="Back" onclick="divswitch('headercontent_add.php',1);" />
    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>
</form>
