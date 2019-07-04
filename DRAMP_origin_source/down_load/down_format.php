<?php



echo<<<END_PAGE_ONE
	<html>
		<head>
		<script type="text/javascript">
			window.onload=function(){Format();}
		
			function Format(){
				var charset=document.getElementsByName("format[]");
				     n=0;
				for (i=0;i< charset.length;++i)
				{
					if (charset[i].checked)
					{
						n++;
					}
				}
				if (n == 0 )
				{
					document.getElementById("submit").disabled=true;
				}
				else 
				{
					document.getElementById("submit").disabled=false;
				}
			}
		
		</script>
		</head>
		<body>
END_PAGE_ONE;

if(!empty($_REQUEST['load_id'])){
	$load_id=$_REQUEST['load_id'];
	echo "<b>The DRAMP ID You Chose: <b>".$load_id;
}

echo<<<END_PAGE_TWO
			<h3>Please Chose Your Format</h3>
			<form action="download.php" method="post">
			<input name="format[]"  type="checkbox" value="xml"  onclick='Format()'  >xml</input>
			<input name="format[]" type="checkbox" value="html" onclick="Format()" >html</input>
			<input name="format[]" type="checkbox" value="xls"  onclick="Format()"  >xls</input>
			<input name="format[]" type="checkbox" value="fasta" onclick="Format()" >fasta</input>
			<input name="load_id" type="hidden"  value="$load_id"/>
			<input type="submit" id="submit" />
			</form>
END_PAGE_TWO;

?>