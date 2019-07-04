<?php
	require_once '../Public_Class/Fengyepage.class.php';
	require_once '../Public_Class/EmpService.class.php';
    require_once '../Public_Class/public_paging.class.php';
?>

<!DOCTYPE html>
<html lang="en">

<!--  toos: cd -search   -->

<head>
    <title>Physicochemical-Browse</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>


    <link href="../css/public_table.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_navil.css"  rel="stylesheet" type="text/css" media="screen" />
	<link href="../css/public_down.css"  rel="stylesheet" type="text/css" media="screen" />
	<script src="../js/public_browse.js"></script>

</head>

<body>


<?php
    require_once ("../head/head_content.php");

?>


<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dramp.cpu-bioinfor.org/browse">Browse</a></li>
            <li class="active">Physicochemical Data</li>
        </ol>
    </div>
    <div class="row mt40">

   <!-- the content -->

            <div class="row highlight">


</body>
</html>

<?php

$query_mysql_one="SELECT * FROM physical_amps";
$query_mysql_two="SELECT count(DRAMP_ID) FROM physical_amps";

include("../template/public_swith_navil.php");

$paging_quick=new Paging_me();
$paging_quick->paging($fengyepage->pageNow,$fengyepage->pageCount,$fengyepage->rowCount,$my_url,$begin,$end);

include("../template/browse_funtion.php");

echo "<div style='clear:both'></div>";
echo "<div>";

echo "<table summary='The browse' class='datatable'>";
echo<<<END_END
	<tr><th style="border-right-style: none"><input id="CheckAll" onclick="SelectAll('browse_parent','browse_child')" name="browse_parent" type="checkbox" /></th><th style="width:80px;border-left-style: none">DRAMP ID</th><th>Sequence</th><th>Length</th><th>Name</th><th>Mass</th><th>Formula</th><th>Absentaminoacids</th><th>Commonaminoacids</th><th>pI</th><th>Basicresidues</th><th>Acidicresidues</th><th>Netcharge</th><th>Basicresidues%</th><th>Acidicresidues%</th><th>Polarresidues</th><th>Polarresidues%</th><th>Hydrophobicresidues</th><th>Hydrophobicresidues%</th><th>Hydrophobicity</th><th>BomanIndex</th><th>HalfLifeMammalian</th><th>HalfLifeYeast</th><th>HalfLifeEcoli</th><th>AliphaticIndex</th><th>InstabilityIndex</th><th>Absorbance280nm</th><th>ExtinctionCoefficientCystines</th><th>ExtinctionCoefficientNocystines</th><th>Alanine</th><th>Alanine%</th><th>Arginine</th><th>Arginine%</th><th>Asparagine</th><th>Asparagine%</th><th>AsparticAcid</th><th>AsparticAcid%</th><th>Cysteine</th><th>Cysteine%</th><th>GlutamicAcid</th><th>GlutamicAcid%</th><th>Glutamine</th><th>Glutamine%</th><th>Glycine</th><th>Glycine%</th><th>Histidine</th><th>Histidine%</th><th>Isoleucine</th><th>Isoleucine%</th><th>Leucine</th><th>Leucine%</th><th>Lysine</th><th>Lysine%</th><th>Methionine</th><th>Methionine%</th><th>Phenylalanine</th><th>Phenylalanine%</th><th>Proline</th><th>Proline%</th><th>Serine</th><th>Serine%</th><th>Threonine</th><th>Threonine%</th><th>Tryptophan</th><th>Tryptophan%</th><th>Tyrosine</th><th>Tyrosine%</th><th>Valine</th><th>Valine%</th></tr>
