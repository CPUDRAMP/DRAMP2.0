<?php
	require_once '../Public_Class/Fengyepage.class.php';
	require_once '../Public_Class/EmpService.class.php';
  require_once '../Public_Class/public_paging.class.php';

echo<<<END_PAGE_ONE
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Structure Data</title>
	<link href="../css/public_browse.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_table.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_navil.css"  rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_down.css"  rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_parent.css"  rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_browse_head.css"  rel="stylesheet" type="text/css" media="screen" />	
	<script src="../js/public_browse.js"></script>	
	</head>
END_PAGE_ONE;

$query_mysql_one="SELECT DRAMP_ID,Peptide_Name,Source,Structure FROM peptide";
$query_mysql_two="SELECT count(DRAMP_ID) FROM peptide";

include("../template/public_swith_navil.php");

echo<<<END_PAGE_TWO
	 <body>
		<div id="bannera">
		   		<div id="bannerleft"><a title="Apache OpenOffice" href="/"><img id="ooo-logo" alt="Apache OpenOffice" src="../images/LOGO.jpg"></a></div>
		   		<div id="bannerright">        
		      <div style="relative; margin: 34px 0 0 0; height: 24px;">
						<form id="cse-search-box-header" action="http://www.google.com/search" method="get">
			  		<div>
			    	<input name="domains" value="#" type="hidden">
			    	<input name="sitesearch" value="#" type="hidden">
			  	</div>
			  	<div class="topsrchbox">
			    	<input name="resultsPerPage" value="40" type="hidden"> 
			    	<input name="q" id="query" type="text">
			   	 <input name="Button" value="search" class="topsrchbutton" type="submit">
			 		</div>
					</form>
		      </div>
		    </div>
		    <div id="bannercenter"><br>The Imformation Of Structure</div>
		 		</div>

	<div id="topbara">
	    <div id="topnava"><ul>
				<li><a href="../browse/PhysicochemicalData.php" title="Apache OpenOffice product description">Physicochemical</a></li>
				<li><a href="../browse/Bacteriocins.php" title="Download OpenOffice.org">Bacteriocins</a></li>
				<li><a href="../browse/PatentData.php" title="Find Support for OpenOffice.org">Patent</a></li>
				<li><a href="../browse/PlantAmpsData.php" title="Extensions and Templates for OpenOffice">Plant defensins</a></li>
				<li><a href="../browse/ClinicalTrialsData.php" title="Download OpenOffice.org">Clinical Trials</a></li>
				<li><a href="../browse/GeneralData.php" title="Apache OpenOffice development focus areas">General</a></li>
				<li><a href="/" title="Apache OpenOffice in your Native Language">FAQs</a></li>
				</ul>
			</div>
	    <div id="breadcrumbsa"><a href="/">home</a></div>
  </div>
	<div id="clear"></div>
	<div id="myFunction">
	</div>
	</div>
	<div id="clear"></div>
	<div class="content">
END_PAGE_TWO;

$paging_quick=new Paging_me();
$paging_quick->paging($fengyepage->pageNow,$fengyepage->pageCount,$fengyepage->rowCount,$my_url,$begin,$end);
include("../template/browse_funtion.php");

echo "<div style='clear:both'></div>";
echo "<div>";

echo "<table summary='The browse' class='datatable'>";
echo<<<END_END
	<tr><th style="border-right-style: none"><input id="CheckAll" onclick="SelectAll('browse_parent','browse_child')" name="browse_parent" type="checkbox" /></th><th style="width:90px;border-left-style: none">RDAMP ID</th><th style="width:400px;">Peptide NAME</th><th style="width:560px;">Source</th><th style="width:100px;">Structure</th></tr>
END_END;

for ($i=0;$i<count($fengyepage->res_array);$i++){
	$row=$fengyepage->res_array[$i];
	if ($i%2 == 0) {
		echo "<tr class='altrow'><td style='border-right-style: none'><input type='checkBox' name='browse_child' value='{$row['DRAMP_ID']}' onclick='my_blast()'/></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Peptide_Name']}</td><td>{$row['Source']}</td><td>{$row['Structure']}</td></tr>";
	}else{
	echo "<tr ><td style='border-right-style: none'><input type='checkBox' name='browse_child' value='{$row['DRAMP_ID']}' onclick='my_blast()'/></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Peptide_Name']}</td><td>{$row['Source']}</td><td>{$row['Structure']}</td></tr>";
	}
}

echo "</table>";
echo "</div>";

echo<<<END_PAGE_THREE
	<div style='clear:both'></div>
	<div></div>
	<div style="width:300px;margin:0px auto;"><div class='navil navil_two'><a href="#top">Top</a></div><div  class='navil navil_two'><a href="all_item.html">Back</a></div></div>
END_PAGE_THREE

?>