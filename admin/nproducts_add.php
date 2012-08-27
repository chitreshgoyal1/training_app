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
	$query = "select * from nproduct where id = " . $_REQUEST['cid'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mode = "edit";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADD New Products</title>
<link rel="stylesheet" type="text/css" href="../css/sarita.css" />
<script type="text/javascript" language="javascript" src="../js/admin.js"></script>
<script type="text/javascript" language="javascript" src="../js/Common.js"></script><style type="text/css">
.trigger
{
	cursor:pointer;
}
</style>
<SCRIPT language=JavaScript>

function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
<?php if($mode == "edit"){ ?>
self.location='nproducts_add.php?cat=' + val + '&cid=' + <?php echo $_REQUEST['cid']; ?> ;
<?php } else { ?>
self.location='nproducts_add.php?cat=' + val ;
<?php } ?>
}

</script>
</head>
<?php

echo "<div style='margin:0px 200px 0px 200px;background-color:#EBEBEB;height:550px;'>";
echo "<div style='height:50px;'></div>";
 include"header.php";
if($mode != "edit")
{
echo "<h1 align='center'>Add New Product</h1>";
}
else{
echo "<h1 align='center'>EDIT PRODUCT </h1>";
}

/*
If register_global is off in your server then after reloading of the page to get the value of cat from query string we have to take special care.
To read more on register_global visit.
  http://www.plus2net.com/php_tutorial/register-globals.php
*/
@$cat=$_REQUEST['cat'];

 // Use this line or below line if register_global is off
/*if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
echo "Data Error";
exit;
}*/


//@$cat=$HTTP_GET_VARS['cat']; // Use this line or above line if register_global is off

///////// Getting the data from Mysql table for first list box//////////
$quer2=mysql_query("SELECT id,name FROM category order by name"); 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat) and strlen($cat) > 0){
$quer=mysql_query("SELECT  subcat_name,subcat_id FROM subcategory where cat_name='$cat' "); 
}else{$quer=mysql_query("SELECT  subcat_name,subcat_id FROM subcategory "); } 
////////// end of query for second subcategory drop down list box ///////////////////////////
?>

<form id="npForm" name="npForm" action="nproducts_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>" />
<input type="hidden" id="hidid" name="hidid" value="<?php echo $_REQUEST['cid'];?>" />
	<input type="hidden" id="hidcat_name" name="hidcat_name" value="<?php echo $_REQUEST["hidcat_name"]; ?>"/> 
    <input type="hidden" id="hidrecstart" name="hidrecstart" value="<?php echo $_REQUEST["rec_start"]; ?>"/> 
<table cellspacing="0" width="100%" align="center">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="right" class="tddata">Select Category</td>
    <td align="center">:</td>
    <td>
    <?php
/// Add your form processing page address to action in above line. Example  action=dd-check.php////
//////////        Starting of first drop downlist /////////
$catval = $_REQUEST["hidcat_name"];

echo "<select name='cat' onchange=\"reload(this.form)\" value='$catval'><option value=''>Select one</option>";
while($noticia2 = mysql_fetch_array($quer2)) { 
if($noticia2['name']==@$cat){echo "<option selected value='$noticia2[name]'>$noticia2[name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[name]'>$noticia2[name]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='np_com'><option value=''>Select one</option>";
while($noticia = mysql_fetch_array($quer)) { 
echo  "<option value='$noticia[subcat_id]'>$noticia[subcat_name]</option>";
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////
//// Add your other form fields as needed here/////

echo "</form>";
?>    </td>
</tr>
<tr>
<tr>
	<td align="right" class="tddata">Name of  Product</td>
    <td align="center">:</td>
    <td><input type="text" id="np_name" name="np_name" value="<?php echo $row['name']; ?>" style="width:200px;" /></td>
</tr>

	<td align="right" class="tddata">Code of Product</td>
    <td align="center">:</td>
    <td><input type="text" id="np_price" name="np_price" value="<?php echo $row['p_code']; ?>" style="width:200px;" /></td>
</tr>
<tr>
	<td align="right" class="tddata">Type of Product</td>
    <td align="center">:</td>
    <td><input type="text" id="np_type" name="np_type" value="<?php echo $row['type']; ?>" style="width:200px;" /></td>
</tr>
<tr>
	<td align="right" class="tddata">Price </td>
    <td align="center">:</td>
    <td><input type="text" id="np_type" name="price" value="<?php echo $row['price']; ?>" style="width:200px;" /></td>
</tr>

<tr>
	<td align="right" class="tddata">Description of Product</td>
    <td align="center">:</td>
    <td><textarea id="np_desc" name="np_desc" style="width:200px;height:50px;"><?php echo $row['description'];?></textarea></td>
</tr>
    <?php
	if($_REQUEST['cid']!='')
	{
	?>
<tr>
	<td align="right" class="tddata">Old Image</td>
    <td align="center">:</td>
    <td><img src="../images/newproducts/<?php echo $row['imgurl']; ?>" width="204" height="83" /></td>
</tr>
<?php
}
?>
<tr>
	<td align="right" class="tddata">New Image of Product</td>
    <td align="center">:</td>
    <td><input type="file" id="photourl" name="photourl" style="width:200px;"></td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="3" align="center"><input type="submit" id="btnAdd" name="btnAdd" value="Save" onclick="addnpSubmit();" />	  &nbsp;&nbsp;
    <!-- <input type="button" id="btnCancel" name="btnCancel" value="Back"  onClick="divswitch('nproducts.php',1);" />-->
    <a href="nproducts.php">Back</a>    </td>
</tr>    
<tr>
	<td>&nbsp;</td>
</tr>
</table>
</form>
</div>