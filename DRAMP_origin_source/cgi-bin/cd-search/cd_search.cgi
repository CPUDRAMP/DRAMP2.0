#!/usr/bin/perl -w

use strict;
use CGI;

#print "content-type: text/html","\n\n";
###SESSION

use CGI::Session;

my $cgi= new CGI;

my $session = new CGI::Session("driver:File", $cgi , {Directory=>'/tmp'});

my $cookie = $cgi->cookie(CGISESSID =>$session->id );

print $cgi->header(-cookie=>$cookie);

###END SESSION

my $pass_key;
my $query;
my $file_path_name;
my $cd_name="cd_search";

my $q = CGI->new;

$pass_key = $q->param('pass_key');

my $query = "php ../jobs/password.php $pass_key 'DECODE'";

$pass_key = readpipe($query);

if (!$pass_key){

print "<script language='javascript'>;";

print " location.href='http://dramp.cpu-bioinfor.org';";

print "</script>;";

}else{
	$session->param('user_id', $pass_key);
}


#print $session->param('user_id');


my $maxLenth=5;
my @pa=('A'..'Z',0..9,'a'..'z');
my $pa;
my @subname;
$subname[0]=join "",map{$pa[int rand @pa]}0..$maxLenth;
$subname[1]=join "",map{$pa[int rand @pa]}0..$maxLenth;
$subname[2]=join "",map{$pa[int rand @pa]}0..$maxLenth;
my $job_name=join "-",@subname;
my $file_name_ini=join "",@subname;

my $file_name_1=$file_name_ini."\.in";

my $file_name=$cd_name."\_".$file_name_ini;

my $seqs;
my $evalue;
my $maxhit;
my $db;
my $filter;

       $seqs   =$q->param('seqs');
       $db     =$q->param('db');
       $filter =$q->param('filter');
       $evalue =$q->param('evalue');

       if ($evalue eq "") {
	   $evalue = "0.01";
	}


       $maxhit =$q->param('maxhit');   

       if ($maxhit eq "") {
	   $maxhit = "500";
	}
       
       mkdir("/var/www/tmp/cd-search_tmp/$file_name",0777);

       my $mkdir_query="mkdir -p -m 755 /var/www/tmp/cd-search_tmp/$file_name";

       system($mkdir_query);

       open EOF,">/var/www/tmp/cd-search_tmp/$file_name/$file_name_ini.in";
               print EOF $seqs;
       close EOF;

#       $evalue="0.01"  if ($evalue="");
#       $maxhit="500" if ($maxhit="");  

       $query="./bin/rpsblast -query ../../tmp/cd-search_tmp/$file_name/$file_name_ini.in $db -evalue $evalue  -num_descriptions $maxhit  -out  ../../tmp/cd-search_tmp/$file_name/$file_name_ini.out";

my $content_line;

open DOTA,"</var/www/template/tools_result_static.html";
        while (my $line = <DOTA>){
                $content_line .= $line;
        }
close DOTA;

$content_line =~ s/USERNAME/$pass_key/;

system( `echo -n  $job_name 'http://dramp.cpu-bioinfor.org/tmp/cd-search_tmp/$file_name/$file_name_ini.out '  >> ../../tmp/jobs_tmp/$pass_key`);

my $ll_path = "/var/www/tmp/jobs_tmp/$pass_key";

my  $job_numbers = readpipe ("wc -l  $ll_path | cut -d ' ' -f1");
 $job_numbers ++;

my $time = `date  +"%Y-%m-%d %H:%M:%S" >> ../../tmp/jobs_tmp/$pass_key`;

my $pass_query = "php ../jobs/password.php $pass_key 'ENCODE'";

my $new_pass_key = readpipe($pass_query);

$content_line =~ s/JOBSPASSKEY/$new_pass_key/;
$content_line =~ s/JOBSNUMBER/$job_numbers/;

#print qq(<div style="width:300px;height:50px;margin-top:500px auto;">);

my $result_html_static="<h3>Command:</h3><br/><textarea class='form-control' rows='5' disabled='disabled'>$query</textarea><br />";

$result_html_static .= "<ul class='list-inline'><li><h3>Job Name:</h3></li><li>$job_name&nbsp;&nbsp;<a href='http://dramp.cpu-bioinfor.org/tmp/cd-search_tmp/$file_name/'>VIEW</a></li></ul>";

my $content_command = $content_line;
$content_command =~ s/LazySheep/$result_html_static/;

print qq($content_command);


system($query);


if(-e "../../tmp/cd-search_tmp/$file_name/$file_name_ini.out"){
       open EOF,"</var/www/tmp/cd-search_tmp/$file_name/$file_name_ini.out";
       open MOF,">/var/www/tmp/cd-search_tmp/$file_name/$file_name_ini.htm";
       my @my_line=<EOF>;
       my $line=join "",@my_line;
       $line="<div style='word-break:break-all;overflow-y:scroll;'><pre><code>".$line."</code></pre></div>";
       print MOF $line;        

       close EOF;
       close MOF;
}


my $content_result = $content_line;

open EOF,">/var/www/tmp/cd-search_tmp/$file_name/index.shtml";
       #print EOF "<html>\n<head>\n</head>\n<body>\n";

       #my $next_query_1="<!--#echo var=\"REMOTE_ADDR\"-->\n";  
       	my $cc="<!--#include file=\"$file_name_ini.htm\"-->";
	$content_result=~ s/LazySheep/$cc/;

       	print EOF $content_result;
close EOF;






