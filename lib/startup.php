<?php
	$LOGON_USER = $_SERVER["REMOTE_USER"];
	$LOGON_USER = str_replace("DOMAIN-GIGA\\","",$LOGON_USER);
	query("SET @LOGON_USER = '".$LOGON_USER."'");
	$userCheck = sql("SELECT id FROM accounts WHERE LOGON_USER = @LOGON_USER");
	if($userCheck["id"] == ""){
		exit("We're sorry, but we could not find you in the account database.");
	}
	$userData = sql("SELECT * FROM accounts WHERE LOGON_USER = @LOGON_USER");
	$browser = "";
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if (strlen(strstr($agent, 'Firefox')) > 0) {
			$browser = 'firefox';
		} else if (strlen(strstr($agent, 'WebKit')) > 0){
			$browser = 'chrome';
		}else{
			$browser = 'ie';
		}
	}
?>