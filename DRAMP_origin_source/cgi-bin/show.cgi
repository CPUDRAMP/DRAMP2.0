#!/usr/bin/perl -w
#use strict;

#print "Content-type:text/html\n\n";
use CGI qw(:all);
#     use CGI;
#    open (OUT,'>>','test.out') || die;
#    $records = 5;
#    for (0..$records) {
#    my $q = CGI->new;
#    $q->param(-name=>'counter',-value=>$_);
#    $q->save(\*OUT);
#    }
#    close OUT;
#    #reopen for reading
#    open (IN,'<','test.out') || die;
#    while (!eof(IN)) {
#    my $q = CGI->new(\*IN);
#    print $q->param('counter'),"\n";
#    }
#use HTTP::Message;
use LWP::UserAgent;
my $ua = LWP::UserAgent->new;
$ua->agent(""); 

my $req = HTTP::Request->new(POST => 'http://www.ncbi.nlm.nih.gov/blast/Blast.cgi?CMD=Put');

$req->content_type('application/x-www-form-urlencoded');
$req->content('QUERY=STIVCVSLRICNWSLRFCPSFKVRCPM&DATABASE=pdb&PROGRAM=blastp&EXPECT=200');


#my $req = HTTP::Request->new(POST => 'http://www.ncbi.nlm.nih.gov/blast/Blast.cgi?CMD=Get');

#$req->header(Accept => "text/html, */*;q=0.1");
#$req->content_type('application/x-www-form-urlencoded');

#$req->content('RID=RT5DFKF4015&FORMAT_TYPE=txt');

         # Pass request to the user agent and get a response back
my $res = $ua->request($req);


if ($res->is_success) {

 		my $file_name="../tmp/DB".time;
 		
 		open DOTA,">>","$file_name"||die "sorry";
   		 print DOTA $res->content;  	
  	close DOTA;
  	open LOL,"<","$file_name"||die "dory";
  		
  		my $line;
  		my  $key_wd;
  		
  		while ($line=<LOL>){
  			chomp $line;
  			if ($line =~ /id=\"rid\" \/\>$/){ 
  				my @temp=split " +",$line;
  				foreach my  $key(@temp){
  					if ($key =~ /value=/){
  						$key=~s/^value=\"//;
  						$key=~s/\"//;
  						$key_wd=$key;
  						last;
  					}
  				}
  			}
  		}
  		#print $key_wd;
  		close LOL;
			my $my_target="../cgi-bin/blast_tp.cgi?".$key_wd;
  		print redirect(-uri => $my_target);
  				
}else {
    print $res->status_line, "\n";
}

