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

      <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="./js/jquery-1.js"></script>
    <script type="text/javascript" src="./js/jquery.js"></script>   
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
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
                <li class="active">Download Software (FTP)</li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-bordered text-center">
        <thead >
          <tr >
            <th rowspan="2">Software Name</th>
            <th colspan="3" class="text-center">Operating system</th>
          </tr>
          <tr class="text-center">
            <th>Linux</th>
            <th>Windows</th>
            <th>Source Code</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>BLAST</td>
            <td><a href="opensource/BLAST/">ncbi-blast-2.2.28+-x64-linux.tar.gz<a/><br/><a href="opensource/ncbi-blast-2.2.28+/">ncbi-blast-2.2.28+-ia32-linux.tar.gz</a></td>
            <td><a href="opensource/BLAST/">ncbi-blast-2.2.28+-win32.exe</a><br/><a href="opensource/ncbi-blast-2.2.28+/">ncbi-blast-2.2.28+-win64.exe</a></td>
            <td></td>
          </tr>
          <tr>
            <td>Clustal Omega</td>
            <td><a href="opensource/clustalo/">clustalo-1.1.0-linux-32</a><br/><a href="opensource">clustalo-1.1.0-linux-64</a></td>
            <td><a href="opensource/clustalo/">clustal-omega-1.1.0-win32.zip</a></td>
            <td><a href="opensource/clustalo/">clustalo-source code.tar.gz</a></td>
          </tr>
          <tr>
            <td>ClustalW</a></td>
            <td><a href="opensource/clustalw/">clustalw-2.1-linux-x86_64-libcppstatic.tar.gz</a><br/><a href="opensource">clustalx-2.1-linux-i686-libcppstatic.tar.gz</a></td>
            <td><a href="opensource/clustalw/">clustalx-2.1-win.msi</a></td>
            <td><a href="opensource/clustalw/">clustalw-source code.tar.gz</a></td>
          </tr>
          <tr>
            <td>T-COFFEE</td>
            <td><a href="opensource/T-COFFEE/">T-COFFEE_installer_Version_9.03.r1318_linux_i386.bin</a><br/><a href="opensource">T-COFFEE_installer_Version_9.03.r1318_linux_x64.bin</a></td>
            <td></td>
            <td><a href="opensource/T-COFFEE/">T-COFFEE_disdivibution_Version_9.03.r1318.tar.gz</a></td>
          </tr>
          <tr>
            <td>MUSCLE</td>
            <td><a href="opensource/MUSCLE/">muscle3.8.31_i86linux32.tar.gz</a><br/><a href="opensource/MUSCLE/">muscle3.8.31_i86linux64.tar.gz</a></td>
            <td><a href="opensource/MUSCLE/">muscle3.8.31_i86win32.exe</a></td>
            <td><a href="opensource/MUSCLE/">muscle3.8.425_binaries.tar.gz</a></td>
          </tr>
          <tr>
            <td>EMBOSS-6.5.7</td>
            <td colspan="3"><a href="opensource">EMBOSS-6.5.7.tar.gz</a>(<a href="http://www.ncbi.nlm.nih.gov/Sdivucture/bwrpsb/bwrpsb.cgi">http://www.ncbi.nlm.nih.gov/Sdivucture/bwrpsb/bwrpsb.cgi</a>)</td>
          </tr>
          <tr>
            <td>WebLogo-3.3</td>
            <td colspan="3"><a href="opensource">weblogo-3.3.zip</a>(<a href="http://weblogo.threeplusone.com/create.cgi">http://weblogo.threeplusone.com/create.cgi</a>)</td>
          </tr>
          <tr>
            <td>FASTA</td>
            <td colspan="3"><a href="opensource">FASTA.zip</a>(<a href="http://www.ebi.ac.uk/Tools/sss/fasta/">http://www.ebi.ac.uk/Tools/sss/fasta/</a>)</td>

          </tr>
        </tbody>
    </table>
</div>


<?php

    require_once ("../head/footer.php");

?>




</body>
</html>