#!/usr/bin/perl -w
print "content-type: text/html","\n\n";

use strict;
use CGI qw(:all);
use LWP::UserAgent;


my $seq_pre=param('pred_area');

my @hold_me=split "\n",$seq_pre;

my $i=0;

if (($#hold_me % 2) >0 ){
	for ($i=0;$i<=$#hold_me;$i++){
		
		if (($i % 2) == 0){
			if (!($hold_me[$i] =~ /^>/)){
				print "<pre>err: $i   <font color=red>$hold_me[$i]</font><br><br></pre>";
				&hellow_exit;
				exit();
			}
		}else{
			if($hold_me[$i] =~ /[_0-9]/){
				print "<pre>err: $i   <font color=red>$hold_me[$i]</font><br><br></pre>";
				&hellow_exit;
				exit();
			}	
			
		}
	}	
}else{
	&hellow_exit;	
	exit();	
}

sub hellow_exit{
print "Iput the right format,please";	
print qq(<pre>eg.:<br>>seq1<br>KDGLSLG<br>>seq2<br>DGLSLG</pre>);
print qq(<a href="javascript:history.go(-1)">Back</a>);
}


#if ($#hold_me<1 || !($hold_me[0] =~/^>/)){
#	print "Iput the right format,please";	
#	print qq(<pre>eg.:<br>>seq1<br>KDGLSLG<br>>seq2<br>DGLSLG</pre>);
#	print qq(<a href="javascript:history.go(-1)">Back</a>);
#	exit();
#}

#$seq_pre=$hold_me[1];
#print $seq_pre;

my $option=param('pred_radio');
#print $option;
if ($option eq "physicochemical property prediction"){
	&physic_predict($hold_me[1]);
}

if ($option eq "second structure prediction"){
	&second_predict($hold_me[1]);		
}
#&physic_predict;
#&second_predict;


################################################second#######################
sub second_predict{
	my ($seq)=@_;

print<<END_PAGE_ONE;
	<html>
		<head>
			<title>Secondary score SOAP</title>
		</head>
		<body>
			<div style="border:0px solid green;width:980px;margin:0px auto">
				<div><a href="javascript:history.go(-1)">Back</a></div>
				<div style="width:320px;margin:0px auto"><h3>Secondary score SOAP</h3></div>
END_PAGE_ONE

				my $query="notice=".$seq."&ali_width=70&states=3&threshold=8&width=17";
				my $predict = LWP::UserAgent->new;
				$predict->agent("");
				
				my $req = HTTP::Request->new(POST => 'http://npsa-pbil.ibcp.fr/cgi-bin/secpred_sopma.pl');
					 $req->content_type('application/x-www-form-urlencoded');
					 $req->content($query);
					 
				my $res = $predict->request($req);
				
				if ($res->is_success) {
				   my $predict=$res->content;
				   my @temp=split "\n",$predict;
				   my $flag="";
				   foreach my $line(@temp){
				   		if ($line=~/^<CODE>/ || $line=~/^<PRE>/){
				   			print "<div   style='margin-left:50px'>";
				   			print $line."\n";
				   			$flag="happy";
				   		}
				   		if($flag){
				   			$line =~s/^SOPMA :/<B>SOPMA :<\/B>/;
				   			print $line."\n";	
				   		}
				   		if($line=~/^<\/CODE>/ || $line=~/^<\/PRE>/){
				   			print "</div>";
				   			print $line."\n";
				   			$flag="";	
				   		}
							if($line =~/^Prediction/){
								last;	
							}
				  }
				
				 }
				   else {
				   print $res->status_line."\n";
				}

}
print qq(</div></body></html>);

######################################Physicochemical ##############################
sub physic_predict{
print<<END_PAGE_ONE;
	<html>
		<head>
			<title>Physicochemical Predict</title>
		</head>
		<body>
			<div style="border:0px solid green;width:980px;margin:0px auto">
				<div><a href="javascript:history.go(-1)">Back</a></div>
				<div style="width:320px;margin:0px auto"><h3>Physicochemical Predict</h3></div>
END_PAGE_ONE

				my ($seq)=@_;
				my $predict = LWP::UserAgent->new;
				$predict->agent("");
				
				my $req = HTTP::Request->new(POST => 'http://web.expasy.org/cgi-bin/protparam/protparam');
					 $req->content_type('application/x-www-form-urlencoded');
					 
					 my $query="sequence=".$seq;
					 $req->content($query);
				my $res = $predict->request($req);
								
				if ($res->is_success) {	
					 my $predict=$res->content;
				   my @temp=split "\n",$predict;
				   my $flag="";
					 foreach my $key_line(@temp){
					 		if($flag){
					 			if ($key_line =~/^<br\/>/){
					 					next;	
					 			}
					 			if ($key_line =~/^<p><img/ ){
					 				print "<PRE>";	
					 				next;
					 			}
					 			print "$key_line\n";
					 		}
							if($key_line =~ /^<h1>ProtParam<\/h1>/){
								$flag="happy";
							}
							if ($key_line=~/^<\/PRE>/){
								last;
							}
					 }	
				}	else{
					print $res->status_line."\n";
				}	 
				
	print qq(</div></body></html>);			
				
}				