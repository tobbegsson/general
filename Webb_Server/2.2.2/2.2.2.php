<?php

	//Hämtar och sparar filens namn, storlek och mime-typ, samt en omräkning av storleken till kb
	$nameOfFile = $_FILES['file']['name'];
	$sizeOfFile = $_FILES['file']['size'];
	$sizeInKb = $sizeOfFile/1000;
	$mimeOfFile = $_FILES['file']['type'];
	
	//tmp-filens namn
	$tmpName = $_FILES['file']['tmp_name'];
	
	//Maximalt tillåten filstorlek
	$maxSize = '500000';

	//Kontrollerar att formuläret är submittat
	if(isset($nameOfFile)){
		
		//Så länge filens storlek är mindre än den bestämda maxstorleken....
		if($sizeOfFile < $maxSize){
			
			//Så länge filens 'type' stämmer överrens med något av följande tre...
			if($mimeOfFile == 'text/plain' || $mimeOfFile == 'image/jpeg' || $mimeOfFile == 'image/png'){
				
				//definiera i vilken mapp filen ska sparas
				$fileDir = "./files/";
			
				//Flytta tempfilen till mappen med satt namn i form av filens sökväg plus det ursprungliga filnamnet
				if(move_uploaded_file($tmpName, $fileDir.$nameOfFile)){
					
					//För varje mime-typ...
					if($mimeOfFile == 'text/plain'){
						//Bestämmer hur innehållet ska visas
						header('Content-type: text/plain; charset: utf-8');
						//definierar en variabel som speglar innehållet i den öppnade filen
						$textFile = fopen($fileDir."/".$nameOfFile, 'r');
						//Innehållet läses och skrivs ut(echo)
						echo fread($textFile, $sizeOfFile);
						//Den speglande filen stängs
						fclose($textFile);
					}else if($mimeOfFile == 'image/jpeg'){	
						header('Content-type: image/jpeg');
						$textFile = fopen($fileDir."/".$nameOfFile, 'r');
						echo fread($textFile, $sizeOfFile);
						fclose($textFile);
					}else{
						header('Content-type: image/png');
						$textFile = fopen($fileDir."/".$nameOfFile, 'r');
						echo fread($textFile, $sizeOfFile);
						fclose($textFile);				
					}
				}else{
					echo "Filen gick inte att ladda upp";
				}				
			}else{
				header('Content-type: text/plain');
				echo "EJ GODKÄND MIME-TYP\nNamn: $nameOfFile\nStorlek: $sizeInKb kb\nMIME-typ: $mimeOfFile";
			}				
		}else{
			header('Content-typ: text/plain');
			echo "Filens storlek ($sizeInKb kb) är över tillåtna $maxSize kb";
		}
	}else{
		echo "FEL!";
	}

?> 