#!/usr/bin/perl -w
print "Content-type:text/html\n\n";
         #Remote-blast "factory object" creation and blast-parameter initialization

         use Bio::Tools::Run::RemoteBlast;
         use strict;
         my $prog = 'blastp';
         my $db   = 'swissprot';
         my $e_val= '1e-10';

         my @params = ( '-prog' => $prog,
                '-data' => $db,
                '-expect' => $e_val,
                '-readmethod' => 'SearchIO' );

         my $factory = Bio::Tools::Run::RemoteBlast->new(@params);

         #change a query parameter
         $Bio::Tools::Run::RemoteBlast::HEADER{'ENTREZ_QUERY'} = 'Homo sapiens [ORGN]';

         #change a retrieval parameter
         $Bio::Tools::Run::RemoteBlast::RETRIEVALHEADER{'DESCRIPTIONS'} = 1000;

         #remove a parameter
         delete $Bio::Tools::Run::RemoteBlast::HEADER{'FILTER'};

         #$v is just to turn on and off the messages
         my $v = 1;
			

         my $str = Bio::SeqIO->new(-file=>'../mygold.fasta' , -format => 'fasta' );

         while (my $input = $str->next_seq()){
           #Blast a sequence against a database:

           #Alternatively, you could  pass in a file with many
           #sequences rather than loop through sequence one at a time
           #Remove the loop starting 'while (my $input = $str->next_seq())'
           #and swap the two lines below for an example of that.
           my $r = $factory->submit_blast($input);
           #my $r = $factory->submit_blast('amino.fa');

           print STDERR "waiting..." if( $v > 0 );
           while ( my @rids = $factory->each_rid ) {
             foreach my $rid ( @rids ) {
               my $rc = $factory->retrieve_blast($rid);
               if( !ref($rc) ) {
                 if( $rc < 0 ) {
                   $factory->remove_rid($rid);
                 }
                 print STDERR "." if ( $v > 0 );
                 sleep 5;
               } else {
                 my $result = $rc->next_result();
                 #save the output
                 my $filename = $result->query_name()."\.out";
                 $factory->save_output($filename);
                 $factory->remove_rid($rid);
                 print "\nQuery Name: ", $result->query_name(), "\n";
                 while ( my $hit = $result->next_hit ) {
                   next unless ( $v > 0);
                   print "\thit name is ", $hit->name, "\n";
                   while( my $hsp = $hit->next_hsp ) {
                     print "\t\tscore is ", $hsp->score, "\n";
                   }
                 }
               }
             }
           }
         }

         # This example shows how to change a CGI parameter:
         $Bio::Tools::Run::RemoteBlast::HEADER{'MATRIX_NAME'} = 'BLOSUM45';
         $Bio::Tools::Run::RemoteBlast::HEADER{'GAPCOSTS'} = '15 2';

         # And this is how to delete a CGI parameter:
         delete $Bio::Tools::Run::RemoteBlast::HEADER{'FILTER'};

















