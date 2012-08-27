<?php
include_once './../connection.php';
session_start();

$id=$_REQUEST["cid"];
$query = "select * from contacts where id = ".$id;
$rs = mysql_query($query);
$row = mysql_fetch_assoc($rs);
?>


<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
    <tr>
		<td>&nbsp;
        
        </td>
    </tr>
    <tr>
		<td>&nbsp;
        
        </td>
    </tr>
    <tr>
		<td>
        <table border="1" bordercolor="#D21310" width="60%" cellpadding="0" style="border-collapse: collapse" align="center">
        	<tr>
            	<td>
                 <form id="ansForm" name="ansForm" action="query_process_save.php" method="post">
                 <input type="hidden" id="hidid" name="hidid" value="<?php echo $id; ?>"/> 
       			 <input type="hidden" id="hidrecstart" name="hidrecstart" value="<?php echo $_REQUEST["rec_start"]; ?>"/>
                <table border="0" align="center" width="81%" cellpadding="0" style="border-collapse: collapse">
                <tr>
                	<td width="13%">&nbsp;</td>
                  	<td width="8%">&nbsp;</td>
               	  <td width="79%">&nbsp;</td>
                </tr>
            
                <tr>
                	<td>Query</td>
                    <td>:</td>
                    <td><?php echo $row['query'];?>
                    </td>
                </tr>
                
                <tr>
                	<td>Answer</td>
                    <td>:</td>
                    <td><textarea id="ans" name="ans" validation="Required$Please Write Answer$'../images/Validation/default.png'" onFocus="EnableTip(this,'textarea',0);" onBlur="DisableTip(this,'textarea');" valGroup="1" cols="50" rows="3" style="width:400px;" class="textareasize" ></textarea>
                        <div id="ans_div" class="hint"></div></td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="3" align="center">
                    <input type="button" name="btnadd" id="btnadd" value="Send" onClick="sendSubmit(ansForm,1);"/>
          &nbsp;&nbsp;&nbsp;
                    <input type="button" name="back" value="Back" id="back" onClick="divswitch('query.php','1')">
                   
                    </td>				
                </tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                </table>
                </form>
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>
      