
<?php
	//public function downloads($name){
	       // $name_tmp = explode("_",$name);
	       // $type = $name_tmp[0];
	       // $file_time = explode(".",$name_tmp[3]);
	       // $file_time = $file_time[0];
	       // $file_date = date("Y/md",$file_time);
	      //  $file_dir = SITE_PATH."/data/uploads/$type/$file_date/";   
	         
	        if( !empty( $_COOKIE["ches"] ) ){
 								echo $_COOKIE["ches"];
 								$file_dir="../TEST/";
	     					$name="sd.fasta";
	         			//echo $file_dir.$name;
	       				 if (!file_exists($file_dir.$name)){
				          	  header("Content-type: text/html; charset=utf-8");
				           	 	echo "File not found!";
			          		  exit;
           			 }else{
					            $file = fopen($file_dir.$name,"a+");
					            Header("Content-type: application/octet-stream");
					            Header("Accept-Ranges: bytes");
					            Header("Accept-Length: ".filesize($file_dir . $name));
					            Header("Content-Disposition: attachment; filename=".$name);
					            fwrite($file,$_COOKIE["ches"]);
					           # echo fread($file, filesize($file_dir.$name));
					            
					            #echo  "I am here";
				 	            fclose($file);
	        			}
	        			
					}else{
								$value="pppppppppppppp";
								 setcookie("cook", $value, time()+7200, "/");
					}
	         
	         
	         

	  //  }
	    
?>