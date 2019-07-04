<?php
header("Content-Type: text/html; charset=utf-8");

require_once("nusoap/lib/nusoap.php");

$weburl="http://127.0.0.1/php-nusoap/several.php";

$client=new soapclient($weburl);

$err = $client->getError();

if($err)
{
echo $err."<br>";exit();
}
else
{
	$custA['data']['key_val']='IS25R1AGHB'; 
	$custA['data']['start'] = 0;
	$custA['data']['num'] = 10;
	$result = $client->call('get_cust_info',$custA);
	
	print_r($client->response);
	
	return $result;

}







$str=$client->call('hello');

if(!$err=$client->getError()){
	echo "程序返回:",htmlentities($str,ENT_QUOTES);

}else{
	echo "错误：",htmlentities($err,ENT_QUOTES);
}
