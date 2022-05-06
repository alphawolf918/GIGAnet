<?php
	ob_start();
	require '../lib/functions.php';
	require '../lib/sql.php';
	require '../lib/startup.php';
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");	
	$bg = ($_GET["type"] == "1") ? "background2.jpg" : "background.jpg";
?><!doctype html>
<html>
		<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<meta http-equiv="pragma" content="no-cache" />
			<link rel="stylesheet" type="text/css" href="../styles/main.css" media="all" />
			<script type="text/javascript" src="../scripts/jquery.js"></script>
			<script type="text/javascript" src="../scripts/angular.js"></script>
			<script type="text/javascript" src="../lib/datepicker/jquery-ui.js"></script>
			<script type="text/javascript" src="../scripts/main.js"></script>
			<link href='../lib/calendar/fullcalendar.css' rel='stylesheet' />
			<link href='../lib/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
			<script src='../lib/calendar/lib/moment.min.js'></script>
			<script src='../lib/calendar/lib/jquery.min.js'></script>
			<script src='../lib/calendar/fullcalendar.min.js'></script>
			<style type="text/css">
			 * {
				 font-size: 104%;
			 }
			</style>
			<title>GIGAnet</title>
		</head>
		<body style="background: #bbb; color: #fff;">
			<div style="font-size: 115%; font-weight: bold; padding: 2%;">Calendar (<?php if($_GET["type"] == '1') echo "Absence"; else echo "Event"; ?>)</div>
			<div class="greenButton" style="width: 5%; display: inline-block; font-size: 24px;"><a href="../index.php">Home</a></div>
		<?php if($_GET["type"] == "2"){ ?>
			<div class="greenButton" style="width: 20%; display: inline-block; font-size: 24px;"><a href="?type=1">Absence Calendar</a></div>
		<?php }else{ ?>
			<div class="greenButton" style="width: 20%; display: inline-block; font-size: 24px;"><a href="?type=2">Events Calendar</a></div>
		<?php } 
			if(permCheck("spotts")){
				$eventType = ($_GET["type"] == "1") ? "absence" : "event";
				echo '<div class="greenButton" style="width: 15%; display: inline-block; font-size: 24px;"><a href="../index.php?p=add'.$eventType.'">Add '.ucfirst($eventType).'</a></div>';
			}
			br("light");
		?>
			<div id="calendar"></div>
			<?php
			$calendarType = ($_GET["type"] == "1") ? "Absence" : "Events";
			changeTitle("Calendar (".$calendarType.")");
			?>
							<script type="text/javascript">
							<!--
								//This function is jQuery in JSON (JavaScript Object Notation). It's needed for and provided by the calendar that we are using.
								$(document).ready(function() {
									$('#calendar').fullCalendar({
											header: {
												left: 'prev,next today',
												center: 'title',
												right: 'month,basicWeek,basicDay'
											},
											defaultDate: '<?php echo date("Y-m-d"); ?>', //Sets the date to the current day
											editable: false,
											eventLimit: true, // allow "more" link when too many events
											events: [
											<?php
											$eventType = ($_GET["type"] == "1") ? "absence" : "event";
											$cH=0; //This integer is to decide whether or not to use an extra comma at the end of the event list. If there is a trailing comma, but no object following it, the script would fail.
													$getEvents = mysql_query("SELECT * FROM calendar WHERE event_type = '".$eventType."' ORDER BY start_on ASC");
													while($events = fetch($getEvents)){
														$cH++;
														$strAbout = str_replace("<br>","",addslashes($events["about"]));
														$strAbout = str_replace("&nbsp;","",$strAbout);
														echo "
														{
															id: ",$events["id"],", 
															title: '",addslashes($events["name"])," - ".$strAbout."',
															start: '",date("Y-m-d",strtotime($events["start_on"])),"',
															end: '",date("Y-m-d",strtotime($events["end_on"])),"',
															url: '../index.php?p=view".$eventType."&id=",$events["id"],"'
														}";
														//Check to see if the number of events is greater than the check variable ($cH). If they are, use a comma and a new line.
														if(mysql_num_rows($getEvents) > $cH){
															echo ",
															";
														}
													}
											?>
											]
									});
								});
							// -->
							</script>
			<script type="text/javascript" src="../scripts/external.js"></script>
		</body>
</html>
<?php
	ob_end_flush();
?>