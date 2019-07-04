<?php
// 	this is only search for geneal information    

	require_once 'public_mysql_tool.class.php';
		
	class public_geneinfo_Search_tool{
		private $mysql_link;
		private $geneinfo;
		private $result=array();
		private $info=array("RDAMP_ID","Sequence","Squence_Length","Source","Peptide_name","Gene");
		private $line;
		private $my_bool;
		private $my_info;
		
		
		
		function geneinfo_Search_tool($keyword_quick) {
// 			echo $keyword_quick;
			$this->mysql_link="SELECT RDAMP_ID from `general data` WHERE RDAMP_ID LIKE '%$keyword_quick%' or  Sequence LIKE '%$keyword_quick%' or  Squence_Length LIKE '%$keyword_quick%' or  Peptide_name LIKE '%$keyword_quick%'  or  Gene LIKE '%$keyword_quick%' or  Source  LIKE '%$keyword_quick%' or  SwissProt_ID LIKE '%$keyword_quick%' ";
		
			$this->geneinfo=new public_mysql_tool();
			
			$this->result=$this->geneinfo -> execute_dql($this->mysql_link);
			
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
// 		this is for advanced search

		function advanced_info_tool($keyl,$bool) {
			$num=count($keyl);
			$nm=0;
			for($i=0;$i<=$num;$i++){
				if(!empty($keyl[$i])){
					$my_get[$nm]=$i;
// 					$nm++;
// 					array_push($result,$keyl[$i],$bool[$i]);
					$this->my_info[$nm]=$this->info[$i]." LIKE "."\"%".$keyl[$i]."%\"";
					$this->my_bool[$nm]=$bool[$i];
					$nm++;
				}
			}
			
			$my_get=array_pop($this->my_bool);			
			
// 			for($j=0;$j<=$nm;$j++){

				
// 			}
// 			$this->mysql_link="SLECT RDAMP_ID  FROM `general data` where";
			for ($j = 0; $j <$nm; $j++) {
				@$this->line=$this->line.$this->my_info[$j]." ".$this->my_bool[$j]." ";
			}

			@$result=$this->line="SELECT RDAMP_ID FROM `general data` WHERE ".$this->line.$this->my_info[$nm];
			
			return  array($result,$my_get);
			
	
		}
	}


?>