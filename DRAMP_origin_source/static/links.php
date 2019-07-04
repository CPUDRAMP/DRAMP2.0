<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome To Dramp Database</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
	<script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
</head>
<body>

<?php

	require_once("../head/head.php");

?>


<div class="container">
<div id="home"><a href="../index.html">Home</a></div>
<div id="maincontent">
			 <h2>Useful Links</h2>
              <div class="main_form">
              <div class="link_form">
              <h3>Useful Resources</h3>
                <div class="col1">
                    <div class="line1">Name</div>
                    <div class="line2"><strong>NCBI</strong><br />(National Center for Biotechnology Information)</div>
                    <div class="line3"><strong>ExPAsy</strong><br />(Expert Protein Analysis System)</div> 
                    <div class="line3"><strong>ClinicalTrials.gov</strong></div>
                    <div class="line3"><strong>EudraCT</strong><br />(European Union Drug Regulating Authorities Clinical Trials)</div> 
                    <div class="line6"><strong>Patent Lens</strong></div>                                                            
                </div>
                <div class="col2">
                    <div  class="line1">Description</div>
                    <div class="line2"><p>The NCBI holds a series of databases relevant to biotechnology and biomedicine. Major databases include <strong>GenBank</strong> for DNA sequences and <strong>PubMed</strong> for biomedical literature.</p></div>
                    <div class="line3"><p><strong>ExPASy</strong> is a bioinformatics resource portal accessing many scientific resources, databases and software tools in different areas of life sciences.</p></div>
                    <div class="line3"><p>The largest <strong>clinical trials database</strong>, currently holding registrations from over 144,133 trials from more than 170 countries in the world.</p></div>
                    <div class="line3"><p><strong>EudraCT</strong> is the <strong>European Clinical Trials Database</strong> of all clinical trials commencing in the European Union from 1 May 2004 onwards.</p></div>
                    <div class="line6"><p><strong>The Patent Lens</strong> is an online <strong>patent search</strong> facility and knowledge resource, which allows free searching of over 10 million full-text patent documents.</p></div>                           
                </div>
                <div class="col3">
                    <div  class="line1">Link</div>
                    <div class="line2"><a href="http://www.ncbi.nlm.nih.gov">http://www.ncbi.nlm.nih.gov/</a></div>                   
                    <div class="line3"><a href="http://www.expasy.org">http://www.expasy.org/</a></div>
                    <div class="line3"><a href="http://www.clinicaltrials.gov">http://www.clinicaltrials.gov/</a></div> 
                    <div class="line3"><a href="https://www.clinicaltrialsregister.eu">https://www.clinicaltrialsregister.eu/</a></div>
                    <div class="line6"><a href="http://www.patentlens.net">http://www.patentlens.net/</a></div>                   
                </div>
              </div>
              <!--end #link_form-->
               <div class="link_form">
              <h3>General Databases</h3>
                <div class="col1">
                    <div class="line1">Name</div>
                    <div class="line2">UniProtKB/Swiss-Prot</div>
                    <div class="line3"><strong>PDB</strong> (Protein Data Bank)</div>
                    <div class="line6"><strong>PubMed</strong></div>                                    
                </div>
                <div class="col2">
                    <div  class="line1">Description</div>
                    <div class="line2"><p>UniProtKB/Swiss-Prot is a high-quality, manually annotated, non-redundant protein sequence and annotation database.</p></div>
                    <div class="line3"><p><strong>PDB</strong> is a repository for the 3-D structural data of Biological macromolecules (X-ray or NMR method)</p></div> 
                    <div class="line6"><p>PubMed is a free database accessing primarily the MEDLINE database of references and abstracts on life sciences and biomedical topics. As of 24 March 2013, PubMed has over <strong>22.6 million citations</strong>.</strong></p></div>                         
                </div>
                <div class="col3">
                    <div  class="line1">Link</div>
                    <div class="line2"><a href="http://www.uniprot.org/uniprot/">http://www.uniprot.org/uniprot/</a></div>                   
                    <div class="line3"><a href="http://www.wwpdb.org/">http://www.wwpdb.org/</a></div> 
                    <div class="line6"><a href="http://www.ncbi.nlm.nih.gov/pubmed/">http://www.ncbi.nlm.nih.gov/pubmed/</a></div>               
                </div>
              </div>
               <div class="link_form">
              <h3>Bioactive Peptide Databases</h3>
                <div class="col1">
                    <div class="line1">Name</div>
                    <div class="line4"><strong>PepBank</strong></div>
                    <div class="line3"><strong>AMSDb</strong></div> 
                    <div class="line4"><strong>APD2</strong><br />(old version: APD)</div> 
                    <div class="line4"><strong>CAMP</strong></div> 
                    <div class="line4"><strong>AMPer</strong></div>
                    <div class="line4"><strong>DAMPD<br /></strong>(Old: ANTIMIC)</div>
                    <div class="line4"><strong>BAGEL</strong></div>
                    <div class="line4"><strong>BACTIBASE</strong></div>
                    <div class="line4"><strong>PhytAMP</strong></div>
                    <div class="line4"><strong>Defensins knowledgebase</strong></div>
                    <div class="line4"><strong>PenBase</strong></div>
                    <div class="line6"><strong>RAPD</strong></div>                                                          
                </div>
                <div class="col2">
                    <div  class="line1">Description</div>
                    <div class="line4"><p>A database of peptides based on sequence text mining and public peptide data sources.</p></div>
                    <div class="line3"><p>This database contains the sequences of gene encoded antimicrobial peptides and proteins.</p></div>
                    <div class="line4"><p>Antimicrobial peptide database, currently containing 2211 AMPs.</p></div>
                    <div class="line4"><p>Database of antimicrobial peptides and proteins.</p></div> 
                    <div class="line4"><p>A database and an dutomated discovery tool for gene encoded antimicrobial peptides.</p></div>
                    <div class="line4"><p>A manually curated database of known and putative antimicrobial peptides.</p></div>
                    <div class="line4"><p>A genome mining tool for putative bacteriocin gene clusters detection.</p></div>
                    <div class="line4"><p>BACTIBASE is a data repository of bacteriocin natural antimicrobial peptides</p></div>
                    <div class="line4"><p>Database of plant antimicrobial peptides and proteins.</p></div>
                    <div class="line4"><p>Database of antimicrobial peptides from the defensins family.</p></div>
                    <div class="line4"><p>PenBase is a curated database devoted to Shrimp Penaeidin.</p></div>
                    <div class="line6"><p>Database of recombinantly-produced antimicrobial peptides.</p></div>                         
                </div>
                <div class="col3">
                    <div  class="line1">Link</div>
                    <div class="line4"><a href="http://pepbank.mgh.harvard.edu">http://pepbank.mgh.harvard.edu/</a></div>                   
                    <div class="line3"><a href="http://www.bbcm.univ.trieste.it/~tossi/amsdb.html">http://www.bbcm.univ.trieste.it/~tossi/<br />amsdb.html</a></div>
                    <div class="line4"><a href="http://aps.unmc.edu/AP/main.php">http://aps.unmc.edu/AP/main.php</a></div> 
                    <div class="line4"><a href="http://www.bicnirrh.res.in/antimicrobial/">http://www.bicnirrh.res.in/antimicrobial</a></div>
                    <div class="line4"><a href="http://marray.cmdr.ubc.ca/cgi-bin/amp.pl">http://marray.cmdr.ubc.ca/cgi-bin/<br />amp.pl</a></div>
                    <div class="line4"><a href="http://apps.sanbi.ac.za/dampd/">http://apps.sanbi.ac.za/dampd/</a></div>
                    <div class="line4"><a href="http://bagel2.molgenrug.nl/">http://bagel2.molgenrug.nl/</a></div>
                    <div class="line4"><a href="http://bactibase.pfba-lab-tun.org">http://bactibase.pfba-lab-tun.org</a></div>
                    <div class="line4"><a href="http://phytamp.pfba-lab-tun.org/">http://phytamp.pfba-lab-tun.org/</a></div>
                    <div class="line4"><a href="http://defensins.bii.a-star.edu.sg/">http://defensins.bii.a-star.edu.sg/</a></div>
                    <div class="line4"><a href="http://penbase.immunaqua.com/">http://penbase.immunaqua.com/</a></div>
                    <div class="line6"><a href="http://faculty.ist.unomaha.edu/chen/rapd/">http://faculty.ist.unomaha.edu/chen/
                    <br />rapd/</a></div>                   
                </div>	
              </div>
              <!--end #link_form--> 
              <p id="disclaimer"><span>Disclaimer</span>: For links available from this website, we do not assume any legal liability or responsibility for the accuracy, completeness, or usefulness of any information.</p>
              </div>
              <!--end #main_form-->                      
</div>
<!--end #maincontent-->
	<!-- end #footer -->
</div>


<?php
	require_once("../head/footer.php");

?>
 <!--end #page-->
</body>
</html>
