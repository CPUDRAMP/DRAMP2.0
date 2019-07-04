<?php

	require_once 'Fengyepage.class.php';
	require_once 'EmpService.class.php';
	
class Paging_me{
		
		function paging($pageNow,$pageCount,$pageRowCount,$my_url,$begin,$end){
						//echo $my_url;
						//return;
						
						$prePage=1;

						$page_free=($pageNow-1)*20+1;

						echo "<div style='width:auto;float:right'>";

						if($pageNow < $pageCount){
	
						$page_char=$pageNow*20;
						
						echo "<div class='yahoo2'>Result: $page_free - $page_char of $pageRowCount</div>";
						
						}else{
						
						echo "<div class='yahoo2'>Result: $page_free - $pageRowCount of $pageRowCount</div>";
						
						}

						if($pageCount>1){
							$first=preg_replace("/&end=\d+&begin=\d+&pageNow=\d+$/","",$my_url);
							$first=$first."&end=5"."&begin=1"."&pageNow=$prePage";
							echo "<div class='yahoo2'><a href=$first >&lt;&lt; First</a></div>";
						}

						if ($pageNow>1){						
							$prePage=$pageNow-1;
							$prev=preg_replace("/&end=\d+&begin=\d+&pageNow=\d+$/","",$my_url);
							$prev=$prev."&end=$end"."&begin=$begin"."&pageNow=$prePage";
							echo "<div class='yahoo2'><a href=$prev >&lt; Prev</a></div>";
						}
						
					
					if ($pageCount >0) {
						
						if($pageNow+4 >= $pageCount){
							$end=$pageCount;
						}
					
						for ($i=$begin;$i<=$end;$i++){
								$page_lable=$i;
								$num=preg_replace("/&end=\d+&begin=\d+&pageNow=\d+$/","",$my_url);
								$num=$num."&end=$end"."&begin=$begin"."&pageNow=$page_lable";
						if ($page_lable == $pageNow){
							echo "<div class='active'><a href=$num  id=$page_lable >$page_lable</a></div>";
						}else{
							echo "<div class='yahoo2'><a href=$num  id=$page_lable >$page_lable</a></div>";
							
						}
					}
				}

if ($pageNow < $pageCount){
	$nextPage=$pageNow+1;
	$next=preg_replace("/&end=\d+&begin=\d+&pageNow=\d+$/","",$my_url);
	$next=$next."&end=$end"."&begin=$begin"."&pageNow=$nextPage";
	echo "<div class='yahoo2'><a href= $next >Next &gt;</a></div>";
}


if($pageCount>1){
	$last=preg_replace("/&end=\d+&begin=\d+&pageNow=\d+$/","",$my_url);
	$last=$last."&end=$end"."&begin=$begin"."&pageNow=$pageCount";
	echo "<div class='yahoo2'><a href=$last >Last &gt;&gt;</a></div>";
}
echo "</div>";			

		}			
	}
?>
