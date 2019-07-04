#!/usr/bin/perl -w

use strict;

print "content-type: text/html","\n\n";

my $maxLenth=5;
my @pa=('A'..'Z',0..9,'a'..'z');
my $pa;
my @subname;
 $subname[0]=join "",map{$pa[int rand @pa]}0..$maxLenth;
 $subname[1]=join "",map{$pa[int rand @pa]}0..$maxLenth;
 $subname[2]=join "",map{$pa[int rand @pa]}0..$maxLenth;


my $job_name=join "-",@subname;
   $job_name="DRAMP-$job_name-SSEARCH";
  # print $job_name;
   
my $file_name=$job_name.".ssearch";


my $job_file=$job_name.".html";

my $file_path="../../tmp/tools/$file_name";

my $job_path="../../tmp/tools/$job_file";

print<<END_PAGE_ONE;
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Data Respository Of Antimicrobial Peptides</title>
	<meta name="keywords" content="antimicrobial peptide database" />
	<meta name="description" content="antimicrobial peptide database" />
	<link href="../../css/global_style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="../../js/ibanner.js" type="text/javascript"></script>
	<script src="../../js/roll_news.js" type="text/javascript"></script>
	<script src="../../js/nav.js" type="text/javascript"></script>
</head>
END_PAGE_ONE

print qq(<body>);

my $long_line;
open HIS,"< ../../template/global_static/head.html";
	while(my $line=<HIS>){
		$long_line=$long_line.$line;
	}
close HIS;
$long_line=~s/\.\.\//\.\.\/\.\.\//g;
print qq($long_line);

print qq(<div id="content" );

print qq('dsfsafa');

print qq(</div>);


print<<END_PAGE_TWO;
	
END_PAGE_TWO


my $long_line;
open HIS,"< ../../template/global_static/footer.html";
	while(my $line=<HIS>){
		$long_line=$long_line.$line;
	}
close HIS;
$long_line=~s/\.\.\//\.\.\/\.\.\//g;
print qq($long_line);


print qq(</body>);

my $commd_line="../seq-search/bin/ssearch35 -H -m 6 ../dyr_human.aa  ../../db_standone/db_ssearch/FASTA.fa >$file_path";

system($commd_line);


open DOTA,"<$file_path"; 
open LOL,">>$job_path";
	
	while (my $line=<HIS>){
		if ($line=~//){

		}		


	}

close DOTA;

close LOL;









