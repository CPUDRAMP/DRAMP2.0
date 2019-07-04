// JavaScript Document
function changeName () 
{  
    var sltId=document.getElementById('slt_loc');
	var val=sltId.options[sltId.options.selectedIndex].text;	
	var elem=document.getElementById('lb_org');
	var tr=document.getElementById('tr_hidden');
	if (val!="Any")
	{
    tr.style.display="";
	elem.innerHTML=val+" ID:";
	}
	else
	{
	tr.style.display="none";
	}
}

function eraseText (elemId)
{
      var elem=elemId.value;
	  elem=elem.substr(0,4);
	  if (elem=='e.g.') elemId.value='';
}
	
function eraseTextarea (elemId)
{
      var elem=elemId.value;
	  elem=elem.substr(30,4);
	  if (elem=='e.g.') 
	  elemId.value='';
}
	  	
	