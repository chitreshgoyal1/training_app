if (typeof window.event != 'undefined')
document.onkeydown = function()
{
	if (event.srcElement.tagName.toUpperCase() != 'INPUT' && event.srcElement.tagName.toUpperCase() != 'TEXTAREA')
		return (event.keyCode != 8);
	else
	{
		if(event.srcElement.readOnly || event.srcElement.disabled)
			return (event.keyCode != 8);
	}
}
else
document.onkeypress = function(e)
{
	if (e.target.nodeName.toUpperCase() != 'INPUT' && e.target.nodeName.toUpperCase() != 'TEXTAREA')
		return (e.keyCode != 8);
	else
	{
		if(e.target.readOnly || e.target.disabled)
			return (e.keyCode != 8);
	}
}
	
	
function XHConn()
{
  var xmlhttp, bComplete = false;
  try { xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); }
  catch (e) { try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
  catch (e) { try { xmlhttp = new XMLHttpRequest(); }
  catch (e) { xmlhttp = false; }}}
  if (!xmlhttp) return null;
  this.connect = function(sURL, sMethod, sVars, fnDone)
  {
    if (!xmlhttp) return false;
    bComplete = false;
    sMethod = sMethod.toUpperCase();
    try {
      if (sMethod == "GET")
      {
        xmlhttp.open(sMethod, sURL+"?"+sVars, true);
        sVars = "";
      }
      else
      {
        xmlhttp.open(sMethod, sURL, true);
        xmlhttp.setRequestHeader("Method", "POST "+sURL+" HTTP/1.1");
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      }
      xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && !bComplete)
        {
          bComplete = true;
          fnDone(xmlhttp);
        }};
      xmlhttp.send(sVars);
    }
    catch(z) { return false; }
    return true;
  };
  return this;
}

function getObjCommon(objID) 
{
	if (document.getElementById)
	{
		if (document.getElementById(objID)==null)
			return window.parent.document.getElementById(objID);			
		
		return document.getElementById(objID)
	}
	else if (document.all)
	{
		if (document.all(objID)==null)
			return window.parent.document.all[objID];
		
		return document.all[objID];
	}
	else if (document.layers)
	{
		if (document.layers(objID)==null)
			return window.parent.document.layers[objID];
		
		return document.layers[objID];
	}
}

function getObj(objID) 
{
	if (document.getElementById)
	{
		if (document.getElementById(objID)==null)
			return window.parent.document.getElementById(objID);			
		
		return document.getElementById(objID)
	}
	else if (document.all)
	{
		if (document.all(objID)==null)
			return window.parent.document.all[objID];
		
		return document.all[objID];
	}
	else if (document.layers)
	{
		if (document.layers(objID)==null)
			return window.parent.document.layers[objID];
		
		return document.layers[objID];
	}
}
	
//For Enter Button

function enterSubmit()
{   
    var DisableSubmitButtonID = eval("getObjCommon('DisableSubmitButtonID').value");
    
    if(DisableSubmitButtonID != '0')
    {   
        var id = eval("getObjCommon('SubmitButtonID').value");
		
        if(id=="")
        {
            return;
        }
        else
        {
            if(id.indexOf(',') !=-1)
            {
                var obtnId = new Array();
                obtnId = id.split(',');
                for(i=0; i<obtnId.length;i++)
                {
                    if(getObjCommon(obtnId[i]))
                    {
                       getObjCommon(obtnId[i]).focus();                     
                    }
                } 
            }
            else
            {
//                getObjCommon(id).onClick=document.login.submit();
                getObjCommon(id).onclick();
            } 
         }
    }
}

function disableSubmit()
{		
    getObjCommon('DisableSubmitButtonID').value="0";    
}

function enableSubmit()
{
    getObjCommon('DisableSubmitButtonID').value="1";
}


