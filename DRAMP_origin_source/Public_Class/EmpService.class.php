<?php

require_once 'public_mysql_tool.class.php';
require_once 'Fengyepage.class.php';

class EmpService {
	
	function getFenyepage($query_mysql_one,$query_mysql_two,$fengyePage){
		$sqlHelper=new public_mysql_tool();
		//$sql1="select RDAMP_ID,Peptide_Name,Sequence FROM peptide LIMIT "
				//.($fengyePage->pageNow-1)*$fengyePage->pageSize.",".$fengyePage->pageCount;
				
		$sql1=$query_mysql_one." LIMIT ".($fengyePage->pageNow-1)*$fengyePage->pageSize.",".$fengyePage->pageSize;
		$sql2=$query_mysql_two;
		
		$sqlHelper->exectue_dql_fenye($sql1, $sql2, $fengyePage);
		
		
	}
}

?>