#!/usr/bin/perl -w
     
############################################################go     
     
     
use strict;      
print "Content-type:text/html\n\n";
use CGI qw(:all); 
use DBI;
use Fcntl qw(:DEFAULT :flock);
use CGI::Carp qw(fatalsToBrowser);
use Archive::Zip qw( :ERROR_CODES :CONSTANTS );   

#print header;
my @key;
my @key_word= param('quick_search');
my $i=-1;
foreach my $key(@key_word){
	$i++;
	$key[$i]="RDAMP_ID=\"".$key."\"";
	#$query_mysql=$key.",".;
}
my $query=join " or ",@key;
my $query_mysql="SELECT RDAMP_ID,Peptide_Name,Sequence FROM my WHERE ". $query;

#print $query_mysql;


my $host=remote_host.".xls";
my $path="../tmp/";
my $file_path=$path.$host;
#my $query_mysql="SELECT ".$key." FROM my LIMIT 1,20";

my $database="peptide";
my $hostname="localhost";
my $port=80;
my $user="root";
my $password="09441";

my $dsn="DBI:mysql:database=$database;host=$hostname;port=$port";
my $dbh=DBI-> connect ($dsn,$user,$password)||die "dfsadfdsaf";

my $sth =$dbh ->prepare('select * from my')||die "dfsadfdsaf";

my $rv=$sth ->execute;


#print $file_path;
open DOTA,">$file_path";
while (my @row = $sth->fetchrow_array){
	print DOTA "$row[0]\t$row[1]\t$row[2]";
	#print @key_word;
	#print $#row;
}

my $zip = Archive::Zip->new();
$zip->addFile($file_path);

unless ( $zip->writeToFileNamed('../tmp/result.zip') == AZ_OK ) {                            
 #print "Error in archive creation!\n";
 }else {
#print "Archive created successfully!\n";
}


# open(DLFILE, "<$file_path") || Error('open', 'file');    
#my  @fileholder = <DLFILE>;    
# close (DLFILE) || Error ('close', 'file');  
#print "Content-Type:application/x-download\n";    
#print "Content-Disposition:attachment;filename=$host\n\n";  
#print @fileholder;
#system("zip  result.zip $file_path");\
#print redirect(-uri => "../tmp/result.zip");


print<<load

		<a href="javascript:history.go(-1)">Cancel</a>
		<a href="../tmp/result.zip">DownLoad</a>
		<a href="javascript:history.go(-1)">Back</a>

load

#print<<good
	#<body>
#	<a href="javascript:window.opener=null;window.open('','_self');window.close();"></a>
	#</body>
#good
#my $target="http://127.0.0.1/cgi-bin/quick_search.cgi";

		#window.history.back(-1);
