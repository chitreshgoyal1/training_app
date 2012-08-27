<?php

session_start();
include_once("../connection.php");

if(!$_SESSION['userid'])
{
	header("Location:index.php");
}
if ( isset( $_SESSION['last_error_id']))
{    
	$err = $_SESSION['last_error_id'];  
    unset( $_SESSION['last_error_id'] );  
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Featured Products</title>
<link rel="stylesheet" type="text/css" href="../css/sarita.css" />
<script type="text/javascript" language="javascript" src="../js/admin.js"></script>
<script type="text/javascript" language="javascript" src="../js/Common.js"></script>
</head>

<body>
<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:auto;">
<div style="height:50px;"></div>
<?php
include_once("header.php");
?>
<div id="divTable">
<table align="center" width="86%" cellspacing="0">
<tr>
	<td width="6%">&nbsp;</td>
</tr>
<?php
if($err==1)
{
?>
<tr>
	<td class="msg_text" colspan="5">Successfully Done!</td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
<?php
}
?>
<?php
if($err==2)
{
?>
<tr>
	<td class="msg_text" colspan="5" style="color:#0000CC;">Successfully Edited!</td>
</tr>
<tr>
	<td width="6%">&nbsp;</td>
</tr>
<?php
}
?>
<?php
if($err==3)
{
?>
<tr>
	<td class="errmsg_text" colspan="5">Successfully Deleted!</td>
</tr>
<tr>
	<td width="6%">&nbsp;</td>
</tr>
<?php
}
?>
	<div align="center"><br/>
	<a href="javascript:void(0);" onClick="addCategory('featuredproducts_add.php?cid=NULL','insert')">Add Content</a>
    </div>

	<div class="latest_posts" style="margin-left: 30px;">
		<ol>
	<?php
$result = mysql_query("select * from fproduct order by heading");
$i=1;
while($row=mysql_fetch_assoc($result))
{
?>
				<li>
					<span class="small-custom-frame">
						<h3 class="widget-title"><?php echo $row['heading'];?></h3>
						<?php if($row['imgurl'] != NULL) { ?>
						<a href="blog-details.html">
						<img class="alignleft" src="../images/featureproduct/<?php echo $row['imgurl'];?>" width="109" height="56" />
						</a>
						<?php } ?>
					</span>
					<p class="teaser-title"><?php echo $row['description'];?></p>
					
						<a href="javascript:void(0);" onClick="addCategory('featuredproducts_add.php','<?php echo $row['id']; ?>')">
						<img src="../images/edit-icon.png" width="21" height="17" border="0" alt="Edit" title="Edit" /></a> 
						/ 
						<a href="featuredproducts_save.php?hidid=<?php echo $row['id'];?>&mode=delete" onclick="return confirm('Do You want to sure delete?');"><img src="../images/delete-icon.png" width="21" height="17" border="0" alt="Delete" title="Delete" /></a>
					<div class="clear"></div>
				</li>
<?php
$i++;
}
?>
		</ol>
	</div>

</table>
</div>
<div id="divAdd"></div>
</div>
</body>
</html>
