#!/usr/bin/perl -w
     
use strict;
use DBI;      
#print "Content-type:text/html\n\n";
use CGI qw(:all); 

#print "Content-type:text/html\n\n";
my $database="peptide";
my $hostname="localhost";
my $port=80;
my $user="root";
my $password="09441";
my $name="search";
print header;

print<<END_QUICK_SEARCH;
	 <html>
	 <head>
	 	<title>The Results Of QuickSearch</title>
	 	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	 	<link href="../css/quick_search.css" rel="stylesheet" type="text/css" media="screen" />
	 	<script type="text/javascript">
	 		window.onload=function(){my_blast();}
	 		function createOrder()
				{
					quick_search=document.forms[0].quick_search
					txt=""
					
					for (i=0;i<quick_search.length;++ i)
					{
						if (quick_search[i].checked)
					{
						txt=txt + quick_search[i].value + " "
						}
					}
				
					var x=document.getElementById("my_quick_search_form")
					windows.location.href="download.cgi?quick_search="+txt
				}
		 function go_blast()
				{
					quick_search=document.forms[0].quick_search
					txt=""
					for (i=0;i<quick_search.length;++ i)
					{
						if (quick_search[i].checked)
					{
						txt=document.getElementById(i).value
					}
					}
					var x=document.getElementById("my_quick_search_form")
 					window.location.href="ready_blast.cgi?my_squence="+txt
				}
				
			function my_blast(){
					quick_search=document.forms[0].quick_search
					n=0

					for (i=0;i<quick_search.length;++ i)
					{
						if (quick_search[i].checked)
					{
						n=n+1
						}
					}
					
					if(n==0){
						document.getElementById("blast").disabled=true
						document.getElementById("aligment").disabled=true
						document.getElementById("down_load").disabled=true
						return;
						
					}
					if (n >1 ){
							document.getElementById("blast").disabled=true
							document.getElementById("aligment").disabled=false
							document.getElementById("down_load").disabled=false
							return;
					}
					if(n==1){
							document.getElementById("blast").disabled=false
							document.getElementById("aligment").disabled=true
							document.getElementById("down_load").disabled=false
					}
			}
			
		function SelectAll() {
				
 				var checkboxs=document.getElementsByName("quick_search");
 				for (var i=0;i<checkboxs.length;i++) {
  					var e=checkboxs[i];
 					  e.checked=!e.checked;
					 }
					 my_blast();
		}	
	 </script>
	 </head>
	 <body>
	 <div id="myHeader"><h1 align='center'>The Results Of QuickSearch<h1></div>
	 <form id="my_quick_search_form" >
	 <div><div id="myFind">Found <i>$password</i> Entries Matching Your Query</div><div id="myFunction"><input type="button" value="Blast" id="blast" onclick="go_blast()" />&nbsp<input type="button" value="Alignment" id="aligment" />&nbsp<input type="button" id="down_load"  onclick="createOrder()" value="DownLoad"/></div></div>
	 <div style="clear:both"></div>
	 <div id="myLine"><hr size="2" color="#ff9966" ></div>
END_QUICK_SEARCH

my $quick_key_word=param('srh_txt');

my $query_mysql="SELECT RDAMP_ID,Peptide_Name,Sequence FROM peptide WHERE RDAMP_ID LIKE '%$quick_key_word%' or            
 Sequence LIKE  '%$quick_key_word%' or            
 Squence_Length LIKE  '%$quick_key_word%' or       
 Peptide_name LIKE  '%$quick_key_word%' or         
 Gene LIKE  '%$quick_key_word%'  or                  
 Source LIKE  '%$quick_key_word%' or               
 Biological_Activity LIKE  '%$quick_key_word%' or  
 Structure LIKE  '%$quick_key_word%' or            
 Structure_Description LIKE  '%$quick_key_word%' or
 PDB_ID LIKE  '%$quick_key_word%' or               
 Comments LIKE  '%$quick_key_word%' or             
 Target_Organism LIKE  '%$quick_key_word%' or      
 Binding_Traget LIKE  '%$quick_key_word%' or       
 Swiss-Prot_Entry LIKE  '%$quick_key_word%' or     
 Pubmed_ID LIKE  '%$quick_key_word%' or            
 Reference LIKE  '%$quick_key_word%' or            
 Author LIKE  '%$quick_key_word%' or              
 Title  LIKE  '%$quick_key_word%'";


my $dsn="DBI:mysql:database=$database;host=$hostname;port=$port";
my $dbh=DBI-> connect ($dsn,$user,$password);

my $sth =$dbh ->prepare("SELECT RDAMP_ID,Peptide_Name,Sequence FROM peptide WHERE RDAMP_ID LIKE '%$quick_key_word%' or            
 Sequence LIKE  '%$quick_key_word%' or
 Squence_Length LIKE  '%$quick_key_word%' or
 Peptide_name LIKE  '%$quick_key_word%' or         
 Gene LIKE  '%$quick_key_word%'  or                  
 Source LIKE  '%$quick_key_word%' or               
 Biological_Activity LIKE  '%$quick_key_word%' or  
 Structure LIKE  '%$quick_key_word%' or            
 Structure_Description LIKE  '%$quick_key_word%' or
 PDB_ID LIKE  '%$quick_key_word%' or
 Comments LIKE  '%$quick_key_word%' or             
 Target_Organism LIKE  '%$quick_key_word%' or      
 Binding_Traget LIKE  '%$quick_key_word%' or
 `Swiss-Prot_Entry` LIKE  '%$quick_key_word%' or     
 Pubmed_ID LIKE  '%$quick_key_word%' or            
 Reference LIKE  '%$quick_key_word%' or            
 Author LIKE  '%$quick_key_word%' or              
 Title  LIKE  '%$quick_key_word%'
 ");

my $rv=$sth ->execute;
#print $rv;
my $i=-1;
print "<div>";
print "<table cellspacing='10'>";
print "<tr align='center' size='7'><th>&nbsp&nbsp</th><th><input id='CheckAll' onclick='SelectAll()' type='checkbox' /></th><th>RDAMP ID</th><th>Peptide Name</th><th>Sequence</th></tr>";
while (my @row = $sth->fetchrow_array){
	$i++;
	#$row[1]=substr($row[1],0,40);
	#$row[2]=substr($row[2],0,50);
	print "<tr><td>&nbsp&nbsp</td><td><input type='checkBox' name='quick_search' value='$row[0]' onclick='my_blast()'/></td><td align='center'><a href='every_show.cgi?key_word=$row[0]&name=$name'>$row[0]</a></td><td>$row[1]</td><td>$row[2]</td><tr>\n";
	print "<input type='hidden' name='my_sequence' id='$i' value='>$row[0]+$row[2]' />";
	#print "dsfsdfds";
}
$dbh->disconnect();
print "</form>";
print "</div>";

print qq{</body>};
#print "<div><input type='text' id='order' size='50'></div>";
	#print "<B>Hello,word!</b>";