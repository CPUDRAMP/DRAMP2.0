<?php
	
echo "<table summary='The Result Of Ser' class='datatable' >";
	
	
echo<<<END_PAGE_TREE
	 <tr>	<th style="border-right-style: none"><input id="CheckAll" onclick="SelectAll('search_all','search_child')" name="search_all" type="checkbox" /></th><th style="width:90px;border-left-style: none">RDAMP ID</th><th>Peptide Name</th><th>Source</th><th>Sequence</th><th>Activity</th><th>Swiss_Prot Entry</th></tr>
END_PAGE_TREE;


for ($i=0;$i<count($fengyepage->res_array);$i++){
	$row=$fengyepage->res_array[$i];
	if ($i%2 == 0) {
	echo"<tr  class='altrow'><td style='border-right-style: none'><input type='checkBox' name='search_child' value='{$row['DRAMP_ID']}' /></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}&dataset={$row['Dataset']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Sequence']}</td><td>{$row['Activity']}</td><td>{$row['Swiss_Prot_Entry']}</td></tr>";
	}else{
	echo "<tr ><td style='border-right-style: none'><input type='checkBox' name='search_child' value='{$row['DRAMP_ID']}' /></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Sequence']}</td><td>{$row['Activity']}</td><td>{$row['Swiss_Prot_Entry']}</td></tr>";
	}
}

echo "</table>";




?>
