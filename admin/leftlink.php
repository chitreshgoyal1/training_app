<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="javascript" src="list.php"></script>
<script language="javascript" type="text/javascript">

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(category) {		
		
		var strURL="findState.php?country="+category;
		var req = getXMLHTTP();
		
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
</script>

</head>

<body onLoad="fillCategory();">

  <?php include_once("../../connection.php");?>

<select id="cat" name="cat" style="width:204px;" onChange="getState(this.value)" style="width: 120px;">
<option>Select Category</option>
    <?php
	$rs = mysql_query("select * from category order by name");
	while($rw = mysql_fetch_assoc($rs))
	{
	?>
		<option value="<?php echo $rw['id'];?>" <?php
		if($row['category']==$rw['id'])
		{
			echo "selected";
		}?>
        >
		<?php echo $rw['name'];?></option>
    <?php
	}
	?>
    </select>

  <div id="statediv"><select id="np_com" name="np_com" style='width: 150px;'>
	<option>Select Subcategory</option>
        </select></div>

	</body>
</html>
