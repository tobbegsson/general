<?php

	header('Content-type: text/plain');
	
	//Ekar ut en sträng samt hämtar via $_POST värdet från inputobjekten med angivit namn	
	echo "Förnamn: ".$_POST['preName']."\nEfternamn: ".$_POST['lastName']."\nÅlder: ".$_POST['age']."\nKön: ".$_POST['gender']."";

?>