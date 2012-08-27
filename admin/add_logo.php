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
				if(move_uploaded_file($_FILES['image1']['tmp_name'],"../images/logo/".$file_name))
				{						
					//$insert = "UPDATE aboutus_header set image='$file_name' where id='1'";
					$insert = "INSERT INTO logo (image) VALUES('$file_name') ";
					
					$result=mysql_query($insert) or die("cannot execute query".mysql_error().$insert);
					if($result) 
					{
						$arr[] = 'Logo Uploaded Successfully.';
						$flag = true;
		
						if($flag) 
						{
						$_SESSION['arr'] = $arr;
						session_write_close();
						header("location:logo.php");
						exit();
						}
					}
					else{   die("Query failed"); }
				 }
				 else{	$error="Cannot upload logo"; }
			 }
			 else{	$error="extension not allowed"; }	
		}
		else
		{
					
		$arr[] = 'INVALID Logo IMAGE';
		$flag = true;
		
		if($flag) {
		$_SESSION['arr'] = $arr;
		session_write_close();
		header("location: logo.php");
		exit();
	}
	}

	}
//-----------------DELETING HEADER IMAGE--------------------------------------------------------------------------------
if(isset($_REQUEST['delheader']))
	{
			$id=$_REQUEST['delheader'];
			$imagename = "../images/logo/".$_REQUEST['imgname'];
			unlink($imagename);		
			$insert = "DELETE FROM logo where id='$id'";
					
					$result=mysql_query($insert) or die("cannot execute query".mysql_error().$insert);
					if($result) 
					{
						$arrh1[] = 'Logo Deleted From Database .';
						$flag = true;
		
						if($flag) 
						{
						$_SESSION['arr'] = $arrh1;
						session_write_close();
						header("location:logo.php");
						exit();
						}
					}
					else
					{
						die("Query failed");
					}
	}		

?>