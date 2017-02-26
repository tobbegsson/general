<?php
	//Hämtar namnvärdet
	$nameVar = "".$_GET['name'];
	//Definierar variabel utanför if-sats
	$xVar = "";
	
	//Kontrollerar vilken länk som klickats på och sätter variabeln till rätt värde
	if($nameVar == 'Zlatan Ibrahimovic'){
		$xVar = "Zlatan+Ibrahimovic";
	}else{
		$xVar = "Harry+Kane";
	}
	
	//Gör str_replace och ekar ut
	$html = file_get_contents('4.1.1_2.html');
	$html = str_replace('---X---', $xVar, $html);
	echo $html;
	
?>