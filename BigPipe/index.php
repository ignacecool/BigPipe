<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Pragma: no-cache");
header("Content-Type: text/html");

require_once('libs_php/Browser.php');
require_once('libs_php/h_bigpipe.inc');
require_once('libs_php/h_pagelet.inc');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>BigPipe example</title>

<link href="style/style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/lib/bigPipe.js"></script>

</head>
<body>
<div id="menu-wrapper">
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="#">Homepage</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Photos</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Links</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
	<!-- end #menu --> 
</div>

<div id="banner"><a href="#"><img src="images/img01.jpg" width="1000" height="200" alt="" /></a></div>

<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Green<span>Exposure</span></a></h1>
		</div>
	</div>
</div>
<div id="wrapper"> 
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				
					<?php
						// leftbar						
						$content = file_get_contents('./pagelets/leftbar/leftbar.html', FILE_USE_INCLUDE_PATH);
						$pagelet = new Pagelet('leftbar');
						$pagelet->add_css("pagelets/leftbar/leftbar.css");
						$pagelet->add_content($content);
						echo $pagelet;
					?>
					
					<?php
						// middlebar						
						$content = file_get_contents('./pagelets/middlebar/middlebar.html', FILE_USE_INCLUDE_PATH);
						$pagelet = new Pagelet('content');
						$pagelet->add_css("pagelets/middlebar/middlebar.css");
						$pagelet->add_content($content);
						echo $pagelet;
					?>

					<?php
						// rightbar						
						$content = file_get_contents('./pagelets/rightbar/rightbar.html', FILE_USE_INCLUDE_PATH);
						$pagelet = new Pagelet('rightbar');
						$pagelet->add_css("pagelets/rightbar/rightbar.css");
						$pagelet->add_content($content);
						//$pagelet->add_javascript_code("$('javascript_inline_test').innerHTML = 'Ok';");
						echo $pagelet;
					?>
			</div>
		</div>
	</div>
	<!-- end #page --> 
</div>

<?php
echo "</body>\n";
BigPipe::render();