function extractNumber(obj, decimalPlaces, allowNegative)
{
	var temp = obj.value;
	

	// avoid changing things if already formatted correctly
	var reg0Str = '[0-9]*';
	if (decimalPlaces > 0) {
		reg0Str += '\\.?[0-9]{0,' + decimalPlaces + '}';
		
	} else if (decimalPlaces < 0) {
		reg0Str += '\\.?[0-9]*';
	}
	reg0Str = allowNegative ? '^-?' + reg0Str : '^' + reg0Str;
	reg0Str = reg0Str + '$';
	var reg0 = new RegExp(reg0Str);
	if (reg0.test(temp)) return true;

	// first replace all non numbers
	var reg1Str = '[^0-9' + (decimalPlaces != 0 ? '.' : '') + (allowNegative ? '-' : '') + ']';
	var reg1 = new RegExp(reg1Str, 'g');
	temp = temp.replace(reg1, '');

	if (allowNegative) {
		// replace extra negative
		var hasNegative = temp.length > 0 && temp.charAt(0) == '-';
		var reg2 = /-/g;
		temp = temp.replace(reg2, '');
		if (hasNegative) temp = '-' + temp;
	}
	
	if (decimalPlaces != 0) {
		var reg3 = /\./g;
		var reg3Array = reg3.exec(temp);
		if (reg3Array != null) {
			// keep only first occurrence of .
			//  and the number of places specified by decimalPlaces or the entire string if decimalPlaces < 0
			var reg3Right = temp.substring(reg3Array.index + reg3Array[0].length);
			reg3Right = reg3Right.replace(reg3, '');
			reg3Right = decimalPlaces > 0 ? reg3Right.substring(0, decimalPlaces) : reg3Right;
			temp = temp.substring(0,reg3Array.index) + '.' + reg3Right;
		}
	}
	
	obj.value = temp;
}
function blockNonNumbers(obj, e, allowDecimal, allowNegative)
{
    //alert(e.keyCode);
	var key;
	var isCtrl = false;
	var keychar;
	var reg;
		

	if(window.event) {
		key = e.keyCode;
		isCtrl = window.event.ctrlKey
	}
	else if(e.which) {
		key = e.which;
		isCtrl = e.ctrlKey;
	}
	
	if (isNaN(key)) return true;
	
	keychar = String.fromCharCode(key);
	
	// check for backspace or delete, or if Ctrl was pressed
	if (key == 8 || isCtrl)
	{
		return true;
	}

	reg = /\d/;
	var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
	var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;
	
	return isFirstN || isFirstD || reg.test(keychar);
}

function ContactNumbers(obj, e, allowDecimal, allowNegative)
{
    //alert(e.keyCode);
	var key;
	var isCtrl = false;
	var keychar;
	var reg;
		

	if(window.event) {
		key = e.keyCode;
		isCtrl = window.event.ctrlKey
	}
	else if(e.which) {
		key = e.which;
		isCtrl = e.ctrlKey;
	}
	
	if (isNaN(key)) return true;
	
	keychar = String.fromCharCode(key);
	
	// check for backspace or delete, or if Ctrl was pressed
	if (key == 8 || isCtrl || key == 43 || key == 45)
	{
		return true;
	}

	reg = /\d/;
	var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
	var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;
	
	return isFirstN || isFirstD || reg.test(keychar);
}

//To stop right click behaviour in textbox
var diablepastemessage="";
function rightClickDisable()
{
    if (this.layers)
    {
        this.captureEvents(Event.MOUSEDOWN);
        this.onmousedown=clickNS;
    }
    else
    {
        this.onmouseup=clickNS;
        this.oncontextmenu=clickIE;
    }
    this.oncontextmenu=new Function("return false");

}
function clickIE()
{
    if (this.all)
    {
        (diablepastemessage);
        return false;
    }
}
 
function clickNS(e)
{
    if(this.layers||(this.getElementById&&!this.all))
    {
        if (e.which==2||e.which==3)
        {
            (diablepastemessage);
            return false;
        }
    }    
}

//To enable right click, after blur out from textbox
function rightClickEnable()
{
    if (this.layers)
    {
        this.captureEvents(Event.MOUSEDOWN);
        this.onmousedown=true;
    }
    else
    {
        this.onmouseup=true;
        this.oncontextmenu=true;
    }

    this.oncontextmenu=new Function("return true");
}

