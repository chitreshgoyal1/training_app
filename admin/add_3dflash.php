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
			$heading = $_REQUEST['heading'];
			$tag_line = $_REQUEST['tag_line'];
			$description = $_REQUEST['description'];
			if($_FILES['image1']['type']=="image/jpeg")
			{
				if(move_uploaded_file($_FILES['image1']['tmp_name'],"../images/sliders/".$file_name))
				{						
					//$insert = "UPDATE 3dflash set image='$file_name' where id='1'";
					$insert = "INSERT INTO 3dflash (image,heading,tag_line,description) VALUES('$file_name','$heading','$tag_line','$description') ";
					
					$result=mysql_query($insert) or die("cannot execute query".mysql_error().$insert);
					if($result) 
					{
						$arr[] = 'Image Uploaded Successfully.';
						$flag = true;
		
						if($flag) 
						{
						$_SESSION['arr'] = $arr;
						session_write_close();
						header("location:3dflash.php");
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
		header("location:3dflash.php");
		exit();
	}
	}

	}
//-----------------DELETING HEADER IMAGE--------------------------------------------------------------------------------
if(isset($_REQUEST['delheader']))
	{
			$id=$_REQUEST['delheader'];
			$imagename = "../images/sliders/".$_REQUEST['imgname'];
			unlink($imagename);		
			$insert = "DELETE FROM 3dflash where id='$id'";
					
					$result=mysql_query($insert) or die("cannot execute query".mysql_error().$insert);
					if($result) 
					{
						$arrh1[] = 'Image Deleted From Database.';
						$flag = true;
		
						if($flag) 
						{
						$_SESSION['arr'] = $arrh1;
						session_write_close();
						header("location:3dflash.php");
						exit();
						}
					}
					else
					{
						die("Query failed");
					}
	}		

?>