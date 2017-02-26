<?php
	
	header('Content-type: text/plain');	
	
	//Array med variabelnamn som hämtats via phpinfo(INFO_ALL);
	$varArr = array("MIBDIRS", "MYSQL_HOME", "OPENSSL_CONF", "PHP_PEAR_SYSCONF_DIR", "PHPRC", "TMP", "HTTP_ACCEPT", "HTTP_REFERER", "HTTP_ACCEPT_LANGUAGE", "HTTP_USER_AGENT", "HTTP_ACCEPT_ENCODING", "HTTP_HOST", "HTTP_CONNECTION", "PATH", "SystemRoot", "COMSPEC", "PATHEXT", "WINDIR", "SERVER_SIGNATURE", "SERVER_SOFTWARE", "SERVER_NAME", "SERVER_ADDR", "SERVER_PORT", "REMOTE_ADDR", "DOCUMENT_ROOT", "REQUEST_SCHEME", "CONTEXT_PREFIX", "CONTEXT_DOCUMENT_ROOT", "SERVER_ADMIN", "SCRIPT_FILENAME", "REMOTE_PORT", "GATEWAY_INTERFACE", "SERVER_PROTOCOL", "REQUEST_METHOD", "QUERY_STRING", "REQUEST_URI", "SCRIPT_NAME");
	
	//Definierar en variabel som tom sträng
	$varValue = "";	
	
	//Loopar igenom arrayen och på varje index...
	foreach($varArr as $value){
		//Sätts strängen till värdet som hämtar via metoden getenv() med värdet på nuvarande index som parameter
		$varValue = getenv($value);
		//Och skrivs ut följt av en radbrytning
		echo "$value ==> $varValue \n";
	}
	
?>