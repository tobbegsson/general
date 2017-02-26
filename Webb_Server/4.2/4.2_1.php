<?php

	//Definierar variabler
	$nameCookie = "Name";
	$timeCookie = "Time";
	//3 timmar i sekunder
	$threeHourVar = 10800;
	//Sätter date() till önskat format
	$startTime = date('Y-m-d H:i:s', time());
	//Sätter (startar) cookiesarna
	setcookie($timeCookie, $startTime, time()+($threeHourVar));
	setcookie($nameCookie, "Sju Sorters Kakor", time()+($threeHourVar));
	
	//Hämtar html-dokument
	$html = file_get_contents('4.2_1.html');
	echo "$html";

?>