function txtnavigate(pageid,qstr,recinpage,totpage,pagenow)
{
	gotopage = getObjCommon('txtpno').value;
	if (gotopage > totpage || gotopage <= 0)
	{
		getObjCommon('txtpno').value = pagenow;
	}
	else
	{
		rstart = (gotopage * recinpage) - recinpage;
		if(pageid==1)
			ajxWinPlanSearch('rd_mywinplanResult.php',qstr+rstart);
		if(pageid==2)
			ajxSearch('adminnews.php',qstr+rstart);
		if(pageid==3)
			ajxSearch('adminuser.php',qstr+rstart);
		if(pageid==4)
			ajxFTRSearchNew('ftsearchResult.php',qstr+rstart);
		if(pageid==5)
			ajxTreeSearchNew('mysocResult.php',qstr+rstart);
		if(pageid==6)
			ajaxNewsSearch('rd_adminnews.php',qstr+rstart);
		if(pageid==7)
			ajxDocGenSearch('rd_docgenResult.php',qstr+rstart);
		if(pageid==8)
			rd_ajxSearch('rd_exampleResult.php',qstr+rstart);
		if(pageid==9)
			rd_ajxFTRSearch(qstr+rstart);
		if(pageid==10)
			getCaptText(qstr,rstart);
		if(pageid==11)
			changeKeyMsgText(rstart);
		if(pageid==12)
			ajxUser_ShowMsgGen('rd_msggen.php',qstr+rstart);
		if(pageid==13)
			ajxUser_MsgGen('rd_msggenerator.php',qstr+rstart);
		if(pageid==14)
			ajxMsgGenSearch('rd_msggenResult.php',qstr+rstart);
		if(pageid==15)
			ajxMsgMgmtSearch('rd_msgmgmtResult.php',qstr+rstart);
		if(pageid==16)
			ajxmyMsgSearch('rd_mymsgResult.php',qstr+rstart);
		if(pageid==17)
			rd_ajxSearch('rd_searchResult.php',qstr+rstart);
		if(pageid==18)
			rd_ajxSearch('rd_up_searchResult.php',qstr+rstart);
		if(pageid==19)
			ajxUpWinPlanSearch('rd_upwinplanResult.php',qstr+rstart);
		if(pageid==20)
			ajxTreeSearchNew('searchResult.php',qstr+rstart);
		if(pageid==21)
			ajxTreeSearchNew('socmgmtResult.php',qstr+rstart);
		if(pageid==22)
			ajxTreeSearchNew('validateResult.php',qstr+rstart);
		if(pageid==23)
			ajaxNewsSearch('rd_updkmmresult.php',qstr+rstart);
		if(pageid==24)
			ajaxNewsSearch('rd_introsummresult.php',qstr+rstart);
		if(pageid==25)
			ajxUpxls('uploadxls_succ_result.php',qstr+rstart);

	}
}

function chkLanguage()
{
	var newLang=getObjCommon("txtlanguage").value;
	for(k=0;k<getObjCommon("languagemaster").options.length;k++)
	{
		if(newLang.toLowerCase()==getObjCommon("languagemaster").options[k].text.toLowerCase())
		{
			return false;
		}
		else
			getObjCommon("divlangchk").style.display="none";
	}
	return true;
}


function rd_preloadImages(rd_language,rd_imageNumber) 
{

	
	var rd_menu="rd_userhome,rd_winplan,rd_search,rd_newreq,rd_masters,rd_admin,rd_profile,rd_logout";
	
	var rd_subMenu="rd_newwinplan,rd_my_win_plan,rd_up_winplan,rd_upd_winplan,rd_treeview,rd_freetextsearch,rd_gen_info,rd_msg_editor,rd_intro_text,rd_sum_text,rd_up_date,rd_user_mgmt,rd_reports,rd_welcome_page,rd_tool_mgmt,rd_path,rd_my_profile,rd_change_pass,rd_best_prac_ex";
	
	var rd_button="rd_add,rd_save,rd_pend_win_plan,rd_finl_win_plan,rd_arc_win_plan,rd_finalize,rd_delete,rd_back,rd_add_new,rd_close,rd_deactive,rd_active,rd_manage,rd_edit,rd_search,rd_update,rd_change_pass,rd_next,rd_cancel,rd_req_ex_summ,rd_create,rd_create_folder,rd_upload,rd_view,rd_generate";
	
	var rd_menu_arr=new Array();
	var rd_subMenu_arr=new Array();
	var rd_button_arr=new Array();
	
	rd_menu_arr=rd_menu.split(','); 
	rd_subMenu_arr=rd_subMenu.split(','); 
	rd_button_arr=rd_button.split(','); 
	
	for(var i = 0; i < rd_menu_arr.length; i++)
	{       
		var rd_imageMenu = new Image();                    
		rd_imageMenu.src ="Language/"+rd_language+"/btn-"+rd_menu_arr[i]+"_"+rd_imageNumber+"-off.jpg";
		rd_imageMenu.src ="Language/"+rd_language+"/btn-"+rd_menu_arr[i]+"_"+rd_imageNumber+"-on.jpg";
		rd_imageMenu.src ="Language/"+rd_language+"/btn-"+rd_menu_arr[i]+"_"+rd_imageNumber+"-over.jpg";
	}
	
	for(var j = 0; j < rd_subMenu_arr.length; j++)
	{       
		var rd_imageSubMenu = new Image();                    
		rd_imageSubMenu.src ="Language/"+rd_language+"/btn-"+rd_subMenu_arr[j]+"_"+rd_imageNumber+"-off.jpg";
		rd_imageSubMenu.src ="Language/"+rd_language+"/btn-"+rd_subMenu_arr[j]+"_"+rd_imageNumber+"-on.jpg";
		rd_imageSubMenu.src ="Language/"+rd_language+"/btn-"+rd_subMenu_arr[j]+"_"+rd_imageNumber+"-over.jpg";
	}
	
	for(var k = 0; k < rd_button_arr.length; k++)
	{       
		var rd_imageButton = new Image();                    
		rd_imageButton.src ="Language/"+rd_language+"/btn-"+rd_imageNumber+"_"+rd_button_arr[k]+".jpg";
		rd_imageButton.src ="Language/"+rd_language+"/btn-"+rd_imageNumber+"_"+rd_button_arr[k]+"-o.jpg";
	}
}

