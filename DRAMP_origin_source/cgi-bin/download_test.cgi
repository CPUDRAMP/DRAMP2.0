#!usr/bin/perl -w
use strict;
  
# *** In the app which needs to download files
  use Net::Download::Queue;
  my $oQueue = Net::Download::Queue->new() or die;
  my $oDownload = $oQueue->oDownloadAdd(
      "http://www.darserman.com/Perl/TexQL/texql.pl",
      "./downloads",
      "texql.pl.txt",
      $urlReferer,      #Optional
  ) or die;
  #The url is now queued


  # *** Or using the command line
  download_queue --url=http://www.darserman.com/Perl/TexQL/texql.pl \
      --dir=./downloads --file=texql.pl.txt --
  #The url is now queued



  # *** On another command line (you can have many of these)
  download_queue --process
  #Urls are downloaded as they appear in the queue