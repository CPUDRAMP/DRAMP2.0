// JavaScript Document
function ini(){
	document.getElementById('fm_ssearch').style.display='none';
	document.getElementById('fm_hmmpfam').style.display='none';
}


function tag_change(id1,id2,id3)
{ 
	var elem1=document.getElementById(id1);
	elem1.style.display="block";
	var elem2=document.getElementById(id2);
	var elem3=document.getElementById(id3);	
	elem2.style.display="none";
	elem3.style.display="none";
	
}