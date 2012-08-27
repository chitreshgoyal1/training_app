<?php
include_once './../connection.php';
include_once './../rd_replacebackslash.php';
session_start();

$rec_start = $_REQUEST["rec_start"];
$t_rec_per_page= 5;

$query = "select count(*) as rcnt from reviews";
if($_REQUEST["cat_name"]!=0)
{
	$query.=" where category=" . $_REQUEST["cat_name"];
}

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

$query = "select * from reviews";
if($_REQUEST["cat_name"]!=0)
{
	$query.=" where category=" . $_REQUEST["cat_name"];
}

$query.=" order by review_id desc LIMIT " . $rec_start . " , " . $t_rec_per_page;
$result=mysql_query($query);
?>

<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%">

    <tr>
          
  <!--       <td valign="top" style=" padding:0 50px 10px 0;"  align="right" width="100%" colspan="17">
           <input type="button" name="addstock" id="addstock" value="Add" onclick="ajxSearch('project_add.php',null)" />
         </td>   -->
    </tr>
<tr>
<td class="navigate_link" style="width:7%;">
<?php

if ($rec_start != 0)
{
?>
 &nbsp;&nbsp;&nbsp;<a class="trigger" onClick="ajxSearch('review_result.php','rec_start=0&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');">First</a> 
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
<a class="trigger" onClick="ajxSearch('review_result.php','rec_start=<?php echo $rec_start - $t_rec_per_page?>&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');"> << Previous</a>
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
$fntclr = "#ffffff";
if ($rstart == ($i * $t_rec_per_page) - $t_rec_per_page + 1)
{
	$fntclr = "#990000";
	$page_now = $i;
?>
	<font color="<?php echo $fntclr?>"><?php echo $i?></font>&nbsp;
<?php
}
else
{
?>
<a class="trigger" onClick="ajxSearch('review_result.php','rec_start=<?php echo ($i * $t_rec_per_page) - $t_rec_per_page;?>&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');"><font color="<?php echo $fntclr?>"><?php echo $i?></font></a>&nbsp;
<?php
}
}
?>
</td>



<td align="center" class="navigate_link"  style="width:3%;">
<input style="text-align:center" onKeyPress="return blockNonNumbers(this,event,false,false);" onpaste="return false;" class="nav_text_box" type="text" name="txtpno" id="txtpno" onChange="txtnavigate('review_result.php','cat_name=<?php echo $_REQUEST["cat_name"]; ?>&rec_start=',<?php echo $t_rec_per_page;?>,<?php echo $totpage;?>,<?php echo $page_now;?>);" value="<?php echo $page_now;?>" />
</td>




<td align="right" class="navigate_link"  style="width:10%;">
<?php
if ($row_count['rcnt'] > $rec_start + $t_rec_per_page)
{
?>
<a class="trigger" onClick="ajxSearch('review_result.php','rec_start=<?php echo $rec_start + $t_rec_per_page?>&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');">Next >></a>
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
<a class="trigger" onClick="ajxSearch('review_result.php','rec_start=<?php
 echo (((int)($lstrec/$t_rec_per_page))*$t_rec_per_page)?>&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');">Last</a> &nbsp;&nbsp;&nbsp;
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
				<table border="1" bordercolor="#4C6F8D" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="table24">
                <tr> 
				   	<td class="pro_rel pro_rel_text" width="57">S. No.</td>
                  	<td class="pro_rel pro_rel_text" width="98">Title</td>
               	  <td class="pro_rel pro_rel_text" width="461">Description</td>
                   <!-- <td class="pro_rel pro_rel_text" width="298">No. Of Comments (for Approval)</td>-->
					<td class="pro_rel pro_rel_text" width="83">Action</td>
             
                </tr>
<?php
$i=1;
while($row=mysql_fetch_assoc($result))
{
?>				
		        <tr> 
                  <td class="pro_rel_text2" width="57"><?php echo $i;?></td>
                  <td class="pro_rel_text2" width="98"><?php echo $row['title']; ?></td>
				  <td class="pro_rel_text2" width="461"><?php echo $row['description']; ?></td>
                  <?php
				  $rs = mysql_query("select * from reviews_comment where status = 2 and review_id = " . $row['review_id']);
				  $k = mysql_num_rows($rs);
				  ?>
                 <!-- <td align="center"><a href="javascript:void(0);" onclick="addNews('comment_view.php','<?php echo $row['review_id']; ?>');""><?php //echo $k;?></a></td>-->
                  <td class="pro_rel_text2" width="83">
				  <a class="trigger" onClick="addNews('review_add.php','<?php echo $row['review_id']; ?>');">Edit</a> /  
                  <a style="color:#666666;text-decoration:none;" onClick="return confirm('Are you sure want to delete?');" href="review_save.php?hidid=<?php echo $row['review_id']; ?>&mode=delete&hidrecstart=<?php echo $_REQUEST['rec_start'] ;?>">Delete</a>
				  </td>
            
                </tr>
				
<?php
$i++;
}
?>

              </table>
		</td>
		</tr>
		</table>
		<?php
		}
		?>