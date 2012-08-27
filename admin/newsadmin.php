<?php
require("./NewsSql.inc.php");
$db = new NewsSQL($DBName);
include("./usercheck.php");

$PicturePath = "../photo/";

if (empty($page)){
$page = 0;
}
$record = 20;

if ($Delnews==$admin_yes) {
$db->delnews($newsid,$PicturePath);
}

if (!empty($addnews)) {
$newsid = $db->addnews($catalogid,$title,$content,$viewnum,$rating,$ratenum,$source,$sourceurl,$isdisplay);
      
   $tempuserfile = $_FILES['userfile']['tmp_name'];
   $tempuserfile_name = $_FILES['userfile']['name'];
   
   if ((!empty($tempuserfile)) && (!empty($tempuserfile_name))) {
   $userfile = $tempuserfile;
   $userfile_name = $tempuserfile_name;
   }
   
   if ((!empty($userfile)) && (!empty($userfile_name))) {
   $prefix = time();
   $userfile_name = $prefix.$userfile_name;
   $dest1 = $PicturePath.$userfile_name;
   copy($userfile, $dest1);
   $db->add_Picture($newsid,$userfile_name,$PicturePath);
   }
}

if (!empty($editnews)) {
      
   $tempuserfile = $_FILES['userfile']['tmp_name'];
   $tempuserfile_name = $_FILES['userfile']['name'];
   
   if ((!empty($tempuserfile)) && (!empty($tempuserfile_name))) {
   $userfile = $tempuserfile;
   $userfile_name = $tempuserfile_name;
   }
   
   if ((!empty($userfile)) && (!empty($userfile_name))) {   
   $prefix = time();
   $userfile_name = $prefix.$userfile_name;
   $dest1 = $PicturePath.$userfile_name;
   copy($userfile, $dest1);
   $db->add_Picture($newsid,$userfile_name,$PicturePath);
   }
$db->editnews($catalogid,$title,$content,$viewnum,$rating,$ratenum,$source,$sourceurl,$isdisplay,$newsid);
   
}

if (!empty($DP1)) {
   $db->del_Picture($newsid,$PicturePath);
}

$result = $db->getallnews($page,$record);
?>

      <?php
      include("top.php3");
      ?>

      <h2 align="center">News</h2>
      
      <table width="100%" border="0" cellspacing="0">
        <tr> 
          <td align="center"> 
            <table border="0">
			  <tr>
              	<td align="right" colspan="7">
                <a href="addnews.php" style="text-decoration:none;" ><font size="+1" style="color:#000000;"><strong>Add News</strong></font> </a>
                </td>
              </tr>  
              <tr> 
                <td bgcolor="#CCCCCC">News Id</td>
                <td bgcolor="#CCCCCC">News <?php print "$admin_title"; ?></td>
                <td bgcolor="#CCCCCC">News <?php print "$admin_catalog"; ?></td>
                <td bgcolor="#CCCCCC">News Image</td>                
                <td colspan="2" bgcolor="#CCCCCC">&nbsp;<?php print "$admin_opreation"; ?>&nbsp;</td>
                <td align="right" width="300">
                <a href="catadmin.php" style="text-decoration:none;" ><font size="+1" style="color:#000000;"><strong>Add News Category</strong></font> </a>
</td>
              </tr>
              <?php
              if (!empty($result)) {
	        while ( list($key,$val)=each($result) ) {
	        $newsid = stripslashes($val["newsid"]);
	        $catalogid = stripslashes($val["catalogid"]);
	        $title = stripslashes($val["title"]);
			$picture = stripslashes($val["picture"]);	        
	        $cataname = $db->getcatalognamebyid($catalogid);
              ?>
              <tr>
	            <td><?php print "$newsid"; ?></td>
                <td><?php print "$title"; ?></td>
                <td><?php print "$cataname"; ?></td>
                <td><img src="<?php print "$PicturePath$picture"; ?>" height="80" width="100" /></td>                
                <td><a href="editnews.php?newsid=<?php print "$newsid"; ?>" class="en_b"><?php print "$admin_edit"; ?></a></td>
                <td><a href="delnews.php?newsid=<?php print "$newsid"; ?>" class="en_b"><?php print "$admin_del"; ?></a></td>                              
              </tr>
              <?php
              }
              }
              ?>                       
            <tr >
            <td align="right" colspan="5">
            <?php
              $pagenext = $page+1;
		$result1 = $db->getallnews($pagenext,$record);
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
