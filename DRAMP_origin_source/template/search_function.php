<?php
echo<<<END_PAGE_ONE
	<div id="myFunction">
			 	<label><small><i>DownLoad :</i></small><label>
				<a href="#" onclick="CreateFile('fasta','search_child')"><img src="../down_load/down_img/mime_fasta.png" alt="fasta"/></a><label></label><small>FASTA</small></label>
				<a href="#" onclick="CreateFile('html','search_child')"><img src="../down_load/down_img/mime_html.png" alt="html" /></a><label><small>HTML</small></label>
				<a href="#" onclick="CreateFile('xls','search_child')"><img src="../down_load/down_img/mime_xls.png" alt="xls" /></a><label><small>XLS</small></label>
				<a href="#" onclick="CreateFile('xml','search_child')"><img src="../down_load/down_img/mime_xml.png" alt="xml" /></a><label><small>XML</small></label>
				</div>
END_PAGE_ONE;
?>	