<div style="padding-top:0px;padding-left:20px;padding-bottom:20px;background-color:#996600;height:45px;text-align:center;font-size:18px;color:#FFFFFF;">
<a href="welcome.php" style="color:#FFFFFF;text-decoration:none;"><img src="images/home_icon.png" height="65px" width="70px" align="left"></a>

<?php 
session_start();

if ( $_SESSION['username'] == "superadmin")
{ ?>
	<a href="menulink.php" style="color:#FFFFFF;text-decoration:none;">Menu Link</a> | 
	<a href="logo.php" style="color:#FFFFFF;text-decoration:none;">Logo</a>  |
	<a href="3dflash.php" style="color:#FFFFFF;text-decoration:none;">Slider</a>  |
	<a href="background.php" style="color:#FFFFFF;text-decoration:none;">Background Image</a>  |
	<a href="headercontent.php" style="color:#FFFFFF;text-decoration:none;">Header Content</a>  |
	<a href="flash.php" style="color:#FFFFFF;text-decoration:none;">Footer Flash</a>  |
	<a href="pagecontent.php" style="color:#FFFFFF;text-decoration:none;">Page Content</a> |
	<a href="supercategory.php" style="color:#FFFFFF;text-decoration:none;">Side Panel</a> |
<?php 
} ?>
<a href="category.php" style="color:#FFFFFF;text-decoration:none;">Category</a> | 
<a href="subcategory.php" style="color:#FFFFFF;text-decoration:none;">Subcategory</a> |
<a href="nproducts.php" style="color:#FFFFFF;text-decoration:none;">New Products</a> |
<a href="featuredproducts.php" style="color:#FFFFFF;text-decoration:none;"> Feature Page</a> | 
<a href="sproduct.php" style="color:#FFFFFF;text-decoration:none;">Special Product</a> |
<a href="review.php" style="color:#FFFFFF;text-decoration:none;">Review</a> |  
<a href="clients.php" style="color:#FFFFFF;text-decoration:none;">Clients</a> | 
<a href="advertisment.php" style="color:#FFFFFF;text-decoration:none;">Advertisement</a> | 
<a href="newsadmin.php" style="color:#FFFFFF;text-decoration:none;">News</a>|
<a href="changepassword.php" style="color:#FFFFFF;text-decoration:none;">Change Password</a> |
<a href="logout.php" style="color:#FFFFFF;text-decoration:none;">Logout</a> </div>
