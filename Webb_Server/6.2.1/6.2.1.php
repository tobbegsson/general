<?php
	
	//Hämta innehållet ur .html, explodera i tre delar och eka ut första delen
	$html = file_get_contents('6.2.1.html');
	$htmlSplit = explode('<!-- ==xxx== -->', $html);
	echo "$htmlSplit[0]";
	
	//Uppgifter om databasen (anvnamn, lösen, databasnamn samt anslutning till db)
	$user = 'root';
	$pass = '';
	$db = 'testdb'; 
	$connect = new mysqli('localhost', $user, $pass, $db) or die("MySQL connection error");
	
	//SWL-fråga för att hämta data från dbs tabell guestbookpost
	$sql = "SELECT * FROM  guestbookpost";
	$result = mysqli_query($connect, $sql);
	
	//Lägg till till databasen vid knapptryck
	if(isset($_POST['submit'])){
		
		$nameVar = $_POST['name'];
		$emailVar = $_POST['email'];
		$webVar = $_POST['web'];
		$messageVar = $_POST['comment'];
		$timeVar = date('Y-m-d H:i:s', time());
		
		// Förbereder SQL query, skapar en variabel som man kan arbeta med.
		$stmt = mysqli_prepare($connect, "INSERT INTO guestbookpost VALUES(null,?,?,?,?,?)");
		// Binder ihop variablerna för $stmt, detta är bra att göra för att förhindra SQL injections. 
		mysqli_stmt_bind_param($stmt,'sssss',$timeVar,$nameVar,$webVar,$emailVar,$messageVar);
		// Utför det förbereda påståndet(query), som blivit förberet med hjälp av mysqli_prepare.
		mysqli_stmt_execute($stmt);
		
		header('refresh:0');
	}
	//Om det finns fler rader än 0 i databasens tabell
	if(mysqli_num_rows($result) > 0){
		//Loopa igenom raderna
		while($row = mysqli_fetch_assoc($result)){
			//Hämta värdena för varje rad
			$toTime = $row['time'];
			$toName = $row['name'];
			$toId = $row['messid'];
			$toWeb = $row['weburl'];
			$toMail = $row['email'];
			$toMsg = $row['comment'];
			
			$htmlMid = $htmlSplit[1];
			$tempMid = $htmlMid;
			
			$htmlMid = str_replace('---nr---', $toId, $tempMid);
			$htmlMid2 = str_replace('---time---', $toTime, $htmlMid);
			$htmlMid3 = str_replace('---homepage---', $toWeb, $htmlMid2);
			$htmlMid4 = str_replace('---name---', $toName, $htmlMid3);
			$htmlMid5 = str_replace('---email---', 'http://'.$toMail, $htmlMid4);
			$htmlMid6 = str_replace('---message---', $toMsg, $htmlMid5);
			 
			echo "$htmlMid6";
		}
		
	}else{
		echo "Det finns ännu inga inlägg i gästboken";
	}	
	
	echo "$htmlSplit[2]";
 
?>