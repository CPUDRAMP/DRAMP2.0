#!usr/bin/perl-w
print "Content-type:text/html\n\n";
use LWP::UserAgent;
my $browser=LWP::UserAgent->new(); $protein="MSSSTPFDPYALSEHDEERPQNVQSKSRTAELQAEIDDTVGIMRDNINKVAERGERLTSI";  
my $SUSUI_URL="http://www.enzim.hu/hmmtop/server/hmmtop.cgi";  
    my $response=$browser->post($SUSUI_URL,['if'=>$protein]);  
     
    #if($response->is_success){  
     #print $response->content; 
    #}else{  
     #print"Badluckthistime\n";  
    #}  