END_END;
for ($i=0;$i<count($fengyepage->res_array);$i++){
	$row=$fengyepage->res_array[$i];
	if ($i%2 == 0) {
		echo "<tr class='altrow'><td style='border-right-style: none'><input type='checkBox' name='browse_child' value='{$row['DRAMP_ID']}' onclick='my_blast()'/></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Sequence']}</td><td>{$row['Length']}</td><td>{$row['Name']}</td><td>{$row['Mass']}</td><td>{$row['Formula']}</td><td>{$row['Absent_amino_acids']}</td><td>{$row['Common_amino_acids']}</td><td>{$row['pI']}</td><td>{$row['Basic_residues']}</td><td>{$row['Acidic_residues']}</td><td>{$row['Net_charge']}</td><td>{$row['Basic_residues_percent_']}</td><td>{$row['Acidic_residues_percent_']}</td><td>{$row['Polar_residues']}</td><td>{$row['Polar_residues_percent_']}</td><td>{$row['Hydrophobic_residues']}</td><td>{$row['Hydrophobic_residues_percent_']}</td><td>{$row['Hydrophobicity']}</td><td>{$row['Boman_Index']}</td><td>{$row['Half_Life__Mammalian_']}</td><td>{$row['Half_Life__Yeast_']}</td><td>{$row['Half_Life__E_coli_']}</td><td>{$row['Aliphatic_Index']}</td><td>{$row['Instability_Index']}</td><td>{$row['Absorbance_280nm']}</td><td>{$row['Extinction_Coefficient__Cystines_']}</td><td>{$row['Extinction_Coefficient__No_cystines_']}</td><td>{$row['Alanine']}</td><td>{$row['Alanine_percent_']}</td><td>{$row['Arginine']}</td><td>{$row['Arginine_percent_']}</td><td>{$row['Asparagine']}</td><td>{$row['Asparagine_percent_']}</td><td>{$row['Aspartic_Acid']}</td><td>{$row['Aspartic_Acid_percent_']}</td><td>{$row['Cysteine']}</td><td>{$row['Cysteine_percent_']}</td><td>{$row['Glutamic_Acid']}</td><td>{$row['Glutamic_Acid_percent_']}</td><td>{$row['Glutamine']}</td><td>{$row['Glutamine_percent_']}</td><td>{$row['Glycine']}</td><td>{$row['Glycine_percent_']}</td><td>{$row['Histidine']}</td><td>{$row['Histidine_percent_']}</td><td>{$row['Isoleucine']}</td><td>{$row['Isoleucine_percent_']}</td><td>{$row['Leucine']}</td><td>{$row['Leucine_percent_']}</td><td>{$row['Lysine']}</td><td>{$row['Lysine_percent_']}</td><td>{$row['Methionine']}</td><td>{$row['Methionine_percent_']}</td><td>{$row['Phenylalanine']}</td><td>{$row['Phenylalanine_percent_']}</td><td>{$row['Proline']}</td><td>{$row['Proline_percent_']}</td><td>{$row['Serine']}</td><td>{$row['Serine_percent_']}</td><td>{$row['Threonine']}</td><td>{$row['Threonine_percent_']}</td><td>{$row['Tryptophan']}</td><td>{$row['Tryptophan_percent_']}</td><td>{$row['Tyrosine']}</td><td>{$row['Tyrosine_percent_']}</td><td>{$row['Valine']}</td><td>{$row['Valine_percent_']}</td></tr>";
	}else{
	echo "<tr ><td style='border-right-style: none'><input type='checkbox' name='browse_child' value='{$row['DRAMP_ID']}' onclick='my_blast()'/></td><td style='border-left-style: none'><a href='../browse/All_Information.php?id={$row['DRAMP_ID']}'>{$row['DRAMP_ID']}</a></td><td>{$row['Sequence']}</td><td>{$row['Length']}</td><td>{$row['Name']}</td><td>{$row['Mass']}</td><td>{$row['Formula']}</td><td>{$row['Absent_amino_acids']}</td><td>{$row['Common_amino_acids']}</td><td>{$row['pI']}</td><td>{$row['Basic_residues']}</td><td>{$row['Acidic_residues']}</td><td>{$row['Net_charge']}</td><td>{$row['Basic_residues_percent_']}</td><td>{$row['Acidic_residues_percent_']}</td><td>{$row['Polar_residues']}</td><td>{$row['Polar_residues_percent_']}</td><td>{$row['Hydrophobic_residues']}</td><td>{$row['Hydrophobic_residues_percent_']}</td><td>{$row['Hydrophobicity']}</td><td>{$row['Boman_Index']}</td><td>{$row['Half_Life__Mammalian_']}</td><td>{$row['Half_Life__Yeast_']}</td><td>{$row['Half_Life__E_coli_']}</td><td>{$row['Aliphatic_Index']}</td><td>{$row['Instability_Index']}</td><td>{$row['Absorbance_280nm']}</td><td>{$row['Extinction_Coefficient__Cystines_']}</td><td>{$row['Extinction_Coefficient__No_cystines_']}</td><td>{$row['Alanine']}</td><td>{$row['Alanine_percent_']}</td><td>{$row['Arginine']}</td><td>{$row['Arginine_percent_']}</td><td>{$row['Asparagine']}</td><td>{$row['Asparagine_percent_']}</td><td>{$row['Aspartic_Acid']}</td><td>{$row['Aspartic_Acid_percent_']}</td><td>{$row['Cysteine']}</td><td>{$row['Cysteine_percent_']}</td><td>{$row['Glutamic_Acid']}</td><td>{$row['Glutamic_Acid_percent_']}</td><td>{$row['Glutamine']}</td><td>{$row['Glutamine_percent_']}</td><td>{$row['Glycine']}</td><td>{$row['Glycine_percent_']}</td><td>{$row['Histidine']}</td><td>{$row['Histidine_percent_']}</td><td>{$row['Isoleucine']}</td><td>{$row['Isoleucine_percent_']}</td><td>{$row['Leucine']}</td><td>{$row['Leucine_percent_']}</td><td>{$row['Lysine']}</td><td>{$row['Lysine_percent_']}</td><td>{$row['Methionine']}</td><td>{$row['Methionine_percent_']}</td><td>{$row['Phenylalanine']}</td><td>{$row['Phenylalanine_percent_']}</td><td>{$row['Proline']}</td><td>{$row['Proline_percent_']}</td><td>{$row['Serine']}</td><td>{$row['Serine_percent_']}</td><td>{$row['Threonine']}</td><td>{$row['Threonine_percent_']}</td><td>{$row['Tryptophan']}</td><td>{$row['Tryptophan_percent_']}</td><td>{$row['Tyrosine']}</td><td>{$row['Tyrosine_percent_']}</td><td>{$row['Valine']}</td><td>{$row['Valine_percent_']}</td></tr>";
	}
}

echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";


?>

<?php

        require_once("../head/footer.php");


?>


