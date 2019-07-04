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
         require_once ("../head/head_content.php");
?>


<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            <li class="active">Feedback</li>
        </ol>
    </div>

<?php
         require_once '../Public_Class/public_mysql_tool.class.php';

        if ($_REQUEST['email_txt']){

                        echo "<script>alert('Hi,It is ok.Thanks...');location.href='http://dramp.cpu-bioinfor.org';</script>";
        }else{

echo<<<end_one
   <div class="row">
	<div class="col-md-6"> 
		<h2>Feedback</h2>
                    <form id="fback_form" name="fback_form" method="get" action="feed_back.php">
                    <div class="main_form">
                     <p>Your Name:</p>
                     <input type="text" class="form-control"   name="name_txt"/>
                     <p>Your e-mail Address:</p>
                     <input type="text" name="email_txt" class="form-control"/>
                     <p>Subject :</p>
                     <input type="text" name="sub_txt" class="form-control"/>
                     <p>Message:</p>
                     <textarea name="fback_area" cols="30" rows="3" wrap="virtual" class="form-control"></textarea>
                     </div>
                     <div class="btn_box">
                     <input type="submit" id="smt_" name="fback_smt" value="Submit" />
                     <input type="reset" id="reset_" name="fback_reset" value="Reset" />
                     </div>
                     </form>
	</div>
    </div>
end_one;
}


?>



</div>

<?php
require_once("../head/footer.php");

?>

 <!--end #page-->
</body>
</html>
