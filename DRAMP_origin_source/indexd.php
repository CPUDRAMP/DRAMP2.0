<?php
//定义变量--
$global_css="./css/global_style.css";
$ibanner_js="./js/ibanner.js";
$roll_news_js="./js/roll_news.js";
$global_nav_js="./js/nav.js";
//head
$tools_predict="./tools/prediction.php";
$tools_simi_search="./tools/simi_search.php";
$tools_alignment="./tools/alignment.php";



// 加载头文件
include_once ('./include/common_html.inc');


echo<<<EOF
<body>
	<div id="outline">
		<div id="page">
EOF;

	include_once ('./include/static_html/head.inc');

echo<<<EOF
	<div class="clearfloat"></div>
EOF;

	include_once('./include/home/home.inc');

echo<<<EOF
	<div class="clearfloat"></div>
EOF;

	include_once('./include/static_html/foot.inc');

echo<<<EOF
			</div>
	</div>
</body>
</html>
EOF;
?>
