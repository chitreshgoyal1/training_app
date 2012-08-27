<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Agoan Electronics</title>
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript" src="js/boxOver.js"></script>
<style type="text/css">
<!--
.style1 {color: #b72c24}
.style4 {color: #DDF3F9; font-size: 12px; }
-->
</style>
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
	<script type="text/javascript" src="js/jquery-1.3.js"></script>
	<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	<script type="text/javascript">
	var $op = jQuery.noConflict();
		$op(document).ready(function(){
			$op('#myslides').cycle({
				fx: 'fade',
				speed: 2000,
				timeout: 1000
			});
		}); 
	</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "expandable", 
	contentclass: "categoryitems",
	revealtype: "click", 
		mouseoverdelay: 200, 
	collapseprev: true, 
	defaultexpanded: [0], 
	onemustopen: false,
	animatedefault: false, 
	persiststate: true, 
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>

<style type="text/css">

.arrowlistmenu{
width: 196px; /*width of accordion menu*/
}

.arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
font: bold 14px Arial;
color: #FFFFFF;
background: #000066 url(img/menu_left.jpg) repeat-x center left;
margin-bottom: 10px; /*bottom spacing between header and rest of content*/
margin-left:0px;
padding: 9px 0 9px 55px; /*header text is indented 10px*/
cursor: hand;
cursor: pointer;
}

.arrowlistmenu .menuheader a:hover{
color: #A70303;
background-color: #F3F3F3;
color:#333333;
}

.arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
background-image: url(img/menu_left.jpg);
}

.arrowlistmenu ul{ /*CSS for UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
margin-bottom: 8px; /*bottom spacing between each UL and rest of content*/
}

.arrowlistmenu ul li{
padding-bottom: 2px; /*bottom spacing between menu items*/
}

.arrowlistmenu ul li a{
color: #A70303;
background: url(arrowbullet.png) no-repeat center left; /*custom bullet list image*/
display: block;
padding: 2px 0;
padding-left: 19px; /*link text is indented 19px*/
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid #dadada;
font-size: 100%;
}

.arrowlistmenu ul li a:hover{ /*hover state CSS*/
color: #A70303;
background-color: #F3F3F3;
color:#333333;
}

</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.magnifier.js"></script>

 <link href="css/menustyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div id="main_container">
	<table height="180" background="img/background.jpg" style="background-repeat:repeat;" cellpadding="0" cellspacing="0" border="0"><tr>
	<td width="400">
	
	<?php include"Untitled-6.html" ?>
	
	
	</td>
	 <td width="600" align="center" valign="middle"><?php include"slideshow-example-2.html"; ?></td>
	 
	</tr>
	</table>
	
<!--<div id="main_content" align="center"> 
<div id="menu_tab" align="center">-->
<div id="container">
               <ul  id="nav">
                     <li id="selected"><a href="index.php" class="nav1">Home </a></li>
                     <li><a href="newproduct.php" class="nav2">New Product</a></li>
                     <li><a href="catlogue.php" class="nav3">Catalogues</a></li>
                     <li><a href="reviews.php" class="nav4">Reviews</a></li>
                     <li><a href="projects.php" class="nav5">Projects</a></li>
					 <li><a href="contactus.php" class="nav6">Contact Us</a></li>
					 <li><a href="contactus.php" class="nav7"><marquee width="100" scrollamount="1">Call : +91 141 4006888</marquee></a></li>

			   </ul>
			</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.spasticNav.js"></script>

<script type="text/javascript">
    $('#nav').spasticNav();
</script>
</div>
<!--
</div>
</div>-->