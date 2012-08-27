// JavaScript Document

function addCategory1(pname,Id)
{
	document.getElementById("divTable").style.display="none";
		var recstart="";
		var cat_name=document.getElementById("state").value;
		if(document.getElementById("rec_start"))
		{
			recstart=document.getElementById("rec_start").value;
		}
		divswitch(pname,"cat_name="+cat_name+"&rec_start="+recstart+"&cid="+Id)
}

function addCategory(pname,Id)
{
	document.getElementById("divTable").style.display="none";
	divswitch(pname,"cid="+Id)
}

function addNews(pname,Id)
{
	document.getElementById("divTable").style.display="none";
	divswitch(pname,"cid="+Id)
}


function addReview(pname,Id)
{
	document.getElementById("divTable").style.display="none";
	divswitch(pname,"cid="+Id)
}

function divswitch(pname,searchId)
{
	if(searchId!=1)
	{
	document.getElementById("divAdd").style.display="block";
	ajxAdd(pname,searchId)
	}
	else
	{
	document.getElementById("divTable").style.display="block";
	document.getElementById("divAdd").style.display="none";
	}
}

function ajxAdd(pname,searchId)
{
	
	document.getElementById("divTable").style.display="none";
	document.getElementById("divAdd").style.display="block";
	document.getElementById("divAdd").innerHTML="<img src='images/loading.gif'>";
	var ajaxConn = new XHConn();
	var siteUrl=window.location.href;
	siteUrl=siteUrl.substring(0,siteUrl.lastIndexOf('/'))+"/";
	ajaxConn.connect(siteUrl+pname, "POST", searchId,fnWhenDone_Add);
}
function fnWhenDone_Add(XML)
{
	document.getElementById("divAdd").innerHTML=XML.responseText;
}

function addCatSubmit()
{	
	document.catForm.submit();
}

function addfpSubmit()
{	
	document.fpForm.submit();
}

function addhSubmit()
{	
	document.hForm.submit();
}


function addspSubmit()
{	
	document.spForm.submit();
}

function addnpSubmit()
{	
	document.npForm.submit();
}


function ajxSearch(pname,searchId)
{
	document.getElementById("divResult").innerHTML="<img src='images/loading.gif' />";
	var ajaxConn = new XHConn();
	var siteUrl=window.location.href;
	siteUrl=siteUrl.substring(0,siteUrl.lastIndexOf('/'))+"/";
	ajaxConn.connect(siteUrl+pname, "POST", searchId,fnWhenDone_x);
}
function fnWhenDone_x(XML)
{
	//alert(XML.responseText);
	document.getElementById("divResult").innerHTML=XML.responseText;
}

function txtnavigate(pagename,qstr,recinpage,totpage,pagenow)
{
	gotopage = document.getElementById('txtpno').value;
	if (gotopage > totpage || gotopage <= 0)
	{
		document.getElementById('txtpno').value = pagenow;
	}
	else
	{
		rstart = (gotopage * recinpage) - recinpage;
		ajxSearch(pagename,qstr+rstart);
	}
}

function catformSearch(pagename)
{
		var state=document.getElementById("state").value;
		ajxSearch(pagename,"cat_name="+state+"&rec_start=0");
}

function submitContact()
{
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	var elem=document.getElementById("email");
	if(document.getElementById('fname').value=="")
	{
		alert("Please Enter Your First Name");
	}
	else if(document.getElementById('lname').value=="")
	{
		alert("Please Enter Your Last Name");
	}
	else if(document.getElementById('query').value=="")
	{
		alert("Please Enter Your Question");
	}
	else
	{
		document.contactForm.submit();
	}
}

function submitComment()
{
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	var elem=document.getElementById("email");
	if(document.getElementById('name').value=="")
	{
		alert("Please Enter Your Name");
	}
	else if(!elem.value.match(emailExp))
	{
		alert("Please Enter Your Email in correct Format");
	}
	else if(document.getElementById('msg').value=="")
	{
		alert("Please Enter Your Comment");
	}
	else
	{
		document.commentForm.submit();
	}
}

function addBlog()
{
	if(document.getElementById('title').value=="")
	{
		alert("Please Enter Title");
	}
	else if(document.getElementById('description').value=="")
	{
		alert("Please Enter Description");
	}
	else
	{
		document.reviewForm.submit();
	}
}

function addComment()
{
	if(document.getElementById('description').value=="")
	{
		alert("Please Enter Description");
	}
	else
	{
		if(confirm("Do You want to suere approve?"))
		{
			document.commentForm.submit();
		}
	}
}

function opennewsletter(pname){
	//var ppid = pid;
	//alert(ppid);
	emailwindow=dhtmlmodal.open('EmailBox', 'iframe', pname, 'Details', 'width=600px,height=450px,center=1,resize=0,scrolling=1')

emailwindow.onclose=function(){ //Define custom code to run when window is closed
	var theform=this.contentDoc.forms[0] //Access first form inside iframe just for your reference
	var theemail=this.contentDoc.getElementById("emailfield") //Access form field with id="emailfield" inside iframe
	if (theemail.value.indexOf("@")==-1){ //crude check for invalid email
		alert("Please enter a valid email address")
		return false //cancel closing of modal window
	}
	else{ //else if this is a valid email
		document.getElementById("youremail").innerHTML=theemail.value //Assign the email to a span on the page
		return true //allow closing of window
	}
}
} //End "opennewsletter" function