function soc_preloadImages(soc_language,soc_imageNumber) 
{

	
	var soc_menu="userhome,soc,search,admin,profile,logout";
	
	var soc_subMenu="add,validate,reports,socreports,mysoc,treeview,free_text_search,user-management,masters,soc-management,language-management,myprofile,changepassword";
	
	var soc_button="add,addmore,validator-search,save,close,validate,reject,back,delete,ftsearch,deactivate,activate,archive,edit,update,manage,reset-password,changepassword,send-comment,reset";
	
	var soc_menu_arr=new Array();
	var soc_subMenu_arr=new Array();
	var soc_button_arr=new Array();
	
	soc_menu_arr=soc_menu.split(','); 
	soc_subMenu_arr=soc_subMenu.split(','); 
	soc_button_arr=soc_button.split(','); 
	
	for(var i = 0; i < soc_menu_arr.length; i++)
	{       
		var soc_imageMenu = new Image();                    
		soc_imageMenu.src ="Language/"+soc_language+"/btn-"+soc_menu_arr[i]+"_"+soc_imageNumber+"-off.jpg";
		soc_imageMenu.src ="Language/"+soc_language+"/btn-"+soc_menu_arr[i]+"_"+soc_imageNumber+"-on.jpg";
		soc_imageMenu.src ="Language/"+soc_language+"/btn-"+soc_menu_arr[i]+"_"+soc_imageNumber+"-over.jpg";
	}
	
	for(var j = 0; j < soc_subMenu_arr.length; j++)
	{       
		var soc_imageSubMenu = new Image();                    
		soc_imageSubMenu.src ="Language/"+soc_language+"/btn-"+soc_subMenu_arr[j]+"_"+soc_imageNumber+"-off.jpg";
		soc_imageSubMenu.src ="Language/"+soc_language+"/btn-"+soc_subMenu_arr[j]+"_"+soc_imageNumber+"-on.jpg";
		soc_imageSubMenu.src ="Language/"+soc_language+"/btn-"+soc_subMenu_arr[j]+"_"+soc_imageNumber+"-over.jpg";
	}
	
	for(var k = 0; k < soc_button_arr.length; k++)
	{       
		var soc_imageButton = new Image();                    
		soc_imageButton.src ="Language/"+soc_language+"/btn-"+soc_imageNumber+"_"+soc_button_arr[k]+".jpg";
		soc_imageButton.src ="Language/"+soc_language+"/btn-"+soc_imageNumber+"_"+soc_button_arr[k]+"-o.jpg";
	}
}



function strReplaceAll(strReplace,replceFromValue,replceByValue)
{
	var arrReplace=strReplace.split(replceFromValue);
	var replaceText="";
		
	for(var m=0;m<=arrReplace.length-1;m++)
	{
		if(m!=(arrReplace.length-1))
			replaceText+=arrReplace[m]+replceByValue;
		else
			replaceText+=arrReplace[m];
	}
	
	return replaceText;	
}


// Function getFormElement is use for get all form element.
function replaceFormElementText(formName)
{
    var elements=formName.elements; 
    
	for (var i=0; i<elements.length; i++)
	{ 
		if(elements[i].type == "text" || elements[i].type=="textarea" || elements[i].type=="hidden")
		{//alert(getObjCommon(elements[i].id).value)
			getObjCommon(elements[i].id).value=strReplaceAll(getObjCommon(elements[i].id).value,'"','\"');//alert(getObjCommon(elements[i].id).value)
		}
	}
}

var closeImg = new Image();                    
closeImg.src ="images/close.jpg";

function nsn_htmlentities(str)
{
	str=strReplaceAll(str,">","&gt;");
	str=strReplaceAll(str,"<","&lt;");
	//str=strReplaceAll(str,"'","\'");
	return str;
}
function nsn_htmlcotes(str)
{
	str=strReplaceAll(str,"\"","&quot;");
	str=strReplaceAll(str,">","&gt;");
	str=strReplaceAll(str,"<","&lt;");
	return str;
}