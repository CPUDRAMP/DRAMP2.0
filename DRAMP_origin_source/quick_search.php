<?php
	

	require_once './Public_Class/Fengyepage.class.php';
	require_once './Public_Class/EmpService.class.php';
	require_once './Public_Class/public_paging.class.php';
	require_once './Public_Class/public_common.class.php';
?>


<!DOCTYPE html>
<html lang="en">

<!--  toos: cd -search   -->

<head>
    <title>Bacteria-Browse</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>


    <link href="../css/public_table.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_navil.css"  rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_down.css"  rel="stylesheet" type="text/css" media="screen" />
	<script src="../js/public_browse.js"></script>

</head>

<body>

<?php

	  require_once ("./head/head.php");

//  wheather  	the srh_txt is exit;
//	$mygold=array();
	if (isset($_GET['srh_txt'])) {
		if (!empty($_GET['srh_txt'])) {
			$keyword=$_GET['srh_txt'];
		}else{
			header('Location:http://dramp.cpu-bioinfor.org');
			exit();
		}
		
	}else {
		header('Location:http://dramp.cpu-bioinfor.org');
		exit();
	}
	

if(!empty($_GET['srh_txt'])){
	$keyword=$_GET['srh_txt'];
}

$query_mysql="WHERE Sequence LIKE  '%$keyword%' or Name LIKE  '%$keyword%' or Source  LIKE  '%$keyword%' or DRAMP_ID LIKE '%$keyword%'";


$my_url=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];

$query_mysql_one="SELECT *  FROM public_amps  ".$query_mysql;

$query_mysql_two="select count(DRAMP_ID) from public_amps ".$query_mysql;

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

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            <li class="active">Quick Search</li>
        </ol>
    </div>
    <div class="row mt20">
<!--	<div class="alert alert-info alert-dismissable">  -->

	    <dl class="dl-horizontal">
  	    <dt>Details</dt><dd></dd>
  	    <dt>User :</dt><dd>Anonymous</dd>
  	    <dt>Matches Entries :</dt><dd><?php echo $fengyepage->rowCount; ?></dd>
  	    <dt>Key :</dt><dd><?php echo "<font color='red'>$keyword</font>"; ?></dd>
  	    <dt>Job ID :</dt><dd><?php $id = new public_common(); echo $id->randstr(); ?></dd>
	    </dl>

<!--	</div>    -->
    </div>

    <div class="row mt40">

   <!-- the content -->

            <div class="row highlight">


</body>
</html>

<?php
$paging_quick=new Paging_me();
$paging_quick->paging($fengyepage->pageNow,$fengyepage->pageCount,$fengyepage->rowCount,$my_url,$begin,$end);
if ($fengyepage->rowCount  == 0){
echo "<script>alert('Found 0 results matched,Now back... ');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

}

include("./template/search_function.php");

echo "<div style='clear:both'></div>";
	
echo "<table summary='The Result Of Ser' class='datatable' >";
	
	
echo<<<END_PAGE_TREE
	 <tr>	<th style="border-right-style: none"><input id="CheckAll" onclick="SelectAll('search_all','search_child')" name="search_all" type="checkbox" /></th><th style="width:90px;border-left-style: none">RDAMP ID</th><th>Peptide Name</th><th>Source</th><th>Sequence</th><th>Activity</th><th>Swiss_Prot Entry</th></tr>
END_PAGE_TREE;


for ($i=0;$i<count($fengyepage->res_array);$i++){
	$row=$fengyepage->res_array[$i];

        if ($row['Swiss_Prot_Entry'] == "No entry found"){
                         $swiss_prot_entry_ini = $row['Swiss_Prot_Entry'];

                }else{

                         $swiss_prot_entry_ini = $row['Swiss_Prot_Entry'];
                         $swiss_prot_entry_ini = str_replace(" ","",$swiss_prot_entry_ini);
                         $swiss_prot_entry=explode(",",$swiss_prot_entry_ini);


$swiss_array=array();
                                                          for ($n=0; $n < count($swiss_prot_entry) ; $n++) {

                                                        $swiss_temp="<a href='http://www.uniprot.org/uniprot/$swiss_prot_entry[$n]'>$swiss_prot_entry[$n]</a>";

        array_push($swiss_array,$swiss_temp);


}


$swiss_temp=implode(",", $swiss_array);

                                                                     $swiss_prot_entry_ini = $swiss_temp;
        }

	if ($i%2 == 0) {
	echo"<tr  class='altrow'><td style='border-right-style: none'><input type='checkBox' name='search_child' value='{$row['DRAMP_ID']}' /></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}&dataset={$row['Dataset']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Sequence']}</td><td>{$row['Activity']}</td><td>$swiss_prot_entry_ini</td></tr>";
	}else{
	echo "<tr ><td style='border-right-style: none'><input type='checkBox' name='search_child' value='{$row['DRAMP_ID']}' /></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}&dataset={$row['Dataset']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Sequence']}</td><td>{$row['Activity']}</td><td>{$row['Swiss_Prot_Entry']}</td></tr>";
	}
}

echo "</table>";
	
echo "</div>";

echo "</div></div></div>";

require_once("./head/footer.php");

?>
