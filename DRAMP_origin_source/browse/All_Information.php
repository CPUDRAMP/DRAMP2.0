<?php 

require_once '../Public_Class/public_mysql_tool.class.php';

$this_id=$_REQUEST['id'];
#$this_id="DR0010";
$this_dataset=$_REQUEST['dataset'];

$this_dataset=ucwords($this_dataset);

if ($this_dataset == ""){

$query_mysql_one="SELECT Dataset FROM public_amps  WHERE DRAMP_ID = ";

$query_mysql=$query_mysql_one." \"".$this_id."\"";

//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

$mysql_helper=new public_mysql_tool();

$result=$mysql_helper->execute_dql($query_mysql);

$row_info=$result[0];

$this_dataset = $row_info['Dataset'];
}

//     get the dataset of data


if ($this_dataset == "Patent"){

	header("Location:patent-information.php?id=$this_id");

	exit();

}elseif ($this_dataset == "Clinical" ) {
		header("Location:clinical-information.php?id=$this_id");
		exit();
}



$query_mysql_one="SELECT * FROM general_amps WHERE DRAMP_ID = ";

$query_mysql=$query_mysql_one." \"".$this_id."\"";

//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

$mysql_helper=new public_mysql_tool();

$result=$mysql_helper->execute_dql($query_mysql);

