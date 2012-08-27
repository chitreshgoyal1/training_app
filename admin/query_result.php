<?php
include_once './../connection.php';
session_start();

$rec_start = 0;

$rec_start = $_REQUEST["rec_start"];
$t_rec_per_page = $_SESSION['rec_per_page'];

$query = "select count(*) as rcnt from contacts where status = 1";

$rec_count=mysql_query($query);
$row_count=mysql_fetch_assoc($rec_count);

$lstrec = $row_count['rcnt'] % $t_rec_per_page;

if ($lstrec == 0)
{
	$lstrec = $row_count['rcnt'] - 1;
}
else
{
	$lstrec = $row_count['rcnt'];
}
if($rec_start >= $row_count['rcnt'])
{
	$rec_start=$rec_start - $t_rec_per_page;
	if($rec_start < 0)
		$rec_start = 0;	
}
$rstart = $rec_start + 1;
$rend = $rec_start + $t_rec_per_page;
if ($rend > $row_count['rcnt'])
{
	$rend = $row_count['rcnt'];
}
$rtot = $row_count['rcnt'];

$query = "select * from contacts where status = 1";
		
$query.=" order by id desc LIMIT " . $rec_start . " , " . $t_rec_per_page;

$result=mysql_query($query) or die ("CAN".MYSQL_ERROR().$query);

?>

<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
<td class="navigate_link" style="width:7%;">
<?php

if ($rec_start != 0)
{
?>
 &nbsp;&nbsp;&nbsp;<a class="trigger" onclick="ajxSearch('query_result.php','rec_start=0');">First</a> 
<?php
}
else
{
echo "&nbsp;";
}
?>
 </td>
<td class="navigate_link" style="width:13%;">
<?php
if ($rec_start != 0)
{
?>
<a class="trigger" onclick="ajxSearch('query_result.php','rec_start=<?php echo $rec_start - $t_rec_per_page?>"> << Previous</a>
<?php
}
else
{
echo "&nbsp;";
}
?>
<input type="hidden" id="rec_start" name="rec_start" value="<?php echo $rec_start; ?>"/>
</td>


<td align="center" class="navigate_link"  style="width:20%;">
<?php 
if ($rtot > 0)
{
echo htmlentities($rstart . " " . to . " " . $rend . " " . of . " " . $rtot);
}
else
{
echo "No Record Found";
}
?>
</td>

<td align="center" class="navigate_link"  style="width:40%;">
<?php
$listpages = 8;
$listhalf = $listpages/2;

$rmndr = $row_count['rcnt'] % $t_rec_per_page;

$totpage = (int)($row_count['rcnt']/$t_rec_per_page);
if($rmndr > 0)
{
	$totpage = $totpage + 1;
}

$stpage = 1;

$cpage = ($rec_start + $t_rec_per_page) / $t_rec_per_page;
if ($cpage - $listhalf <= 1)
{
	$stpage = 1;
}
else
{
	if ($cpage + $listhalf > $totpage)
	{
		$balpage = $totpage - $cpage;
		if ($cpage - ($listpages - $balpage) <= 1)
		{
			$stpage = 1;
		}
		else
		{
			$stpage = $cpage - ($listpages - $balpage);
		}
	}
	else
	{
		$stpage = $cpage - $listhalf;
	}
}

$endpage = $stpage + $listpages;
if ($totpage < $endpage)
{
	$endpage = $totpage;
}
$page_now = 0;
for($i=$stpage;$i<=$endpage;$i++)
{
$fntclr = "#000000";
if ($rstart == ($i * $t_rec_per_page) - $t_rec_per_page + 1)
{
	$fntclr = "#ffffff";
	$page_now = $i;
?>
	<font color="<?php echo $fntclr?>"><?php echo $i?></font>&nbsp;
<?php
}
else
{
?>
<a class="trigger" onclick="ajxSearch('query_result.php','rec_start=<?php echo ($i * $t_rec_per_page) - $t_rec_per_page;?>');"><font color="<?php echo $fntclr?>"><?php echo $i?></font></a>&nbsp;
<?php
}
}
?>
</td>



