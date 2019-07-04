<?php
// this is for literature 

	require_once 'public_mysql_tool.class.php';
	class public_literature_search_tool {
		private $mysql_link;
		private $literature;
		private $result;
		
		function literature_Search_tool($keyword_quick) {
			// 			echo $keyword_quick;
			$this->mysql_link="SELECT RDAMP_ID FROM literature WHERE Pubmed_ID  LIKE '%$keyword_quick%' or  Reference LIKE '%$keyword_quick%' or  Author  LIKE '%$keyword_quick%' or  Title  LIKE '%$keyword_quick%'";
		
			$this->literature=new public_mysql_tool();
		
			$this->result=$this->literature -> execute_dql($this->mysql_link);
			
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
			
			// 			echo $result;
			mysql_free_result($result);
		}		
	}

?>