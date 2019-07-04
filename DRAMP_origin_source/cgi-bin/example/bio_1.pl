#!/usr/bin/perl -w


#####################################解析报告#####################################################
print "Content-type:text/html\n\n";
use Bio::SearchIO;
#$report_obj = new Bio::SearchIO(-format => 'blast',                                   
                                 # -file   => 'report.bls');   
#while( $result = $report_obj->next_result ) {     
    #while( $hit = $result->next_hit ) {       
      #while( $hsp = $hit->next_hsp ) {           
         #if ( $hsp->percent_identity > 75 ) {             
           #print "Hit\t", $hit->name, "\n", "Length\t", $hsp->length('total'),  
                   #"\n", "Percent_id\t", $hsp->percent_identity, "\n";         
         #}       
       #}     
    # }   
#}

          # format can be 'fasta', 'blast', 'exonerate', ...
          my $searchio = Bio::SearchIO->new( -format => 'blastxml',
                                            -file   => '../NAGG.xml' );
          while ( my $result = $searchio->next_result() ) {
              while( my $hit = $result->next_hit ) {
                #process the Bio::Search::Hit::HitI object
						
                  while( my $hsp = $hit->next_hsp ) {
                  # process the Bio::Search::HSP::HSPI object
					           
           			print "Hit\t", $hit->name, "\n", "Length\t", $hsp->length('total'),  
                  "\n", "Percent_id\t", $hsp->percent_identity, "\n";         
         			
                }
           }
         }