$row_info=$result[0];
//print_r ($row_info);

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
							 <a href="#general">--General Information</a>
							 <ul class="nav">
								 <li><a href="#general_id">DRAMP ID</a></li>
								 <li><a href="#general_name">Peptide Name</a></li>
								 <li><a href="#general_source">Source</a></li>
								 <li><a href="#general_family">Family</a></li>
								 <li><a href="#general_gene">Gene</a></li>
								 <li><a href="#general_sequence">Sequence</a></li>
								 <li><a href="#general_swiss">Swiss-Prot Entry</a></li>
							 </ul>
						</li>

						<li>
						  <a href="#activity">--Activity Information</a>
						  <ul class="nav">
						    <li><a href="#activity-biological">Biological Activity</a></li>
						    <li><a href="#activity-target">Target Organism</a></li>
						    <li><a href="#activity-binding">Binding Target </a></li>
						  </ul>
						</li>

						<li>
						  <a href="#structure">--Structure Information</a>
						  <ul class="nav">
						    <li><a href="#structure-info">Structure</a></li>
						    <li><a href="#structure-description">Structure Description</a></li>
						    <li><a href="#structure-pdb">PDB ID</a></li>
						  </ul>
						</li>

						<li>
						  <a href="#physical">--Physical Information</a>
						  <ul class="nav">

						  </ul>
						</li>

						<li>
						  <a href="#comments">--Comments Information</a>
						  <ul class="nav">
						    <li><a href="#comments-Function">Function</a></li>
						    <li><a href="#comments-PTN">PTM</a></li>
						  </ul>
						</li>

						<li>
						  <a href="#literature">--Literature Information</a>
						  <ul class="nav">
						    <li><a href="#literature-pubmed">Pubmed ID</a></li>
						    <li><a href="#literature-author">Author</a></li>
						    <li><a href="#literature-reference">Reference</a></li>
						    <li><a href="#literature-title">Title</a></li>
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
	      				<h3 id="general">General Information</h3>
	    			</div>
	    			<div class="highlight">
	    				<ul class="list-unstyled">
	    					<li>
			 					<ul class="list-inline">
				    				<li><h4 id="general_id" class="text-info">DRAMP ID</h4></li>
				    				<li><h5><?php  echo "{$row_info['DRAMP_ID']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_name" class="text-info">Peptide Name</h4></li>
				    				<li><h5><?php  echo "{$row_info['Name']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_source" class="text-info">Source</h4></li>
				    				<li><h5><?php  echo "{$row_info['Source']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_family" class="text-info">Family</h4></li>
				    				<li><h5><?php  echo "{$row_info['Family']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_gene" class="text-info">Gene</h4></li>
				    				<li><h5><?php  echo "<i>{$row_info['Gene']}</i>";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_sequence" class="text-info">Sequence</h4></li>
				    				<li><h5><?php  echo "{$row_info['Sequence']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_sequence" class="text-info">Sequence Length</h4></li>
				    				<li><h5><?php  echo "{$row_info['Sequence_Length']}";  ?></h5></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_swiss" class="text-info">Swiss_Prot Entry</h4></li>
				    				<li><h5>
				    					<?php
				    					  	
										if ($row_info['Swiss_Prot_Entry'] == "No entry found"){
		echo "{$row_info['Swiss_Prot_Entry']}";

		}else{
		
	$swiss_temp =  $row_info['Swiss_Prot_Entry'];
        $swiss_temp = preg_replace ('/ /','',$swiss_temp);
        
        $swiss_prot_entry=explode(",",$swiss_temp);     
        
	$swiss_array=array();
				    						for ($i=0; $i < count($swiss_prot_entry) ; $i++) { 
				    							$swiss_temp="<a target='_blank' href='http://www.uniprot.org/uniprot/$swiss_prot_entry[$i]'>$swiss_prot_entry[$i]</a>";
				    							array_push($swiss_array,$swiss_temp);

				    						}
				    						$swiss_temp=implode(",", $swiss_array);
				    						echo "$swiss_temp";
	}
				    					  ?>

				    				</h5></li>
						    	</ul>
						    </li>					    
						</ul>
				    </div>
				</div>


	  <!-- Activity information   
	  ================================================== -->
	  			<div class="bs-docs-section">
	    			<div class="page-header">
	      				<h3 id="activity">Activity Information</h3>
	    			</div>
	    			<div class="highlight">
	    				<ul class="list-unstyled">
	 					    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="activity-biological" class="text-info">Biological Activity</h4></li>
				    				<li><h5><?php  echo "{$row_info['Activity']}";  ?></h5></li>
						    	</ul>
						    </li>
	 					    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="activity-target" class="text-info">Target Organism</h4></li>
				    				<li>

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

				    				</li>
						    	</ul>
						    </li>
	 					    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="activity-binding" class="text-info">Binding Traget</h4></li>
				    				<li><h5><?php  echo "{$row_info['Binding_Traget']}";  ?></h5></li>
						    	</ul>
						    </li>
	    				</ul>
	    			</div>
	  			</div>



	  <!-- Structure Information
	  ================================================== -->
	  			<div class="bs-docs-section">
	    			<div class="page-header">
	      				<h3 id="structure">Structure Information</h3>
	    			</div>
	    			<div class="highlight">
	    				<ul class="list-unstyled">
	    					<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-info" class="text-info">Structure</h4></li>
				    				<li><h5><?php  echo "{$row_info['Structure']}";  ?></h5></li>
						    	</ul>
						   	</li>
						   	<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-description" class="text-info">Structure Description</h4></li>
				    				<li><h5><?php  echo "{$row_info['Structure_Description']}";  ?></h5></li>
						    	</ul>
			   				</li>
			   				<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-pdb" class="text-info">PDB ID</h4></li>
				    				<li><h5>

											<?php 
		$pdb_3d = array();  // this is storage for pdb 3d
												if ( preg_match("/\#\#/",$row_info['PDB_ID'])) {

													$pdb_id_arry=explode("##", $row_info['PDB_ID']);

													$pdb_the_end=array();

													for ($i=0; $i < count($pdb_id_arry) ; $i++) { 
														
														$pdb_id_sub_arry=explode("resolved", $pdb_id_arry[$i]);



														$temp=preg_replace("/\s/","",$pdb_id_sub_arry[0]);

														$pdb_id_sub_arry_temp=explode(",",$temp);
														$pdb_arry=array();

				$pdb_3d = array_merge($pdb_3d,$pdb_id_sub_arry_temp);   //this is for the 3D structure
														for ($j=0; $j < count($pdb_id_sub_arry_temp) ; $j++) { 
															$temp="<a target='_blank' href='http://www.rcsb.org/pdb/explore/explore.do?structureId=$pdb_id_sub_arry_temp[$j]'>$pdb_id_sub_arry_temp[$j]</a>";
															array_push($pdb_arry,$temp);
														}	 

														$temp=implode(",",$pdb_arry);

														$pdb=array();

														array_push($pdb,$temp);

														array_push($pdb,$pdb_id_sub_arry[1]);

														$nn=implode(" resolved ", $pdb);

														array_push($pdb_the_end, $nn);

													}

														$pdb_end=implode(" ", $pdb_the_end);

														echo "$pdb_end";

												}else{

			$temp = $row_info['PDB_ID'] ;
			$pdb_id_sub_arry=explode("resolved", $temp);
			$temp=preg_replace("/\s/","",$pdb_id_sub_arry[0]);
                        $pdb_id_sub_arry_temp=explode(",",$temp);
			$pdb_3d = array_merge($pdb_3d,$pdb_id_sub_arry_temp);
                        $pdb_arry=array();
                        for ($j=0; $j < count($pdb_id_sub_arry_temp) ; $j++) {
				if ($pdb_id_sub_arry_temp[$j] == "Unknow"){
				$temp = $pdb_id_sub_arry_temp[$j];
				}else{
                       		$temp="<a target='_blank'  href='http://www.rcsb.org/pdb/explore/explore.do?structureId=$pdb_id_sub_arry_temp[$j]'>$pdb_id_sub_arry_temp[$j]</a>";
                		}       
			array_push($pdb_arry,$temp);
                        }
                        $temp=implode(",",$pdb_arry);
			
			if ($pdb_id_sub_arry[1])
			$temp = "$temp resolved $pdb_id_sub_arry[1]";
			
			echo "$temp";
		}
	?>
									</h5></li>
						    	</ul>
						    </li>

						    <li>
							<ul class="list-inline">
							<li>
						    	<?php
						    		$path="/var/www/tmp/all_info_png";

						    		$png_name="{$row_info['DRAMP_ID']}";

						    		$file_prefix="pepwheel_"."$png_name";

						    		$file_name = "pepwheel_"."$png_name.1.png";

						    		$src_path="http://dramp.cpu-bioinfor.org/tmp/all_info_png/$file_name";

						    		if (file_exists($path/$file_name)) {
						    			
						    			echo "<img src='$src_path' alt='$png_name helical wheel diagram' class='img-thumbnail img-responsive' width='330' height='400' />";
						    			
						    		}else{
										$query_structure= "echo '>{$row_info['DRAMP_ID']}\\n{$row_info['Sequence']}' > $path/$png_name.fa";
										system ($query_structure);

										$query_structure= "pepwheel $path/$png_name.fa -graph png -goutfile $file_prefix -gtitle '$png_name helical wheel diagram' -gsubtitle '' -gdirectory  $path";
										exec ($query_structure);
										#echo "$query_structure";

										
										echo "<img src='$src_path' alt='$png_name helical wheel diagram' class='img-thumbnail img-responsive' width='330' height='450'/>";
										
									}
						    		#echo "$query_structure";
						    	?>

						   	</li>
			
							<li>
				<?php
					$src_path = "http://dramp.cpu-bioinfor.org/tmp/structure_3D/";
					foreach ($pdb_3d as $threed) {
						$src_path = $src_path.$threed.".png";
						//	echo  $threed;
						$file_path = "/var/www/tmp/structure_3D/".$threed.".png";
						if (file_exists($file_path)){
							echo  $threed."->&nbsp";
							echo "<img   src='$src_path'  class='img-thumbnail img-responsive' width='240px;'  height='200px'/>";
						}
					}

				?>
							</li>

	    				</ul>
	    			</div>
	  			</div>

				<?php 

					$query_mysql_one="SELECT * FROM physical_amps WHERE DRAMP_ID = ";

					$query_mysql=$query_mysql_one." \"".$this_id."\"";

					//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

					$mysql_helper=new public_mysql_tool();

					$result=$mysql_helper->execute_dql($query_mysql);

					$physical_info=$result[0];

				?>
	  <!-- Physical Information
	  ================================================== -->
				<div class="bs-docs-section">
				    <div class="page-header">
				      <h3 id="physical">Physical Information</h3>
				    </div>

					<div class="highlight">

						<div class="col-md-6">
							<ul class="list-unstyled">
								<li>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Formula</h4></li>
			   							<li><h5><? echo "{$physical_info['Formula']}"; ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Absent Amino Acids</h4></li>
			   							<li><h5><? echo "{$physical_info['Absent_amino_acids']}"; ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Common Amino Acids</h4></li>
			   							<li><h5><? echo "{$physical_info['Common_amino_acids']}"; ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Mass</h4></li>
			   							<li><h5><? echo round($physical_info['Mass'],2); ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >PI</h4></li>
			   							<li><h5><? echo round($physical_info['pI'],2); ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Basic Residues</h4></li>
			   							<li><h5><? echo "{$physical_info['Basic_residues']}"; ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Acidic Residues</h4></li>
			   							<li><h5><? echo "{$physical_info['Acidic_residues']}"; ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Hydrophobic Residues</h4></li>
			   							<li><h5><? echo "{$physical_info['Hydrophobic_residues']}"; ?><h5></li>
			   						</ul>

			   					</li>

							</ul>
						</div>
						<div class="col-md-6">
							<ul class="list-unstyled">
								<li>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Boman Index</h4></li>
			   							<li><h5><? echo round($physical_info['Boman_Index'],2); ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Hydrophobicity</h4></li>
			   							<li><h5><? echo round($physical_info['Hydrophobicity'],2); ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Aliphatic Index</h4></li>
			   							<li><h5><? echo round($physical_info['Aliphatic_Index'],2); ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Half Life</h4></li>
			   							<li>
			   								<ul class="list-unstyled">
			   									<li><? echo "Mammalian:{$physical_info['Half_Life__Mammalian_']}"; ?></li>
			   									<li><? echo "Yeast:{$physical_info['Half_Life__Yeast_']}"; ?></li>
			   									<li><? echo "E.coli:{$physical_info['Half_Life__E_coli_']}"; ?></li>
			   								</ul>
			   							</li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Extinction Coefficient Cystines</h4></li>
			   							<li><h5><? echo "{$physical_info['Extinction_Coefficient__Cystines_']}"; ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Absorbance 280nm</h4></li>
			   							<li><h5><? echo round($physical_info['Absorbance_280nm'],2); ?><h5></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Polar Residues</h4></li>
			   							<li><h5><? echo "{$physical_info['Polar_residues']}"; ?><h5></li>
			   						</ul>
			   					</li>

							</ul>
						</div>

				        <style>
				            #chartContainer{
				                border:solid 1px #999;
				                
				            }
				        </style>

				        <script src="http://cloud.github.com/downloads/scottkiss/H5Draw/H5Draw.js"></script>
				        <script src="http://cloud.github.com/downloads/scottkiss/H5Draw/h5Charts.js"></script>
				        
				        <script>
				            window.onload = function(){
				            var chart = new h5Charts.SerialChart();
				            chart.dataProvider = [{acid:"A",number:<?php echo "{$physical_info['Alanine']}"; ?>},{acid:"R",number:<?php echo "{$physical_info['Arginine']}"; ?>},{acid:"N",number:<?php echo "{$physical_info['Asparagine']}"; ?>},{acid:"D",number:<?php echo "{$physical_info['Aspartic_Acid']}"; ?>},{acid:"C",number:<?php echo "{$physical_info['Cysteine']}"; ?>},{acid:"E",number:<?php echo "{$physical_info['Glutamic_Acid']}"; ?>},{acid:"Q",number:<?php echo "{$physical_info['Glutamine']}"; ?>},{acid:"G",number:<?php echo "{$physical_info['Glycine']}"; ?>},{acid:"H",number:<?php echo "{$physical_info['Histidine']}"; ?>},{acid:"I",number:<?php echo "{$physical_info['Isoleucine']}"; ?>},{acid:"L",number:<?php echo "{$physical_info['Leucine']}"; ?>},{acid:"K",number:<?php echo "{$physical_info['Lysine']}"; ?>},{acid:"M",number:<?php echo "{$physical_info['Methionine']}"; ?>},{acid:"F",number:<?php echo "{$physical_info['Phenylalanine']}"; ?>},{acid:"P",number:<?php echo "{$physical_info['Proline']}"; ?>},{acid:"S",number:<?php echo "{$physical_info['Serine']}"; ?>},{acid:"T",number:<?php echo "{$physical_info['Threonine']}"; ?>},{acid:"W",number:<?php echo "{$physical_info['Tryptophan']}"; ?>},{acid:"Y",number:<?php echo "{$physical_info['Tyrosine']}"; ?>},{acid:"V",number:<?php echo "{$physical_info['Valine']}"; ?>}];
				            chart.categoryField = "acid";
				            chart.valueField = "number";
				            chart.type = "column";
				            chart.columnWidth = 30;
				            chart.colors = ["#f00","#0f0","#0ff","#d649b3","#00e0ee","#59266c","#00f","#0f0","#056a4c","#f00","#f00","#909648","#0ff","#c87ae5","#0ff","#0f0","#899508","#0f0","#056a4c","#f00","#6f1391"];
				            chart.addTo("chartContainer");
				            };
				        </script>

				    	
				    	
				        <canvas id="chartContainer" width="800" height="400">
				             browser doesn't support html5
				        </canvas>
				        <p class="text-center">Amino Acid Distribution</p>


								<?php
						    		$path="/var/www/tmp/all_info_png";

						    		$png_name="{$row_info['DRAMP_ID']}";

						    		$file_prefix="pepwindow_"."$png_name";

						    		$file_name = "pepwindow_"."$png_name.1.png";

						    		$src_path="http://dramp.cpu-bioinfor.org/tmp/all_info_png/$file_name";

						    		if (file_exists($path/$file_name)) {
						    			
						    			echo "<img src='$src_path' alt='$png_name hydropathy plot' class='img-thumbnail img-responsive' width='400' height='400' />";
						    			
						    		}else{
										$query_structure= "echo '>{$row_info['DRAMP_ID']}\\n{$row_info['Sequence']}' > $path/$png_name.fa";
										system ($query_structure);

										$query_structure= "pepwindow $path/$png_name.fa -graph png -goutfile $file_prefix -gtitle '$png_name hydropathy plot'  -gdirectory  $path  -length 18";
										exec ($query_structure);
										#echo "$query_structure";

										
										echo "<img src='$src_path' alt='$png_name hydropathy plot' class='img-thumbnail img-responsive' width='400' height='400'/>";
										
									}
						    		#echo "$query_structure";


						    	?>
					</div>
				 </div>



	  <!-- Comments Information
	  ================================================== -->
				<div class="bs-docs-section">
				    <div class="page-header">
				      <h3 id="comments">Comments Information</h3>
				    </div>

					<div class="highlight">
						<ul class="list-unstyled">

							<?php
								$str = $row_info['Comments'];
								$temp= explode("\n",$str);
								for ($i= 0;$i< count($temp); $i++){
									$str= $temp[$i];
									$tt= explode(":", $str);
									echo "<li>";
									echo "<ul class='list-inline'>";
									echo "<li><h4 id='comments-$tt[0]' class='text-info'>$tt[0]</h4></li>";
									echo "<li><h5>$tt[1]</h5></li>";
									echo "</ul>";
									echo "</li>";
								}
							?>

	    				</ul>
					</div>
				</div>



	  <!-- Literature Information
	  ================================================== -->
				 <div class="bs-docs-section">
				    <div class="page-header">
				      <h3 id="literature">Literature Information</h3>
				    </div>

					<div class="highlight">
						<?php
							$pubmed_id = explode("##", $row_info['Pubmed_ID']);
							$reference = explode("##", $row_info['Reference']);
							$author = explode("##", $row_info['Author']);
							$title = explode("##", $row_info['Title']);
								
							for ($i= 0;$i< count($pubmed_id); $i++){
								$num=$i+1;
echo<<<LL_IN
						<ul class="list-unstyled">
							<li>Literature $num</li>
	    					<li>
			   					<ul class="list-inline">
				    				<li><h4 id="literature-pubmed" class="text-info">Pubmed ID</h4></li>
				    				<li><h5><a target='_blank'  href="http://www.ncbi.nlm.nih.gov/pubmed/?term={$pubmed_id[$i]}">{$pubmed_id[$i]}</a></h5></li>
						    	</ul>
						   	</li>
						   	<li>
			   					<ul class="list-inline">
				    				<li><h4 id="literature-reference" class="text-info">Reference</h4></li>
				    				<li><h5>{$reference[$i]}</h5></li>
						    	</ul>
			   				</li>
						   	<li>
			   					<ul class="list-inline">
				    				<li><h4 id="literature-reference" class="text-info">Author</h4></li>
				    				<li><h5>{$author[$i]}</h5></li>
						    	</ul>
			   				</li>
			   				<li>
			   					<ul class="list-inline">
				    				<li><h4 id="literature-title" class="text-info">Title</h4></li>
				    				<li><h5>{$title[$i]}</h5></li>
						    	</ul>
						    </li>

	    				</ul>
LL_IN;
							}

						?>

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
