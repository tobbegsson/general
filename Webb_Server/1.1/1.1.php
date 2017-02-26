<?php
	//För att innehållet ska visas med mime-typ 'text/plain'
	header('Content-type: text/plain');
	
	//Variabel som representerar textfilen 'visitor_counter.txt', i vilket besöksantalet ska sparas.
	$countVisitors = ("visitor_counter.txt");
	
	//Variabeln howMany representerar nuvarande värdet som textfilen innehåller
	$howMany = file($countVisitors);
	
	//Ökar värdet som hämtades i filen med +1
	$howMany[0] ++;
	
	//Variabel som öppnar filen i syfte att skriva i den ("w")
	$write = fopen($countVisitors, "w");
	
	//Skriver i textfilen, med innehållet sedan tidigare uppdaterat med +1 
	fwrite($write, "$howMany[0]");
	
	//Stänger filen
	fclose($write);
	
	//Skriver ut värdet
	echo "$howMany[0]";	
?>