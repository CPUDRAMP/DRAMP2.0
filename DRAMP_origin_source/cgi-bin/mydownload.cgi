#!/usr/bin/perl -w
     
use strict;
use warnings;
use CGI;
print "Content-type:text/html\n\n";

use Archive::Zip qw( :ERROR_CODES :CONSTANTS );
my $zip = Archive::Zip->new();# establish zip file.
#my @files = (    '../tmp/127.0.0.1.xls',    '../tmp/227.0.0.1.xls',    '../tmp/327.0.0.1.xls');
#foreach my $file (@files) {   
 my $file="../tmp/127.0.0.1.xls";
 $zip->addFile($file);
# }

unless ( $zip->writeToFileNamed('../tmp/result.zip') == AZ_OK ) { 
 print "Error in archive creation!\n";}else {    print "Archive created successfully!\n";}
 	
print<<load
	<html>
	<head>
	<script type="text/javascript">
	
			window.location.href="../tmp/result.zip"; 

	</script>
	</head>
load