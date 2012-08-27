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

$rec_start=0;
if($_REQUEST['hidrecstart']!="")
{
	$rec_start=$_REQUEST['hidrecstart'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review</title>
<link rel="stylesheet" type="text/css" href="../css/sarita.css" />
<script type="text/javascript" language="javascript" src="../js/admin.js"></script>
<script type="text/javascript" language="javascript" src="../js/Common.js"></script><style type="text/css">
.trigger
{
	cursor:pointer;
}
</style>
</head>

<body onLoad="ajxSearch('review_result.php','rec_start=<?php echo $rec_start; ?>&cat_name=<?php echo $_REQUEST["hidcat_name"]; ?>')">
<input type="hidden" id="hidresult" name="hidresult" value="<?php echo $_SESSION['rec_per_page'] ?>" />

<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:1000px;">
<div style="height:50px;"></div>
<?php
include_once("header.php");
?>
<div id="divTable">
<table align="center" width="86%" cellspacing="0">
<tr> 
       	<td valign="top" style=" padding:5px 20px 20px 20px;" width="100%"> 
		<table width="100%" height="53" border="0" align="left" cellpadding="0" style="border-collapse: collapse;">
<tr>
                    	<td align="center"><h2>Review</h2></td>
                    </tr>
					<tr>
		 			<td width="41%">
						  <div align="right">
                          <input type="button" id="btnAdd" name="btnAdd" onclick="addNews('review_add.php','');" class="trigger" border="0" align="middle" value="Add News" />
				      </div></td>
					</tr>
					</table>
		</td>
				</tr>
<tr>
	<td width="6%">&nbsp;</td>
</tr>
<?php
if($err==1)
{
?>
<tr>
	<td class="msg_text" colspan="5">You Have Successfully added a  product.</td>
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
	<td class="msg_text" colspan="5" style="color:#0000CC;">You Have Successfully edited a  product.</td>
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
	<td class="errmsg_text" colspan="5">You Have Successfully deleted a  product.</td>
</tr>
<tr>
	<td width="6%">&nbsp;</td>
</tr>
<?php
}
?>
<tr>
	<td><div id="divResult"></div></td>
</tr>
</table>
</div>
<div id="divAdd"></div>
</div>
</body>
</html>
