<?php
	require_once '../Public_Class/Fengyepage.class.php';
	require_once '../Public_Class/EmpService.class.php';
	require_once 'advanced_get_id.class.php';
	require_once '../Public_Class/public_paging.class.php';

// 	$geneinfo_data=$_GET['geneinfo_data']; $bool_geneinfo=$_GET['boo_gene'];  
// 	$structure_data=$_GET['structrue'];    $bool_structure=$_GET['boo_structure'];
//  	$activity_data=$_GET['activity'];      $bool_activity=$_GET['bool_cactivity'];
//  	$comments_data=$_GET['comments'];      $bool_comments=$_POST['bool_comments'];
	$length=$_GET['length']; 	$length_bool=$_GET['boo_length']; 	
 	$ckbx1=$_GET['ckbx1'];          $bool_act=$_GET['bool_act'];       //special two
 	$db_name=$_GET['db'];           $db_id=$_GET['db_id'];        //special three
 
 	$data[0]=$_GET['geneinfo_data']; $bool[0]=$_GET['boo_gene'];
 	$data[1]=$_GET['structrue'];     $bool[1]=$_GET['boo_structure'];
 	$data[2]=$_GET['activity'];      $bool[2]=$_GET['bool_cactivity'];
 	$data[3]=$_GET['comments'];      $bool[3]=$_GET['bool_comments'];
 	
	//$db_table=array("`general"." "."data`","structure","activity","comments");
	$label[0]=array("DRAMP_ID","Sequence","Source","Name","Gene");
	$label[1]=array("Structure","PDB_ID");
	$label[2]=array("Target_Organism","Binding_Traget");  ///activity
	$label[3]=array("Comments","Comments");
	

	
// 	print_r($data[0]);
// 	$my_dog=new if_empty_key();
	
// 	$i=0;
// 	if ($my_dog->if_empty($geneinfo_data)){
// 		$mysql_tool_info_1=new advanced_search();
// 		$res_0=$mysql_tool_info_1->my_advanced_search_tool($db_table[0],$geneinfo_data,$bool_geneinfo,$label_0);
// 		$mysql_tool_info_2=new public_mysql_tool();
// 		$my_res[$i]=$mysql_tool_info_2->execute_dql($res_0[0]);
// 		$i++;
// 	}

	$mysql_db="";
	if (!empty($db_name)) {
		if (!empty($db_id)) {
			switch ($db_name) {
				case "PDB":      //structure
					$mysql_db="PDB_ID LIKE ";
					break;
				case "Swiss-prot":    //general data SwissProt_ID
					$mysql_db="Swiss_Prot_Entry LIKE ";
					break;
				case "Pubmed":   //literature
					$mysql_db="Pubmed_ID LIKE ";
					break;
			}
			$mysql_db=$mysql_db."\"%".$db_id."%\"";
		}
	}
	
//////////////////////////////////////////general/////////////////////////////////////////////////////
	$GET_ID=new advanced_GET_id();     ///this is important
 	for($i=0;$i<4;$i++){
		$comm_result[$i]=$GET_ID->GET_the_apid_array($data[$i],$bool[$i],$label[$i]);
// 		echo  "<br></br>";
	#	echo $comm_result[$i];
 	}

#############################################special_1########################################################
 	$mysql_query="";
	if (!empty($length)) {
		$mysql_query="Sequence_Length $length"." ".$length_bool." ";
	}


