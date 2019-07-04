<?php
//  this is for structuredata
require_once 'public_mysql_tool.class.php';

class public_structure_search_tool {
	private $mysql_link;
	private $structure;
	private $result;
	
	
	function structure_Search_tool($keyword_quick) {
		// 			echo $keyword_quick;
		$this->mysql_link="SELECT RDAMP_ID FROM structure  WHERE Structure  LIKE '%$keyword_quick%' or   PDB_ID LIKE '%$keyword_quick%' or  Structure_Description  LIKE '%$keyword_quick%'";
	
		$this->structure=new public_mysql_tool();
	
		$this->result=$this->structure -> execute_dql($this->mysql_link);
		// 			echo $result;
		
		////////////////////////////deal result//////////////////
		while ($row=mysql_fetch_row($this->result)) {
			foreach ($row as $key=>$value ){
				$res_arry[]=$value;
			}
		}
		if (!empty($res_arry)) {
			return $res_arry;
		}else {
			return "0";
		}
		mysql_free_result($this->result);
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	
}

?>