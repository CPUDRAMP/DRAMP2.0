<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome To Dramp Database</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>

          <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="../js/jquery-1.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>       
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
    
</head>

<body>



<?php
	 require_once '../Public_Class/public_mysql_tool.class.php';	
         require_once ("../head/head_content.php");	

	if ($_REQUEST['pepname']){
	
		$name = $_REQUEST['pepname'];
		$sequence = $_REQUEST['sequence'];
		$source = $_REQUEST['organism'];
		$gene = $_REQUEST['genename'];
		$bioactivity = $_REQUEST['bioactivity'];
		$target = $_REQUEST['tar_org'];
		$binding = $_REQUEST['binding'];
		$pdb_id = $_REQUEST['pdb_id'];
		$pubmed_id = $_REQUEST['pubmed_id'];
		$liter_title = $_REQUEST['liter_title'];
		$swiss_prot = $_REQUEST['swiss_prot'];
		$comments = $_REQUEST['comments'];
		$client_name = $_REQUEST['client_name'];
		$e_mail = $_REQUEST['e_mail'];
	
		$query= "INSERT INTO client_amps (`Sequence` , `Name` , `Swiss_Prot_Entry` , `Client_Name` , `Gene` , `Source` , `Activity` , `E_mail` , `PDB_ID` , `Comments` , `Target_Organism` , `Binding_Traget` , `Pubmed_ID` , `Title`) VALUES ('$sequence' , '$name' , '$swiss_prot' , '$client_name' , '$gene' , '$source' , '$bioactivity' , '$e_mail' , '$pdb_id' , '$comments' , '$target' , '$binding' , '$pubmed_id' , '$liter_title')";
		$mysql_helper=new public_mysql_tool();

		$result=$mysql_helper->execute_submit($query);
		
		if ($result == 1){
			echo "<script>alert('Hi,It is ok.Thanks...');location.href='http://dramp.cpu-bioinfor.org';</script>";

		}else{
			echo "<script>alert('Hi,thanks.But it failed... ');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

		}
		
	}else{

echo<<<end_one
<div class="container">
            <div class="row">
        <ol class="breadcrumb">
            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            <li class="active">Submission</li>
        </ol>
    </div>
<div class="row">
	<div class="col-md-6">
        <h2>Submission</h2>
       <form name="submission" method="post" action="submit.php">
       <div class="main_form">
        <div class="fm_title" id="title1">Submission Details</div>
        <p>Peptide Name:</p>
        <input type="text" name="pepname" class="form-control"/>
        <p>Sequence (mature peptide only):</p>
        <input type="text" name="sequence" class="form-control" />
        <p>Organism:</p>
        <input type="text" name="organism" class="form-control" />
        <p>Gene Name:</p>
        <input type="text" name="genename" class="form-control" />
        <p>Biological Activity:</p>
        <input type="text" name="bioactivity" class="form-control" />
        <p>Target Organism:</p>
        <input type="text" name="tar_org" class="form-control" />
        <p>Binding target (if known):</p>
        <input type="text" name="binding" class="form-control" />        
        <p>PDB ID:</p>
        <input type="text" name="pdb_id" class="form-control" /> 
        <p>Literature Title:</p>
        <input type="text" name="liter_title" class="form-control" /> 
        <p>Pubmed ID:</p>
        <input type="text" name="pubmed_id" class="form-control" /> 
         <p>Swiss-prot Entry:</p>
        <input type="text" name="swiss_prot" class="form-control" /> 
        <p>Comments:</p>
        <textarea name="comments" class="form-control" rows="3"></textarea>
        </div> 
        <div class="main_form">                 
        <div class="fm_title" id="title2">Your Information</div>
        <p>Your Name:</p>
        <input type="text" name="client_name" class="form-control"/>
        <p>Contact E-mail Address:</p>
        <input type="text" name="e_mail" class="form-control"/> 
        </div>
        <div class="btn_box"> 
        <input type="submit" id="smt_" name="sub_smt" value="Submit" /> 
        <input type="reset" id="reset_" name="sub_reset" value="Reset" />
        </div> 
        </form>   
 	</div>
	</div>
</div>
end_one;
}
?>
    <?php
	require_once ("../head/footer.php");


   ?>
	
</body>
</html>