/////////////////////////////////////////special_2///////////////////////////////////////////////////////	
	$quick_mysql="";
	$quick_line="";
	if (count($ckbx1)>1) {
		$count=count($ckbx1);
		for ($i = 1; $i <= $count-2; $i++) {
			if ($ckbx1[$i] == "Anticancer/tumour"){
				$quick_line=$quick_line."Activity LIKE "."\"%Anticancer%\""." or  "."Activity LIKE "."\"%tumour%\""."or ";
			}else{
				$quick_line=$quick_line."Activity LIKE "."\"%".$ckbx1[$i]."%\""." or  ";
			}
		}
		if (count($ckbx1)>2){
			if ($ckbx1[$count-1] == "Anticancer/tumour"){
					$quick_line=" (".$quick_line."Activity LIKE "."\"%Anticancer%\""." or  "."Activity LIKE "."\"%tumour%\"".") ";
			}else{
				$quick_line=" (".$quick_line."Activity LIKE "."\"%".$ckbx1[$count-1]."%\"".") ";
			}
		}else{
			if ($ckbx1[$count-1] == "Anticancer/tumour"){
					$quick_line=$quick_line."Activity LIKE "."\"%Anticancer%\""." or  "."Activity LIKE "."\"%tumour%\"";
			}else{
				$quick_line=$quick_line."Activity LIKE "."\"%".$ckbx1[$count-1]."%\"";
			}
		}
		$quick_mysql=$quick_line." ".$bool_act." ";
	}
	
	
/////////////////////////////////////////sepecial_3/////////////////////////////////////////////////////////////


$my_query=$comm_result[0].$mysql_query.$comm_result[1].$quick_mysql.$comm_result[2].$comm_result[3].$mysql_db;

$my_query_array=explode(" ",$my_query);
$seeyou=array();
foreach ($my_query_array as $key=>$val){
	if (!$val) {
		unset($my_query_array[$key]);
	}else {
		$seeyou[]=$my_query_array[$key];
	}
}
// print_r($seeyou);
$number=count($seeyou)-1;

if ($number < 0){
	echo "hi,don not play ! go back,boy"."&nbsp";
	echo "<a href='javascript:history.go(-1);' >back<a>";
	exit();	
}

if ($seeyou[$number]=="And" or  $seeyou[$number]=="Or" or $seeyou[$number]=="Not") {
	array_pop($seeyou);
}
// print_r($seeyou);
$my_query=implode(' ',$seeyou);
// print_r($my_query);

if (preg_match('/Structure/',$my_query)){
	if (preg_match('/non beta or alpha structure/',$my_query)){
		$my_query = preg_replace('/Structure LIKE/','Structure NOT  LIKE',$my_query);
		$my_query = preg_replace('/non beta or alpha structure/','beta%" and Structure NOT LIKE "%alpha',$my_query);
	//	echo $my_end_query;
	}
	
	if (preg_match('/combine alpha and beta/',$my_query)){
		$my_query = preg_replace('/combine alpha and beta/','beta%" or Structure LIKE "%alpha',$my_query);
	}
}

#echo "$my_query\n";
#exit;

if (preg_match('/Not/',$my_query)){

	$pattern = '/(.*) Not (.*) LIKE (.*)/';
	$replacement = '$1 AND $2 Not LIKE $3';

	$my_query = preg_replace ($pattern,$replacement,$my_query);
}


//exit;

///////////////////////////////////////Link to mysql//////////////////////////////////////////////
$my_end_query="SELECT DRAMP_ID,Name,Source,Sequence,Activity,Swiss_Prot_Entry FROM general_amps  WHERE ".$my_query;

#echo "$my_end_query";
#exit;


echo<<<END_PAGE_ONE
	<!DOCTYPE html>
	<html lang="en">

	<!--  advanced -search   -->

	<head>
    	<title>Patent-Browse</title>
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
	<script src="../js/adv_table.js"></script>
	</head>
END_PAGE_ONE;


$my_url=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
$query_mysql_one=$my_end_query;
$query_mysql_two="SELECT count(DRAMP_ID) FROM general_amps  WHERE ".$my_query;
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

if ($fengyepage->rowCount  == 0){

echo "<script>alert('Found 0 results matched,Now back... ');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

}




	echo " <body onload='init();'>";

	require_once ("../head/head_content.php");

