#!/usr/bin/perl -w
print "content-type: text/html","\n\n";

use strict;
use Bio::Tools::Run::StandAloneBlast;
use Bio::Seq;
use Bio::SearchIO;
use CGI qw(:all);
use LWP::UserAgent;

my $predict = LWP::UserAgent->new;
$predict->agent("");

my $req = HTTP::Request->new(POST => 'http://embnet.vital-it.ch/cgi-bin/clustalw_parser?');
	 $req->content_type('application/x-www-form-urlencoded');
my $Matrix="Matrix=blosum&";
my $OpenGap="OpenGap=10&";
my $ExtendGap="ExtendGap=0.05&";
my $EndGap ="EndGap=10&";
my $DistGap="DistGap=0.5&";
my $OutFormat="OutFormat=aln&";
my $Order="Order=input&";
my $Format="Format=plain_text&";

my $get_sequence=param('align_area');

$get_sequence=~s/\n/\%0D\%0A/g;

#my $Sequence="Sequence=>seqA%0D%0AGARFIELDTHEFASTCAT%0D%0A>seqB%0D%0AGARFIEDTHEVERYFASTCAT%0D%0A>seqC%0D%0A%GARFIELDTHEFATCAT";

my $Sequence="Sequence=".$get_sequence;
#print $Sequence;

print<<END_PAGE_ONE;
	<html>
		<head>
			<title>The result  of alignment</title>
		</head>
	<body >
	<div style="border:0px solid red;width:980px;margin:0px auto;">
	<div><a href="javascript:history.go(-1)">Back</a></div>
	<div style="width:450px;margin:0px auto;"><h2>The Result Of Alignment</h2></div>
	<div >
		<pre>
		<h5>Alignment Options Used</h5>
		Matrix=blosum
		OpenGap=OpenGap=10
		ExtendGap=0.05
		EndGap=10
		DistGap=0.5
		OutFormat=aln
		Order=input
		Format=plain_text
		</pre>
	</div>
END_PAGE_ONE

my $query=$Matrix.$OpenGap.$ExtendGap.$EndGap.$DistGap.$OutFormat.$Order.$Format.$Sequence;#print $query;
$req->content($query);
my $res = $predict->request($req);

         # Check the outcome of the response

if ($res->is_success) {
   my $align=$res->content;
   my @temp=split "\n",$align;
	   foreach my $line(@temp){
	   	if ($line=~/^\<a/){
	   		my $name=$line;
	   		$name=~s/<.*\">//;
	   		$name=~s/<.*>//;
	   		$line =~s/\.\.\/\.\.\//http\:\/\/embnet.vital-it.ch\//;
	   		$line =~s/^.*\=\"//;
	   		$line =~s/\">.*//;
	   		my $file_url=$line;
	   		#print $name;
	   		my $text_url=&remote_info($file_url);
	   		 $text_url=~s/ /&nbsp;/g;
	   		 $text_url=~s/\n/<br>/g;
	   		print qq(<div style="border:0px solid blue;margin-top:25px;"><div style="width:140px;color:grey;margin-left:50px;">$name</div><div style="border:0px solid blue;width:500px;margin:0px auto;background-color:grey;color:white"><pre>$text_url</pre></div></div>);	
	   }
	 if ($line =~/<\/table>/){
		last;
		}
	   
 }
   #print $#temp;
   #$oot=~s/\.\.\/\.\.\//http\:\/\/embnet.vital-it.ch\//;

}
 else {
  print $res->status_line, "\n";
}

print qq(</div></body></html>);

#########################################sub #####################################

sub  remote_info{
				my ($file_name)=@_;
        my $info = LWP::UserAgent->new;
        $info->timeout(10);
        $info->env_proxy;

        my $response = $info->get($file_name);

        if ($response->is_success) {
           return $response->decoded_content;  # or whatever
        }
        else {
           die $response->status_line;
        }
}

