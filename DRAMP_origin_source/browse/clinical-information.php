<?php

	require_once '../Public_Class/public_mysql_tool.class.php';

	$this_id=$_REQUEST['id'];

	$query_mysql_one="SELECT * FROM  clinical_amps WHERE DRAMP_ID = ";

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
							 <a href="#clinical">--Clinical Information</a>
							 <ul class="nav">
								 <li><a href="#clinical_id">DRAMP ID</a></li>
								 <li><a href="#clinical_sequence">Sequence</a></li>
								 <li><a href="#clinical_sequence_name">Sequence Name</a></li>
								 <li><a href="#clinical_description">Description</a></li>
								 <li><a href="#clinical_activity">Activity</a></li>
								 <li><a href="#clinical_medical_use">Medical use</a></li>
								 <li><a href="#clinical_stage_of_development">Stage of development</a></li>
								 <li><a href="#clinical_comments">Comments</a></li>
								 <li><a href="#clinical_company">Company</a></li>
								 <li><a href="#clinical_target_organism">Target_Organism</a></li>
								 <li><a href="#clinical_reference">Reference</a></li>
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
	      				<h3 id="clinical">clinical Information</h3>
	    			</div>
	    			<div class="highlight">
	    				<ul class="list-unstyled">
	    					<li>
			 					<ul class="list-inline">
				    				<li><h4 id="clinical_id" class="text-info">DRAMP ID</h4></li>
				    				<li><h5><?php  echo "{$row_info['DRAMP_ID']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_sequence" class="text-info">Sequence</h4></li>
				    				<li><h5><?php  echo "{$row_info['Sequence']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_sequence_name" class="text-info">Sequence Name</h4></li>
				    				<li><h5><?php  echo "{$row_info['Name']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_discription" class="text-info">Description</h4></li>
				    				<li><h5><?php  echo "{$row_info['Description']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_activity" class="text-info">Activity</h4></li>
				    				<li><h5><?php  echo "{$row_info['Activity']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_medical_use" class="text-info">Medical use</h4></li>
				    				<li><h5><?php  echo "{$row_info['Medical_use']}";  ?></h5></li>
						    	</ul>
						    </li>						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_stage_of_development" class="text-info">Stage of Development</h4></li>
				    				<li><h5><?php  echo "{$row_info['Stage_of_development']}";  ?></h5></li>
						    	</ul>
						    </li>						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_comments" class="text-info">Comments</h4></li>
				    				<li><h5><?php  echo "{$row_info['Comments']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_company" class="text-info">Company</h4></li>
				    				<li><h5><?php  echo "{$row_info['Company']}";  ?></h5></li>
						    	</ul>
						    </li>						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_target_organism" class="text-info">Target Organism</h4></li>
				    				<li><h5>
									                                                                        <?php
                                                                                if ($row_info['Target_Organism'] == "unknow") {

                                                                                        echo "{$row_info['Target_Organism']}";

                                                                                }else{

                                                                                        $target_organism=$row_info['Target_Organism'];

                                                                                        $target_organism_array=explode("##", $target_organism);

                                                                                        echo "<ul class='list-unstyled'>";

                                                                                        for ($i=0; $i < count($target_organism_array) ; $i++ ) {

                                                                                                $temp=preg_replace("/\:/", ":</b>", $target_organism_array[$i]);

                                                                                                echo "<li><b>$temp</li>";
                                                                                        }

                                                                                        echo "</ul>";
                                                                                }



                                                                        ?>



								</h5></li>
						    	</ul>
						    </li>						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_reference" class="text-info">Reference</h4></li>
				    				<li>
									<?php
                                                                               if (preg_match("/\:\/\//",$row_info['Reference'])) {
											$temp = preg_replace("/\(/" , "</a>(" , $row_info['Reference']);
											$cc = preg_replace("/\(.*/" , "" , $row_info['Reference']);
                                                                                        echo "<a href='$cc'>$temp";

                                                                                }else{

                                                                                        $reference=$row_info['Reference'];

                                                                                        $reference_array=explode("##", $reference);

                                                                                        echo "<ul class='list-unstyled'>";

                                                                                        for ($i=0; $i < count($reference_array) ; $i++ ) {
												$number = $reference_array[$i];
												$number = preg_replace("/.*PMID:/" , "" ,$number ); 
												$number = preg_replace("/\)/" , "" ,$number);
                                                                                                
												$temp=preg_replace("/PMID\:/", "PMID:</b><a target='_blank'  href='http://www.ncbi.nlm.nih.gov/pubmed/$number'>", $reference_array[$i]);
												$temp = preg_replace("/\)/" , "</a>)" ,$temp);

                                                                                                echo "<li><b>$temp</li>";
                                                                                        }

                                                                                        echo "</ul>";
                                                                                }



                                                                        ?>

								</li>
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
