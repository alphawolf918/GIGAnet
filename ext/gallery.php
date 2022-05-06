<?php
	ob_start();
	require '../lib/functions.php';
	require '../lib/sql.php';
	require '../lib/startup.php';
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");	
?><!doctype html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8;" />
		<meta http-equiv="pragma" content="no-cache" />
		<link rel="stylesheet" type="text/css" href="../styles/main.css" media="all" />
		<style type="text/css">
		<!--
			.imgObject {
				width: 80%;
				border-radius: 5px;
				margin-left: 20%;
				position: absolute;
			}
			
			hr {
				border: 1px solid #000;
				width: 55%;
				margin-left: 5%;
			}
			
			img.photo {
				height: 40%;
				width: 40%;
				border-radius: 5px;
			}
			
			img.bigPhoto {
				width: 81%;
			}
			
			a.tocLink {
				padding: 3%;
				font-size: 13px;
			}
			
			div.tocDiv {
				padding: 2%;
			}
			
			.br {
				height: 10px;
			}
		-->
		</style>
		<script type="text/javascript" src="../scripts/jquery.js"></script>
		<script type="text/javascript" src="../scripts/main.js"></script>
		<title>GIGAnet - Photo Gallery</title>
	</head>
	<body>
		<div class="greenButton" style="width: 5%; display: inline-block; font-size: 24px;"><a href="../index.php">Home</a></div>
		<h1 style="text-align: center;">Photo Gallery</h1>
		<div style="width: 16%; padding: 4px; border: 1px solid #000; border-radius: 5px; position: fixed; z-index: 1;">
			<div style="font-weight: strong; font-size: 14px; height: 27px; text-align: center; border-bottom: 1px solid #000;">Table of Contents</div>
			<div style="height: 10px;"></div>
			&bull; <a href="#top">Top of Page</a>
			<hr />
			<div style="text-indent: 4%; font-weight: bold; font-size: 14px;">Christmas Party</div>
			<hr />
			<div class="tocDiv">&bull; <a href="#christmasParty1" class="tocLink">Christmas Party (Pt. 1)</a></div>
			<div class="tocDiv">&bull; <a href="#christmasParty2" class="tocLink">Christmas Party (Pt. 2)</a></div>
			<div class="tocDiv">&bull; <a href="#beforeDinner" class="tocLink">Before Dinner (Pt. 3)</a></div>
			<div class="tocDiv">&bull; <a href="#twelveDays" class="tocLink">12 Days of Christmas (Pt. 4)</a></div>
			<div class="tocDiv">&bull; <a href="#santaClaus" class="tocLink">Santa Claus (Pt. 5)</a></div>
			<div class="tocDiv">&bull; <a href="#santaClaus2" class="tocLink">Santa Claus 2 (Pt. 6)</a></div>
			<div clas="tocDiv">&bull; <a href="#theEnd" class="tocLink">The End (Pt. 7)</a></div>
		</div>
		<div class="imgObject">
			<img src="../docs/christmasParty1.png" class="photo" id="christmasParty1" />
			<img src="../docs/christmasParty2.png" class="photo" id="christmasParty2" />
			<div class="br"></div>
			<img src="../docs/christmasParty3.png" class="photo" id="beforeDinner" />
			<img src="../docs/christmasParty4.png" class="photo" id="twelveDays" />
			<div class="br"></div>
			<img src="../docs/christmasParty5.png" class="photo" id="santaClaus" />
			<img src="../docs/christmasParty6.png" class="photo" id="santaClaus2" />
			<div class="br"></div>
			<img src="../docs/christmasParty7.png" class="photo bigPhoto" id="theEnd" />
		</div>
	</body>
</html><?php
	ob_end_flush();
?>