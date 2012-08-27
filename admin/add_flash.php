<?php

	session_start();
	$arr = array();
	$flag = false;
	
include "../connection.php";	

	if(isset($_REQUEST['submit']) && $_REQUEST['check'] == 1)
	{
		if($_FILES['image1']['name'])
		{
			$file_name = $_FILES['image1']['name'];			
			if($_FILES['image1']['type']=="image/jpg" || $_FILES['image1']['type']=="image/jpeg" || $_FILES['image1']['type']=="image/gif" || $_FILES['image1']['type']=="image/png")
			{
				if(move_uploaded_file($_FILES['image1']['tmp_name'],"../images/aboutus/".$file_name))
				{						
					//$insert = "UPDATE aboutus_header set image='$file_name' where id='1'";
					$insert = "INSERT INTO aboutus_header (image) VALUES('$file_name') ";
					
					$result=mysql_query($insert) or die("cannot execute query".mysql_error().$insert);
					if($result) 
					{
						$arr[] = 'Image Uploaded Successfully.';
						$flag = true;
		
						if($flag) 
						{
						$_SESSION['arr'] = $arr;
						session_write_close();
						header("location:flash.php");
						exit();
						}
					}
					else{   die("Query failed"); }
				 }
				 else{	$error="Cannot upload picture"; }
			 }
			 else{	$error="extension not allowed"; }	
		}
		else
		{
					
		$arr[] = 'INVALID IMAGE';
		$flag = true;
		
		if($flag) {
		$_SESSION['arr'] = $arr;
		session_write_close();
		header("location: flash.php");
		exit();
	}
	}

	}
//-----------------DELETING HEADER IMAGE--------------------------------------------------------------------------------
if(isset($_REQUEST['delheader']))
	{
			$id=$_REQUEST['delheader'];
			$imagename = "../images/aboutus/".$_REQUEST['imgname'];
			unlink($imagename);		
			$insert = "DELETE FROM aboutus_header where id='$id'";
					
					$result=mysql_query($insert) or die("cannot execute query".mysql_error().$insert);
					if($result) 
					{
						$arrh1[] = 'Image Deleted From Database Please manually delete image from aboutus folder.';
						$flag = true;
		
						if($flag) 
						{
						$_SESSION['arr'] = $arrh1;
						session_write_close();
						header("location:flash.php");
						exit();
						}
					}
					else
					{
						die("Query failed");
					}
	}		

?>