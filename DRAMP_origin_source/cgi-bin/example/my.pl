#!/usr/bin/perl -w
print "Content-type:text/html\n\n";

#use HTTP::Request::Common qw(POST);
use LWP::UserAgent;
my $browser=LWP::UserAgent->new;
my $word='MSSSTPFDPYALSEHDEERPQNVQSKSRTAELQAEIDDTVGIMRDNINKVAERGERLTSI';
my $url="http://web.expasy.org/cgi-bin/protparam/protparam";
my $response=$browser->post($url,['sequence'=>$word]);

#$req->content_type('application/x-www-form-urlencoded');
#$req->content('query=libwww-perl&mode=dist');


if ($response -> is_success){
	print $response->content();
}else{

	print "BadLuckthistione\n";



}

#http://www.enzim.hu/hmmtop/server/hmmtop.cgi
