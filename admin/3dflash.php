<?php

session_start();
if(!$_SESSION['userid'])
{
	header("Location:index.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin/Slider</title>
</head>

<body>
<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:660px;">
<div style="height:50px;"></div>
<?php
include_once("header.php");
?>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
				<tr class="alternate-row">
					<td align="center" rowspan="4">
					<div ><h2 align="center"><strong>Slider Images</strong></h2>Image Size (770 x 415) jpg </div>
<?php
	if( isset($_SESSION['arr']) && is_array($_SESSION['arr']) && count($_SESSION['arr']) >0 )
	 {
		foreach($_SESSION['arr'] as $v) 
		{
			echo "<font color='#990000'>".$v."</font>";
			
		}
		unset($_SESSION['arr']);
	}
	echo "<br>"; 
?>	
                     
					<form id="mainform" action="add_3dflash.php?check=1" onsubmit="return validator(this)" method="post" name="header" enctype="multipart/form-data">
					
					<div style="position:relative;float:left;">
						Image:<br/> <input type="file" name="image1" id="image1" size="18px;" /><br/><br/>
						Heading:<br/> <input type="text" name="heading" id="heading" value="" /><br/><br/>
						Tag Line:<br/> <input type="text" name="tag_line" id="tag_line" value="" /><br/><br/>
						Description:<br/> <textarea rows="8" cols="15" name="description" id="description" value="" ></textarea><br/><br/>
						<input class="submit-login"  type="submit" name="submit"	value="submit" />
					</form>
					</div>
					<div style="overflow:scroll; position:relative; height:400px; width:600px;"> 
					<?php 
							include "../connection.php";
							$query="select * From 3dflash order by id DESC";
							$result=mysql_query($query) or die("error in query");
							$num1 = mysql_num_rows($result);
							
							if($num1!=NULL)
							{
							$i=0;
							while ($i < $num1)
							{
									$header=mysql_result($result,$i,"image");
									$id=mysql_result($result,$i,"id");
									
									echo "<img src='../images/sliders/$header' height='250' width='550' /><br/>";
									echo "<strong>Heading: </strong>".mysql_result($result,$i,"heading")."<br/>";
									echo "<strong>Tag Line: </strong>".mysql_result($result,$i,"tag_line")."<br/>";
									echo "<strong>Description: </strong>".mysql_result($result,$i,"description")."<br/>";
									echo "<a href='add_3dflash.php?delheader=$id&imgname=$header'>"."<img title='DELETE' src='../images/delete-icon.png' height='38' width='38' border='0'/>"."</a><hr/><Br/>";
							$i++;
							}
							}
					?>
				</div>
				</td>
                </tr></table>
</div>
</body>
</html>                