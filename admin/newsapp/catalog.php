<?php
if (empty($page)) {
	$page = 0;
}
require("./NewsSql.inc.php");
$db = new NewsSQL($DBName); 
$catalogname = $db->getcatalognamebyid($catalogid);
$cataresult = $db->getchildcatalog($catalogid);
$catanewsresult = $db->getnewsbycatid($page,$front_latestoncatarecord,$catalogid);
?>
<html>
<head>
<title><?php print "$catalogname"; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php print "$front_charset"; ?>">
<link rel="stylesheet" href="./style/style.css" type="text/css">
<script language="JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0">
<?php
include("top.php3");
?>
<table width="770" border="0" cellspacing="1" cellpadding="0" align="center" class="table_01">  
  <tr> 
    <td class="table_02" width="160" valign="top"> 
      <table width="160" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td><img src="./images/left_search.gif" width="152" height="16"></td>
        </tr>
        <tr> 
          <td>            
          <form action="search.php" method="POST">                   
            <table border="0" cellspacing="0" cellpadding="0" width="145" align="right">
              <tr>
                  <td><input type="text" name="keyword" value="" size="12"></td>
              </tr>
              <tr><td><input type="submit" name="searchsubmit" value="<?php print "$front_searchsubmit"; ?>"></td></tr>
              <tr><td>&nbsp;</td></tr>
            </table>            
            </form>
          </td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top"><?php include("left.php"); ?></td>
        </tr>
      </table>      
      
    </td>
    <td class="menu" bgcolor="#FFFFFF" valign="top" width="410"> 
    <table width="410" border="0" cellspacing="0" cellpadding="4">
          <tr> 
            <td bgcolor="#F2F2F2" class="menu_in"><?php print "$front_latestnews"; ?></td>
          </tr>
          <tr>
            <td>
            <?php
	      if (!empty($catanewsresult)) {
	      while ( list($key,$val)=each($catanewsresult) ) {
	      $title = stripslashes($val["title"]);
	      $newsid = stripslashes($val["newsid"]);	      
	      print "<a href=\"news.php?newsid=$newsid\" class=\"en_b\"><img src=\"./images/bullet_b.gif\" width=\"11\" height=\"9\" border=\"0\">$title</a><br>";
	      }
	}
      ?>
            </td>
          </tr> 
          <tr>
            <td align="right">
            <?php
            $pagenext = $page+1;
            $result1 = $db->getnewsbycatid($pagenext,$front_latestoncatarecord,$catalogid);
            if ($page!=0)
            {
            $pagepre = $page-1;         
            print "<a href=\"$PHP_SELF?page=$pagepre&catalogid=$catalogid\" class=\"en_b\">$front_previouspage</a>&nbsp;&nbsp;";
            }
            if (!empty($result1))
            {         
            print "<a href=\"$PHP_SELF?page=$pagenext&catalogid=$catalogid\" class=\"en_b\">$front_nextpage</a>";
            }           
            ?>
            </td>
          </tr>         
    </table>
    <?php
    if (!empty($cataresult)) {
	      while ( list($key,$val)=each($cataresult) ) {
	      	$catalogname = stripslashes($val["catalogname"]);
	      	$catalogid = stripslashes($val["catalogid"]);
	      	$result = $db->getnewsbycatid(0,$front_catnewsoncatarecord,$catalogid);
    ?>
    <table width="410" border="0" cellspacing="0" cellpadding="4">
          <tr> 
            <td bgcolor="#F2F2F2" class="menu_in"><?php print "$catalogname"; ?></td>
            <td bgcolor="#F2F2F2" class="menu_in" align="right"><a href="catalog.php?catalogid=<?php print "$catalogid"; ?>" class="en_b"><img src="images/bullet_b.gif" width="11" height="9" border="0"><?php print "$front_more"; ?>...</a></td>
          </tr>       
          <tr> 
           <td colspan="2">
           <?php
           if (!empty($result)) {
	      while ( list($key,$val)=each($result) ) {
	      $title = stripslashes($val["title"]);
	      $newsid = stripslashes($val["newsid"]);
           ?>
           <a href="news.php?newsid=<?php print "$newsid"; ?>" class="en_b"><img src="./images/bullet_b.gif" width="11" height="9" border="0"><?php print "$title"; ?></a><br>
           <?php
    		}
    		}
    	   ?>
           </td>
          </tr>   
    </table> 
    <?php
    }
    }
    ?>              
    </td>
    <td class="table_02" background="./images/right_bg.gif" valign="top">       
      <table width="200" border="0" cellspacing="0" cellpadding="6">
        <tr> 
          <td>
          &nbsp;
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php
include("bottom.php3");
?>
</body>
</html>
