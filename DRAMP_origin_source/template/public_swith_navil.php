<?php
$my_url=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];

$fengyepage=new Fengyepage();
if (!empty($_GET['pageNow'])) {
	$fengyepage->pageNow=$_GET['pageNow'];
}else{
	$fengyepage->pagenow=1;
}

if (!empty($_GET['begin'])){
	$begin=$_GET['begin'];
}else{
	$begin=1;
}

if (!empty($_GET['end'])){
	$end=$_GET['end'];
}else{
	$end=5;
}

	if($fengyepage->pageNow >= $end){
		$begin=$fengyepage->pageNow;
		$end=$fengyepage->pageNow+4;
	}else{
			if($begin >= $fengyepage->pageNow && $fengyepage->pageNow !=1 ){
			$end=$fengyepage->pageNow;
				if($fengyepage->pageNow-4 >0){
					$begin=$fengyepage->pageNow-4;
				}else{
					$begin=1;
				}
			}
}
	
$fengyepage->pagesize=10;
$empService=new EmpService();
$empService->GETFenyepage($query_mysql_one,$query_mysql_two,$fengyepage);



?>