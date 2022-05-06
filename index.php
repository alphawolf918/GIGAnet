<?php
	ob_start();
	require 'lib/functions.php';
	require 'lib/sql.php';
	require 'lib/startup.php';
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=1100" />
		<meta http-equiv="pragma" content="no-cache" />
		<link rel="stylesheet" href="styles/main.css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" href="lib/datepicker/jquery-ui.css" />
		<script src="scripts/jquery.js"></script>
		<script src="lib/datepicker/jquery-ui.js"></script>
		<script src="scripts/main.js"></script>
		<title>GIGAnet</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div class="topHeader">
					<?php br(); ?>
					<img src="images/logo/logo.png" class="giganetLogo" alt="[GIGAnet Logo]" title="GIGAnet" onclick="window.location.href='.';" />
					<div class="afterLogo" onclick="window.location='.';">
						<div class="customBreak2"></div>
						<div class="blackButton" onclick="window.location='.';" style="cursor: pointer;">
							<div class="glare"></div>
							<a href="." class="homeLink">HOME</a>
						</div>
					</div>
					<div class="dateSection">
						<?php echo date("D")." ".date("M j, Y"); ?>
					</div>
						<div class="weatherSection">
							<a href="http://www.accuweather.com/en/us/macon-ga/31201/weather-forecast/328223" class="aw-widget-legal"></a><div id="awcc1459176690069" class="aw-widget-current"  data-locationkey="328223" data-unit="f" data-language="en-us" data-useip="false" data-uid="awcc1459176690069"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
						</div>
					<?php
						multiBreak(2);
					?>
					<div class="welcomeSection">
						&nbsp; &nbsp; &nbsp; Welcome, <?php 
						$name = sql("SELECT employee_name FROM accounts WHERE LOGON_USER = @LOGON_USER");
						echo '<strong>'.explode(" ",$name["employee_name"])[0]."</strong>.";
					?>
					</div>
				</div>
			</div>
				<?php br("light"); ?>
				<nav id="navLeft" class="top">
					<div class="title navTitle">Menu</div>
					<?php br(); ?>
					<div class="navContent">
						<?php
							br();
							if(permCheck("spotts")){
								?>
								<div class="aquaButton">
									<div class="glare"></div>
									<a href="?p=admin" class="leftLink wLink">Administrator</a>
								</div>
							<?php
								br();
							}
							?>
					<div class="aquaButton">
						<div class="glare"></div>
						<a href="?p=compliance" class="leftLink wLink">Compliance</a>
					</div>
						<?php br(); ?>
					<div class="aquaButton">
						<div class="glare"></div>
						<a href="?p=frequentdocuments" class="leftLink wLink">Frequent Documents</a>
					</div>
						<?php br(); ?>
					<div class="aquaButton">
						<div class="glare"></div>
						<a href="?p=humanresources" class="leftLink wLink">Human Resources</a>
					</div>
						<?php br(); ?>
					<div class="aquaButton">
						<div class="glare"></div>
						<a href="ext/gallery.php" class="leftLink wLink">Photo Gallery</a>
					</div>
						<?php br(); ?>
					<div class="aquaButton">
						<div class="glare"></div>
						<a href="?p=qms" class="leftLink wLink">Quality Management System</a>
					</div>
						<?php br(); ?>
				</div>
						<?php br("light"); ?>
			</nav><div class="customBreak"></div>
			<div id="contentMain" class="top bottom">
				<?php
					switch($_GET["p"]){
						default:
							changeTitle("Home");
				?>
				<div class="filler">Absences & Events for Today</div>
						<?php br(); ?>
				<div class="blueBlock">
					<div class="title top absences-events">Absences<?php if(permCheck()){ ?> &nbsp; <a href="?p=addabsence" title="New.."><img src="images/add.png" class="icon" /></a> <?php } ?>&raquo; <a href="ext/calendar.php?type=1" class="leftLink wLink">View Calendar</a> </div>
						<?php
						br();
						$getAbsences = mysql_query("SELECT * FROM calendar WHERE event_type = 'absence' AND start_on = '".date("Y-m-d")."' OR (end_on > CURDATE() AND start_on < CURDATE() AND event_type = 'absence')") OR SQLError();
						$numAbsences = numRows($getAbsences);
						if($numAbsences > 0){
							while($a = fetch($getAbsences)){
								echo ' &bull; <a href="?p=viewabsence&id='.$a["id"].'" class="whiteLink">'.stripslashes($a["name"])."</a> ";
								$strAbout = stripslashes($a["about"]);
								$strAbout = str_replace("<br>","",$strAbout);
								if($strAbout != " "){
									echo " - ".$strAbout;
								}
								echo "<div style=\"height: 4px;\"></div>";
							}
						}else{
							echo 'None today.';
						}
						?>
				</div>
				<div class="blueBlock position-absolute">
					<div class="title top absences-events">Events<?php if(permCheck("spotts")){ ?> &nbsp; &nbsp; <a href="?p=addevent" title="New.."><img src="images/add.png" class="icon" /></a><?php } ?> &nbsp; &raquo; <a href="ext/calendar.php?type=2" class="leftLink wLink">View Calendar</a>  </div>
					<?php
						br();
						$getEvents = mysql_query("SELECT * FROM calendar WHERE event_type = 'event' AND start_on = '".date("Y-m-d")."' OR (end_on > CURDATE() AND start_on < CURDATE() AND event_type = 'event')") OR SQLError();
						if(mysql_num_rows($getEvents) > 0){
							while($e = fetch($getEvents)){
								echo ' &bull; <a href="?p=viewevent&id='.$e["id"].'" class="whiteLink">'.stripslashes($e["name"])."</a> - ".stripslashes($e["about"])."<div class=\"height-4px\"></div>";
							}
						}else{
							echo 'None today.';
						}
						br("light");
						$currentYear = date("Y");
						$getUsers = mysql_query("SELECT employee_name,hiredate FROM accounts ORDER BY employee_name ASC") OR SQLError();
						$getUsers2 = mysql_query("SELECT employee_name,birthday FROM accounts ORDER BY employee_name ASC") OR SQLError();
						while($users = fetch($getUsers)){
							$hireDate = strtotime($users["hiredate"]);
							if(date("F j",$hireDate) == date("F j")){
								$hireYear = date("Y",$hireDate);
								$numYears = $currentYear-$hireYear;
								echo "<br /> <img src=\"images/date.png\" class=\"anni-birthday\" /> ".$users["employee_name"]." - ".FormatRes($numYears,"Year")."!";
							}
						}
						while($u = fetch($getUsers2)){
							$bd = strtotime($u["birthday"]);
							$getBirthYear = explode("-",$u["birthday"]);
							$birthYear = $getBirthYear[0];
							if($birthYear == "0000"){
								$bd = strtotime("1979-".$getBirthYear[1]."-".$getBirthYear[2]);
							}
							if(date("F j",$bd) == date("F j")){
								echo "<br /> <img src=\"images/cake.png\" class=\"anni-birthday\" /> ".$u["employee_name"]." - Happy Birthday!";
							}
						}
					?>
				</div><?php
					multiBreak(2,"light");
				?>
				<?php br("light"); ?>
				<div class="announcementBox">
					<div class="title titleAnnounce">Announcements<?php if(permCheck("spotts")){ ?> &nbsp; &nbsp; <a href="?p=addannouncement" title="New.."><img src="images/add.png" class="icon" /></a> <?php } ?></div>
					<?php
						multiBreak(2);
						$getAnn = mysql_query("SELECT id,title,about FROM announcements ORDER BY title DESC LIMIT 4") OR SQLError();
						while($ann = fetch($getAnn)){
							echo '<div class="announcement"> &nbsp; &bull; <a href="?p=viewannouncement&id='.$ann["id"].'" title="click to view announcement">'.stripslashes($ann["title"]).'</a> - '.stripslashes($ann["about"]);
							if((time() - strtotime($ann["announce_date"])) <= 172800){
								echo ' <img src="images/new.png" class="img-25" />';
							}
							echo '</div>';
							multiBreak(2);
						}
						if(noRows($getAnn)){
							echo ' &nbsp; None.';
						}
					?>
						<div class="br"></div>
						<div class="margin-left-1-5">* Click the images below to load them in higher resolution. Scroll the images by clicking on the arrows.</div>
						<div id="containmentBox">
							<span class="arrow" onclick="swapImg();">&laquo;</span>
							<div class="scrollContainer">
								<img alt="[carhartt deal]" src="docs/carharttdeal-1.png" id="scrollImg" class="scrollImg" onclick="window.open(this.src);return false;" />
							</div>
							<span class="arrow" onclick="swapImg();">&raquo;</span>
						</div>
				</div>
				<?php
						break;
						case 'addannouncement':
							userCheck("spotts");
							changeTitle("Add Announcement");
							if(isset($_POST["buttonSubmit"])){
								query("INSERT INTO announcements(title,about,details)VALUES('".addslashes($_POST["title"])."','".addslashes($_POST["about"])."','".addslashes($_POST["details"])."')");
								$n = mysql_insert_id();
								echo "Announcement added.";
								header("Refresh: 1; ?p=viewannouncement&id=".$n);
							}else{
								?>
								<div style="margin-left: 2%;">
									<h2>Add Announcement</h2>
									<form action="?p=addannouncement" method="post">
										<p>
											<label for="title" class="formLabel">Title:</label>
											<br />
											<input type="text" class="form-control width-41" name="title" required="1" placeholder="Enter title" />
										</p>
										<p>
											<label for="about" class="formLabel">About:</label> (Optional)
											<br />
											<textarea cols="44" rows="7" class="form-control" name="about" placeholder="Enter details" id="about"></textarea>
										</p>
											<label for="about" class="formLabel">Extra Information:</label> (Optional)
											<br />
											<textarea cols="44" rows="7" class="form-control" name="details" placeholder="Enter info" id="details"></textarea>
											<div class="font-size-13px"><strong>Note:</strong> This will only show up on the announcement's page.</div>
										</p>
										<p>
											<button type="submit" class="formButton form-control" name="buttonSubmit" id="btnSubmit">Finish</button>
										</p>
									</form>
								</div>
								<script src="scripts/nicEdit.js" type="text/javascript"></script>
							<?php
							$fullPanel = "{fullPanel: true}";
							?>
							<script type="text/javascript">
							new nicEditor(<?php echo $fullPanel; ?>).panelInstance('about');
							new nicEditor(<?php echo $fullPanel; ?>).panelInstance('details');
							loadDatePicker('datepicker',"");
							</script>
								<?php
							}
						break;
						case 'editannouncement':
							userCheck("spotts");
							changeTitle("Edit Announcement");
							idCheck();
							$data = sql("SELECT title,about,details FROM announcements WHERE id = @id");
							if(isset($_POST["buttonSubmit"])){
								query("UPDATE announcements SET title = '".addslashes($_POST["title"])."', about = '".addslashes($_POST["about"])."', details = '".addslashes($_POST["details"])."' WHERE id = @id");
								echo "Announcement edited.";
								header("Refresh: 1; ?p=viewannouncement&id=".$_GET["id"]);
							}else{
								$rr = stripslashes($data["title"]);
								$rr = str_replace("\"","'",$rr);
								?>
								<div class="margin-left-2">
									<h2>Edit Announcement</h2>
									<form action="?p=editannouncement&id=<?php echo $_GET["id"]; ?>" method="post">
										<p>
											<label for="title" class="formLabel">Title:</label>
											<br />
											<input type="text" class="form-control width-41" value="<?php echo $rr; ?>" name="title" required="1" placeholder="Enter title" />
										</p>
										<p>
											<label for="about" class="formLabel">About:</label> (Optional)
											<br />
											<textarea cols="44" rows="7" class="form-control" name="about" id="about" required="1" placeholder="Enter details"><?php echo stripslashes($data["about"]); ?></textarea>
										</p>
										</p>
											<label for="about" class="formLabel">Extra Information:</label> (Optional)
											<br />
											<textarea cols="44" rows="7" class="form-control" name="details" placeholder="Enter info" id="details"><?php echo stripslashes($data["details"]); ?></textarea>
											<div class="font-size-13px;"><strong>Note:</strong> This will only show up on the announcement's page.</div>
										</p>
										<p>
											<button type="submit" class="formButton form-control" name="buttonSubmit" id="btnSubmit">Finish</button>
										</p>
									</form>
								</div>
								<script src="scripts/nicEdit.js" type="text/javascript"></script>
							<?php
							$fullPanel = "{fullPanel: true}";
							?>
							<script type="text/javascript">
							new nicEditor(<?php echo $fullPanel; ?>).panelInstance('about');
							new nicEditor(<?php echo $fullPanel; ?>).panelInstance('details');
							loadDatePicker('datepicker',"");
							</script>
								<?php
							}
						break;
						case 'deleteannouncement':
							userCheck("spotts");
							idCheck();
							changeTitle("Delete Announcement");
							query("DELETE FROM announcements WHERE id = @id");
							echo "Announcement deleted.";
							header("Refresh: 1; .");
						break;
						case 'viewannouncement':
							idCheck();
							$data = sql("SELECT id,title,about,details FROM announcements WHERE id = @id");
							changeTitle("View Announcement - ".stripslashes($data["title"]));
							if($data["title"] == ""){
								errMsg("An announcement with this ID does not exist.");
							}
							echo '<h2> &nbsp; &nbsp; '.stripslashes($data["title"]).' </h2>';
							br();
							if(permCheck("spotts")){
								echo ' &nbsp; &nbsp; <a href="?p=editannouncement&id='.$_GET["id"].'">Edit</a> &bull; <a href="?p=deleteannouncement&id='.$_GET["id"].'" onclick="return confirm(\'Are you sure you wish to delete this announcement? This action cannot be undone.\');">Delete</a>';
							}
							br();
							echo '
								  &nbsp; &nbsp; <strong>Details:</strong> '.stripslashes($data["about"]).'
							';
							if(stripslashes($data["details"]) != ""){
								echo '<br />
								  &nbsp; &nbsp; &nbsp; <strong>**</strong> '.stripslashes($data["details"]);
							}
						break;
						case 'addevent':
							userCheck();
							changeTitle("Add Event");
							if(isset($_POST["buttonSubmit"])){
								query("INSERT INTO calendar(name,about,start_on,end_on,LOGON_USER,event_type)VALUES('".addslashes($_POST["name"])."','".addslashes($_POST["about"])."','".$_POST["startDate"]."','".$_POST["endDate"]."',@LOGON_USER,'event')");
								$n = mysql_insert_id();
								header("Refresh: 1; ?p=viewevent&id=".$n);
								echo "Event added.";
							}else{
								?>
								<div class="margin-left-5">
								<?php br(); ?>
									<strong>Add Event</strong>
								<?php multiBreak(4); ?>
									<form action="?p=addevent" method="post">
										<p>
											<label class="formLabel" for="name">Event Name:</label>
											<input type="text" class="form-control" size="32" required="1" name="name" placeholder="Name of event" />
										</p>
										<p>
											<label class="formLabel" for="startDate">Start Date:</label>
											<input type="text" id="datepicker" class="form-control width-20" name="startDate" placeholder="Starts On" />
										</p>
										<p>
											<label class="formLabel" for="endDate">End Date:</label>
											<input type="text" id="datepicker2" class="form-control width-20" name="endDate" placeholder="Ends On" />
										</p>
										<p>
											<label class="formLabel" for="about">About:</label> (Optional)
											<div class="brl"></div>
											<textarea cols="40" rows="5" class="form-control" name="about" id="about" placeholder="Details about the event"></textarea>
										</p>
										<p class="margin-left-20">
											<button type="submit" class="formButton form-control" name="buttonSubmit" id="btnSubmit">Finish</button>
										</p>
									</form>
								</div>
								<script src="scripts/nicEdit.js" type="text/javascript"></script>
							<?php
							$fullPanel = "{fullPanel: true}";
							?>
							<script type="text/javascript">
							new nicEditor(<?php echo $fullPanel; ?>).panelInstance('about');
							loadDatePicker('datepicker',"");
							loadDatePicker('datepicker2',"");
							</script>
								<?php
							}
						break;
						case 'addabsence':
							userCheck();
							changeTitle("Add Absence");
							if(isset($_POST["buttonSubmit"])){
								$name = explode(" ",$_POST["employee_name"])[0]. " Out";
								query("INSERT INTO calendar(name,about,start_on,end_on,LOGON_USER,event_type)VALUES('".addslashes($name)."','".addslashes($_POST["about"])."','".$_POST["startDate"]."','".$_POST["endDate"]."',@LOGON_USER,'absence')");
								$n = mysql_insert_id();
								header("Refresh: 1; ?p=viewabsence&id=".$n);
								echo "Absence added.";
							}else{
								?>
								<div class="margin-left-5">
									<?php br(); ?>
									<strong>Add Absence</strong>
									<?php multiBreak(4); ?>
									<form action="?p=addabsence" method="post">
										<p>
											<?php
												$getUsers = mysql_query("SELECT employee_name,LOGON_USER FROM accounts ORDER BY employee_name ASC") OR SQLError();
											?>
											<label class="formLabel" for="employee_name">Employee Absent:</label>
											<select name="employee_name" class="form-control">
												<option value="">-----------------------</option>
												<?php
													while($users = fetch($getUsers)){
														if($users["LOGON_USER"] == 'administrator') continue;
														echo '<option value="'.$users["employee_name"].'">'.$users["employee_name"].'</option>
														';
													}
												?>
											</select>
										</p>
										<p>
											<label class="formLabel" for="startDate">Leaving On:</label>
											<input type="text" id="datepicker" class="form-control width-20" name="startDate" placeholder="Starts On" />
										</p>
										<p>
											<label class="formLabel" for="endDate">Returning On:</label>
											<input type="text" id="datepicker2" class="form-control width-20" name="endDate" placeholder="Ends On" />
										</p>
										<p>
											<label class="formLabel" for="about">About:</label> (Optional)
											<div class="brl"></div>
											<textarea cols="40" rows="5" class="form-control" name="about" id="about" placeholder="Extra details about the absence." id="post"> </textarea>
										</p>
										<p class="margin-left: 20%;">
											<button type="submit" class="formButton form-control" name="buttonSubmit" id="btnSubmit">Finish</button>
										</p>
									</form>
								</div>
							<script src="scripts/nicEdit.js" type="text/javascript"></script>
							<?php
							$fullPanel = "{fullPanel: true}";
							?>
							<script type="text/javascript">
							new nicEditor(<?php echo $fullPanel; ?>).panelInstance('about');
							loadDatePicker('datepicker',"");
							loadDatePicker('datepicker2',"");
							</script>
								<?php
							}
						break;
						case 'editabsence':
							userCheck();
							idCheck();
							changeTitle("Editing Absence");
							$data = sql("SELECT name,about,start_on,end_on,LOGON_USER,event_type FROM calendar WHERE id = @id");
							if(isset($_POST["buttonSubmit"])){
								$name = explode(" ",$_POST["employee_name"])[0]. " Out";
								query("UPDATE calendar SET name = '".$name."', about = '".addslashes($_POST["about"])."', start_on = '".$_POST["startDate"]."', end_on = '".$_POST["endDate"]."', LOGON_USER = @LOGON_USER, event_type = 'absence' WHERE id = @id");
								echo "Absence edited.";
								header("Refresh: 1; ?p=viewabsence&id=".$_GET["id"]);
							}else{
								?>
								<div class="margin-left-5">
									<?php br(); ?>
									<strong>Edit Absence</strong>
									<?php multiBreak(4); ?>
									<form action="?p=editabsence&id=<?php echo $_GET["id"]; ?>" method="post">
										<p>
											<?php
												$getUsers = mysql_query("SELECT employee_name,LOGON_USER FROM accounts ORDER BY employee_name ASC") OR SQLError();
											?>
											<label class="formLabel" for="employee_name">Employee Absent:</label>
											<select name="employee_name" class="form-control">
												<option value="">-----------------------</option>
												<?php
													while($users = fetch($getUsers)){
														if($users["LOGON_USER"] == 'administrator') continue;
														echo '<option value="'.$users["employee_name"].'"';
														$name = explode(" ",$users["employee_name"])[0]." Out";
														if($name == $data["name"]){
															echo ' selected="1"';
														}
															echo '>'.$users["employee_name"].'</option>
														';
													}
												?>
											</select>
										</p>
										<p>
											<label class="formLabel" for="startDate">Leaving On:</label>
											<input type="text" id="datepicker" value="<?php echo $data["start_on"]; ?>" class="form-control width-20" name="startDate" placeholder="Starts On" />
										</p>
										<p>
											<label class="formLabel" for="endDate">Returning On:</label>
											<input type="text" id="datepicker2" value="<?php echo $data["end_on"]; ?>" class="form-control width-20" name="endDate" placeholder="Ends On" />
										</p>
										<p>
											<label class="formLabel" for="about">About:</label> (Optional)
											<?php br("light"); ?>
											<textarea cols="40" rows="5" class="form-control" name="about" id="about" placeholder="Extra details about the absence."><?php echo stripslashes($data["about"]); ?></textarea>
										</p>
										<p class="margin-left-20">
											<button type="submit" class="formButton form-control" name="buttonSubmit" id="btnSubmit">Finish</button>
										</p>
									</form>
								</div>
								<script src="scripts/nicEdit.js" type="text/javascript"></script>
							<?php
							$fullPanel = "{fullPanel: true}";
							?>
							<script type="text/javascript">
							new nicEditor(<?php echo $fullPanel; ?>).panelInstance('about');
							loadDatePicker('datepicker',"");
							loadDatePicker('datepicker2',"");
							</script>
								<?php
							}
						break;
						case 'viewevent':
							idCheck();
							if($_GET["id"] == "0" OR !$_GET["id"]){
								echo("Insufficient data.");
							}else{
								$event = sql("SELECT * FROM calendar WHERE id = @id");
								if($event["id"] == ""){
									echo("This event does not exist.");
								}else{
									changeTitle("Viewing Event - ".ucfirst(stripslashes($event["name"])));
									echo '<div class="br"></div><div class="br"></div><div class=\"view-event-section\">Viewing Event: <span class=\"font-weight-normal\">'.ucfirst(stripslashes($event["name"])).'</span>';
									br();
									echo '
									<strong>Added By: </strong> <span class=\"font-weight-normal\">'.userData($event["LOGON_USER"]).'</span>';
									br();
									echo '
									<strong>Date: </strong> <span class=\"font-weight-normal\">'.date("F jS, Y",strtotime($event["start_on"]));
									if($event["start_on"] != $event["end_on"]){
										echo ' - '.date("F jS, Y",strtotime($event["end_on"]));
									}
									echo '</span>
									';
									br();
									echo '</div>
									<div class="margin-left-4">
										';
										if(permCheck("spotts")){
											echo '<div>
												<span class="admin-options-section">Admin Options: </span><a href="?p=editevent&id='.$_GET["id"].'">Edit Event</a> &bull; <a href="?p=deleteevent&id='.$_GET["id"].'" onclick="return confirm(\'Are you sure you wish to delete this event? This cannot be undone.\');">Delete Event</a>
											</div>';
										}
										echo '<h2>About</h2>
										<div class="view-event-about">
											&nbsp; &nbsp; &nbsp;&nbsp;'.stripslashes($event["about"]).'
										</div>
									</div>
									';
								}
							}
						break;
						case 'viewabsence':
							idCheck();
							$event = sql("SELECT * FROM calendar WHERE id = @id");
							if($event["id"] == ""){
								echo("This event does not exist.");
							}else{
								changeTitle("Viewing Absence - ".ucfirst(stripslashes($event["name"])));
								multiBreak(2);
								echo '<div class="view-absence-section">Viewing Event: <span style="font-weight: normal;">'.ucfirst(stripslashes($event["name"])).'</span>';
								br();
								echo '
								<strong>Added By: </strong> <span class=\"font-weight-normal\">'.userData($event["LOGON_USER"]).'</span>';
								br();
								echo '
								<strong>Date: </strong> <span class=\"font-weight-normal\">'.date("F jS, Y",strtotime($event["start_on"]));
								if($event["start_on"] != $event["end_on"]){
									echo ' - '.date("F jS, Y",strtotime($event["end_on"]));
								}
								echo '</span>';
								br();
								echo '</div>
								<div class=\"margin-left-4\">
								';
								if(permCheck("spotts")){
									echo '<div>
									<span style="font-size: 12px; font-weight: bold;">Admin Options: </span><a href="?p=editabsence&id='.$_GET["id"].'">Edit Absence</a> &bull; <a href="?p=deleteabsence&id='.$_GET["id"].'" onclick="return confirm(\'Are you sure you wish to delete this event? This cannot be undone.\');">Delete Absence</a>
									</div>';
								}
								echo '<h2>About</h2>
								<div style="background: #fff; color: #444; border: 1px solid #000; border-radius: 5px; padding: 4px 10px; width: 65%; min-height: 35%; position: absolute;">
								&nbsp; &nbsp; &nbsp;&nbsp;'.stripslashes($event["about"]).'
								</div>
							</div>
						';
						}
						break;
						case 'admin':
							userCheck("spotts");
							changeTitle("cPanel");
							?>
								<h2 style="border-bottom: 1px solid #000;">Admin cP</h2>
								<table class="adminTable" cellspacing="1" cellpadding="2">
									<tr>
										<th colspan="4" class="adminHeaderRow">cPanel Options</th>
									</tr>
									<tr>
										<th style="text-align: left; width: 25%;" class="adminHeaderRow adminSubHeaderRow">Events</th>
										<th style="text-align: left;" class="adminHeaderRow adminSubHeaderRow">Users</th>
										<th style="text-align: left;" class="adminHeaderRow adminSubHeaderRow">Announcements</th>
										<th style="text-align: left;" class="adminHeaderRow adminSubHeaderRow">Maintenance</th>
									</tr>
									<tr>
										<td class="adminCell">
											<a href="calendar.php?type=1" class="nLink">Absence Calendar</a> (<a href="?p=absencereport" class="nLink">Report</a>)
											<br />
											<a href="calendar.php?type=2" class="nLink">Event Calendar</a>
											<br />
											<a href="?p=addevent" class="nLink">Add Event</a>
											<br />
											<a href="?p=addabsence" class="nLink">Add Absence</a>
											<br />
											<a href="?p=viewabsences" class="nLink">View Absences</a>
											<br />
											<a href="?p=viewevents" class="nLink">View Events</a>
										</td>
										<td class="adminCell">
											<a href="?p=adduser" class="nLink">Add User</a>
											<br />
											<a href="?p=users" class="nLink">View Users</a>
										</td>
										<td class="adminCell">
											<a href="?p=addannouncement" class="nLink">Add Announcement</a>
											<br />
											<a href="?p=viewannouncements" class="nLink">View Announcements</a>
										</td>
										<td class="adminCell">
											<a href="Changelog.txt" onclick="window.open(this.href);return false;" class="nLink">View Changelog</a>
											<br />
											<a href="?p=backup" class="nLink">Site Backup</a>
										</td>
									</tr>
								</table>
							<?php
						break;
						case 'backup':
							userCheck("spotts");
							changeTitle("Web Site Data Backup");
							echo '<a href="?p=admin" class="nLink">&laquo; Back to cPanel</a>
							<div style="height: 5px;"></div>
							<h1 style="border-bottom: 1px solid #000;">Site Backup</h1>';
							if($_GET["sql"] == "true"){
								backup_sql();
							echo ' <img src="images/accept.png" class="icon" /> <strong><span style="color: #0b0;">SQL backup ran successfully.</span> File can be located in the "backups" folder.</strong>
							<div style="height: 15px;"></div>';
							}
							?>
							If you wish to backup GIGAnet's SQL (database) data, then please click the below link:
							<div class="br"></div>
							&raquo; <a href="?p=backup&sql=true" class="nLink">Backup SQL</a> (<strong>File Name:</strong> giganet-backup-<?php echo date("n-d-y"); ?>.sql)
							<br />
							 &nbsp; &nbsp; <strong>Note:</strong> Backups made more than once on the same day will overwrite the oldest, as it uses the date in the file name.
							<div class="br"></div>
							<?php
						break;
						case 'editevent':
							userCheck();
							idCheck();
							changeTitle("Edit Event");
							if(isset($_POST["buttonSubmit"])){
								query("UPDATE calendar SET name = '".addslashes($_POST["name"])."', about = '".addslashes($_POST["about"])."', start_on = '".$_POST["startDate"]."', end_on = '".$_POST["endDate"]."', LOGON_USER = @LOGON_USER, event_type = 'event' WHERE id = @id");
								echo 'Event modified.';
								header("Refresh: 1; ?p=viewevent&id=".$_GET["id"]);
							}else{
								$data = sql("SELECT * FROM calendar WHERE id = @id");
								?>
								<div style="margin-left: 5%;">
									<?php br(); ?>
									<strong>Edit Event</strong>
									<?php multiBreak(4); ?>
									<form action="?p=editevent&id=<?php echo $_GET["id"]; ?>" method="post">
										<p>
											<label class="formLabel" for="name">Event Name:</label>
											<input type="text" class="form-control" value="<?php echo stripslashes($data["name"]); ?>" size="32" required="1" name="name" placeholder="Name of event" />
										</p>
										<p>
											<label class="formLabel" for="startDate">Start Date:</label>
											<input type="text" id="datepicker" value="<?php echo $data["start_on"]; ?>" style="width: 20%;" class="form-control" name="startDate" placeholder="Starts On" />
										</p>
										<p>
											<label class="formLabel" for="endDate">End Date:</label>
											<input type="text" id="datepicker2" value="<?php echo $data["end_on"]; ?>" style="width: 20%;" class="form-control" name="endDate" placeholder="Ends On" />
										</p>
										<p>
											<label class="formLabel" for="about">About:</label> (Optional)
											<div class="brl"></div>
											<textarea cols="40" rows="5" class="form-control" name="about" id="about" placeholder="Details about the event"><?php echo stripslashes($data["about"]); ?></textarea>
										</p>
										<p style="margin-left: 20%;">
											<button type="submit" class="formButton form-control" name="buttonSubmit" id="btnSubmit">Save</button>
										</p>
									</form>
								</div>
								<script src="scripts/nicEdit.js" type="text/javascript"></script>
							<?php
							$fullPanel = "{fullPanel: true}";
							?>
							<script type="text/javascript">
							new nicEditor(<?php echo $fullPanel; ?>).panelInstance('about');
							loadDatePicker('datepicker',"");
							loadDatePicker('datepicker2',"");
							</script>
								<?php
							}
						break;
						case 'deleteevent':
							userCheck();
							idCheck();
							query("DELETE FROM calendar WHERE id = @id");
							echo "Event deleted.";
							header("Refresh: 1; ?p=calendar&type=2");
						break;
						case 'deleteabsence':
							userCheck();
							idCheck();
							query("DELETE FROM calendar WHERE id = @id");
							echo "Absence deleted.";
							header("Refresh: 1; ?p=calendar&type=1");
						break;
						case 'viewabsences':
							userCheck();
							changeTitle("Absence List");
							$getAbsences = mysql_query("SELECT id,start_on,name,end_on FROM calendar WHERE event_type = 'absence' ORDER BY start_on ASC") OR SQLError();
							?>
							<h2>Absentee List</h2>
							<?php
							while($a = fetch($getAbsences)){
								echo ' <strong>'.(str_replace(" Out", "", $a["name"])).'</strong> 
								<div class="brl"></div>
								 &nbsp; &nbsp; &nbsp;'.date("M d",strtotime($a["start_on"])).' - '.date("M d",strtotime($a["end_on"])).'
								<div class="br"></div>
								<div class="brl"></div>';
							}
						break;
						case 'viewevents':
							userCheck();
							changeTitle("Event Viewer");
							$getEvents = mysql_query("SELECT id,start_on,name,end_on FROM calendar WHERE event_type = 'event' ORDER BY start_on ASC") OR SQLError();
							?>
							<h2>Event Viewer</h2>
							<?php
							while($e = fetch($getEvents)){
								echo '<strong><a href="?p=viewevent&id='.$e["id"].'">'.stripslashes($e["name"]).'</a></strong> 
								<div class="brl"></div>
								 &nbsp; &nbsp; &nbsp;'.date("M d",strtotime($a["start_on"])).' - '.date("M d",strtotime($a["end_on"]));
								 br();
								 br("light");
							}
						break;
						case 'viewannouncements':
							userCheck("spotts");
							changeTitle("View Announcements");
							$getAnnouncements = mysql_query("SELECT id,title FROM announcements ORDER BY title ASC") OR SQLError();
							?>
							<h2>Announcements</h2>
							<?php
							while($a = fetch($getAnnouncements)){
								echo '<div style="font-size: 104%; font-weight: bold;"><a href="?p=viewannouncement&id='.$a["id"].'">'.stripslashes($a["title"]).'</a></div>';
								br();
							}
						break;
						case 'compliance':
							changeTitle("Compliance");
						break;
						case 'frequentdocuments':
							changeTitle("Frequent Documents");
							?>
							<h2>Frequently Used Documents</h2>
							<div style="width: 45%;">
										&raquo; <a href="docs/Credit Ref GIGA Inc_updated 020615.doc" onclick="window.open(this.href);return false;" class="hrLink">GIGA Credit Reference Letter</a>
							</div><?php
								br();
							?>
							<div style="width: 45%;">
										&raquo; <a href="docs/GA ST-5.pdf" onclick="window.open(this.href);return false;" class="hrLink">GA Resale ST-5</a>
							</div><?php
								br();
							?>
							<div style="width: 45%;">
										&raquo; <a href="docs/W-9 FORM.pdf" onclick="window.open(this.href);return false;" class="hrLink">W-9 FORM</a>
							</div>
							<?php
						break;
						case 'humanresources':
							changeTitle("Human Resources");
							?>
								<h2>Human Resources</h2>
								<?php
								 if($browser == ""){
									 echo "Please view this page in Internet Explorer. Thank you.";
								 }else{
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/j hancock employee data change form 11_1_2015.pdf" onclick="window.open(this.href);return false;" class="hrLink">401k John Hancock Change Form</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/investmentform.pdf" onclick="window.open(this.href);return false;" class="hrLink">401k Participant Direction of Investment Form</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/401k PSP Beneficiary Form.pdf" onclick="window.open(this.href);return false;" class="hrLink">401k PSP Beneficiary Form</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/salary.pdf" onclick="window.open(this.href);return false;" class="hrLink">401k Salary Deferral Agreement</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/summary2014.pdf" onclick="window.open(this.href);return false;" class="hrLink">401k Summary Plan Description Nov 2014</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/pto.pdf" onclick="window.open(this.href);return false;" class="hrLink">Absence Report / PTO Request</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/2016 Cafeteria Plan Election Form.pdf" onclick="window.open(this.href);return false;" class="hrLink">2016 Cafeteria Plan Election Form</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
									&raquo; <a href="docs/Cafeteria Plan Election Form - FSA 2017.pdf" onclick="window.open(this.href);return false;" class="hrLink">Cafeteria Plan Election Form - FSA 2017</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
									&raquo; <a href="docs/Cafeteria Plan Election Form - Premiums 2017.pdf" onclick="window.open(this.href);return false;" class="hrLink">Cafeteria Plan Election Form - Premiums 2017</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
									&raquo; <a href="docs/Cafeteria Plan Full Flex Brochure 2017.pdf" onclick="window.open(this.href);return false;" class="hrLink">Cafeteria Plan Full Flex Brochure 2017</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
									&raquo; <a href="docs/Cafeteria Plan Summary 2017.pdf" onclick="window.open(this.href);return false;" class="hrLink">Cafeteria Plan Summary 2017</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
									&raquo; <a href="docs/Cafeteria Plan Summary 2014.pdf" onclick="window.open(this.href);return false;" class="hrLink">Cafeteria Plan Summary 2014</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/cafesummary 2016.pdf" onclick="window.open(this.href);return false;" class="hrLink">Cafe Summary 2016</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/cclubrenewal.pdf" onclick="window.open(this.href);return false;" class="hrLink">Christmas Club Enrollment Form</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/Direct Deposit Form.pdf" onclick="window.open(this.href);return false;" class="hrLink">Direct Deposit Form</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/employee-policy-manual.doc" onclick="window.open(this.href);return false;" class="hrLink">Employee Policy Manual</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
									&raquo; <a href="docs/employee_timesheets.xlsx" onclick="window.open(this.href);return false;" class="hrLink">Employee Time Sheets</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/G4.pdf" onclick="window.open(this.href);return false;" class="hrLink">G4</a>
								</div>
								<?php
									br();
								?>
								<div style="width: 45%;">
										&raquo; <a href="docs/W4.pdf" onclick="window.open(this.href);return false;" class="hrLink">W4</a>
								</div>
							<?php
								 }
						break;
						case 'qms':
							changeTitle("Quality Management System");
						break;
						case 'absencereport':
							userCheck("spotts");
							changeTitle("Absence Report");
							echo '<a href="?p=absencereport">&laquo; Back</a>
							<div class="brl"></div>
							<div style="font-weight: bold;">Note: This page will not auto-refresh.</div>';
							if(isset($_POST["submit"])){
								$employeeData = sql("SELECT employee_name FROM accounts WHERE LOGON_USER = '".$_POST["user"]."'");
								$emplode = explode(" ",$employeeData["employee_name"]);
								$employeeFirstName = $emplode[0];
								$employeeLastNameLetter = substr($emplode[1],0,1);
								$getAbsences = mysql_query("SELECT start_on,end_on,LOGON_USER,name,about FROM calendar WHERE event_type = 'absence' AND start_on >= '".date("Y-m-d",strtotime($_POST["startTime"]))."' AND end_on <= '".date("Y-m-d",strtotime($_POST["endTime"]))."' ORDER BY start_on ASC") OR SQLError();
								?>
								<style type="text/css">
								td, th {
									border: 1px solid #000;
									border-radius: 5%;
								}
								
								td {
									background: #fff;
								}
								
								td.titleCell {
									font-size: 14px;
									font-weight: bold;
									background: #d44;
									background: -webkit-linear-gradient(#a44, #d44);
									background: -moz-linear-gradient(#a44, #d44);
									background: liner-gradient(#a44, #d44);
									color: #eee;
								}
								
								th {
									font-size: 16px;
									font-weight: bold;
									background: #d44;
									background: -webkit-linear-gradient(#a44, #d44);
									background: -moz-linear-gradient(#a44, #d44);
									background: liner-gradient(#a44, #d44);
									color: #eee;
								}
								</style>
								<div class="br"></div>
								<div class="br"></div>
								<strong>Start Date:</strong> <?php echo date("F jS, Y",strtotime($_POST["startTime"])); ?>
								<br />
								<strong>End Date:</strong> <?php echo date("F jS, Y",strtotime($_POST["endTime"])); ?>
								<div class="br"></div>
								<div class="br"></div>
								<?php
									if($employeeFirstName == "David"){
										echo '<div><strong>Warning:</strong> As there are several employees with this first name, some results may have been filtered out. The form searches through the absence\'s "about" field for the last name, and if it does not find it, it skips that entry.</div>
										<div class="br"></div>';
									}
								?>
								<table cellspacing="1" cellpadding="6" style="width: 85%; background: #444; border: 1px solid #000; border-radius: 5px;">
									<tr>
										<th colspan="4">Absence Report: <?php echo $employeeFirstName. " " .$employeeLastNameLetter; ?></th>
									</tr>
									<tr>
										<td class="titleCell">&nbsp;</td>
										<td class="titleCell">Start Date</td>
										<td class="titleCell">End Date</td>
										<td class="titleCell">About</td>
									</tr><?php
										$i = 1;
										while($absences = fetch($getAbsences)){
											$about = ($absences["about"] == "") ? "--" : $absences["about"];
											$splitTitle = explode(" ",$absences["name"]);
											if($splitTitle[0] == $employeeFirstName){
												if($employeeFirstName == "David"){
													$nameSearch = strpos($absences["about"], $emplode[1]);
													if($nameSearch == false){
														continue;
													}
												}
												echo '<tr>';
												echo '	<td style="font-size: 14px; text-align: center;">'.$i.'</td>';
												echo '	<td style="font-size: 14px;">'.date("F jS, Y",strtotime($absences["start_on"])).'</td>';
												echo '	<td style="font-size: 14px;">'.date("F jS, Y",strtotime($absences["end_on"])).'</td>';
												echo '  <td style="font-size: 14px;">'.$about.'</td>';
												echo '</tr>';
												$i++;
											}
										}
									?>
								</table>
								<?php
							}else{
								$getUsers = mysql_query("SELECT LOGON_USER,employee_name FROM accounts ORDER BY employee_name ASC") OR SQLError();
								?>
								<h2>Absence Report</h2>
								<div class="br"></div>
								<div style="text-indent: 1em; font-size: 14px;">Through this form, you may generate a report of how often an employee has been absent during the time period provided.</div>
								<div class="br"></div>
								<form action="" method="post" name="absenceReportForm">
									<p><label for="user" class="formLabel">Select Employee:</label>
									<select name="user" id="userSelectBox" class="form-control">
										<option value="null">--------------------</option><?php
											while($users = fetch($getUsers)){
												echo '<option value="'.$users["LOGON_USER"].'">'.$users["employee_name"].'</option>';
											}
										?>
									</select></p>
									<div class="br"></div>
									<p><label for="startTime" class="formLabel">Start Time:</label>
									<input type="text" id="datePickerStart" style="width: 20%;" class="form-control" name="startTime" placeholder="Starting On..." /></p>
									<p><label for="endTime" class="formLabel">End Time:</label>
									<input type="text" id="datePickerEnd" style="width: 20%;" class="form-control" name="endTime" placeholder="Ending On..." /></p>
									<div class="br"></div>
									<p>
										<button type="submit" name="submit" id="btnSubmit" class="formButton form-control">Save</button>
									</p>
								</form>
								<script type="text/javascript">
								<!--
								 loadDatePicker("datePickerStart","");
								 loadDatePicker("datePickerEnd","");
								// -->
								</script>
								<?php
							}
						break;
						case 'adduser':
							userCheck("spotts");
							changeTitle("Adding User");
							$errors = array();
							$hasErrors = false;
							if(isset($_POST["submit"])){
								$userLogon = textFormat($_POST["logon_user"]);
								$userName = textFormat($_POST["name"]);
								$userEmail = textFormat($_POST["email"]);
								$userCheckID = sql("SELECT id FROM accounts WHERE LOGON_USER = '".$userLogon."'");
								$userCheckName = sql("SELECT id FROM accounts WHERE employee_name = '".$userName."'");
								$userCheckEmail = sql("SELECT id FROM accounts WHERE email = '".$userEmail."'");
								if(!empty($userCheckID["id"])){
									$errors[] = "A user already exists with this logon. Please clear the old user first, or use a different logon.";
									$hasErrors = true;
								}
								if(!empty($userCheckName["id"])){
									$errors[] = "A user already exists with this name. Please clear the old user first, or provide a different name.";
									$hasErrors = true;
								}
								if(!empty($userCheckEmail["email"])){
									$errors[] = "A user already exists with this e-mail address. Please clear the old user first, or provide a different e-mail address.";
									$hasErrors = true;
								}
								if($userName == ""){
									$errors[] = "<strong>Name</strong> field is empty.";
								}
								if($userEmail == ""){
									$errors[] = "<strong>E-Mail</strong> field is empty.";
								}
								if($userLogon == ""){
									$errors[] = "<strong>Logon User</strong> field is empty.";
								}
								if(!$hasErrors){
									query("INSERT INTO accounts(employee_name, email, LOGON_USER, birthday, hiredate, computer_name, phone, role_id, department_id, ip, online, esign)VALUES('".$userName."', '".$userEmail."', '".$userLogon."', '".$_POST["birthday"]."', '".$_POST["hiredate"]."', '".$_POST["computer_name"]."', '".$_POST["phone"]."', 0, 0, 'localhost', 0, '');");
									header("Location: ./");
								}
							}
								?>
								<h1 style="border-bottom: 1px solid #000;">Adding User</h1>
								<p style="margin-left: 2%;">You may use this form to add a new user to the database. Only admin users have this right.</p>
								<div id="errors"><?php
									if($hasErrors){
										echo '<h3>Errors:</h3>';
										foreach($errors as $err){
											echo '<div> &nbsp; &bull; '.$err.'</div>';
										}
									}
								?></div>
								<div style="height: 5px;"></div>
								<form action="" method="post">
									<table cellspacing="1" cellpadding="4" style="border: 1px solid #bbb; border-radius: 5px; background: linear-gradient(#eee, #bbb); color: #444; width: 85%; padding: 2px;">
										<tr>
											<th colspan="2">Employee Details</th>
										</tr>
										<tr>
											<td class="tabCell alignLeft" colspan="2"><strong> &nbsp; (*) Required</strong></td>
										</tr>
										<tr>
											<th>Field</th>
											<th>Value</th>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="name" class="formLabel">*Name:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" required="1" name="name" id="txtName" placeholder="Paul Shannon" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="email" class="formLabel">*E-Mail:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" required="1" name="email" id="txtEmail" placeholder="paul.shannon@gigainc.com" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="logon_user" class="formLabel">*Logon User:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" required="1" name="logon_user" id="txtLogonUser" placeholder="pshannon" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="birthday" class="formLabel">Birth Date:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" name="birthday" id="txtDatepickerBirthday" placeholder="1990-09-18" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="hiredate" class="formLabel">Hire Date:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" name="hiredate" id="txtDatepickerHireDate" placeholder="2014-07-01" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="computer_name" class="formLabel">Computer Name:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" name="computer_name" id="txtComputerName" placeholder="1291a" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="phone" class="formLabel">Work Phone:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" name="phone" id="txtPhone" placeholder="4782577398" />
											</td>
										</tr>
										<tr>
											<td class="tabCell" colspan="2" style="text-align: center;">
												<button type="submit" class="formButton form-control" name="submit" id="btnSubmit">
												<div class="glare" style="margin-top: 3%; margin-left: 1%; width: 98%; height: 6px;"></div>
												Submit
												</button>
											</td>
										</tr>
									</table>
								</form>
								<script type="text/javascript">
								<!--
								 loadDatePicker("txtDatepickerBirthday", "");
								 loadDatePicker("txtDatepickerHireDate", "");
								// -->
								</script>
								<?php
									break;
									case 'edituser':
										userCheck("spotts");
										if(!$_GET["user"]){
											errMsg("No user specified in URL.");
										}
										$data = sql("SELECT * FROM accounts WHERE LOGON_USER = '".$_GET["user"]."'");
										if($data["employee_name"] == ""){
											errMsg("This user does not exist in the database.");
										}
										changeTitle("Editing User: ".$data["employee_name"]);
										$errors = array();
										$hasErrors = false;
										if(isset($_POST["submit"])){
											$userLogon = textFormat($_POST["logon_user"]);
											$userName = textFormat($_POST["name"]);
											$userEmail = textFormat($_POST["email"]);
											$userCheckID = sql("SELECT id FROM accounts WHERE LOGON_USER = '".$userLogon."' AND LOGON_USER <> '".$data["LOGON_USER"]."'");
											$userCheckName = sql("SELECT id FROM accounts WHERE employee_name = '".$userName."' AND employee_name <> '".$data["employee_name"]."'");
											$userCheckEmail = sql("SELECT id FROM accounts WHERE email = '".$userEmail."' AND email <> '".$data["email"]."'");
											if(!empty($userCheckID["id"])){
												$errors[] = "A user already exists with this logon. Please clear the old user first, or use a different logon.";
												$hasErrors = true;
											}
											if(!empty($userCheckName["id"])){
												$errors[] = "A user already exists with this name. Please clear the old user first, or provide a different name.";
												$hasErrors = true;
											}
											if(!empty($userCheckEmail["email"])){
												$errors[] = "A user already exists with this e-mail address. Please clear the old user first, or provide a different e-mail address.";
												$hasErrors = true;
											}
											if($userName == ""){
												$errors[] = "<strong>Name</strong> field is empty.";
											}
											if($userEmail == ""){
												$errors[] = "<strong>E-Mail</strong> field is empty.";
											}
											if($userLogon == ""){
												$errors[] = "<strong>Logon User</strong> field is empty.";
											}
											if(!$hasErrors){
												query("UPDATE accounts SET employee_name = '".$_POST["name"]."', email = '".$_POST["email"]."', LOGON_USER = '".$_POST["logon_user"]."', birthday = '".$_POST["birthday"]."', hiredate = '".$_POST["hiredate"]."', computer_name = '".$_POST["computer_name"]."', phone = '".$_POST["phone"]."', role_id = 0, department_id = 0, ip = 'localhost', online = 0, esign = '' WHERE LOGON_USER = '".$_GET["user"]."'");
												header("Location: ?p=viewuser&user=".$_POST["logon_user"]);
											}
										}
								?>
								<h1 style="border-bottom: 1px solid #000;">Editing User: <?php echo $data["employee_name"]; ?></h1>
								<p style="margin-left: 2%;">You may use this form to edit a user in the database. Only admin users have this right.</p>
								<div id="errors"><?php
									if($hasErrors){
										echo '<h3>Errors:</h3>';
										foreach($errors as $err){
											echo '<div> &nbsp; &bull; '.$err.'</div>';
										}
									}
								?></div>
								<a href="?p=users">&laquo; Back to View Users</a>
								<div style="height: 5px;"></div>
								<form action="" method="post">
									<table cellspacing="1" cellpadding="4" style="border: 1px solid #bbb; border-radius: 5px; background: linear-gradient(#eee, #bbb); color: #444; width: 85%; padding: 2px;">
										<tr>
											<th colspan="2">Employee Details</th>
										</tr>
										<tr>
											<td class="tabCell alignLeft" colspan="2"><strong> &nbsp; (*) Required</strong></td>
										</tr>
										<tr>
											<th>Field</th>
											<th>Value</th>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="name" class="formLabel">*Name:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" value="<?php echo $data["employee_name"]; ?>" required="1" name="name" id="txtName" placeholder="Paul Shannon" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="email" class="formLabel">*E-Mail:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" value="<?php echo $data["email"]; ?>" required="1" name="email" id="txtEmail" placeholder="paul.shannon@gigainc.com" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="logon_user" class="formLabel">*Logon User:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" value="<?php echo $data["LOGON_USER"]; ?>" required="1" name="logon_user" id="txtLogonUser" placeholder="pshannon" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="birthday" class="formLabel">Birth Date:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" value="<?php echo $data["birthday"]; ?>" name="birthday" id="txtDatepickerBirthday" placeholder="1990-09-18" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="hiredate" class="formLabel">Hire Date:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" value="<?php echo $data["hiredate"]; ?>" name="hiredate" id="txtDatepickerHireDate" placeholder="2014-07-01" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="computer_name" class="formLabel">Computer Name:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" value="<?php echo $data["computer_name"]; ?>" name="computer_name" id="txtComputerName" placeholder="1291a" />
											</td>
										</tr>
										<tr>
											<td class="tabCell alignRight">
												<label for="phone" class="formLabel">Work Phone:</label>
											</td>
											<td class="tabCell">
												<input type="text" class="form-control increaseWidth" value="<?php echo $data["phone"]; ?>" name="phone" id="txtPhone" placeholder="4782577398" />
											</td>
										</tr>
										<tr>
											<td class="tabCell" colspan="2" style="text-align: center;">
												<button type="submit" class="formButton form-control" name="submit" id="btnSubmit">
												<div class="glare" style="margin-top: 3%; margin-left: 1%; width: 98%; height: 6px;"></div>
												Submit
												</button>
											</td>
										</tr>
									</table>
								</form>
								<script type="text/javascript">
								<!--
								 loadDatePicker("txtDatepickerBirthday", "");
								 loadDatePicker("txtDatepickerHireDate", "");
								// -->
								</script>
								<?php
									break;
									case 'deleteuser':
										userCheck("spotts");
										$sql = sql("SELECT employee_name FROM accounts WHERE LOGON_USER = '".$_GET["user"]."'") OR SQLError();
										if($sql["employee_name"] == ""){
											errMsg("This user does not exist.");
										}
										changeTitle("Deleting User: ".$sql["employee_name"]);
										query("DELETE FROM accounts WHERE LOGON_USER = '".$_GET["user"]."'");
										header("Location: ?p=users");
									break;
									case 'users':
										userCheck("spotts");
										changeTitle("View Users");
										$getUsers = mysql_query("SELECT LOGON_USER,employee_name FROM accounts WHERE LOGON_USER <> 'administrator' ORDER BY employee_name ASC") OR SQLError();
										$numUsers = mysql_num_rows($getUsers);
										?>
										<h1 style="border-bottom: 1px solid #000;">View Users</h1>
										<p style="margin-left: 2%;">All of the users in the database are listed here.</p>
										<h2 style="border-bottom: 1px solid #000;">Users (<?php echo $numUsers; ?>)</h2>
										<?php
										while($users = fetch($getUsers)){
											echo '<div style="padding: 4px; border-bottom: 1px solid #000;">
												&raquo; <a href="?p=edituser&user='.$users["LOGON_USER"].'"><img src="images/edit.png" class="iconMed" /></a> &nbsp; <a href="?p=deleteuser&user='.$users["LOGON_USER"].'" onclick="return confirm(\'Are you sure you wish to delete this user? This cannot be undone.\');"><img src="images/delete.png" class="iconMed" /></a> &nbsp; <a href="?p=viewuser&user='.$users["LOGON_USER"].'" style="font-size: 16px;">'.$users["employee_name"].'</a> ('.$users["LOGON_USER"].')
											</div>';
										}
									break;
									case 'viewuser':
										userCheck("spotts");
										if(!$_GET["user"]){
											errMsg("No user specified in URL.");
										}
										$data = sql("SELECT * FROM accounts WHERE LOGON_USER = '".$_GET["user"]."'");
										if($data["id"] == ""){
											errMsg("Specified user does not exist in database.");
										}
										changeTitle("Viewing User: ".$data["employee_name"]);
										?>
										<a href="?p=users">&laquo; Back to View Users</a>
										<div style="height: 5px;"></div>
										<h1 style="border-bottom: 1px solid #000;">Viewing User: <?php echo $data["employee_name"]; ?></h1> <a href="?p=edituser&user=<?php echo $_GET["user"]; ?>"><img src="images/edit.png" class="iconMed" /></a> &nbsp; &nbsp; <a href="?p=deleteuser&user=<?php echo $_GET["user"]; ?>" onclick="return confirm('Are you sure you wish to delete this user? This cannot be undone.');"><img src="images/delete.png" class="iconMed" /></a>
										<div style="height: 6px;"></div>
										<div><strong>Logon:</strong> <?php echo $data["LOGON_USER"]; ?></div>
										<div style="height: 6px;"></div>
										<div><strong>Birthday:</strong> <?php echo date("F jS", strtotime($data["birthday"])); ?></div>
										<div style="height: 6px;"></div>
										<div><strong>Hire Date:</strong> <?php echo date("F jS, Y", strtotime($data["hiredate"])); ?></div>
										<div style="height: 6px;"></div>
										<div><strong>Computer Name:</strong> <?php echo $data["computer_name"]; ?></div>
										<div style="height: 6px;"></div>
										<div><strong>Work Phone:</strong> <?php echo $data["phone"]; ?></div>
										<?php
									break;
					}
				?>
			</div><div style="min-width: 4%; max-width: 4%; display: inline-block; position: relative;"></div>
			<nav id="navRight" class="top">
				<div class="title navTitle">Links</div>
				<?php br(); ?>
				<div class="navContent">
					<?php multiBreak(4); ?>
					<img src="images/logo/gigacolor2.png" alt="[GIGA Inc.]" title="GIGA Inc." style="min-height: 30%; min-width: 75%; width: 78%; max-width: 80%; border-radius: 5px; position: absolute; <?php if($browser == 'firefox'){ ?> margin-left: -38%; width: 85%; <?php }else if($browser == 'chrome'){ ?> margin-left: -37%; <?php }else{ ?> margin-left: 10% <?php } ?>; cursor: pointer;" onclick="window.open('http://www.gigainc.com/');return false;" />
					<?php multiBreak(2); ?>
					<div style="margin-top: 94%; margin-left: 10%; min-width: 25%; max-width: 88%; min-height: 25%; max-height: 50%; position: absolute; vertical-align: middle; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; text-align: left !important; font-weight: bold; font-size: 164%;">
						<?php br("light"); ?>
						<a href="http://documents/enet1/netdfm/" class="nWin sideLink">Enlighten</a> <img src="images/ex-link.png" class="Licon"/>
						<?php br(); ?>
						<a href="https://wawf.eb.mil/" class="nWin sideLink">WAWF</a> <img src="images/ex-link.png" class="Licon" />
						<?php br(); ?>
						<a href="https://vsm.distribution.dla.mil/net/" class="nWin sideLink">VSM</a> <img src="images/ex-link.png" class="Licon" />
					</div>
						<?php br(); ?>
				</div>
						<?php br(); ?>
			</nav>
		</div>
		<div style="height: 15%; position: absolute; margin-top: 38%;">&nbsp;</div>
		<script type="text/javascript">
		if(document.location.href.indexOf('absencereport') == -1){
			setTimeout(function() {
					window.location.reload();
				}, 900000);
		}
		</script>
		<script type="text/javascript" src="scripts/external.js"></script>
	</body>
</html><?php
	ob_end_flush();
?>