<?php
	//Gmail-uppgifter enligt instruktioner
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer;	
	$mail->IsSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = 'tobias.gunnarsson1986@gmail.com';
	$mail->Password = 'Saibot11';
	$mail->SMTPSecure = 'ssl';
	
	
	//Korrekt lösenord att ange
	$correctPsw = "1234";	
	//Syntax för hur en mailadress ska vara korrekt uppbyggd
	$correctEmail =  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	
	//Samtliga input-värden i variabler
	$fromVar = $_POST['from'];
	$toVar = $_POST['to'];
	$ccVar = $_POST['cc'];
	$bccVar = $_POST['bcc'];
	$subjectVar = $_POST['subject'];
	$messageVar = $_POST['message'];
	$passwordVar = $_POST['password'];
	$fromMailVar = "tobias.gunnarsson1986@gmail.com";
	
	//Om submit-knappen har tryckts på
	if(isset($_POST['submit'])){
		
		//Kontrollerar att en epost-adress har angivits, annars felmeddelande
		if(empty($_POST['to'])){
			header('Content-type: text/plain');
			echo "FEL: Du måste ange en mottagande mailadress \n";
		}else{
			//Kontrollerar att den angivna epost-adressen är korrekt uppbygt genom jämförelse med $correctEmail, annars felmeddelande
			if(!preg_match($correctEmail, $toVar)){
				echo "FEL: Du måste fylla i en korrekt e-postadress";
			}else{
				//Kontrollerar att ett lösenord har angivits, annars felmeddelande	
				if(empty($_POST['password'])){
					header('Content-type: text/plain');
					echo "FEL: Du måste ange ett lösenord \n";
				}else{
					//Kontrollerar att det angivna lösenordet stämmer överrens med $correctPsw, annars felmeddelande
					if($correctPsw !== $passwordVar){
						header('Content-type: text/plain');
						echo "FEL: Du har angivit fel lösenord \n";
					}else{
						$mailBody = $messageVar."<br><br>Observera! Detta meddelande är sänt från ett formulär på Internet och avsändaren kan vara felaktig!";
						$mail->SetFrom($fromMailVar, $fromVar);
						$mail->Subject = $subjectVar;
						$mail->MsgHTML($mailBody);
						$theAdress = $toVar;
						$mail->AddAddress($theAdress, 'Testmottagaren');
						if(!$mail->Send()){
							echo "FEL: Meddelandet gick inte att skicka\n\nFelkod: ".$mail->ErrorInfo;
						}else{
							echo "Meddelandet har skickats";
						}
					}
				}
			}
		}		
	}
?>