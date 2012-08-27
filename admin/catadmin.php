<?php
require("./NewsSql.inc.php");
$db = new NewsSQL($DBName);
include("./usercheck.php");

$PicturePath = "../photo/";

if (empty($page)){
$page = 0;
}
$record = 20;

if ($Delcatalog==$admin_yes) {
$db->delcatalog($catid,$PicturePath);
}
if (!empty($addcatalog)) {
$db->addcatalog($catalogname,$description,$parentid);
}
if (!empty($editcatalog)) {
$db->editcatalog($catalogname,$description,$parentid,$catid);
}
$result = $db->getallcatalog($page,$record);
?>

<?php
if ($_REQUEST['submit'])
{
	$query = "update catalog set menu_link_id ='".$_REQUEST['menu_link_name']."'";
	$result = mysql_query($query);
	
	 $_REQUEST['menu_link_name'] = NULL;
	
}
?>


      <?php
      include("top.php3");
      ?>
      <h2 align="center">Add News Category</h2>
<div id="divTable">
		<table width="100%" border="0" cellspacing="0" cellpadding="4" height="300">
        <tr>
        <td align="center">
        <form action="<?php print "$PHP_SELF"; ?>" method="POST">        
        <table width="300" border="0" cellspacing="1" cellpadding="4">
             <tr> 
                <td width="83"><?php print "$admin_name"; ?> :</td>
                <td width="198"><input type="text" name="catalogname"></td>
              </tr>
              <tr> 
                <td><?php print "$admin_description"; ?> :</td>
                <td><textarea name="description" cols="17" rows="5"></textarea></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td><input type="submit" name="addcatalog" value="<?php print "$admin_add"; ?>"></td>
              </tr>
        </table>
        </form>
        </td>
        </tr>


<tr align="center">
<td colspan="4">
<hr />
                            <form action="catadmin.php" method="post">
                                Select Page For News
                            <?php 
                                $query3 = "select name,id from menu_link order by ordering";
                                $result3 = mysql_query($query3);
                                ?>
                                <select name="menu_link_name">
                                <option>--Select Page--</option>
                                <?php
                                while($data3=mysql_fetch_array($result3))
                                {
                                extract($data3);
                                $menu_link_name=$name;
                                $menu_link_id = $id;
                                ?>
                                <option value="<?php echo $menu_link_id; ?>"><?php echo $menu_link_name; ?></option>
                            <?php } ?>
                                
                                </select>
                              <input type="submit" value="submit" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
                            </form>
</td>
</tr>









        <tr> 
          <td align="center"> 
            <table width="500" border="0" cellspacing="1" cellpadding="4">
              <tr bgcolor="#CCCCCC"> 
                <td>Id</td>
                <td><?php print "$admin_name"; ?></td>
                <td>Page Name</td>
                <td colspan="3"><?php print "$admin_opreation"; ?></td>
              </tr>
              <?php
              if (!empty($result)) {
	        while ( list($key,$val)=each($result) ) {
	        $catalogid = stripslashes($val["catalogid"]);
	        $catalogname = stripslashes($val["catalogname"]);
	        $parentid  = stripslashes($val["parentid"]);
			$menu_link_id  = stripslashes($val["menu_link_id"]);
			
	        $parentname = $db->getcatalognamebyid($parentid);
              ?>
              <tr>
              <td><?php print "$catalogid"; ?></td>
                <td><?php print "$catalogname"; ?></td>
               	<td><?php 
                    $query3 = "select name from menu_link where id = '".$menu_link_id."'";
                    $result3 = mysql_query($query3);
                    while($data3=mysql_fetch_array($result3)){
	                    extract($data3);
	                    echo $name;
                    }?>
			    </td>
                <td><a href="catalognews.php?catid=<?php print "$catalogid"; ?>" class="en_b"><?php print "$admin_news"; ?></a></td>
                <td><a href="editcatalog.php?catid=<?php print "$catalogid"; ?>" class="en_b"><?php print "$admin_edit"; ?></a></td> 
                <td><a href="delcatalog.php?catid=<?php print "$catalogid"; ?>" class="en_b"><?php print "$admin_del"; ?></a></td>
              </tr>
              <?php
              }
              }
              ?>                       
            <tr bgcolor="#FFFFFF">
            <td align="right" colspan="4">
            <?php
              $pagenext = $page+1;
		$result1 = $db->getallcatalog($pagenext,$record);
		if ($page!=0)
		{
		$pagepre = $page-1;		
		print "<a href=\"$PHP_SELF?page=$pagepre\"><font color=\"#FF0000\">$admin_previouspage</font></a>&nbsp;&nbsp;&nbsp;";
		}
		if (!empty($result1))
		{
		print "<a href=\"$PHP_SELF?page=$pagenext\"><font color=\"#FF0000\">$admin_nextpage</font></a>&nbsp;";
		}
		?>
            </td>
            </tr>
            </table>
            </td>
        </tr>
      </table>
      
</div>
<div id="divAdd"></div>
</div>
</body>
</html>
