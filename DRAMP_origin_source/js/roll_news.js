// JavaScript Document 
var speed=65;
function Marquee1(){ 
 var FGDemo=document.getElementById('demo');
 var FGDemo1=document.getElementById('demo1');
 var FGDemo2=document.getElementById('demo2');
 FGDemo2.innerHTML=FGDemo1.innerHTML;
 if(FGDemo2.offsetHeight-FGDemo.scrollTop<=0)
 {
	 FGDemo.scrollTop-=FGDemo1.offsetHeight;
 }
 else
 {
    FGDemo.scrollTop++;
 }
}
var FGDemo=document.getElementById('demo');
 var MyMar1=setInterval(Marquee1,speed);
 FGDemo.onmouseover=function() {clearInterval(MyMar1)};
 FGDemo.onmouseout=function() {MyMar1=setInterval(Marquee1,speed)};
_uacct = "UA-152060-1";
urchinTracker();
function clear_marquee()  {clearInterval(MyMar1)};
function continue_marquee() {MyMar1=setInterval(Marquee1,speed)};