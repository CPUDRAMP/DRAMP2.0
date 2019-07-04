<?php

	
	require_once '../Public_Class/public_mysql_tool.class.php';

	if(!empty($_REQUEST['load_id'])){
		$load_id= explode(" ",$_REQUEST['load_id']);
		$query_mysql="";
		foreach ($load_id as $key=>$val){
			$query_mysql="DRAMP_ID = \"".$val."\" or ".$query_mysql;
		}
		$query_mysql=substr($query_mysql,0,-3); 
		$query_mysql="SELECT DRAMP_ID,Name,Sequence FROM public_amps WHERE ".$query_mysql;
// 		echo $query_mysql;
	}
	
$mysql_query=new public_mysql_tool();
$res=$mysql_query->execute_dql($query_mysql);
# print_r($res);
// 		echo "<br>";
// 				echo "<br>";
				
// foreach ($res as  $key=>$val){
// 		//print_r($res); 
// 		echo "<br>";
		
// }

$format=$_GET['format']; 
# echo $format;


$file_dir="../tmp/";

$file_name="result";

if(!empty($_GET['format'])){
	$load_format=$_GET['format'];
		//foreach ($load_format as $key=>$val){
		$file_name=$file_name.".".$load_format;
		switch ($load_format){
			case "xml" :
				
				$title_size=1;
				
				$xml="<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
				$xml .="<peptide>\n";
				
				foreach ($res as $value) {
					$xml .=create_item($value['DRAMP_ID'],$title_size,$value['Name'],$value['Sequence']);
				}
				$xml .= "</peptide>\n";
				$f = fopen($file_dir.$file_name, 'w+');
				fwrite($f, $xml);
				fclose($f);
				$file = fopen($file_dir.$file_name, 'r');

				Header("Content-type: application/octet-stream");
				Header("Accept-Ranges: bytes");
				Header("Accept-Length: ".filesize($file_dir . $file_name));
				Header("Content-Disposition: attachment; filename=" . $file_name);
				echo fread($file,filesize($file_dir . $file_name));
				fclose($file);
				exit();
				break;
			case "html" :
				$my_html="<html><head><title>welcome to AMP</title><head><body>";
				foreach ($res as $value){
					$my_html .="<ul><li>{$value['DRAMP_ID']}</li><li>{$value['Name']}</li><li>{$value['Sequence']}</li></ul><br><br>";
				}
				$my_html .="<body><html>";
				$f = fopen($file_dir.$file_name, 'w+');
				fwrite($f, $my_html);
				fclose($f);
				$file = fopen($file_dir.$file_name, 'r');
				
				Header("Content-type: application/octet-stream");
				Header("Accept-Ranges: bytes");
				Header("Accept-Length: ".filesize($file_dir . $file_name));
				Header("Content-Disposition: attachment; filename=" . $file_name);
				echo fread($file,filesize($file_dir . $file_name));
				fclose($file);
				exit();
				break;
			case "fasta" :
				$my_fasta="";
				foreach ($res as $value){
					$my_fasta .=">".$value['DRAMP_ID']."|"."{$value['Name']}\n{$value['Sequence']}\n\n";
				}
				$f = fopen($file_dir.$file_name, 'w+');
				fwrite($f, $my_fasta);
				fclose($f);
				$file = fopen($file_dir.$file_name, 'r');
				
				Header("Content-type: application/octet-stream");
				Header("Accept-Ranges: bytes");
				Header("Accept-Length: ".filesize($file_dir . $file_name));
				Header("Content-Disposition: attachment; filename=" . $file_name);
				echo fread($file,filesize($file_dir . $file_name));
				fclose($file);
				exit();
				break;
			case "xls" :
				$my_xls="DRAMP_ID\tPeptide_name\tsequence\n";
				foreach ($res as $value){
					$my_xls .="{$value['DRAMP_ID']}\t{$value['Name']}\t{$value['Sequence']}\n";
				}
				$f = fopen($file_dir.$file_name, 'w+');
				fwrite($f, $my_xls);
				fclose($f);
				$file = fopen($file_dir.$file_name, 'r');
				
				header('Cache-Control: no-cache, must-revalidate');
				header('Content-type: application/vnd.ms-excel');
				header('Content-Disposition: filename=leaveMessage.xls');
				Header("Accept-Length: ".filesize($file_dir . $file_name));
				Header("Content-Disposition: attachment; filename=" . $file_name);
				echo fread($file,filesize($file_dir . $file_name));
				fclose($file);
				exit();
				
				break;
		}
	}
//}





function create_item($title_ID, $title_size,$content_name,$pubdata_seq){
	$item="<search>\n";
	$item .= "\t<DRAMP_ID size=\"".$title_size."\">".$title_ID."</DRAMP_ID>\n";
	$item .= "\t<Name>".$content_name."</Peptide_Name>\n";
	$item .= "\t<Peptide_Seq>".$pubdata_seq."</Peptide_Seq>\n";
	$item .= "</search>\n";
	return $item;
}



	
// 	if (!empty($_GET['downname'])) {
// 		$cookie_name=$_GET['downname'];
// 		if( !empty( $_COOKIE["$cookie_name"] ) ){
// 			echo $_COOKIE["$cookie_name"];
// 			$content= $_COOKIE["$cookie_name"];
			
// 			$file_dir="../tmp/";
// 			if (!empty($_GET['format'])) {
// 				$format=$_GET['format'];
// 				if ($format[1]) {
// 					$ext=$format[1];

// 					$filename="result".".".$ext;
// 					$file = fopen($file_dir.$filename,"w+");
// 					fwrite($file,$content);
// 					fclose($file);
// 					$file = fopen($file_dir.$filename,"a");
// 					Header("Content-type: application/octet-stream");
// 					Header("Accept-Ranges: bytes");
// 					Header("Accept-Length: ".filesize($file_dir . $filename));
// 					Header("Content-Disposition: attachment; filename=".$filename);
// 					fclose($file);
					
					
// 				}

				
// 			}
			
			
			
// 		}
// 	}


?>
