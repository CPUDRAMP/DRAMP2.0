#!/usr/bin/perl -w
     
use strict;
use DBI;    
use CGI qw(:all);

my $key_word=param('key_word');
my $name=param('name');

#my $key_word="RP0072";
#my $name='search';

print "Content-type:text/html\n\n"; 

my $database="peptide";
my $hostname="localhost";
my $port=80;
my $user="root";
my $password="09441";




if ($name eq 'search'){
		&page_all();
}




sub page_all{
print<<BEGIN_PAGE;
		<html>
		<head>
			<title> the information of $key_word </title>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<link href="../css/show.css" rel="stylesheet" type="text/css" media="screen" />
		</head>
	  <body>
	  	<div id="myHeader" name="head"><h1 align='center'>The Information Of $key_word<h1></div>
	  	<div ><div id="key"><p>$key_word(ID):<p></div><div id="head_link"><a href="#gene_info">General Information</a></div><div id="head_link"><a href="#stru_info">Other Information</a></div><div id="head_link"><a href="#tile_info">Title Information</a></div><div id="head_a"><a href="../index.html">Home</a>&nbsp<a href="javascript:history.go(-1)">Back</a></div></div>
			<div style="clear:both"></div>
BEGIN_PAGE

	print qq{<div>};
	print qq{<div id="info" ><div style="float:left"><a name="gene_info">》》》General Information</a></div><div style="float:right"><a href="#head">Top</a></div></div>};
	
	
	my $dsn="DBI:mysql:database=$database;host=$hostname;port=$port";
	my $dbh=DBI-> connect ($dsn,$user,$password);
	my $sth =$dbh ->prepare("SELECT RDAMP_ID,Peptide_Name,Source,Biological_Activity,`Swiss-Prot_Entry` FROM peptide WHERE RDAMP_ID='$key_word'");
	my $rv=$sth ->execute;
	print "<div>";
	while (my @row = $sth->fetchrow_array){
		print qq{<B>RDAMP ID:</B>&nbsp$row[0]<br><br>};
		print qq{<B>Peptide Name:</B>&nbsp$row[1]<br><br>};
		print qq{<B>Biological Activity:</B>&nbsp$row[2]<br><br>};
		print qq{<B>Swiss-Prot Entry:</B>&nbsp$row[3]<br><br>};
	}
	print "</div>";
	print qq{<div>};
	$dbh->disconnect();
	
	print qq{<div>};
	print qq{<div id="info" ><div style="float:left"><a name="stru_info">》》》Structure Information</a></div><div style="float:right"><a href="#head">Top</a></div></div>};
	my $sth =$dbh ->prepare("SELECT Gene,Squence_Length,Comments,Target_Organism,Binding_Traget FROM peptide WHERE RDAMP_ID='$key_word'");
	my $rv=$sth ->execute;
	while (my @row = $sth->fetchrow_array){
		print qq{<B>Gene:</B>&nbsp$row[0]<br><br>};
		print qq{<B>Squence_Length:</B>&nbsp$row[1]<br><br>};
		print qq{<B>Target Organism:</B>&nbsp$row[2]<br><br>};
		print qq{<B>Binding Traget:</B>&nbsp$row[3]<br><br>};
		print qq{<B>Comments:</B>&nbsp$row[4]<br><br>};
	}
	print qq{</div>};
	$dbh->disconnect();
	
	print qq{<div>};
	print qq{<div id="info" ><div style="float:left"><a name="tile_info">》》》Title Information</a></div><div style="float:right"><a href="#head">Top</a></div></div>};
	my $sth =$dbh ->prepare("SELECT PDB_ID,Reference,Pubmed_ID,Author,Title FROM peptide WHERE RDAMP_ID='$key_word'");
	my $rv=$sth ->execute;
	while (my @row = $sth->fetchrow_array){
		print qq{<B>PDB ID:</B>&nbsp$row[0]<br><br>};
		print qq{<B>Reference:</B>&nbsp$row[1]<br><br>};
		print qq{<B>Pubmed ID:</B>&nbsp$row[2]<br><br>};
		print qq{<B>Author:</B>&nbsp$row[3]<br><br>};
		print qq{<B>Title:</B>&nbsp$row[4]<br><br>};
	}
	print qq{</div>};
	
	
	
}