echo<<<END_PAGE_TWO
	<div class="container">
    	    <div class="row">
                <ol class="breadcrumb">
                    <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            	    <li class="active">Advanced  Search</li>
                    <li style="float:right;">Found <font color="green"><i><u>$fengyepage->rowCount</u></i></font> Entries Matching Your Query</li>
		</ol>
    	    </div>
    	<div class="row mt40">
	 	<div id="show_hide">
		 <div><a href="#" onclick="Hide_Show()"><span id="hide_or_show">Show Query</span></a></div>
		 		<div id="edit_query">
		 				<div style="width:900px;">
		 			<table class="datatable">
		 				<tr><th colspan="6">If you want edit the query,Please OndoubleCick...</th></tr>
			 			<tr><td>DRAMP:</td><td id="geneinfo_data%5B0%5D" name="edit" ondblclick="EditCells(this)">{$data[0][0]}</td><td>Structure</td>       <td id="structrue%5B0%5D" name="edit" ondblclick="EditCells(this)">{$data[1][0]}</td>   <td>Cell Toxicity</td><td id="comments%5B0%5D" name="edit" ondblclick="EditCells(this)">{$data[2][0]}</td></tr>
			 			<tr><td>Sequence:</td><td id="geneinfo_data%5B1%5D" name="edit" ondblclick="EditCells(this)">{$data[0][1]}</td><td>Structure Method</td><td id="structrue%5B1%5D" name="edit" ondblclick="EditCells(this)">{$data[1][1]}</td>   <td>GET-translational Modification:</td><td id="comments%5B1%5D" name="edit" ondblclick="EditCells(this)">{$data[2][1]}</td></tr>
			 			<tr><td>Source:</td><td id="geneinfo_data%5B2%5D" name="edit" ondblclick="EditCells(this)">{$data[0][2]}</td><td>TarGET Organism</td> <td id="activity%5B0%5D" name="edit" ondblclick="EditCells(this)">{$data[2][0]}</td></tr>
			 			<tr><td>Peptide Name:</td><td id="geneinfo_data%5B3%5D" name="edit" ondblclick="EditCells(this)">{$data[0][3]}</td><td>Binding TarGET</td>  <td id="activity%5B1%5D" name="edit" ondblclick="EditCells(this)">{$data[2][1]}</td></tr>
			 			<tr><td>Gene Name:</td><td id="geneinfo_data%5B4%5D" name="edit" ondblclick="EditCells(this)">{$data[0][4]}</td></tr>
			 			<tr><td>Sequence Length:</td><td>{$length}</td><td colspan="4" align="center"><input type="button" onclick="apply_edit('$my_url')" name="apply" value="apply">&nbsp;&nbsp;<a href="#" onclick="Hide_Show()"><span id="hide_or_show">Hide Query</span></a></td></tr>
		 			</table>
		 			<input type="hidden" value="" id="HValue" />
					<input type="hidden" value="{$my_url}" id="the_url"/>
		 				</div>
		 		</div>
		</div>
END_PAGE_TWO;

echo "<div class='row highlight'>";

$paging_adv=new Paging_me();
$paging_adv->paging($fengyepage->pageNow,$fengyepage->pageCount,$fengyepage->rowCount,$my_url,$begin,$end);

echo<<<END_PAGE_THREE
	<div id="myFunction">
	 	<label><small><i>DownLoad :</i></small><label>
		<a href="#" onclick="CreateFile('fasta','search_child')"><img src="../down_load/down_img/mime_fasta.png" alt="fasta"/></a><label></label><small>FASTA</small></label>
		<a href="#" onclick="CreateFile('html','search_child')"><img src="../down_load/down_img/mime_html.png" alt="html" /></a><label><small>HTML</small></label>
		<a href="#" onclick="CreateFile('xls','search_child')"><img src="../down_load/down_img/mime_xls.png" alt="xls" /></a><label><small>XLS</small></label>
		<a href="#" onclick="CreateFile('xml','search_child')"><img src="../down_load/down_img/mime_xml.png" alt="xml" /></a><label><small>XML</small></label>
		</div>

	<div style="clear:both"></div>
END_PAGE_THREE;




echo "<div style='clear:both'></div>";
echo "<div>";
		include("../template/search_table.php");
echo "</div>";

echo "</div>";

echo "</div>";

echo "</div>";
include("../head/footer.php");

?>
