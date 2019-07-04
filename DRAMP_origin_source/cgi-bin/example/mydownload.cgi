    use CGI ':standard';  
    use CGI::Carp qw(fatalsToBrowser);    
      
    my $files_location;    
    my $ID;    
    my @fileholder;  
      
    $files_location = "../../tmp/";  
      
    #$ID = param('file_name'); 
    $ID=remote_host.".fa"; 
      
    if ($ID eq '') {    
        print "Content-type: text/html\n\n";    
        print "You must specify a file to download.";    
    }   
    else  
     {  
        if(-e "$files_location/$ID")  
        {  
        }  
        else  
        {  
              print header;  
              print qq{<hmtl><head><title>The file doesn't exist.</title> 
              	       </head><body><br/><br/>  
     							<br/><center><h1>The file does not exist.</h1></center></body></html>};  
              exit;  
        }  
        open(DLFILE, "<$files_location/$ID") || Error('open', 'file');    
        @fileholder = <DLFILE>;    
        close (DLFILE) || Error ('close', 'file');    
      
        #open (LOG, ">>/usr50/home/webdata/public_html/test.log") || Error('open', 'file');  
        #print LOG "$ID\n";  
        #close (LOG);  
      
        print "Content-Type:application/x-download\n";    
        print "Content-Disposition:attachment;filename=$ID\n\n";  
        print @fileholder  
    }  
   