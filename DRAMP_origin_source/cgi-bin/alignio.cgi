#!usr/bin/perl -w
#use strict;          

use Bio::AlignIO;
use Bio::Align::AlignI;

	$inputfilename = shift @ARGV;
        $in  = Bio::AlignIO->new(-file   => $inputfilename ,
                                    -format => 'fasta');
        $out = Bio::AlignIO->new(-file   => ">out.water" ,
                                    -format => 'emboss');

        while ( my $aln = $in->next_aln() ) {
               $out->write_aln($aln);
         #               print $aln->length, "\n";
        # print $aln->num_residues, "\n";
        # print $aln->is_flush, "\n";
        # print $aln->num_sequences, "\n";
        # print $aln->percentage_identity, "\n";
        # print $aln->consensus_string(50), "\n";

         # find the position in the alignment for a sequence location
         #$pos = $aln->column_from_residue_number('CY083913', 14); # = 6;

         # extract sequences and check values for the alignment column $pos
         #foreach $seq ($aln->each_seq) {
           #  $res = $seq->subseq($pos, $pos);
          #   $count{$res}++;
        # }
       #  foreach $res (keys %count) {
        #     printf "Res: %s  Count: %2d\n", $res, $count{$res};
       #  }

        }
