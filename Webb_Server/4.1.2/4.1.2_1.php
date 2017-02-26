<?php
	//Hämtar inputvärde
	$name = $_POST['name'];
	
	//Hämtar dokument 2
	$html = file_get_contents('4.1.2_2.html');
	
	//gör str_replace
	$html = str_replace("---X---", $name, $html);
	
	//och ekar ut det
	echo "$html";

?>