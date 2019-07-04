<?php

header("Content-Type: text/html,charset=utf-8");

include_once "nusoap/lib/nusoap.php";

$server=new soap_server();

$server->configureWSDL('WebService','urn:wsdl');

$server->soap_defencoding = 'utf-8';

$server->register('search_user_info',
	array('custA' => 'xsd:array'),
	array('return' => 'xsd:string'),
	' ',' ','rpc','encoded','接口函数描述'
	);

function search_user_info($custA)
{
	return $string;

}

$HTTP_RAW_POST_DATA=isset($HTTP_RAW_POST_DATA)?$HTTP_RAW_POST_DATA:' ';

$server->service($HTTP_RAW_POST_DATA);

?>


