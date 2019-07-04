<?php


// this is for activity quick search

	require_once 'public_mysql_tool.class.php';
	
	
	class public_activity_search_tool {
		private $mysql_link;
		private $activity;
		private $result;
		
		function activity_Search_tool($keyword_quick) {
			// 			echo $keyword_quick;
			$this->mysql_link="SELECT RDAMP_ID FROM activity  WHERE Biological_Activity  LIKE '%$keyword_quick%' or   Target_Organism LIKE '%$keyword_quick%' or  Binding_Traget LIKE '%$keyword_quick%';";
		
			$this->activity=new public_mysql_tool();
				
			$this->result=$this->activity -> execute_dql($this->mysql_link);
			// 			echo $result;
			
			while ($row=mysql_fetch_row($this->result)) {
				foreach ($row as $key=>$value ){
					$res_arry[]=$value;
				}
			}
			
			if (!empty($res_arry)) {
				return $res_arry;
			}else{
				return "0";
			}
			
			mysql_free_result($result);	
		}
		
	}

?>