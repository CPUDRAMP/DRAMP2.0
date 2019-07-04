<?php

	require_once '../Public_Class/public_mysql_tool.class.php';

	$this_id=$_REQUEST['id'];

	$query_mysql_one="SELECT * FROM patent_amps WHERE DRAMP_ID = ";

	$query_mysql=$query_mysql_one." \"".$this_id."\"";

	//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

	$mysql_helper=new public_mysql_tool();

	$result=$mysql_helper->execute_dql($query_mysql);

	$row_info=$result[0];

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>The All Information Of <?php  echo "$this_id"; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	  <link rel="shortcut icon" href="http://dramp.cpu-bioinfor.org/favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="http://dramp.cpu-bioinfor.org/js/jquery.js"></script>	
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>

	<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">

 
</head>

<body>


<?php
require_once ("../head/head_content.php");
?>


<div class="container">
    <div class="row">
    	<div class="col-md-13">
	        <ol class="breadcrumb">
	            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
	            <li><a href="http://dramp.cpu-bioinfor.org/browse">Browse</a></li>
	            <li class="active"><?php  echo "{$row_info['DRAMP_ID']}"?></li>
	            <li style="float:right;"><a href="<?php echo $_SERVER['HTTP_REFERER'];  ?>"><span class="glyphicon glyphicon-arrow-left">Back</span></a></li>
	        </ol>
    	</div>
    </div>
</div>


	<div class="container bs-docs-container">
	    <div class="row">
	      	<div class="col-md-3">
	          	<div class="bs-sidebar hidden-print affix-top" role="complementary">
	            	<ul class="nav bs-sidenav">
						<li>
							 <a href="#patent">--Patent Information</a>
							 <ul class="nav">
								 <li><a href="#patent_id">DRAMP ID</a></li>
								 <li><a href="#patent_sequence">Sequence</a></li>
								 <li><a href="#patent_sequence_length">Sequence Length</a></li>
								 <li><a href="#patent_sequence_name">Sequence Name</a></li>
								 <li><a href="#patent_source">Source</a></li>
								 <li><a href="#patent_activity">Activity</a></li>
								 <li><a href="#patent_type">Patent Type</a></li>
								 <li><a href="#patent_No">Patent No</a></li>
								 <li><a href="#patent_publication_date">Publication Date</a></li>
								 <li><a href="#patent_publication_as">Also Publication As</a></li>
								 <li><a href="#patent_title">Patent Title</a></li>
								 <li><a href="#patent_abstract">Abstract</a></li>
							 </ul>
						</li>
	                   
	           		</ul>
	          	</div>
	        </div>


	        <div class="col-md-9" role="main">
	          
	  <!-- General Information
	  ================================================== -->
	  			<div class="bs-docs-section">
	    			<div class="page-header">
	      				<h3 id="Patent">Patent Information</h3>
	    			</div>
	    			<div class="highlight">
	    				<ul class="list-unstyled">
	    					<li>
			 					<ul class="list-inline">
				    				<li><h4 id="patent_id" class="text-info">DRAMP ID</h4></li>
				    				<li><h5><?php  echo "{$row_info['DRAMP_ID']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_sequence" class="text-info">Sequence</h4></li>
				    				<li><h5><?php  echo "{$row_info['Sequence']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_sequence_length" class="text-info">Sequence Length</h4></li>
				    				<li><h5><?php  echo "{$row_info['Sequence_Length']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_sequence_name" class="text-info">Sequence Name</h4></li>
				    				<li><h5><?php  echo "{$row_info['Name']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_source" class="text-info">Source</h4></li>
				    				<li><h5><?php  echo "{$row_info['Source']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_activity" class="text-info">Activity</h4></li>
				    				<li><h5><?php  echo "{$row_info['Activity']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_no" class="text-info">Patent No</h4></li>
				    				<li><h5><a target="_blank"  href="http://www.lens.org/lens/patent/<?php $patent_link=preg_replace('/ |\//','_',$row_info['Patent_No']);  echo $patent_link;  ?>"><?php  echo "{$row_info['Patent_No']}";  ?></a></h5></li>
						    	</ul>
						    </li>						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_type" class="text-info">Patent Type</h4></li>
				    				<li><h5><?php  echo "{$row_info['Patent_Type']}";  ?></h5></li>
						    	</ul>
						    </li>						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_publication_date" class="text-info">Publication Date</h4></li>
				    				<li><h5><?php  echo "{$row_info['Publication_Date']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_publication_as" class="text-info">Also Publication As</h4></li>
				    				<li><h5>
									<?php

								$new_publication=$row_info['Also_Publication_As'];
								$new_publication = str_replace(" ","",$new_publication);
								$publications = explode(",",$new_publication);
								
								$also_publication = array();
								for ($i=0;$i<count($publications);$i++){
									
									$temp = "<a href='http://www.google.com/patents/{$publications[$i]}'>{$publications[$i]}</a>";
									array_push($also_publication,$temp);					
								}
								$end = join (",",$also_publication);

								#$end = str_replace(" ","",$end);
						         	echo "$end"; 
								
									?>
								</h5></li>
						    	</ul>
						    </li>						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_title" class="text-info">Patent Title</h4></li>
				    				<li><h5><?php  echo "{$row_info['Patent_Title']}";  ?></h5></li>
						    	</ul>
						    </li>						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="patent_abstract" class="text-info">Abstract</h4></li>
				    				<li><h5><?php  echo "{$row_info['Abstract']}";  ?></h5></li>
						    	</ul>
						    </li>
						</ul>
				    </div>
				</div>


			</div>
		</div>
	</div>



    <!-- Footer
    ================================================== -->

<?php

	require_once ("../head/footer.php");

?>

<script type="text/javascript" src="http://dramp.cpu-bioinfor.org/js/jquery-1.js"></script>
<script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
<script language="JavaScript" src="http://dramp.cpu-bioinfor.org/browse/application.js"></script>
</body>

</html>
