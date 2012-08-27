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
<style>
#navcontainer
{
background-image:url(images/monitor.png);
background-repeat:no-repeat;
background-position:center;
height:128px;
width:128px;
position:relative;
border-color:#990000;
border:thick;
text-align:center;
margin-top:10px;
margin-left:50px;
float:left;
}

#navcontainer li 
{
margin-top:0px;
margin-left:0px;
vertical-align:middle;
list-style: none;
background-repeat: no-repeat;
}
#navcontainer img{
height:60px;
width:64px;
margin-top:10px;
border:none;
text-align:center;

}

.a
{
color:#FFFFFF;
text-decoration:none;
}



</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>

<body>
<div style="margin:0px 200px 0px 200px;background-color:#EBEBEB;height:750px;">
<div style="height:50px;"></div>
<?php
include_once("header.php");
?>
<br /><br />
<div id="navcontainer">
	<li>
    <a class="a" href="welcome.php" >
    <img class="image" src="images/home.png"/><br />
    Home</a></li>
</div>

<?php 
	if ( $_SESSION['username'] == "superadmin") {
?>

<div id="navcontainer">
    <li>
    <a class="a" href="menulink.php" >
    <img class="image" src="images/menulink.png" /><br />
	Menu Link</a></li>
</div>
<div id="navcontainer">
    <li>
    <a class="a" href="3dflash.php" >
    <img class="image" src="images/3dflash.png" /><br />
	Slider</a></li>
</div>
<div id="navcontainer">
    <li>
    <a class="a" href="background.php" >
    <img class="image" src="images/background.png" /><br />
	Background</a></li>
</div>
<div id="navcontainer">
    <li>
    <a class="a" href="logo.php" >
    <img class="image" src="images/logo.png" /><br />
	Logo</a></li>
</div>
<div id="navcontainer">
    <li>
    <a class="a" href="headercontent.php" >
    <img class="image" src="images/headercontent.png" /><br />
	Header Content</a></li>
</div>

<div id="navcontainer">
    <li>
    <a class="a" href="flash.php" >
    	<img src="images/flash.png" /><br />
		Footer Flash</a></li>
</div>

<div id="navcontainer">
        <li><a class="a" href="category.php" >
        <img src="images/sidebar.png" /><br />
        Sidebar Category</a></li>
</div>
<?php 
}
?>

<div id="navcontainer">
        <li>
        <a class="a" href="nproducts.php" >
        <img src="images/newproduct.png" /><br />
        New Products</a> </li>
</div>
<div id="navcontainer">
        <li><a class="a" href="featuredproducts.php" >
        <img src="images/featuredproduct.png" /><br />
        Feature Page</a></li>
</div>
<div id="navcontainer">
        <li><a class="a" href="sproduct.php" >
        <img src="images/specialproduct.png" /><br />
        Special Product</a></li>
</div>
<div id="navcontainer">
        <li><a class="a" href="review.php" >
        <img src="images/reviews.png" /><br />
        Reviews</a> </li>
</div>
<div id="navcontainer">
        <li><a class="a" href="clients.php" >
        <img src="images/clients.png" /><br />
        Clients</a></li>
</div>
<div id="navcontainer">
        <li><a class="a" href="advertisment.php" >
        <img src="images/advertisment.png" /><br />
        Advertisement</a></li>
</div>
<div id="navcontainer">
        <li><a class="a" href="newsadmin.php" >
        <img src="images/NewsIcon.png" /><br />	
        News</a></li>
</div>
<div id="navcontainer">
        <li><a class="a" href="pagecontent.php" >
        <img src="images/pagecontent.png" /><br />
        Page Content</a></li>
</div>
<div id="navcontainer">
        <li>
        <a class="a" href="changepassword.php" >
        <img src="images/password.png" /><br />
        Change Password</a> </li>
</div>
<div id="navcontainer">
        <li><a class="a" href="logout.php" >
        <img src="images/logout.png" /><br />
        Logout</a> </li>
</div>


</div>
</body>
</html>
