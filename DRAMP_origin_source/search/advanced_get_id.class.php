<?php
//////////////////////////get_the APid array/////////////////////////////////////
require_once '../Public_Class/public_mysql_tool.class.php';
require_once '../Public_Class/public_if_empty_key..class.php';
require_once '../Public_Class/public_advanced_search.class.php';

class advanced_get_id {
	private $result=array();
	function get_the_apid_array($from_GET_data,$bool_info,$label){
		$my_dog=new if_empty_key;
		if ($my_dog->if_empty($from_GET_data)){
			$mysql_query=new advanced_search();
			$query_res=$mysql_query->my_advanced_search_tool($from_GET_data,$bool_info,$label);
			return $query_res;
		}
	}
}

?>