<td align="center" class="navigate_link"  style="width:3%;">
<input style="text-align:center" onKeyPress="return blockNonNumbers(this,event,false,false);" onpaste="return false;" class="nav_text_box" type="text" name="txtpno" id="txtpno" onchange="txtnavigate('query_result.php','rec_start=',<?php echo $t_rec_per_page;?>,<?php echo $totpage;?>,<?php echo $page_now;?>);" value="<?php echo $page_now;?>">
</td>




<td align="right" class="navigate_link"  style="width:10%;">
<?php
if ($row_count['rcnt'] > $rec_start + $t_rec_per_page)
{
?>
<a class="trigger" onclick="ajxSearch('query_result.php','rec_start=<?php echo $rec_start + $t_rec_per_page?>');">Next >></a>
<?php
}
else
{
echo "&nbsp;";
}
?>
</td>
<td align="right" class="navigate_link"  style="width:10%;">
<?php
if ($row_count['rcnt'] > $rec_start + $t_rec_per_page)
{
?>
<a class="trigger" onclick="ajxSearch('query_result.php','rec_start=<?php
 echo (((int)($lstrec/$t_rec_per_page))*$t_rec_per_page)?>');">Last</a> &nbsp;&nbsp;&nbsp;
<?php
}
else
{
echo "&nbsp;";
}
?>
</td>
</tr>
</table>
<?php 
if ($rtot > 0)
{
?>
<table border="0" cellpadding="0" style="border-collapse: collapse;" width="100%">
			<tr>
				<td>
				<table border="1" bordercolor="#D21310" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="table24">
                <tr> 
				<!--	<td class="pro_rel pro_rel_text" style="padding:0px;text-align:center" width="25"><input type="checkbox" id="chkall" name="chkall" onClick="checkAll(<?php// echo $t_rec_per_page?>);"></td> -->
                  	<td class="pro_rel pro_rel_text" width="85">First Name</td>
                  <td class="pro_rel pro_rel_text" width="106">Last Name</td>
                  <td class="pro_rel pro_rel_text" width="150">Email</td>
                  <td class="pro_rel pro_rel_text" width="321">Query</td>
                  <td class="pro_rel pro_rel_text" width="220">Publish Date</td>
                  <td class="pro_rel pro_rel_text" width="113">Action</td>
                </tr>
<?php

$chkno = 0;
while($row=mysql_fetch_assoc($result))
{
$chkno = $chkno + 1;
?>				
		        <tr> 
              <!--  <td class="pro_rel pro_rel_text" style="padding:0px;text-align:center" width="25"><input type="checkbox" id="chkall" name="chkall" onClick="checkAll(<?php// echo $t_rec_per_page?>);"></td>  -->
                  <td class="pro_rel_text2" width="85"><?php echo  $row['fname'];?></td>
                  <td class="pro_rel_text2" width="106"><?php echo  $row['lname'];?></td>
                  <td class="pro_rel_text2" width="150"><?php echo  $row['email'];?></td>
                  <td class="pro_rel_text2" width="321"><?php echo  $row['query'];?></td>
                  <td class="pro_rel_text2" width="220"><?php echo date('l, F j, Y', strtotime($row['modifieddate'])); ?></td>
               	  <td class="pro_rel_text2" width="113">
                  <?php
				  if($row['ans_state']==2)
				  {
				  ?>
                  <a style="cursor:pointer;" class="result_link trigger" onClick="addCategory('query_process.php','<?php echo $row['id']; ?>');">
                  <span style="background-color:#009900;color:#FFFFFF;font-weight:bold;">Reply</span></a>
                  <?php
				  }
				  else
				  {
				  ?>
                  <span style="background-color:#0033FF;color:#FFFFFF;font-weight:bold;">Sent</span>
                  <?php
				  }
				  ?>
                   /
                  <a onClick="return confirm('Are you sure want to delete?');" style="cursor:pointer;" class="result_link trigger" href="query_del.php?id=<?php echo $row['id']; ?>&hidrecstart=<?php echo $_REQUEST['rec_start']; ?>">
                  <span style="background-color:#FF0000;color:#FFFFFF;font-weight:bold;">Delete</span></a></td>
            
                </tr>
				
<?php
}
?>

              </table>
		</td>
		</tr>
		</table>
		<?php
		}
		?>