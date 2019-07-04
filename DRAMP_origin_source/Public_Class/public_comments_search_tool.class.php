<?php
	
// 	this is for comments search 

	require_once 'public_mysql_tool.class.php';
	
	class public_comments_search_tool{
		private $mysql_link;
		private $comments;
		private $result;
		
		function comments_Search_tool($keyword_quick) {
			// 			echo $keyword_quick;
			$this->mysql_link="SELECT RDAMP_ID FROM comments  WHERE Comments  LIKE '%$keyword_quick%'";
		
			$this->comments=new public_mysql_tool();
		
			$this->result=$this->comments -> execute_dql($this->mysql_link);
			
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