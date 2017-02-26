<?php
	//Hämtar värdena i cookies med värdena Time respektive Name
	$cookieTimeVar = $_COOKIE['Time'];
	$cookieNameVar = $_COOKIE['Name'];
	
	//Om inte kakorna med dessa namn är aktiva
	if(!isset($_COOKIE['Name']) || !isset($_COOKIE['Time'])){
		//Eka ut felmeddelande
		header('Content-type: text/plain');
		echo "FELMEDDELANDE: Det gick inte att baka kakor här";
	//Annars	
	}else{
		//Hämtade htmldok
		$html = file_get_contents('4.2_2.html');
		//...gör str_replace så att kakornas värden hamnar i html
		$html2 = str_replace('---time---', $cookieTimeVar, $html);
		$html3 = str_replace('---name---', $cookieNameVar, $html2);
		//Och eka ut
		echo "$html3";
	}

?>