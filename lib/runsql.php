<?php
	require "functions.php";
	DomainCheck();
	if(!isset($_POST["m"])){
		errMsg("Invalid");
	}
	connect();
	$q = $_POST["q"];
	$m = mysql_query($q) OR SQLError();
	if($m){
		echo "Successful run.";
		logUser("ran a MySQL query: ".$q);
	}
?>