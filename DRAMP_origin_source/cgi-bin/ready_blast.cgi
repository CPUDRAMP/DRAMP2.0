#!/usr/bin/perl -w
 
########################this is pre for blast######################### go
     
use strict;    
use CGI qw(:all);  

print "Content-type:text/html\n\n";

my $default_value=param('my_squence');
#@default_tmp=split /\+/,$default_value;

print<<END_ONE;
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--This page realizes the surface of similarity search in biological field-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
<script src="../SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryDOMUtils.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<link href="../tools/tools.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	window.onload=function()
  {
 	document.getElementById('textarea').defaultValue='$default_value'
 	document.getElementById('peptide_name').defaultValue='dfdfd'
  }

</script>
</head>
END_ONE

open DOTA,"../tools/simi_search.html"||die "I cant find";
while(my $webline=<DOTA>){
	
		print  qq{$webline};

}

