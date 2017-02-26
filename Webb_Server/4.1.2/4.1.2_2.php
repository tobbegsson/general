<?php
	
	header('Content-type: text/plain');
	
	//Hämtar inputvärdena via $_POST
	$nameVar = $_POST['name'];
	$emailVar = $_POST['email'];
	
	//...och ekar ut dem
	echo "Namn: $nameVar\nE-post: $emailVar"; 

?>