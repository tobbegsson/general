<?php
	
	header('Content-type: text/plain');
	
	//Hämtar värdena från inputfälten i forumläret via $_GET	
	$emailVar = "".$_GET['email'];
	$nameVar = "".$_GET['name'];
	
	echo "Namn: $nameVar \nE-post: $emailVar";
	
?>