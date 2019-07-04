#!/usr/bin/perl -w
print "content-type: text/html","\n\n";

use strict;
use Bio::Seq;
use Bio::SearchIO;
use CGI qw(:all);
use LWP::UserAgent;

my $ssearch = LWP::UserAgent->new;
$ssearch->agent("");

my $req = HTTP::Request->new(POST => 'http://srs.ebi.ac.uk/srsbin/cgi-bin/wgetz?');
   $req->content_type('application/x-www-form-urlencoded');
my $hidden_1="%40%40sub~=1&";
my $hidden_2="userId=21ApI1ifEUi";

my $maxLenth=6;
my @pa=('a'..'Z','A'..'Z',0..9);
my $pa;
my $job_name=join "",map{$pa[int rand @pa]}0..$maxLenth;
   $job_name="\@\$\$opt.jobName~@-\$=10&$job_name";
   $job_name="%40%24%24opt.jobName~%40-%24=temp";
#print $job_name;

my $others="%40%24%24anyChangedSequence~%40-%24=YES&applName~=SSearch&%40%24%24seqSaveAll~%40YES=1&seqOptionName~=in&%40wwwPageName~%40ApplInv=1";

my $db_name="%40%24%24opt.search~%40-%24=uniprotkb";

my $word=">dfas\%0D\%0ADDKKKLLLDSDFDF";
my $key_seq="\@\$\$rmLines\$seqStr~@-\$=$word";
   $key_seq="%40%24%24rmLines%24seqStr~%40-%24=>s%0D%0ADLLADDSSDADLD";

my $matrix="%40%24%24opt.matrix~%40-%24=-s+BL62";

my $gap_ini="%40%24%24opt.gapInit~%40-%24=-12";

my $gap_extend="%40%24%24opt.gapExtend~%40-%24=-2";

my $align="%40%24%24opt.nAlign~%40-%24=100";

my $elimit="%40%24%24opt.Elimit~%40-%24=-E+10";

my $flimit="%40%24%24opt.Flimit~%40-%24=+";

my $hist_0="%40%24%24opt.hist~%400=1";

my $hist_1="%40%24%24opt.hist~%401=1";



my $query=$hidden_1."&".$hidden_2."&".$job_name."&".$key_seq."&".$matrix."&".$gap_ini."&".$gap_extend."&".$align."&".$elimit."&".$flimit."&".$hist_0."&".$hist_1."&".$others;

   $req->content($query);

my $res = $ssearch->request($req);

if ($res->is_success) {

	my $my_res= $res->content;

	$my_res=~s///;

}






#my $ExtendGap="ExtendGap=0.05&";
#my $EndGap ="EndGap=10&";
#my $DistGap="DistGap=0.5&";
#my $OutFormat="OutFormat=aln&";
#my $Order="Order=input&";
#my $Format="Format=plain_text&";





























