<?php

// 	this is for simple search////////////////////////////////////////
	require_once '../Public_Class/public_mysql_tool.class.php';

date_default_timezone_set("Asia/Shanghai");

$uploaddir = '/var/www/mycite/datbase/Uploads/';
$ext="txt";

$sequence="";
if(!empty($_POST['gdd'])){
	$sequence=$_POST['gdd'];
}elseif (empty($_FILES)===false) {
	
	if ($_FILES['userfile']['error']>0) {
		exit("Uploading the file is wrong".$_FILES['userfile']['error']);
	}
	$temp_arr = explode(".", $_FILES["userfile"]["name"]);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	
	if (!($file_ext==$ext)) {
		exit('Please Upload the file with ext txt');
	}
	
	$new_time=time().".".$file_ext;
	echo time();	
	move_uploaded_file($_FILES["userfile"]["tmp_name"],"$uploaddir".$new_time);
	
	$file_handle=fopen("$uploaddir".$new_time,"r");
	while (!feof($file_handle)) {
		$line=fgets($file_handle);
		$line=trim($line);
		$sequence=$sequence.$line;
	}
	echo ("I won");
}
	
echo $sequence;
	$mysql="SELECT * FROM search WHERE Sequence like '%$sequence%' ";
	$mysql_tool=new public_mysql_tool();
	$result=$mysql_tool->execute_dql($mysql);
	
	
	echo "<table border='1px' bordercolor='green' cellspacing='0px'>";
	echo "<tr><th>NUM</th><th>NUM</th><th>NUM</th><th>NUM</th></tr>";	
	
	while ($row=mysql_fetch_row($result)) {

		echo "<tr>";
		foreach ($row as $key=>$val) {
			echo "<td>$val</td>";
		}
		echo "</tr>";
	}
	
	mysql_free_result($result);




	// 		echo basename($_FILES['userfile']['name']);
	// 		echo '<pre>';
	
	// 		// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
	// 		// of $_FILES.
	
	
	
	// 		if (is_dir($uploaddir)!=TRUE) mkdir($uploaddir,0664);
		
	
	// 		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	
	// 		echo '<pre>';
	// 		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	// 			echo "File is valid, and was successfully uploaded.\n";
	// 		} else {
	// 			echo "Possible file upload attack!\n";
	// 		}
	
	// 		echo 'Here is some more debugging info:';
	// 		print_r($_FILES);
	
	// 		print "</pre>";
	
	
	
	// echo $file_ext;	

































?>