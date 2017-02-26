<?php

	/*....................................................BORTTAGET......................................................*/
	//För att innehållet ska visas med mime-typ 'text/plain' - borttaget sedan 1.1 eftersom det inte ska visas med MIME-typ text/plain
	header('Content-type: text/plain');
	/*...................................................................................................................*/
	
	//Variabel som representerar textfilen 'visitor_counter.txt', i vilket besöksantalet ska sparas.
	$countVisitors = ("visitor_counter.txt");
	
	//Variabeln howMany representerar nuvarande värdet som textfilen innehåller
	$howMany = file($countVisitors);
	
	//Ökar värdet i arrayen som hämtades i filen med +1 på index 0
	$howMany[0] ++;
	
	//Variabel som öppnar filen i syfte att skriva i den ("w")
	$write = fopen($countVisitors, "w");
	
	//Skriver i textfilen, med innehållet sedan tidigare uppdaterat med +1 
	fwrite($write, "$howMany[0]");
	
	//Stänger filen
	fclose($write);
	
	//Hämtar innehållet i HTML-filen
	$html = file_get_contents("3.1.html");
	$html = str_replace('---$hits---', $howMany[0], $html);
	echo "$html";
	
?>