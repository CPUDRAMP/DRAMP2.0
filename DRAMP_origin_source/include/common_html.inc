<?php
echo<<<EOF
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Data Respository Of Antimicrobial Peptides</title>
	<meta name="keywords" content="antimicrobial peptide database" />
	<meta name="description" content="antimicrobial peptide database" />
	<link href="{$global_css}" rel="stylesheet" type="text/css" media="screen" />
	<script src="{$ibanner_js}" type="text/javascript"></script>
	<script src="{$roll_news_js}" type="text/javascript"></script>
	<script src="{$global_nav_js}" type="text/javascript"></script>

<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen" />
<script src="../SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryDOMUtils.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<link href="tools.css" rel="stylesheet" type="text/css" />




	<script>
	function Addfavorite()
	{
		try
		{
		    window.external.addFavorite('http://www.dramp.com','dramp');
		}
		catch (e)
		{
		    try
		    {
		        window.sidebar.addPanel('dramp','http://www.dramp.com',"");
		    }
		    catch (e)
		    {
		        alert("Fail to add Favorite,please use the key combination 'Ctrl+D'.");
		    }
		}
	}
	</script>
	</head>
EOF;
?>
