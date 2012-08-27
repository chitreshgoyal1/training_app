<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel</title>

<link rel="stylesheet" href="../css/sarita.css" type="text/css" />
</head>

<body>

<div style="margin:150px 250px 150px 250px;">
	<div style="text-align:center;">
    <form action="logintest.php" name="loginform" id="loginform" method="post">
    <table cellspacing="0" align="center" width="100%">
    <tr>
    	<td width="41%">&nbsp;</td>
    </tr>
    <tr style="background-color:#996600;height:30px;">
    	<td align="center" style="font-size:18px;color:#FFFFFF;font-weight:bold;" colspan="3">Admin Control Panel</td>
    </tr>
    <?php
	error_reporting(0);
	if($_REQUEST['err']==1)
	{
	?>
      <tr>
    	<td height="22">&nbsp;</td>
    </tr>
      <tr>
    	<td height="22" colspan="3"><img src="../images/remove.png" /><span class="errmsg_text">Invalid Username/Password.</span></td>
    </tr>
      <tr>
    	<td height="22">&nbsp;</td>
    </tr>
   <?php
	}
	?>
     <tr>
    	<td height="22">&nbsp;</td>
    </tr>
    <tr>
    	<td align="right">User Name</td>
        <td width="4%">:</td>
        <td width="55%" align="left"><input type="text" id="username" name="username" style="width:200px;" /></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
    </tr>
    <tr>
    	<td align="right">Password</td>
        <td>:</td>
        <td align="left"><input type="password" id="password" name="password" style="width:200px;" /></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
    </tr>
    <tr>
    	<td align="center" colspan="3"><input type="submit" id="submit" name="submit" value="Login" /></td>
    </tr>
       
    <tr>
    	<td>&nbsp;</td>
    </tr>
    </table>
    </form>
    </div>
    
</div>

</body>
</html>
