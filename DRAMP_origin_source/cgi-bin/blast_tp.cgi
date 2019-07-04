#!/usr/bin/perl -w
#use strict;

use LWP::UserAgent;
use CGI;
print "Content-type:text/html\n\n";

my $key_wd=$ARGV[0];
#print $key_wd;
#print "I am here";

sleep (3);
my $ua_two = LWP::UserAgent->new;
$ua_two->agent(""); 


#my $key_wd="RTS4C0JV015";


	my $my_query="RID=".$key_wd."&FORMAT_TYPE=txt";
#	print $my_query;
	my $req_two = HTTP::Request->new(POST => 'http://www.ncbi.nlm.nih.gov/blast/Blast.cgi?CMD=Get');

	#$req_two->header(Accept => "text/html, */*;q=0.1");
	$req_two->content_type('application/x-www-form-urlencoded');	
	
	$req_two->content($my_query);
	
	my $res_two = $ua_two->request($req_two);
	my $copy = $ua_two->clone( );
	
	if ($res_two->is_success) {
		#unlink $file_name;
		#print $res_two->current_age( );
		my 	$data=  $res_two->content(); 
		#my $file_name_two="../tmp/lDB".time;
		#print $res->content;
		#open DOTA,">>","ooo";
			print $data;
		#close DOTA;
	}
  		