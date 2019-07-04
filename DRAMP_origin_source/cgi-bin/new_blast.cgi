#!usr/bin/perl    -w
#use strict;
##############################this is the way of use bioperl to get information of blast#####

use Bio::Perl;

#if($#ARGV <0){
	#print "Usage: $0 genebankid\n";	
	#exit;
#}

my $seq_object = get_sequence('genbank',"FJ713781");

my $blast_report = blast_sequence($seq_object);

write_blast(">blast.out",$blast_report);