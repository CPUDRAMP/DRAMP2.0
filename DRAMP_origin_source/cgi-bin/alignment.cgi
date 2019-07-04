#!usr/bin/perl -w
 use strict;    
 use CGI;
         use Bio::Align::Graphics;

         #Get an AlignI object, usually by using Bio::AlignIO

         my $file="out";
         
         my $in=new Bio::AlignIO(-file=>$file, -format=>'clustalw');
         my $aln=$in->next_aln();


         #Create a new Graphics object
         my $print_align = new Bio::Align::Graphics(align => $aln,
         																						out_format => "png",
 																										output => "align"        
         																								);

         #Draw the alignment
         $print_align->draw();
					