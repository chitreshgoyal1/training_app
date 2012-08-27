<?php
include_once './../connection.php';
include_once './../rd_replacebackslash.php';
session_start();

$rec_start = $_REQUEST["rec_start"];
$t_rec_per_page= 5;
$cat=$_REQUEST["cat_name"];

if($_REQUEST["cat_name"] != NULL)
{
$query2="select name From category where id=$cat";
$result2=mysql_query($query2) or die("query not excecuted");

while($row=mysql_fetch_array($result2))
{
extract($row);
$name=$name;
}
}

//-----------------------------------------------------counting data ------------------------------
$query = "select count(*) as rcnt from nproduct";
if($_REQUEST["cat_name"]!=0)
{
	$query.=" where category='$name'";
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
//----------------------------------------------------selecting data from hre-----------------
$query = "select * from nproduct";
if($_REQUEST["cat_name"]!=0)
{
	$query.=" where category='$name'";
//	echo $_REQUEST["cat_name"];
	//exit(0);
}
$query.=" order by id desc LIMIT " . $rec_start . " , " . $t_rec_per_page;
$result=mysql_query($query) or die("data not select");
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
 &nbsp;&nbsp;&nbsp;<a class="trigger" onClick="ajxSearch('nproducts_result.php','rec_start=0&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');">First</a> 
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
<a class="trigger" onClick="ajxSearch('nproducts_result.php','rec_start=<?php echo $rec_start - $t_rec_per_page?>&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');"> << Previous</a>
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
<a class="trigger" onClick="ajxSearch('nproducts_result.php','rec_start=<?php echo ($i * $t_rec_per_page) - $t_rec_per_page;?>&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');"><font color="<?php echo $fntclr?>"><?php echo $i?></font></a>&nbsp;
<?php
}
}
?>
</td>



<td align="center" class="navigate_link"  style="width:3%;">
<input style="text-align:center" onKeyPress="return blockNonNumbers(this,event,false,false);" onpaste="return false;" class="nav_text_box" type="text" name="txtpno" id="txtpno" onChange="txtnavigate('nproducts_result.php','cat_name=<?php echo $_REQUEST["cat_name"]; ?>&rec_start=',<?php echo $t_rec_per_page;?>,<?php echo $totpage;?>,<?php echo $page_now;?>);" value="<?php echo $page_now;?>" />
</td>




<td align="right" class="navigate_link"  style="width:10%;">
<?php
if ($row_count['rcnt'] > $rec_start + $t_rec_per_page)
{
?>
<a class="trigger" onClick="ajxSearch('nproducts_result.php','rec_start=<?php echo $rec_start + $t_rec_per_page?>&cat_name=<?php echo $_REQUEST["cat_name"]; ?>');">Next >></a>
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
<a class="trigger" onClick="ajxSearch('nproducts_result.php','rec_start=<?php
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
				   	<td class="pro_rel pro_rel_text" width="67">S. No.</td>
                  	<td class="pro_rel pro_rel_text" width="448">Product Name</td>
					<td class="pro_rel pro_rel_text" width="100">Price</td>
               	  <td class="pro_rel pro_rel_text" width="241">Category </td>
                    <td class="pro_rel pro_rel_text" width="200">Product Image</td>
					<td class="pro_rel pro_rel_text" width="179">Action</td>
             
                </tr>
<?php
$i=1;
while($row=mysql_fetch_assoc($result))
{
?>				
		        <tr> 
                  <td class="pro_rel_text2" width="67"><?php echo $i;?></td>
                  <td class="pro_rel_text2" width="448"><?php echo $row['name']; ?></td>
				  <td class="pro_rel_text2" width="100"><?php echo $row['price']; ?></td>
				  <td class="pro_rel_text2" width="241">
				  <?php 
				  $d=$row['category'];
				  echo $d;
//				  exit(0);
				  $rs = mysql_query("select * from category where name = " . $row['category'] . "");
				  //echo $row['category'];
				  //exit(0);
				  $rw = mysql_fetch_assoc($rs);
				  $cat_name = $rw['cat_name'];
				  ?>				  </td>
                  	<td align="center"><img src="../images/newproducts/<?php echo $row['imgurl'];?>" width="95" height="56"></td>
                  <td class="pro_rel_text2" width="179">
				  <a class="trigger" href="nproducts_add.php?cid=<?php echo $row['id']; ?>&hidcat_name=<?php echo $row['category']; ?>" >Edit</a> /  
                  <a style="color:#666666;text-decoration:none;" onClick="return confirm('Are you sure want to delete?');" href="nproducts_save.php?hidid=<?php echo $row['id']; ?>&mode=delete&hidrecstart=<?php echo $_REQUEST['rec_start'] ;?>&hidcat_name=<?php echo $_REQUEST['cat_name']; ?>&imgurl=<?php echo $row['imgurl']; ?>">Delete</a>
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