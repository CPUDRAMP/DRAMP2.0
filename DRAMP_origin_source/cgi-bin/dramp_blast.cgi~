#!/usr/bin/perl -w
print "content-type: text/html","\n\n";

use strict;
use Bio::Tools::Run::StandAloneBlast;
use Bio::Seq;
use Bio::SearchIO;
use CGI qw(:all);


################it is good for search##################

my $simi_area=param('simi_area');

my @hold_me=split "\n",$simi_area;

if ($#hold_me<1 || !($hold_me[0] =~/^>/)){
	print "Iput the right format,please";	
	print qq(<pre>eg.:<br>>seq1<br>KDGLSLG<br>>seq2<br>DGLSLG</pre>);
	print qq(<a href="javascript:history.go(-1)">Back</a>);
	exit();
}


my $seq=$hold_me[1];
my $id =$hold_me[0];

$id=~s/>//; 

my $matrix=param('simi_matrix');


my $database=param('database');



my $file_name="../tmp/DB".time;

my $my_query;

my $seq_length=length($seq);

#print $database;

##########################################the head of result ##################################

if ($database eq "dramp") {
	
					my @params = (
										-program => 'blastp',
										-database => '../peptide_database_standalone/peptide.seq',
										-output => $file_name,
										-Matrix =>  $matrix,
										 );
					
					my $factory =Bio::Tools::Run::StandAloneBlast -> new (@params);
					
					my $input = Bio::Seq -> new (
																	-id  => $id,
																	-seq => $seq);
														
					my $blast_report=$factory -> blastall($input);
				
					
					&res_info($file_name);
					unlink 	$file_name;
}else{
						###############remote blast##################
																	
						use LWP::UserAgent;
						my $ua = LWP::UserAgent->new;
						$ua->agent("");
						
						my $req = HTTP::Request->new(POST => 'http://www.ncbi.nlm.nih.gov/blast/Blast.cgi?CMD=Put');
						$req->content_type('application/x-www-form-urlencoded');
						
						$my_query="QUERY=".$seq."&DATABASE=".$database."&MATRIX_NAME=".$matrix."&PROGRAM=blastp&EXPECT=20";
						
						$req->content($my_query);
						my $res = $ua->request($req);
						
				if ($res->is_success) {
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
				  		unlink $file_name;
							#my $my_target="../cgi-bin/blast_tp.cgi?".$key_wd;
				  		#print redirect(-uri => $my_target);
				  		
				  		sleep (6);
				  		
							my $ua_two = LWP::UserAgent->new;
							$ua_two->agent(""); 
							#my $key_wd="RTS4C0JV015";
							if(!$key_wd){
									&head_title();	
									last;
							}
							
							$my_query="RID=".$key_wd."&FORMAT_TYPE=txt";
								#print $my_query;
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
									#print  $data;	
									$file_name="../tmp/DB".time;
							 		open DOTA,">>","$file_name"||die "sorry";
							   		print DOTA $data;  	
							  	close DOTA;
							  #	open LOL,"<","$file_name"||die "sorry";
							  		sleep (5);
							  		&res_info($file_name);
							  		unlink $file_name;
							  		 #while ($line =<LOL>){
							  		 		
								  		 #	if($line =~ /^\>/){
								  		 #	print qq($line<br>);	
								  		#	}
							  			#}
							  	#close LOL;
							  	
									#close DOTA;
								}
				  						  				
				}else {
				    print $res->status_line, "\n";
				}
}


##########################################sub for web################################
print "</div></div></div></body><html>";


sub res_info{

	my ($file_name)=@_;
	my $job_id=$file_name;
		 $job_id=~s/\.\.\/tmp\///;

	print<<END_PAGE_ONE;
		<html>
			<head>
				<title></title>
			</head>
			<body style='width:980px;margin:0px auto'>
				<div>
					<div style="width:380;margin:0px auto;border:0px solid red"><h1>The Result Of Blast</h1></div>
					<div><h3>Job information</h3></div>
					<div>
						<ul>
							<li>Query job id&nbsp:$job_id</li>
							<li>Query sequence&nbsp:$seq&nbsp($seq_length&nbspAA)</td></tr>
							<li>Program&nbsp:BLASTP 2.2.28+ [Sep-21-2011]</li>
							<li>Database Name&nbsp:$database</li>
							<li>Matrix&nbsp:$matrix</li>
							<label>The Blast program will compare your input with all sequence Stored in corresponding database
							   and identity greater than 30% amino acid sequences will be listed below</label>
						<ul>
					</div>
					<div>
						<HR style="border:3 solid red ;background-color:gray" size="10">
					</div>
				<div>
				</div>
END_PAGE_ONE
						
						my $n=0;					   
						open DOTA,"<",$file_name||die "sory";
						while (my $line=<DOTA>){
	
							if ($line =~ /.*No hits found/){
								print "$line";
								return;	
							}
							if ($line =~ /^ +Database:/){
								last;
							}
					
					
							if ($line =~ /^>/){
									if ($n>0){
										print "</div>";	
									}
									if ($n>0){
										print "<div><HR style='border:1px dashed #987cb9'></div>";
									}
					
									$n++;
									print "<div><label style='color:green;'><h5>Result $n</h5></label><br></div>";
									print "<div style='border:0px solid red;margin-left:20px;background-color:grey;color:white;' >";
					

									$line =~ s/>//;
									print "<label>Database Id : $line</label><br>";
							}
							
							if($n > 0){
									if($line =~ /^>/){
										next;	
									}
									if ($line =~/^ Identities/){
										$line=~s/\(/\(<font COLOR=red>/;
										$line=~s/\)/<\/font>\)/;
										
									}
								  print "<label>$line</label><br>";
							}
					
						}
					close DOTA;
}

###############################################sub print head##################

sub head_title{
	print<<END_PAGE_ONE;
		<html>
			<head>
				<title></title>
			</head>
			<body style='width:980px;margin:0px auto'>
				<div>
					<div style="width:380;margin:0px auto;border:0px solid red"><h1>The Result Of Blast</h1></div>
					<div><h3>Job information</h3></div>
					<div>
						<ul>
							<li>Query job id&nbsp:none</li>
							<li>Query sequence&nbsp:$seq&nbsp($seq_length&nbspAA)</td></tr>
							<li>Program&nbsp:BLASTP 2.2.26 [Sep-21-2011]</li>
							<li>Database Name&nbsp:$database</li>
							<li>Matrix&nbsp:$matrix</li>
							<label>The Blast program will compare your input with all sequence Stored in corresponding database
							   and identity greater than 30% amino acid sequences will be listed below</label>
						<ul>
					</div>
					<div>
						<HR style="border:3 solid red" bgcolor="gray"  size="10">
					</div>
				<div>
					<p> Sorry I cant find Anthing </p><a href="javascript:history.go(-1)">Back</a>
				</div>
				</body>
				</html>
END_PAGE_ONE
}
