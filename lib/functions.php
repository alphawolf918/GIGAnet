<?php
	$con = connect();
	function connect(){
		$con = mysqli_connect("localhost","root","") OR SQLError("Connection Error");
		mysqli_select_db($con, "giganet") OR SQLError("Database Error");
		return $con;
	}
	
	function errMsg($er){
		exit($er);
	}
	
	function br($type="normal"){
		$cssClass = ($type == 'normal') ? "br" : "brl";
		echo '<div class="'.$cssClass.'"></div>';
	}
	
	function multiBreak($numBreaks,$type="normal"){
		while($i < $numBreaks){
			br($type);
			$i++;
		}
	}
	
	function numRows($mysqliQueryResource){
		return mysqli_num_rows($mysqliQueryResource);
	}
	
	function noRows($mysqliQueryResource){
		return (numRows($mysqliQueryResource) <= 0);
	}
	
	function query($q){
		return mysqli_query($con, $q) OR SQLError();
	}
	
	function sql($q){
		$query = mysqli_query($con, $q) OR SQLError();
		return mysqli_fetch_assoc($query);
	}
	
	function fetch($q){
		return mysqli_fetch_assoc($q);
	}
	
	function SQLError($str="SQL Error:"){
		//exit("<strong>".$str.":</strong> ".mysqli_error());
	}
	
	function sqlClose($con){
		mysqli_close($con);
	}
	
	function permCheck(){
		$listAllowedUsers = array("administrator", "kenckler", "spotts", "wmiller", "kferguson", "dave", "tbutcher", "matt", "pshannon");
		$LOGON_USER = $_SERVER["REMOTE_USER"];
		$LOGON_USER = str_replace("DOMAIN-GIGA\\","",$LOGON_USER);
		$LOGON_USER = strtolower($LOGON_USER);
		foreach($listAllowedUsers AS $usr){
			if($LOGON_USER == $usr){
				return true;
			}
		}
	}
	
	function userCheck(){
		if(!permCheck()){
			exit("Insufficient permissions.");
		}
	}
	
	function userData($logonUser){
		$data = sql("SELECT employee_name FROM accounts WHERE LOGON_USER = '".$logonUser."'");
		return $data["employee_name"];
	}
	
	function invalidID(){
		errMsg("No valid ID was specified.");
	}

	function idCheck($id="id"){
		if(!(int)$_GET[$id] OR $_GET[$id] == 0){
			invalidID();
		}
		query("SET @id = '".$_GET["id"]."'");
	}
	
	function textFormat($str){
		$iStr = stripslashes($str);
		$iStr = nl2br($iStr);
		$iStr = censor($iStr);
		return $iStr;
	}
	
	function censor($iStr){
		return $iStr;
	}
	
	function changeTitle($newTitle){
		javascript('changeTitle("'.$newTitle.'")');
	}
	
	function javascript($script){
		echo '
		<script type="text/javascript">
		<!--
		 '.$script.'
		// -->
		</script>';
	}
	
	function storeValue($key,$val){
		setCookie($key,$val,(time()+86400));
	}

	function unstoreValue($key){
		setCookie($key,"",(time()-86400));
	}
	
	function shorten($str,$len=15){
		if(strlen($str) > $len){
			$str = "<span title=\"".$str."\">".substr($str,0,$len)."</span>";
			$str .= "<span style=\"font-size: 11px;\">&hellip;</span>";
		}
		return $str;
	}
	
	function varDebug(&$var){
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}
	
	function makePages($num,$pName="page"){
		(int) $p = (!(int)$_GET[$pName] OR $_GET[$pName] == 0) ? 0 : ($_GET[$pName] - 1);
		$returndata = array();
		$returndata[] = $p;
		$which = ceil($p*$num);
		$returndata[] = $which;
		return $returndata;
	}
	
	function GET($item,$idCheck=0){
		if($idCheck){
			idCheck($item);
		}
		return sqlEsc($_GET[$item]);
	}

	function sqlEsc($str){
		return mysqli_real_escape_string($str);
	}

	function isDomain(){
		return ($_COOKIE["LOGON_USER"] == "administrator");
	}

	function DomainCheck(){
		if(!isDomain()){
			unauthorized();
		}
	}
	
	function imgCheck($strExt){
		if($strExt != "jpg" AND $strExt != "png" AND $strExt != "jpeg" AND $strExt != "gif"){
			return false;
		}else{
			return true;
		}
	}
	
	function FormatRes($_INT,$_STR){
		(string) $newStr;
		if($_INT > 1 or $_INT == 0):
			$newStr = $_STR."s";
		else:
			$newStr = $_STR;
		endif;
		if($_STR != "birthday"){
			$newStr = (strtolower($_STR) != "day") ? str_replace("ys","ies",$newStr) : "days";
		}else{
			$newStr = "birthdays";
		}
		return number_format($_INT)." ".$newStr;
	}
	
	function dirCheck($dir,$perm=0777){
		if(!is_dir($dir)){
			mkdir($dir,$perm);
		}
	}
	
	function backup_sql($tables = '*'){
		if($tables == '*'){
		$tables = array();
		$result = mysqli_query($con, 'SHOW TABLES') OR SQLError();
		while($row = mysqli_fetch_row($result)){
			$tables[] = $row[0];
		}
	} else {
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	foreach($tables as $table){
		$result = mysqli_query($con, 'SELECT * FROM `'.$table.'`') OR SQLError();
		$num_fields = mysqli_num_fields($result);
		$return .= 'DROP TABLE `'.$table.'`;';
		$qx12 = mysqli_query($con, 'SHOW CREATE TABLE `'.$table.'`') OR SQLError();
		$row2 = mysqli_fetch_row($qx12);
		$return .= "\n\n".$row2[1].";\n\n";
		for ($i = 0; $i < $num_fields; $i++){
			while($row = mysqli_fetch_row($result)){
				$return.= 'INSERT INTO `'.$table.'` VALUES(';
				for($j=0; $j<$num_fields; $j++) {
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])){ 
						$return.= '"'.$row[$j].'"';
					} else {
						$return.= '""';
					}
					if ($j < ($num_fields-1)){
						$return.= ',';
					}
				}
				$return .= ");\n";
			}
		}
		$return .= "\n\n\n";
	}
	$dir = "backups";
	if(!is_dir($dir)){
		mkdir($dir,0777);
	}
	$handle = fopen($dir.'/giganet-backup-'.date("n-d-y").'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}
?>