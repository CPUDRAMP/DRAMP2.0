// JavaScript Document
var lineArr=new Array();

lineArr[0]=new Array('Crystal structure of the bacteriocin LLPA from pseudomonas sp.<br /> in complex with Man alpha(1-2)Man','Garcia-Pino A,Loris R.','2013-04-01','X-RAY DIFFRACTION (2.08&Aring)','<a href="http://www.rcsb.org/pdb/explore/explore.do?structureId=4GC1">4GC1</a>','<a href="http://www.ncbi.nlm.nih.gov/pubmed/23468636">23468636</a>');

lineArr[1]=new Array('Crystal Structure of HCRA-W1266A ','Fu Z,Kroken AR,Barbieri JT,Kim J-JP.','2013-05-29','X-RAY DIFFRACTION (2.30&Aring)','<a href="http://www.rcsb.org/pdb/explore/explore.do?structureId=4IQP">4IQP</a>','<a href="http://www.ncbi.nlm.nih.gov/pubmed/23670557">23670557</a>');

lineArr[2]=new Array('Crystal Structure of Brazzein','Nagata K,Hongo N,Kameda Y,Yamamura A,<br />Sasaki H,Lee WC,Ishikawa K,Suzuki E,Tanokura M.','2013-03-27','X-RAY DIFFRACTION (1.80&Aring)','<a href="http://www.rcsb.org/pdb/explore/explore.do?structureId=4HE7">4HE7</a>','PubMed ID is not available');

lineArr[3]=new Array('Crystal structure of glycopeptide hexose oxidase DBV29 complexed with teicoplanin',' Liu YC,Li TL.','2013-05-29','X-RAY DIFFRACTION (1.93&Aring)','<a href="http://www.rcsb.org/pdb/explore/explore.do?structureId=4K3T">4K3T</a>','<a href="http://www.ncbi.nlm.nih.gov/pubmed/21478878">21478878</a>');

lineArr[4]=new Array('Crystal structure of beta-ketoacyl synthase from Brucella melitensis<br /> in complex with platencin','Seattle Structural Genomics Center <br />for Infectious Disease','2013-05-22','X-RAY DIFFRACTION (1.70&Aring)','<a href="http://www.rcsb.org/pdb/explore/explore.do?structureId=4JV3">4JV3</a>','PubMed ID is not available');


function $(id) { return document.getElementById(id); }
function addLoadEvent(func){
var oldonload = window.onload;
if (typeof window.onload != 'function') {
window.onload = func;
} else {
window.onload = function(){
oldonload();
func();
menuFix();
}
}
}

