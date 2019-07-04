<!DOCTYPE html>
<html lang="en">

<!--  toos: cd -search   -->

<head>
    <title>CD-Search-Tools</title>
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
            <li><a href="http://dramp.cpu-bioinfor.org/tools/index.php">Tools</a></li>
            <li class="active">CD-Search</li>
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
                <li class="active"><a href="#global" data-toggle="tab">CD Search</a></li>
            </ul>
                
            <!-- Tab panes -->
            <div class="col-md-12" style="background:white;">

            <div class="tab-content" style="padding-top:40px; padding-bottom:30px;" >
            <div class="tab-pane  active" id="global">
                <!-- begin for form  -->
            <div class="col-md-12" sytle="background:white;">
              <form method="get" action="http://dramp.cpu-bioinfor.org/cgi-bin/cd-search/cd_search.cgi">
		<input  type = "hidden"  name="pass_key"  value ="<?php  echo $string;   ?>" />
               <div class="form-group">
                   <label for="seq_one">Sequence (FASTA)</label>
                   <textarea name="seqs" class="form-control" rows="5"    placeholder="Enter sequence"></textarea>
               </div>
              <div class="form-group" style="padding-bottom:10px;">
                    <label for="database">database</label>
                    <select id="id_sel_db" name="db" class="form-control input-lg">
                        <option selected="" value="-db cdd -remote">CDD -- 44354 PSSMs</option>
                        <option value="-db oasis_pfam -remote">Pfam -- 13672 PSSMs</option>
                        <option value="-db oasis_smart -remote">SMART -- 1013 PSSMs</option>
                        <option value="-db oasis_kog -remote">KOG -- 4825 PSSMs</option>
                        <option value="-db oasis_cog -remote">COG -- 4873 PSSMs</option>
                        <option value="-db oasis_prk -remote">PRK -- 10885 PSSMs</option>
                        <option value="-db oasis_tigr -remote">TIGR -- 4284 PSSMs</option>
                    </select>
                </div>

               <div class="form-group">
                   <label for="seq_one">Except Value threshold</label>
                   <input type="text"  name="evalue" class="form-control input-lg" placeholder="0.01">
               </div>

               <div class="checkbox" style="padding-top:10px;padding-bottom:10px;">
                  <label>
                    <input type="checkbox" name="filter" value="-lcase_masking">Apply low-complexity filter
                  </label>
               </div>

               <div class="form-group">
                   <label for="seq_one">Maximum number of hits</label>
                   <input type="text"  name="maxhit" class="form-control input-lg" id="exampleInputEmail1" placeholder="500">
               </div>




                    <button type="submit" class="btn btn-success btn-lg btn-block mt30">Submit</button>
                    <button type="reset" class="btn btn-success btn-lg btn-block">Reset</button>

              </form>
            </div>
          </div>

        <div>
    </div>
</div>
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

