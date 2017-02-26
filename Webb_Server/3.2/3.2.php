<?php

	//Array med variabelnamn
	$varArr = array("MIBDIRS", "MYSQL_HOME", "OPENSSL_CONF", "PHP_PEAR_SYSCONF_DIR", "PHPRC", "TMP", "HTTP_ACCEPT", "HTTP_REFERER", "HTTP_ACCEPT_LANGUAGE", "HTTP_USER_AGENT", "HTTP_ACCEPT_ENCODING", "HTTP_HOST", "HTTP_CONNECTION", "PATH", "SystemRoot", "COMSPEC", "PATHEXT", "WINDIR", "SERVER_SIGNATURE", "SERVER_SOFTWARE", "SERVER_NAME", "SERVER_ADDR", "SERVER_PORT", "REMOTE_ADDR", "DOCUMENT_ROOT", "REQUEST_SCHEME", "CONTEXT_PREFIX", "CONTEXT_DOCUMENT_ROOT", "SERVER_ADMIN", "SCRIPT_FILENAME", "REMOTE_PORT", "GATEWAY_INTERFACE", "SERVER_PROTOCOL", "REQUEST_METHOD", "QUERY_STRING", "REQUEST_URI", "SCRIPT_NAME");
	
	//Tom sträng
	//$varValue = "";	
	
	//Hämtar innehållet i html-filen som strängvariabel
	$html = file_get_contents("3.2.html");
	//Delar upp strängvariabeln, triggat av <!-- ==xxx== -->.
	$htmlSplit = explode("<!-- ==xxx== -->", $html);
	
	//Variabel som speglar delen av html-dok mellan markörerna
	$htmlMid = $htmlSplit[1];
	
	$tempMid = $htmlMid;
	
	//ekar ut första delen
	echo "$htmlSplit[0]";
	
	//Loopar igenom arrayen med variabelnamn och gör str_replace samt ekar ut namn samt dess värde för varje arrayindex
	foreach($varArr as $value){
		$varValue = getenv($value);
		$htmlMid = str_replace('---$td1---', $value, $tempMid);
		$htmlMid2 = str_replace('---$td2---', $varValue, $htmlMid);
		echo "$htmlMid2";
	}
	
	//ekar ut sista delen
	echo "$htmlSplit[2]";	
	
?>