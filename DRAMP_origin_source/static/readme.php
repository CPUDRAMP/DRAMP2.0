<!DOCTYPE html>
<html lang="en">
<head>
	<title>ReadMe</title>
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
			 <h2>A brief introduction to DRAMP database</h2>
              <div class="mainform_read">
              <h3>What is DRAMP Database? </h3>
              <p>DRAMP database is an information portal to biological active peptides. The source of peptides in this database
               can be broadly divided into three parts: <strong>Public databases</strong> (Swiss-Prot, PDB, PubMed), <strong>Clinical antimicrobial peptides</strong> (preclinical and clinical) and <strong>Patents</strong>.</p>
              <h3>Why DRAMP Database is created?</h3>
              <p>Antimicrobial peptides (AMPs) are widely distributed in nature and have served a fundamental role in the innate immune response against pathogens. The growing problem of resistance to conventional antibiotics and the need for new antibiotics have stimulated great interest in the development of AMPs as a novel therapeutic approach to combat bacterial infections. A variety of useful AMP related databases have been established, all either at the level of specific classes or limited collection of AMPs. To fill this gap, we developed a high quality, user-friendly DRAMP database dedicated to making a comprehensive repository of AMPs. The current version of DRAMP holds 18013 antimicrobial sequences, including 6155 natural AMPs and 11858 synthetic peptides. Each entry in DRAMP has detailed annotations, especially detailed antimicrobial activity data and cytotoxicity data. Also, the information on AMPs is very easy to extract from this database. In addition, more advanced web technologies such as Ajax were used to allow more dynamic user navigates in DRAMP. Several useful sequence analysis tools, such as similarity search, sequence alignment and Conserved Domain Search (CD-Search), are also provided and integrated into DRAMP.</p>
              <h3>What is in DRAMP Database?</h3>
               <p>The current version of DRAMP holds 18013 antimicrobial sequences, including 6155 natural AMPs and 11858 synthetic peptides. Information related to peptides in DRAMP can be divided into <strong>six parts</strong>:</p>
                        <ol>
                            <li><span>General information</span>: DRAMP ID, Sequence (mature peptide), Sequence Length (all <=100), Peptide name/class, Gene, Source, Family, Swiss-Prot ID (for future information).</li>
                            <li><span>Activity information</span>: Biological Activity (e.g. Antibacterial), Target Organism (with detailed activity value), Binding Targets (if known).</li>
                            <li><span>Structure information</span>: Structure (second structure), Structure Description (structure activity relationship), PDB ID (for future information).</li>
                            <li><span>Physicochemical information</span>: Length, Molecular weight, Theoretical pI, Amino acid composition, Net charge, Formula, Extinction coefficient, Estimated half-life (mammalian, yeast and E. coli), Instability index, Aliphatic index, Grand average of hydropathicity (GRAVY).</li>
                            <li><span>Comments</span>: Contain Function, Mode of action (MOA), Post-translational modification (PTM), and Toxicity (Hemolytic or Cytotoxicity), et al.</li>
                            <li><span>Literature Information</span>: Pubmed ID, Reference, Author and Title.</li>
                        </ol>

                    <p><strong>The following people have contributed to creating DRAMP Database:</strong></p>
                    <ul>
                    <li>Mr. Heng Zheng (PhD, Professor)</li>
                    <li>Mr. Jian Sun (Master, data collection and overall design)</li>
                    <li>Ms. Lin-Lin Fan (front-end achieve)</li>
                    <li>Mr. Mei-Feng Zhou (back-end achieve)</li>
                    </ul>
                    <p id="disclaimer"><span>Disclaimer:</span> The DRAMP Database is provided as it is and we do not assume any liability or responsibility for any loss due to the use of this system and data. </p>
                  
              
  </div>
              <!--end #mainform_read-->                       
</div>
<!--end #maincontent-->
</div>

<?php
require_once("../head/footer.php");

?>

</body>
</html>
