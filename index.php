<?php
include 'header.php';
if(isset($_GET['url']) and $_GET['url'] != '')
{
	$file = $_GET['url'].".php";
	if(is_file($file))
	{
		include $file;
	}
	else
	{
		echo "Not Found";
	}
}
else
{
	include 'country.php';
	
}
include 'footer.php';