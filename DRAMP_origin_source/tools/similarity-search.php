<!DOCTYPE html>
<html lang="en">

<!--  toos: sequence alignment   -->

<head>
    <title>Similarity Search-Tools</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>

</head>

<body>

<?php

    require_once ("../head/head_content.php");

?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dramp.cpu-bioinfor.org/tools/similarity-search.html">Tools</a></li>
            <li class="active">Similarity Search</li>
        </ol>
    </div>
    <div class="row mt40">
        <div class="col-md-3 mt30">
            <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">Tools</div>
            <div class="panel-footer">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="http://dramp.cpu-bioinfor.org/tools/similarity-search.php">Similarity search</a></li>
                        <li><a href="http://dramp.cpu-bioinfor.org/tools/prediction.php">Prediction</a></li>
                        <li><a href="http://dramp.cpu-bioinfor.org/tools/cd-search.php">CD Search</a></li>
                        <li><a href="http://dramp.cpu-bioinfor.org/tools/index.php">Sequence Alignment</a></li>
                    </ul>
            </div>
            </div>
      </div>

            <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">Browse</div>
            <div class="panel-footer">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="http://dramp.cpu-bioinfor.org/browse/GeneralData.php">General Data</a></li>
                    <li><a href="http://dramp.cpu-bioinfor.org/browse/PatentData.php">Patent Data</a></li>
                    <li><a href="http://dramp.cpu-bioinfor.org/browse/ClinicalTrialsData.php">Clinical Data</a></li>
                    <li><a href="http://dramp.cpu-bioinfor.org/browse/PhysicochemicalData.php">Physicochemical Data</a></li>
                </ul>
            </div>
        </div>
            </div>

        </div>

   <!-- the content -->

        <div class="col-md-offset-1  col-md-8 mt30" >

            <div class="row highlight">

            <ul class="nav nav-tabs nav-justified" id="myTab">
                <li class="active"><a href="#blast" data-toggle="tab">Blast</a></li>
                <li><a href="#ssearch" data-toggle="tab">Ssearch</a></li>
                <li><a href="#fasta" data-toggle="tab">FASTA</a></li>
            </ul>
                
            <!-- Tab panes -->
            <div class="col-md-12" style="background:white;">

            <div class="tab-content" style="padding-top:40px; padding-bottom:30px;" >
            <div class="tab-pane  active" id="blast">
                <!-- begin for form  -->
          <div class="col-md-12" sytle="background:white;">
          <form method="get" action="http://dramp.cpu-bioinfor.org/cgi-bin/seq-search/simi-search.cgi">
		<input  type = "hidden"  name="pass_key"  value ="<?php  echo $string;   ?>" />
             <div class="form-group">
                 <label for="seq_one">Sequence (FASTA)</label>
                 <textarea  name="simi_area" rows="5" class="form-control"  placeholder="Enter sequence"></textarea>
             </div>

             <div class="form-group mt20">
                  <label for="InputFile">Or,upload a file</label>
                  <input type="file" id="exampleInputFile" >
             </div>     

             <div class="form-group mt20">
                            <label for="seq_two">Scoring Matrix</label>
                            <select class="form-control input-lg" name="matrix">
                      
                                <option value="BLOSUM45">BLOSUM45</option>
                                <option value="BLOSUM50">BLOSUM50</option>
                                <option value="BLOSUM62" selected="selected">BLOSUM62</option>
                                <option value="BLOSUM80">BLOSUM80</option>
                                <option value="BLOSUM90">BLOSUM90</option>
                                <option value="PAM30">PAM30</option>
                                <option value="PAM70">PAM70</option>
                                <option value="PAM250">PAM250</option>
                                
                            </select>
             </div>

             <div class="form-group mt20">
                            <label for="seq_two"> Database</label>
                            <select class="form-control input-lg" name="database">
                      
                                <option value="DRAMP">DRAMP</option>
                                <option value="swissprot -remote">UniProtKB/Swiss-Prot</option>
                                <option value="pdb -remote">Protein Structure Sequence(PDB)</option>
                                               
                            </select>
             </div>

                  <button type="submit" class="btn btn-success btn-lg btn-block mt30">Submit</button>
                  <button type="reset" class="btn btn-success btn-lg btn-block">Reset</button>
                  <input type="hidden" name="search_name" value="blast">
 
          </form>
          </div>
            </div>
            <div class="tab-pane fade" id="ssearch">
          <div class="col-md-12" sytle="background:white;">
          <form method="get" action="http://dramp.cpu-bioinfor.org/cgi-bin/seq-search/simi-search.cgi">
		<input  type = "hidden"  name="pass_key"  value ="<?php  echo $string;   ?>" />
             <div class="form-group">
                 <label for="seq">Sequence (FASTA)</label>
                 <textarea  name="simi_area" rows="5" class="form-control"  placeholder="Enter sequence"></textarea>
             </div>

             <div class="form-group mt20">
                  <label for="InputFile">Or,upload a file</label>
                  <input type="file" id="exampleInputFile">
             </div>     

             <div class="form-group mt20">
                            <label for="score">Scoring Matrix</label>
                            <select class="form-control input-lg" name="matrix">

                    <option value="-s BL45">BLOSUM45</option>
                    <option value="-s BL50">BLOSUM50</option>
                    <option value="-s BL60">BLOSUM60</option>
                    <option value="-s BL62" selected="selected">BLASTP62</option>
                    <option value="-s BL80">BLOSUM80</option>
                    <option value="-s PAM120">PAM120</option>
                    <option value="-s PAM250">PAM250</option>
                    <option value="-s M10">MDM10</option>
                    <option value="-s M20">MDM20</option>
                    <option value="-s M40">MDM40</option>
                    
                            </select>
             </div>

             <div class="form-group mt20">
                            <label for="e-value uppper">E-value upper limit</label>
                            <select class="form-control input-lg" name="E-up">


                    <option value="20.0">20.0</option>
                    <option value="10.0">10.0</option>
                    <option value="5.0">5.0</option>
                    <option value="2.0">2.0</option>
                    <option value="1.0">1.0</option>
                    <option value="0.5">0.5</option>
                    <option value="0.2">0.2</option>
                    <option value="0.1">0.1</option>
                    <option value="0.005">0.005</option>
                    
                    
                            </select>
             </div>

             <div class="form-group mt20">
                            <label for="e-value lower">E-value lower limit</label>
                            <select class="form-control input-lg" name="E-low">

                    <option value="">none</option>
                    <option value="1e-10">1e-10</option>
                    <option value="1e-8">1e-8</option>
                    <option value="1e-6">1e-6</option>
                    <option value="1e-4">1e-4</option>
                    <option value="1e-2">1e-2</option>
                    <option value="1">1</option>
                    <option value="10">10</option>
                    
                            </select>
             </div>

             <div class="form-group mt20">
                            <label for="alignment">Alignments</label>
                            <select class="form-control input-lg" name="ali">


                    <option value="10">10</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                    
                    
                            </select>
             </div>

                  <button type="submit" class="btn btn-success btn-lg btn-block mt30">Submit</button>
                  <button type="reset" class="btn btn-success btn-lg btn-block">Reset</button>
                  <input type="hidden" name="search_name" value="ssearch35">
 
          </form>
          </div>
      </div>
            <div class="tab-pane fade" id="fasta">
          <div class="col-md-12" sytle="background:white;">
          <form method="get" action="http://dramp.cpu-bioinfor.org/cgi-bin/seq-search/simi-search.cgi">
		<input  type = "hidden"  name="pass_key"  value ="<?php  echo $string;   ?>" />

             <div class="form-group">
                 <label for="seq_one">Sequence (FASTA)</label>
                 <textarea  name="simi_area" rows="5" class="form-control"  placeholder="Enter sequence"></textarea>
             </div>

             <div class="form-group mt20">
                  <label for="InputFile">Or,upload a file</label>
                  <input type="file" id="exampleInputFile">
             </div>     

             <div class="form-group mt20">
                            <label for="score">Scoring Matrix</label>
                            <select class="form-control input-lg" name="matrix">

                    <option value="-s BL45">BLOSUM45</option>
                    <option value="-s BL50">BLOSUM50</option>
                    <option value="-s BL60">BLOSUM60</option>
                    <option value="-s BL62" selected="selected">BLASTP62</option>
                    <option value="-s BL80">BLOSUM80</option>
                    <option value="-s PAM120">PAM120</option>
                    <option value="-s PAM250">PAM250</option>
                    <option value="-s M10">MDM10</option>
                    <option value="-s M20">MDM20</option>
                    <option value="-s M40">MDM40</option>
                    
                            </select>
             </div>

             <div class="form-group mt20">
                            <label for="e-value uppper">E-value upper limit</label>
                            <select class="form-control input-lg" name="E-up">


                    <option value="20.0">20.0</option>
                    <option value="10.0">10.0</option>
                    <option value="5.0">5.0</option>
                    <option value="2.0">2.0</option>
                    <option value="1.0">1.0</option>
                    <option value="0.5">0.5</option>
                    <option value="0.2">0.2</option>
                    <option value="0.1">0.1</option>
                    <option value="0.005">0.005</option>
                    
                    
                            </select>
             </div>

             <div class="form-group mt20">
                            <label for="e-value lower">E-value lower limit</label>
                            <select class="form-control input-lg" name="E-low">

                    <option value="">none</option>
                    <option value="1e-10">1e-10</option>
                    <option value="1e-8">1e-8</option>
                    <option value="1e-6">1e-6</option>
                    <option value="1e-4">1e-4</option>
                    <option value="1e-2">1e-2</option>
                    <option value="1">1</option>
                    <option value="10">10</option>
                    
                            </select>
             </div>

             <div class="form-group mt20">
                            <label for="alignment">Alignments</label>
                            <select class="form-control input-lg" name="ali">


                    <option value="10">10</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                    
                    
                            </select>
             </div>



                  <button type="submit" class="btn btn-success btn-lg btn-block mt30">Submit</button>
                  <button type="reset" class="btn btn-success btn-lg btn-block">Reset</button>
                  <input type="hidden" name="search_name" value="fasta36">
 
          </form>
          </div>





      </div>    
            </div>
            </div>

            



        <div>
    </div>
</div>


</div>
</div>
</div>

<?php

  require_once ("../head/footer.php");


?>





</body>
</html>


















