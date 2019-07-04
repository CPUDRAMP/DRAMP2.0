<?php
class advanced_search {
	private $line="";
	private $my_bool=array();
	private $my_info=array();
	
	private $result="";
	function my_advanced_search_tool($key,$bool,$lable){
		
		$this->line="";$this->result="";
		
		$this->my_bool=array();
		$this->my_info=array();
		
		$num=count($key);
		$nm=0;
		for($i=0;$i<=$num;$i++){
			if(!empty($key[$i])){
				$my_get[$nm]=$i;
				// 					$nm++;
				// 					array_push($result,$key[$i],$bool[$i]);
				$this->my_info[$nm]=$lable[$i]." LIKE "."\"%".$key[$i]."%\"";
				$this->my_bool[$nm]=$bool[$i];
				$nm++;
			}
		}
// 		if ($end="") {
// 			$my_get=array_pop($this->my_bool);
// 		}
// 		$my_get=array_pop($this->my_bool);
			
		// 			for($j=0;$j<=$nm;$j++){
		
		
		// 			}
		// 			$this->mysql_link="SLECT RDAMP_ID  FROM `general data` where";
		for ($j = 0; $j <$nm+1; $j++) {
			
			@$this->result=$this->result.$this->my_info[$j]." ".$this->my_bool[$j]." ";
		}
		
// 		@$this->result=$this->line="SELECT RDAMP_ID FROM $db_table WHERE ".$this->line.$this->my_info[$nm];
		
		return  $this->result;
	}
		
}

?>