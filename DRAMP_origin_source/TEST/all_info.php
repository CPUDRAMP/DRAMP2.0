<?php
function randomColor() {

    $str = '#';

    for($i = 0 ; $i < 6 ; $i++) {

        $randNum = rand(0 , 15);

        switch ($randNum) {

            case 10: $randNum = 'A'; break;

            case 11: $randNum = 'B'; break;

            case 12: $randNum = 'C'; break;

            case 13: $randNum = 'D'; break;

            case 14: $randNum = 'E'; break;

            case 15: $randNum = 'F'; break;

        }

        $str .= $randNum;

    }

    return $str;

}

echo<<<END_PAGE_ONE

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<link href="../css/all_information.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div style="margin-left:98px;">	
		<div class="histogram-container" id="histogram-container">
	    <div class="histogram-bg-line">
        <ul>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
            <li><div></div></li>
        </ul>
    </div>
	
	
    <div class="histogram-content">
        <ul>
END_PAGE_ONE;
 		
            for($i=0;$i<26;$i++){
            	$color = randomColor();
            		$num=rand(0,15)."%";
								echo "<li><span class='histogram-box'><a style='height:{$num};background:{$color}' title='20%'></a></span><span class='name'>ra</span></li>";
						}
echo<<<END_PAGE_TWO
        </ul>
    </div>
    <!--百分比 y轴-->
    <div class="histogram-y">
        <ul>
            <li>100%</li>
            <li>80%</li>
            <li>60%</li>
            <li>40%</li>
            <li>20%</li>
            <li>0%</li>
        </ul>
    </div>
</div>    
  </body>
</html>
END_PAGE_TWO;
?>