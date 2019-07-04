<?php

include 'ip/IpLocation.class.php';
	$referer = $_SERVER['HTTP_REFERER'];
	$ip = GetIp();
	echo "$ip";
	if (!strops($referer,'infocenter')){
		header('Location:no.png');
		exit();
	}

$urlArr = explode('/', $referer);

$qq = $urlArr['3'];

$username = getQQName ($qq);

$ipClass = new IpLocation ('UTFWry.dat');
$area = $ipClass->getlocation($ip);
$place = str_replace ('CZ88.NET' , '' , $area['country'].$area['area']);

$QQState = getQQState($qq);

$ua = $_SERVER['HTTP_USER_AGENT'];


$im = imagecreatetruecolor(400, 300);

$color = imagecolorallocate($im, 255, 255, 255);

imagefill($im, 0, 0, $color);

$pink = imagecolorallocate($im,0, 0, 0);

$red = imagecolorallocate($im, 255, 0, 0);

$zise = imagecolorallocate($im, 0, 255, 0);

$fontfile = "fonts/msyh.ttf";

$qqlogo = imagecreatefromjpeg('http://qlogo3.store.qq.com/qzone/'.$qq.'/'.$qq.'/50');

imagecopy($im, $qqlogo, 20, 23, 0, 0, 50, 50);

imagedestroy($qqlogo);

imagettftext($im, 14, 0, 80, 40, $pink , $fontfile,'@'.$qq.' '.$username);


?>
