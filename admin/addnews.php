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
   session_start();
   	header("Location:newsadmin.php");

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

      <h2 align="center">Add News</h2>
      <div align="right" style="margin-right:30px;">
      <a href="catadmin.php" >Add News Category</a>
      </div>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="4" height="300">
        <tr>
        <td align="center">
        <form action="<?php print "$PHP_SELF"; ?>" method="POST" ENCTYPE="multipart/form-data">               
        <table width="300" border="0" cellspacing="1" cellpadding="4">
             <tr> 
                <td width="83"><?php print "$admin_title"; ?> :</td>
                <td width="198"><input type="text" name="title"></td>

                <td><?php print "$admin_catalog"; ?> :</td>
                <td>
                <select name="catalogid">
                <?php
                $nameinfo = $db->getallcatalogname(); 
                if (!empty($nameinfo)){
	            while (list($key,$val)=each($nameinfo)) {
		    $catalogid = stripslashes($val["catalogid"]);
		    $catalogname = stripslashes($val["catalogname"]);
		    print "<option value=\"$catalogid\">$catalogname</option>";
		 }
		}
                ?>
                </select>
                </td>
              </tr>   
              <tr> 
                <td><?php print "$admin_content"; ?> :</td>
                <td><textarea name="content" cols="17" rows="5"></textarea></td>

                <td><?php print "$admin_viewnumber"; ?> :</td>
                <td><input type="text" name="viewnum" value="0"></td>
              </tr>
              <tr > 
                <td><?php print "$admin_rating"; ?> :</td>
                <td><input type="text" name="rating" value="4"></td>

                <td><?php print "$admin_ratenumber"; ?> :</td>
                <td><input type="text" name="ratenum" value="1"></td>
              </tr>
              <tr > 
                <td><?php print "$admin_picture"; ?> :</td>
                <td><input type="file" name="userfile"></td>

                <td><?php print "$admin_source"; ?> <img src="../images/help.gif" width="15" height="15" border="0" alt="<?php print "$help_source"; ?>"> :</td>
                <td><input type="text" name="source" value=""></td>
              </tr> 
              <tr > 
                <td><?php print "$admin_sourceurl"; ?> :</td>
                <td><input type="text" name="sourceurl" value=""></td>

                <td><?php print "$admin_isdisplay"; ?></td>
                <td>
                <select name="isdisplay">
                <option value="1" selected><?php print "$admin_yes"; ?></option>
                <option value="0"><?php print "$admin_no"; ?></option>
                </select>
                </td>
              </tr>
              <tr > 
                <td>&nbsp;</td>
                <td colspan="2" align="center"><input type="submit" name="addnews" value="<?php print "$admin_add"; ?>"></td>
                <td>&nbsp;</td>
              </tr>
        </table>
        </form>
        </td>
        </tr>    
      </table>
</div>
<div id="divAdd"></div>
</div>
</body>
</html>