function addBtn() {
if(!$('ibanner')||!$('ibanner_pic')) return;
var picList = $('ibanner_pic').getElementsByTagName('a');
if(picList.length==0) return;
var btnBox = document.createElement('div');
btnBox.setAttribute('id','ibanner_btn');
var SpanBox ='';
for(var i=1; i<=picList.length; i++ ) {
var spanList = '<span class="normal">'+i+'</span>';
SpanBox += spanList;
}
btnBox.innerHTML = SpanBox;
$('ibanner').appendChild(btnBox);
$('ibanner').append
$('ibanner_btn').getElementsByTagName('span')[0].className = 'current';
var elem=$('ibanner_tb').getElementsByTagName('span');
for (i=0; i<elem.length; i++)
{
	elem[i].innerHTML=lineArr[0][i];
}
	
for (var m=0; m<picList.length; m++){
var attributeValue = 'picLi_'+m
picList[m].setAttribute('id',attributeValue);
}
}
function moveElement(elementID,final_x,final_y,interval) {
if (!document.getElementById) return false;
if (!document.getElementById(elementID)) return false;
var elem = document.getElementById(elementID);
if (elem.movement) {
clearTimeout(elem.movement);
}
if (!elem.style.left) {
elem.style.left = "0px";
}
if (!elem.style.top) {
elem.style.top = "0px";
}
var xpos = parseInt(elem.style.left);
var ypos = parseInt(elem.style.top);
if (xpos == final_x && ypos == final_y) {
moveing = false;
return true;
}
if (xpos < final_x) {
var dist = Math.ceil((final_x - xpos)/1);
xpos = xpos + dist;
}
if (xpos > final_x) {
var dist = Math.ceil((xpos - final_x)/1);
xpos = xpos - dist;
}
if (ypos < final_y) {
var dist = Math.ceil((final_y - ypos)/1);
ypos = ypos + dist;
}
if (ypos > final_y) {
var dist = Math.ceil((ypos - final_y)/1);
ypos = ypos - dist;
}
elem.style.left = xpos + "px";
elem.style.top = ypos + "px";
var repeat = "moveElement('"+elementID+"',"+final_x+","+final_y+","+interval+")";
elem.movement = setTimeout(repeat,interval);
}
function classNormal() {
var btnList = $('ibanner_btn').getElementsByTagName('span');
for (var i=0; i<btnList.length; i++){
btnList[i].className='normal';
}
}
function picZ() {
var picList = $('ibanner_pic').getElementsByTagName('a');
for (var i=0; i<picList.length; i++){
picList[i].style.zIndex='1';
}
}
var autoKey = false;
function iBanner() {
if(!$('ibanner')||!$('ibanner_pic')||!$('ibanner_btn')) return;
$('ibanner').onmouseover = function(){autoKey = true;};
$('ibanner').onmouseout = function(){autoKey = false};

var btnList = $('ibanner_btn').getElementsByTagName('span');
var picList = $('ibanner_pic').getElementsByTagName('a');
var elem=$('ibanner_tb').getElementsByTagName('span');
if (picList.length==1) return;
picList[0].style.zIndex='2';
for (var m=0; m<btnList.length; m++){
btnList[m].onmouseover = function() {
for(var n=0; n<btnList.length; n++) {
if (btnList[n].className == 'current') {
var currentNum = n;
}
}
classNormal();
picZ();
this.className='current';
var j=this.innerHTML;
for (i=0; i<elem.length; i++)
{
	elem[i].innerHTML=lineArr[j-1][i];
}
picList[currentNum].style.zIndex='2';
var z = this.childNodes[0].nodeValue-1;
picList[z].style.zIndex='3';
if (currentNum!=z){
picList[z].style.left='200px';
moveElement('picLi_'+z,0,0,10);
}
}
}
}
setInterval('autoBanner()', 3000);
function autoBanner() {
if(!$('ibanner')||!$('ibanner_pic')||!$('ibanner_btn')||autoKey) return;
var btnList = $('ibanner_btn').getElementsByTagName('span');
var picList = $('ibanner_pic').getElementsByTagName('a');

var elem=$('ibanner_tb').getElementsByTagName('span');
	
if (picList.length==1) return;
for(var i=0; i<btnList.length; i++) {
if (btnList[i].className == 'current') {
var currentNum = i;
}
}
if (currentNum==(picList.length-1) ){
classNormal();
picZ();
btnList[0].className='current';
for (i=0; i<elem.length; i++)
{
	elem[i].innerHTML=lineArr[0][i];
}
picList[currentNum].style.zIndex='2';
picList[0].style.zIndex='3';
picList[0].style.left='200px';
moveElement('picLi_0',0,0,10);
} else {
classNormal();
picZ();
var nextNum = currentNum+1;
btnList[nextNum].className='current';
for (i=0; i<elem.length; i++)
{
	elem[i].innerHTML=lineArr[nextNum][i];
}
	
picList[currentNum].style.zIndex='2';
picList[nextNum].style.zIndex='3';
picList[nextNum].style.left='0px';
moveElement('picLi_'+nextNum,0,0,10);
}
}
addLoadEvent(addBtn);
addLoadEvent(iBanner);



