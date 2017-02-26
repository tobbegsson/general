<?php
	
	header('Content-type: text/plain');
	
	//Ekar ut en sträng samt hämtar via $_GET värdet från inputobjekten med angivit namn
	echo "Förnamn: ".$_GET['preName']."\nEfternamn: ". $_GET['lastName']. "\nÅlder: ".$_GET['age'];

?>
