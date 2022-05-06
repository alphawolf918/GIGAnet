DROP TABLE `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(200) NOT NULL,
  `LOGON_USER` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `computer_name` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hiredate` varchar(40) NOT NULL DEFAULT '0000-',
  `birthday` varchar(40) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `esign` text NOT NULL,
  `last_active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

INSERT INTO `accounts` VALUES("1","Administrator","administrator","1","1","","","1979-03-18","1979-03-18","","","1","","2016-03-21 10:42:11");
INSERT INTO `accounts` VALUES("2","Paul Shannon","pshannon","0","0","1249A","paul.shannon@gigainc.com","2014-07-01","1990-09-18","4782577398","127.0.0.1","1","","2016-03-21 09:18:10");
INSERT INTO `accounts` VALUES("3","Kevin Enckler","kenckler","0","0","","kevin.enckler@gigainc.com","2009-01-01","0000-04-28","","127.0.0.1","0","","2016-03-18 12:26:37");
INSERT INTO `accounts` VALUES("4","Sue Potts","spotts","0","0","","sue.potts@gigainc.com","1983-09-01","0000-02-16","","127.0.0.1","0","","2016-03-18 12:34:06");
INSERT INTO `accounts` VALUES("5","Walt Miller","wmiller","0","0","","walt.miller@gigainc.com","1981-06-01","0000-02-07","","","0","","2016-03-18 12:53:21");
INSERT INTO `accounts` VALUES("6","Lynda Leverette","lleverette","0","0","1268a","lynda.leverette@gigainc.com","1998-04-20","0000-10-28","0","0","0","0","2016-03-18 15:18:07");
INSERT INTO `accounts` VALUES("7","Katie Ferguson","kferguson","0","0","1261a","katie.ferguson@gigainc.com","2011-06-27","0000-02-10","0","0","0","0","2016-03-18 15:18:25");
INSERT INTO `accounts` VALUES("8","David Miller","dmiller","0","0","1263a","david.miller@gigainc.com","2009-06-01","0000-05-08","0","0","0","0","2016-03-18 15:18:45");
INSERT INTO `accounts` VALUES("9","Matt Waters","matt","0","0","1270a","matthew.waters@gigainc.com","1998-09-08","0000-05-09","0","0","0","0","2016-03-18 15:19:07");
INSERT INTO `accounts` VALUES("11","Dave Johnston","dave","0","0","1273a","david.johnston@gigainc.com","2007-10-29","0000-10-14","0","0","0","0","2016-03-18 15:20:33");
INSERT INTO `accounts` VALUES("12","Karen Inman","karen","0","0","1274a","karen.inman@gigainc.com","1990-04-16","0000-11-21","0","0","0","0","2016-03-18 15:21:02");
INSERT INTO `accounts` VALUES("13","Tara Butcher","tbutcher","0","0","1275a","tara.butcher@gigainc.com","2009-08-10","0000-07-20","0","0","0","0","2016-03-18 15:21:18");
INSERT INTO `accounts` VALUES("14","Milton Simmons","msimmons","0","0","1280a","milton.simmons@gigainc.com","2013-06-17","0000-02-01","0","0","0","0","2016-03-18 15:21:48");
INSERT INTO `accounts` VALUES("15","Aaron Murphy","amurphy","0","0","1281a","aaron.murphy@gigainc.com","2014-08-27","0000-03-08","0","0","0","0","2016-03-18 15:23:42");
INSERT INTO `accounts` VALUES("16","Kenneth Emery","kemery","0","0","1283a","kenneth.emery@gigainc.com","2009-08-16","0000-03-28","0","0","0","0","2016-03-18 15:24:48");
INSERT INTO `accounts` VALUES("17","Jimmy Ball","jball","0","0","1284a","jimmy.ball@gigainc.com","2012-10-01","0000-11-24","0","0","0","0","2016-03-18 15:25:01");
INSERT INTO `accounts` VALUES("18","David Watson","david","0","0","1254a","david.watson@gigainc.com","1985-11-18","0000-01-05","0","0","0","0","2016-03-18 15:25:42");
INSERT INTO `accounts` VALUES("19","Veronica Stewart","veronica","0","0","0","veronica.stewart@gigainc.com","1992-02-24","0000-01-07","0","0","0","0","2016-03-18 15:27:19");
INSERT INTO `accounts` VALUES("20","Dan Morton","dan","0","0","1257a","daniel.morton@gigainc.com","1987-06-05","0000-07-23","0","0","0","0","2016-03-18 15:30:55");
INSERT INTO `accounts` VALUES("21","Sandi Mueller","sandi","0","0","1258a","sandi.mueller@gigainc.com","1996-09-11","0000-07-02","0","0","0","0","2016-03-18 15:32:30");
INSERT INTO `accounts` VALUES("22","Chloe Brantley","chloe","0","0","1260a","chloe.brantley@gigainc.com","2014-04-22","0000-04-17","0","0","0","0","2016-03-18 15:32:46");
INSERT INTO `accounts` VALUES("23","Lisa Calloway","lisa","0","0","0","lisa.calloway@gigainc.com","2014-06-14","0000-11-06","0","0","0","0","2016-03-18 15:32:55");
INSERT INTO `accounts` VALUES("24","Ken Johnson","kjohnson","0","0","0","ken.johnston@gigainc.com","2015-08-24","0000-02-05","0","0","0","0","2016-03-18 15:33:15");
INSERT INTO `accounts` VALUES("25","Jena Hathcock","jhathcock","0","0","0","jena.hathcock@gigainc.com","2013-10-14","0000-05-02","0","0","0","0","2016-03-18 15:33:26");
INSERT INTO `accounts` VALUES("26","Jeff Donavant","jeff","0","0","1130a","jeff.donavant@gigainc.com","1998-10-19","0000-10-18","0","0","0","","2016-03-18 15:33:45");
INSERT INTO `accounts` VALUES("27","Stephen Persson","spersson","0","0","","stephen.persson@gigainc.com","2016-06-16","","","","0","","2016-06-16 08:19:13");
INSERT INTO `accounts` VALUES("28","Jennifer Rideout","jrideout","0","0","","jennifer.rideout@gigainc.com","2016-06-20","","","","0","","2016-06-16 08:19:54");
INSERT INTO `accounts` VALUES("29","Ben Watson","bwatson","0","0","","ben.watson@gigainc.com","2013-10-16","0000-10-20","","","0","","2016-06-20 08:39:23");
INSERT INTO `accounts` VALUES("30","Sharon Jones","sjones","0","0","","sharon.jones@gigainc.com","0000-","","","","0","","2016-09-15 11:00:37");



DROP TABLE `announcements`;

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `about` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `announcements` VALUES("16","FREE Flu Shots - 10/21","9:30 Large Conference Room<br>","2016-10-13 12:21:43","<br>");



DROP TABLE `calendar`;

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `start_on` date NOT NULL,
  `end_on` date NOT NULL,
  `LOGON_USER` varchar(50) NOT NULL,
  `event_type` enum('event','absence') NOT NULL DEFAULT 'event',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=638 DEFAULT CHARSET=utf8;

INSERT INTO `calendar` VALUES("29","401k & Christmas Club Enrollments Due","Enrollments due<br>","2015-10-26","2015-10-26","kferguson","event");
INSERT INTO `calendar` VALUES("31","David W & Sandi","at Robins AFB <br>","2015-10-20","2015-10-20","spotts","event");
INSERT INTO `calendar` VALUES("38","Thanksgiving Holiday","Business Closed<br>","2015-11-26","2015-11-28","spotts","event");
INSERT INTO `calendar` VALUES("62","Walt Out ","at Trade Show<br>","2015-11-03","2015-11-05","spotts","event");
INSERT INTO `calendar` VALUES("71","Katie at DCMA Seminar","2:00 pm - Until...","2015-10-29","2015-10-29","kferguson","event");
INSERT INTO `calendar` VALUES("95","2016 Trade Show-Border Patrol","El Paso<br>","2016-04-20","2016-04-22","spotts","event");
INSERT INTO `calendar` VALUES("96","2016 Trade Show-NGAGA","Stone Mountain<br>","2016-06-03","2016-06-05","kferguson","event");
INSERT INTO `calendar` VALUES("97","2016 Trade Show-NGAUS","Baltimore<br>","2016-09-09","2016-09-15","kferguson","event");
INSERT INTO `calendar` VALUES("98","2016 Trade Show-Ausa","Washington DC<br>","2016-10-03","2016-10-06","spotts","event");
INSERT INTO `calendar` VALUES("105","Kevin at P21 SEUG","<br>","2015-11-19","2015-11-19","spotts","event");
INSERT INTO `calendar` VALUES("109","Mandatory Insurance Meeting","9:30am Large Meeting Room<br>","2015-11-23","2015-11-23","spotts","event");
INSERT INTO `calendar` VALUES("166","Presidents\' Day","Office Closed<br>","2016-02-15","2016-02-15","spotts","event");
INSERT INTO `calendar` VALUES("167","Memorial Day","Office Closed<br>","2016-05-30","2016-05-30","spotts","event");
INSERT INTO `calendar` VALUES("206","Chloe Out"," <br>","2016-06-13","2016-06-18","spotts","absence");
INSERT INTO `calendar` VALUES("207","Sue Out"," <br>","2016-07-11","2016-07-16","spotts","absence");
INSERT INTO `calendar` VALUES("228","David Out"," (Miller)","2016-07-11","2016-07-16","spotts","absence");
INSERT INTO `calendar` VALUES("258","Lisa Out"," <br>","2016-06-06","2016-06-11","tbutcher","absence");
INSERT INTO `calendar` VALUES("269","Tara Out"," <br>","2016-06-13","2016-06-18","spotts","absence");
INSERT INTO `calendar` VALUES("270","David Out"," 8-10 (Watson)","2016-09-08","2016-09-08","spotts","absence");
INSERT INTO `calendar` VALUES("302","Karen Out"," <br>","2016-07-01","2016-07-01","spotts","absence");
INSERT INTO `calendar` VALUES("304","Karen Out"," <br>","2016-11-23","2016-11-23","spotts","absence");
INSERT INTO `calendar` VALUES("318","Memorial Day Holiday","is May 30th-Office will be Closed<br>","2016-05-23","2016-05-30","spotts","event");
INSERT INTO `calendar` VALUES("319","Veronica Out"," 3-4:30","2016-07-06","2016-07-06","spotts","absence");
INSERT INTO `calendar` VALUES("320","David Out"," (Watson)","2016-06-20","2016-06-25","spotts","absence");
INSERT INTO `calendar` VALUES("330","Dan Out"," <br>","2016-07-05","2016-07-09","spotts","absence");
INSERT INTO `calendar` VALUES("335","Dan Out"," 8-10","2016-10-12","2016-10-12","spotts","absence");
INSERT INTO `calendar` VALUES("366","May the 4th Be With You!","Star Wars parody joke.<br>","2016-05-04","2016-05-04","pshannon","event");
INSERT INTO `calendar` VALUES("376","Chloe Out"," 4:30-5","2016-06-09","2016-06-09","spotts","absence");
INSERT INTO `calendar` VALUES("377","Sue Out"," 2:30-5","2016-06-01","2016-06-01","spotts","absence");
INSERT INTO `calendar` VALUES("378","Sue Out"," <br>","2016-06-02","2016-06-02","spotts","absence");
INSERT INTO `calendar` VALUES("385","Jeff Out"," <br>","2016-06-06","2016-06-06","spotts","absence");
INSERT INTO `calendar` VALUES("391","Tara Out"," 8:30-9:30","2016-06-08","2016-06-08","spotts","absence");
INSERT INTO `calendar` VALUES("398","Jeff Out"," <br>","2016-06-21","2016-06-25","spotts","absence");
INSERT INTO `calendar` VALUES("399","Lynda Out"," 3:30-4:30","2016-06-23","2016-06-23","spotts","absence");
INSERT INTO `calendar` VALUES("400","Lynda Out","&nbsp;7:30-11:45","2016-07-21","2016-07-21","spotts","absence");
INSERT INTO `calendar` VALUES("401","Chloe Out"," 3:30-5","2016-06-08","2016-06-08","spotts","absence");
INSERT INTO `calendar` VALUES("402","Katie Out"," 7:30-8","2016-06-02","2016-06-02","spotts","absence");
INSERT INTO `calendar` VALUES("403","DLA Land & Maritime Supplier Conf & Expo","<br>","2016-08-29","2016-09-02","spotts","event");
INSERT INTO `calendar` VALUES("404","Karen Out"," at Trade Show with Chloe and David M","2016-06-03","2016-06-03","spotts","absence");
INSERT INTO `calendar` VALUES("405","Chloe Out"," at Trade Show with Karen and David M","2016-06-03","2016-06-03","spotts","absence");
INSERT INTO `calendar` VALUES("406","David Out"," at Trade Show with Karen and Chloe","2016-06-03","2016-06-03","spotts","absence");
INSERT INTO `calendar` VALUES("407","Dave Out"," 2-5","2016-06-03","2016-06-03","spotts","absence");
INSERT INTO `calendar` VALUES("408","Aaron Out"," 8-10","2016-06-03","2016-06-03","spotts","absence");
INSERT INTO `calendar` VALUES("409","Chloe Out"," 1:30-5","2016-06-06","2016-06-06","spotts","absence");
INSERT INTO `calendar` VALUES("410","Jeff Out"," <br>","2016-06-16","2016-06-16","spotts","absence");
INSERT INTO `calendar` VALUES("411","Kenneth Out"," <br>","2016-06-03","2016-06-03","spotts","absence");
INSERT INTO `calendar` VALUES("412","Dan Out"," 2-5","2018-05-24","2018-05-24","spotts","absence");
INSERT INTO `calendar` VALUES("413","Sue Out"," 11:15-2:00","2016-06-08","2016-06-08","spotts","absence");
INSERT INTO `calendar` VALUES("414","Sue Out"," 8-12","2016-06-28","2016-06-28","spotts","absence");
INSERT INTO `calendar` VALUES("415","Milton Out"," 12-1:30","2016-06-06","2016-06-06","spotts","absence");
INSERT INTO `calendar` VALUES("416","Sandi Out"," 10-5","2016-06-08","2016-06-08","spotts","absence");
INSERT INTO `calendar` VALUES("417","Kevin Out"," 4:45-5:30","2016-06-08","2016-06-08","spotts","absence");
INSERT INTO `calendar` VALUES("418","Matt Out"," 4-5","2016-06-08","2016-06-08","spotts","absence");
INSERT INTO `calendar` VALUES("419","David Out"," 4:30-5 (Miller)","2016-06-08","2016-06-08","spotts","absence");
INSERT INTO `calendar` VALUES("420","Aaron Out"," 1:30-5","2016-06-10","2016-06-10","spotts","absence");
INSERT INTO `calendar` VALUES("421","David Out"," (Miller)","2016-06-17","2016-06-17","spotts","absence");
INSERT INTO `calendar` VALUES("422","Kevin Out"," <br>","2016-07-05","2016-07-09","spotts","absence");
INSERT INTO `calendar` VALUES("423","Veronica Out"," <br>","2016-06-27","2016-06-27","spotts","absence");
INSERT INTO `calendar` VALUES("424","Katie Out"," <br>","2016-07-18","2016-07-23","spotts","absence");
INSERT INTO `calendar` VALUES("425","Jimmy Out"," 1-3","2016-06-16","2016-06-16","spotts","absence");
INSERT INTO `calendar` VALUES("426","Katie Out"," 3:30-4:30","2016-06-17","2016-06-17","spotts","absence");
INSERT INTO `calendar` VALUES("427","Welcome Back","Stephen<br>","2016-06-17","2016-06-25","spotts","event");
INSERT INTO `calendar` VALUES("428","Welcome","Jennifer Rideout<br>","2016-06-20","2016-06-22","spotts","event");
INSERT INTO `calendar` VALUES("429","Ben Out"," <br>","2016-06-20","2016-06-25","spotts","absence");
INSERT INTO `calendar` VALUES("430","Tara Out"," <br>","2016-10-28","2016-10-28","spotts","absence");
INSERT INTO `calendar` VALUES("431","Dan Out"," 4-5","2016-06-20","2016-06-20","spotts","absence");
INSERT INTO `calendar` VALUES("432","Tara Out"," 8:30-11","2016-06-22","2016-06-22","spotts","absence");
INSERT INTO `calendar` VALUES("433","Matt Out"," 8:30-10:30","2016-06-22","2016-06-22","spotts","absence");
INSERT INTO `calendar` VALUES("434","Ken Out"," 7:30-8:30","2016-06-23","2016-06-23","spotts","absence");
INSERT INTO `calendar` VALUES("435","Dan Out"," 8-12","2016-06-23","2016-06-23","spotts","absence");
INSERT INTO `calendar` VALUES("436","Chloe Out"," 4-5","2016-07-28","2016-07-28","spotts","absence");
INSERT INTO `calendar` VALUES("437","Stephen Out"," <br>","2016-06-30","2016-06-30","spotts","absence");
INSERT INTO `calendar` VALUES("438","Stephen Out"," <br>","2016-07-08","2016-07-08","spotts","absence");
INSERT INTO `calendar` VALUES("439","GIGA Luncheon","with Guest Speaker-11:45<br>","2016-06-24","2016-06-24","spotts","event");
INSERT INTO `calendar` VALUES("441","Stephen Out"," 3-5","2016-07-01","2016-07-01","spotts","absence");
INSERT INTO `calendar` VALUES("442","Chloe Out"," 3:30-5","2016-06-29","2016-06-29","spotts","absence");
INSERT INTO `calendar` VALUES("443","Veronica Out"," 7:30-10:15<br>","2016-06-29","2016-06-29","spotts","absence");
INSERT INTO `calendar` VALUES("444","Kevin Out"," 3:30-5:30","2016-07-01","2016-07-01","spotts","absence");
INSERT INTO `calendar` VALUES("445","Chloe Out"," 3:30-5","2016-09-09","2016-09-09","spotts","absence");
INSERT INTO `calendar` VALUES("446","Jimmy Out"," 8-11","2016-06-24","2016-06-24","spotts","absence");
INSERT INTO `calendar` VALUES("447","Matt Out"," 3-5","2016-07-01","2016-07-01","spotts","absence");
INSERT INTO `calendar` VALUES("448","Jennifer Out"," 4:30-5","2016-07-05","2016-07-05","spotts","absence");
INSERT INTO `calendar` VALUES("450","Chloe Out"," 3:30-5","2016-07-06","2016-07-06","spotts","absence");
INSERT INTO `calendar` VALUES("452","Lynda Out"," 11:30 - 1:25","2016-07-06","2016-07-06","spotts","absence");
INSERT INTO `calendar` VALUES("453","Lynda Out"," 10:20-12:30","2016-08-08","2016-08-08","spotts","absence");
INSERT INTO `calendar` VALUES("454","Lynda Out"," <br>","2016-08-09","2016-09-24","spotts","absence");
INSERT INTO `calendar` VALUES("455","Veronica Out"," 10-1","2016-07-13","2016-07-13","spotts","absence");
INSERT INTO `calendar` VALUES("456","Veronica Out"," 3:30-4:30","2016-08-10","2016-08-10","spotts","absence");
INSERT INTO `calendar` VALUES("457","Lynda Out"," 8-10","2016-07-28","2016-07-28","spotts","absence");
INSERT INTO `calendar` VALUES("458","Veronica Out"," 11-1:30","2016-07-21","2016-07-21","spotts","absence");
INSERT INTO `calendar` VALUES("459","Veronica Out"," 11-1:30","2016-08-18","2016-08-18","spotts","absence");
INSERT INTO `calendar` VALUES("460","Jimmy Out"," 10-1","2016-07-07","2016-07-07","spotts","absence");
INSERT INTO `calendar` VALUES("461","Tara Out"," Out at 2:45 p.m.","2016-07-18","2016-07-19","tbutcher","absence");
INSERT INTO `calendar` VALUES("462","Aaron Out"," <br>","2016-07-12","2016-07-12","spotts","absence");
INSERT INTO `calendar` VALUES("463","Dave Out"," <br>","2016-07-29","2016-07-29","spotts","absence");
INSERT INTO `calendar` VALUES("464","Dave Out"," <br>","2016-08-01","2016-08-03","spotts","absence");
INSERT INTO `calendar` VALUES("465","Dan Out"," <br>","2016-07-14","2016-07-14","spotts","absence");
INSERT INTO `calendar` VALUES("466","Sandi Out"," 8-9:30","2016-07-18","2016-07-18","spotts","absence");
INSERT INTO `calendar` VALUES("468","Karen Out"," <br>","2016-08-22","2016-08-27","spotts","absence");
INSERT INTO `calendar` VALUES("469","Sandi Out"," 11-1:30","2016-07-20","2016-07-20","spotts","absence");
INSERT INTO `calendar` VALUES("470","Stephen Out"," <br>","2016-08-04","2016-08-06","spotts","absence");
INSERT INTO `calendar` VALUES("471","Karen Out"," 3:30-5","2016-07-22","2016-07-22","spotts","absence");
INSERT INTO `calendar` VALUES("472","Kevin Out"," 2:30-5:30","2016-07-22","2016-07-22","spotts","absence");
INSERT INTO `calendar` VALUES("473","Matt Out"," 8-10","2016-07-26","2016-07-26","spotts","absence");
INSERT INTO `calendar` VALUES("474","Karen Out"," 8-10","2016-07-26","2016-07-26","spotts","absence");
INSERT INTO `calendar` VALUES("475","Chloe Out","&nbsp;8-8:30, 3-5","2016-07-29","2016-07-29","spotts","absence");
INSERT INTO `calendar` VALUES("476","David Out"," 10:30-5 (Watson)","2016-07-26","2016-07-26","spotts","absence");
INSERT INTO `calendar` VALUES("477","Upcoming Closed Holiday-Labor Day","Sept 5th<br>","2016-08-15","2016-09-03","spotts","event");
INSERT INTO `calendar` VALUES("478","Katie Out"," 3:30-4:30","2016-08-05","2016-08-05","spotts","absence");
INSERT INTO `calendar` VALUES("479","Karen Out"," 8-9","2016-07-28","2016-07-28","spotts","absence");
INSERT INTO `calendar` VALUES("480","Aaron Out"," 3-5","2016-07-28","2016-07-28","spotts","absence");
INSERT INTO `calendar` VALUES("481","Dave Out"," <br>","2016-08-03","2016-08-03","spotts","absence");
INSERT INTO `calendar` VALUES("482","Sue Out"," <br>","2016-08-02","2016-08-02","spotts","absence");
INSERT INTO `calendar` VALUES("483","David Out"," (Watson)","2016-08-12","2016-08-12","spotts","absence");
INSERT INTO `calendar` VALUES("484","David Out"," (Watson)","2016-08-15","2016-08-15","spotts","absence");
INSERT INTO `calendar` VALUES("485","Milton Out","&nbsp;11-1","2016-08-01","2016-08-01","spotts","absence");
INSERT INTO `calendar` VALUES("486","David Out"," 3:15-5 (Miller)","2016-08-02","2016-08-02","spotts","absence");
INSERT INTO `calendar` VALUES("487","Dan Out"," 1-5","2016-08-01","2016-08-01","spotts","absence");
INSERT INTO `calendar` VALUES("489","Karen Out"," 8-9","2016-08-04","2016-08-04","spotts","absence");
INSERT INTO `calendar` VALUES("490","Tara Out","&nbsp;12:30-5:30","2016-08-05","2016-08-05","spotts","absence");
INSERT INTO `calendar` VALUES("491","Dan Out","&nbsp;at NIB Ability One Seminar","2016-08-24","2016-08-27","spotts","absence");
INSERT INTO `calendar` VALUES("492","Sandi Out"," 1:15-3:30","2016-08-08","2016-08-08","spotts","absence");
INSERT INTO `calendar` VALUES("493","Katie Out"," 7:30-8, 4-4:30","2016-08-08","2016-08-08","spotts","absence");
INSERT INTO `calendar` VALUES("494","Jennifer Out"," 4:30-5","2016-08-12","2016-08-12","spotts","absence");
INSERT INTO `calendar` VALUES("495","Dave Out"," 10-12","2016-08-09","2016-08-09","spotts","absence");
INSERT INTO `calendar` VALUES("496","Karen Out"," 3:30-5","2016-08-09","2016-08-09","spotts","absence");
INSERT INTO `calendar` VALUES("497","Karen Out"," 8-9","2016-08-11","2016-08-11","spotts","absence");
INSERT INTO `calendar` VALUES("498","Milton Out"," 11-5","2016-08-09","2016-08-09","spotts","absence");
INSERT INTO `calendar` VALUES("499","David Out"," 3:30-5 (Miller)","2016-08-12","2016-08-12","spotts","absence");
INSERT INTO `calendar` VALUES("500","Milton Out"," <br>","2016-08-10","2016-08-10","spotts","absence");
INSERT INTO `calendar` VALUES("501","Milton Out"," 8-10","2016-08-11","2016-08-11","spotts","absence");
INSERT INTO `calendar` VALUES("502","Chloe Out"," 10:30-12:30","2016-08-11","2016-08-11","spotts","absence");
INSERT INTO `calendar` VALUES("503","Dan Out"," 3-5","2016-08-12","2016-08-12","spotts","absence");
INSERT INTO `calendar` VALUES("504","Dan Out"," 4:30-5","2016-08-17","2016-08-17","spotts","absence");
INSERT INTO `calendar` VALUES("505","Dan Out"," 4-5","2016-08-19","2016-08-19","spotts","absence");
INSERT INTO `calendar` VALUES("506","Dan Out"," 4-5","2016-08-23","2016-08-23","spotts","absence");
INSERT INTO `calendar` VALUES("507","Ken Out"," 7:30-10:30","2016-08-16","2016-08-16","spotts","absence");
INSERT INTO `calendar` VALUES("508","Veronica Out"," 9:15-12:30","2016-08-22","2016-08-22","spotts","absence");
INSERT INTO `calendar` VALUES("509","Aaron Out"," <br>","2016-08-10","2016-08-10","spotts","absence");
INSERT INTO `calendar` VALUES("510","Matt Out"," 2-5:30","2016-08-17","2016-08-17","spotts","absence");
INSERT INTO `calendar` VALUES("511","Kevin Out"," <br>","2016-08-19","2016-08-19","spotts","absence");
INSERT INTO `calendar` VALUES("512","Karen Out","&nbsp;4-5","2016-08-18","2016-08-18","spotts","absence");
INSERT INTO `calendar` VALUES("513","Karen Out"," <br>","2016-08-19","2016-08-19","spotts","absence");
INSERT INTO `calendar` VALUES("514","Dan Out"," 3:30-5","2016-08-22","2016-08-22","spotts","absence");
INSERT INTO `calendar` VALUES("515","Tara Out"," 1:30-5:30","2016-08-26","2016-08-26","spotts","absence");
INSERT INTO `calendar` VALUES("516","David Out"," (Watson)-at DLA Conf","2016-08-29","2016-09-03","spotts","absence");
INSERT INTO `calendar` VALUES("517","Katie Out"," 10-4:30-at DLA Conf","2016-08-29","2016-08-29","spotts","absence");
INSERT INTO `calendar` VALUES("518","Katie Out"," at DLA Conf","2016-08-30","2016-09-02","spotts","absence");
INSERT INTO `calendar` VALUES("519","David Out"," (Watson)","2016-11-23","2016-11-23","spotts","absence");
INSERT INTO `calendar` VALUES("520","David Out"," (Watson)","2016-11-28","2016-11-28","spotts","absence");
INSERT INTO `calendar` VALUES("521","Katie Out"," 2:30-4:30","2016-08-26","2016-08-26","spotts","absence");
INSERT INTO `calendar` VALUES("522","Jimmy Out"," <br>","2016-09-02","2016-09-02","spotts","absence");
INSERT INTO `calendar` VALUES("523","Jennifer Out"," 8-9:45","2016-08-30","2016-08-30","spotts","absence");
INSERT INTO `calendar` VALUES("524","Sue Out","&nbsp;10:30-5","2016-09-01","2016-09-01","spotts","absence");
INSERT INTO `calendar` VALUES("525","Chloe Out"," 3:30-5","2016-09-07","2016-09-07","spotts","absence");
INSERT INTO `calendar` VALUES("526","Sandi Out"," <br>","2016-12-05","2016-12-10","spotts","absence");
INSERT INTO `calendar` VALUES("527","Chloe Out"," 3:30-5","2016-09-02","2016-09-02","spotts","absence");
INSERT INTO `calendar` VALUES("528","David Out","&nbsp;10-5 (Miller)","2016-09-02","2016-09-02","spotts","absence");
INSERT INTO `calendar` VALUES("529","Tara Out"," 8:30-1","2016-09-02","2016-09-02","spotts","absence");
INSERT INTO `calendar` VALUES("530","Milton Out"," 4-5","2016-09-02","2016-09-02","spotts","absence");
INSERT INTO `calendar` VALUES("531","Aaron Out"," 12-5","2016-09-06","2016-09-06","spotts","absence");
INSERT INTO `calendar` VALUES("532","David Out"," 11-5 (Watson)","2016-09-07","2016-09-07","spotts","absence");
INSERT INTO `calendar` VALUES("533","David Out"," (Miller)","2016-09-12","2016-09-17","spotts","absence");
INSERT INTO `calendar` VALUES("534","Katie Out"," <br>","2016-10-07","2016-10-07","spotts","absence");
INSERT INTO `calendar` VALUES("535","Katie Out"," <br>","2016-10-10","2016-10-10","spotts","absence");
INSERT INTO `calendar` VALUES("536","David Out"," (Miller)","2016-11-07","2016-11-12","spotts","absence");
INSERT INTO `calendar` VALUES("537","David Out"," (Miller)","2017-01-09","2017-01-14","spotts","absence");
INSERT INTO `calendar` VALUES("538","Kenneth Out"," <br>","2016-09-09","2016-09-09","spotts","absence");
INSERT INTO `calendar` VALUES("539","Jennifer Out","&nbsp;","2016-09-22","2016-09-22","spotts","absence");
INSERT INTO `calendar` VALUES("540","Jennifer Out"," 8-9:15","2016-09-26","2016-09-26","spotts","absence");
INSERT INTO `calendar` VALUES("541","David Out"," 8-10 (Watson)","2017-03-09","2017-03-09","spotts","absence");
INSERT INTO `calendar` VALUES("542","Chloe Out"," 4-5","2016-09-12","2016-09-12","spotts","absence");
INSERT INTO `calendar` VALUES("543","Matt Out"," 8-11","2016-09-14","2016-09-14","spotts","absence");
INSERT INTO `calendar` VALUES("544","Sue Out"," <br>","2016-10-10","2016-10-13","spotts","absence");
INSERT INTO `calendar` VALUES("546","Dan Out"," 2-5","2016-09-16","2016-09-16","spotts","absence");
INSERT INTO `calendar` VALUES("547","Veronica Out"," 7:30-10","2016-09-21","2016-09-21","spotts","absence");
INSERT INTO `calendar` VALUES("548","Jeff Out"," 1:30-5","2016-09-21","2016-09-21","spotts","absence");
INSERT INTO `calendar` VALUES("549","Kevin Out"," at SEUG meeting<br>","2016-09-15","2016-09-16","spotts","absence");
INSERT INTO `calendar` VALUES("550","Jimmy Out"," 12-5","2016-09-23","2016-09-23","spotts","absence");
INSERT INTO `calendar` VALUES("551","Jeff Out"," 12:30-5","2016-09-20","2016-09-20","spotts","absence");
INSERT INTO `calendar` VALUES("552","Chloe Out"," 12:30-5","2016-09-16","2016-09-16","spotts","absence");
INSERT INTO `calendar` VALUES("553","Ken Out"," 7:30-9","2016-09-22","2016-09-22","spotts","absence");
INSERT INTO `calendar` VALUES("554","Sandi Out"," 8-9:30","2016-09-22","2016-09-22","spotts","absence");
INSERT INTO `calendar` VALUES("555","David Out"," (Miller)","2016-10-03","2016-10-08","spotts","absence");
INSERT INTO `calendar` VALUES("556","Tara Out","&nbsp;","2016-09-19","2016-09-19","spotts","absence");
INSERT INTO `calendar` VALUES("557","Dave Out"," <br>","2016-09-23","2016-09-23","spotts","absence");
INSERT INTO `calendar` VALUES("558","Chloe Out"," <br>","2016-09-30","2016-09-30","spotts","absence");
INSERT INTO `calendar` VALUES("559","Matt Out"," 9:45-12:45","2016-09-20","2016-09-20","spotts","absence");
INSERT INTO `calendar` VALUES("560","Dan Out"," 3-5","2016-09-20","2016-09-20","spotts","absence");
INSERT INTO `calendar` VALUES("561","Kevin Out"," at P21 Connect","2016-09-26","2016-09-29","spotts","absence");
INSERT INTO `calendar` VALUES("562","Aaron Out"," 8-9","2016-09-21","2016-09-21","spotts","absence");
INSERT INTO `calendar` VALUES("563","Katie Out"," at JCB","2016-09-22","2016-09-22","spotts","absence");
INSERT INTO `calendar` VALUES("564","David Out"," at JCB","2016-09-22","2016-09-22","spotts","absence");
INSERT INTO `calendar` VALUES("565","Kenneth Out","&nbsp;1-5","2016-09-22","2016-09-22","spotts","absence");
INSERT INTO `calendar` VALUES("566","Sharon Out"," <br>","2016-09-29","2016-10-01","spotts","absence");
INSERT INTO `calendar` VALUES("567","Ken Out"," 9-10:30","2016-09-29","2016-09-29","spotts","absence");
INSERT INTO `calendar` VALUES("568","Kevin Out"," <br>","2016-09-23","2016-09-23","spotts","absence");
INSERT INTO `calendar` VALUES("569","Chloe Out"," <br>","2016-09-28","2016-09-28","spotts","absence");
INSERT INTO `calendar` VALUES("570","Jennifer Out"," <br>","2016-09-27","2016-09-27","spotts","absence");
INSERT INTO `calendar` VALUES("571","Tara Out"," 4-5:30","2016-09-26","2016-09-26","spotts","absence");
INSERT INTO `calendar` VALUES("572","Tara Out"," 10:30-1","2016-09-27","2016-09-27","spotts","absence");
INSERT INTO `calendar` VALUES("573","Jimmy Out"," <br>","2016-10-04","2016-10-04","spotts","absence");
INSERT INTO `calendar` VALUES("574","Jennifer Out"," 4-5","2016-10-04","2016-10-04","spotts","absence");
INSERT INTO `calendar` VALUES("575","Jennifer Out"," 8-9:45","2016-10-06","2016-10-06","spotts","absence");
INSERT INTO `calendar` VALUES("576","Jeff Out","&nbsp;at Ausa Tradeshow","2016-10-03","2016-10-06","spotts","absence");
INSERT INTO `calendar` VALUES("577","David Out"," (Watson) - at Ausa","2016-10-03","2016-10-06","spotts","absence");
INSERT INTO `calendar` VALUES("578","Dave Out"," 8-12","2016-10-03","2016-10-03","spotts","absence");
INSERT INTO `calendar` VALUES("579","Lynda Out"," 1:40-4:30","2016-10-03","2016-10-03","spotts","absence");
INSERT INTO `calendar` VALUES("580","Lynda Out"," 1:40-4:30","2016-10-06","2016-10-06","spotts","absence");
INSERT INTO `calendar` VALUES("581","Lynda Out"," 1:40-4:30","2016-10-10","2016-10-10","spotts","absence");
INSERT INTO `calendar` VALUES("582","Lynda Out"," 1:40-4:30","2016-10-13","2016-10-13","spotts","absence");
INSERT INTO `calendar` VALUES("583","Lynda Out"," 1:40-4:30","2016-10-17","2016-10-17","spotts","absence");
INSERT INTO `calendar` VALUES("584","Lynda Out"," 1:40-4:30","2016-10-20","2016-10-20","spotts","absence");
INSERT INTO `calendar` VALUES("585","Lynda Out"," 11:25-4:30","2016-10-31","2016-10-31","spotts","absence");
INSERT INTO `calendar` VALUES("586","Milton Out"," 4-5","2016-09-30","2016-09-30","spotts","absence");
INSERT INTO `calendar` VALUES("587","Veronica Out"," <br>","2016-11-21","2016-11-24","spotts","absence");
INSERT INTO `calendar` VALUES("588","Aaron Out"," <br>","2016-10-05","2016-10-05","spotts","absence");
INSERT INTO `calendar` VALUES("589","Kevin Out"," <br>","2016-10-07","2016-10-07","spotts","absence");
INSERT INTO `calendar` VALUES("590","Dan Out"," 2:30-5","2016-10-03","2016-10-03","spotts","absence");
INSERT INTO `calendar` VALUES("591","Tara Out"," 8:30-10","2016-10-04","2016-10-04","spotts","absence");
INSERT INTO `calendar` VALUES("592","Kevin Out"," 4-5:30","2016-10-05","2016-10-05","spotts","absence");
INSERT INTO `calendar` VALUES("593","Sandi Out"," <br>","2016-10-13","2016-10-13","spotts","absence");
INSERT INTO `calendar` VALUES("594","Dan Out"," 3:30-5","2016-10-05","2016-10-05","spotts","absence");
INSERT INTO `calendar` VALUES("595","Karen Out"," <br>","2016-10-21","2016-10-21","spotts","absence");
INSERT INTO `calendar` VALUES("596","Karen Out"," <br>","2016-12-27","2016-12-31","spotts","absence");
INSERT INTO `calendar` VALUES("597","Jennifer Out"," 2-5","2016-10-11","2016-10-11","spotts","absence");
INSERT INTO `calendar` VALUES("598","Stephen Out"," <br>","2016-10-07","2016-10-07","spotts","absence");
INSERT INTO `calendar` VALUES("599","Jeff Out"," 2:30-5","2016-10-10","2016-10-10","spotts","absence");
INSERT INTO `calendar` VALUES("600","Tara Out"," 3-5:30","2016-10-07","2016-10-07","spotts","absence");
INSERT INTO `calendar` VALUES("601","Karen Out"," 3:00-5","2016-10-07","2016-10-07","spotts","absence");
INSERT INTO `calendar` VALUES("602","Veronica Out"," 3-4:30","2016-10-10","2016-10-10","spotts","absence");
INSERT INTO `calendar` VALUES("603","Tara Out","In at 1:00 p.m.","2016-10-12","2016-10-13","tbutcher","absence");
INSERT INTO `calendar` VALUES("604","Katie Out"," ","2016-10-11","2016-10-12","kferguson","absence");
INSERT INTO `calendar` VALUES("605","Dan Out"," <br>","2016-10-10","2016-10-10","spotts","absence");
INSERT INTO `calendar` VALUES("606","Katie Out"," <br>","2016-10-11","2016-10-11","spotts","absence");
INSERT INTO `calendar` VALUES("607","Chloe Out"," 1-5","2016-10-14","2016-10-14","spotts","absence");
INSERT INTO `calendar` VALUES("608","Matt Out"," <br>","2016-10-17","2016-10-19","spotts","absence");
INSERT INTO `calendar` VALUES("609","Matt Out","&nbsp;8-3","2016-10-19","2016-10-19","spotts","absence");
INSERT INTO `calendar` VALUES("610","Matt Out"," 8-10","2016-10-21","2016-10-21","spotts","absence");
INSERT INTO `calendar` VALUES("611","Milton Out"," <br>","2016-10-10","2016-10-10","spotts","absence");
INSERT INTO `calendar` VALUES("612","Dave Out"," <br>","2016-10-12","2016-10-12","spotts","absence");
INSERT INTO `calendar` VALUES("613","David Out"," (Miller)","2016-10-14","2016-10-14","spotts","absence");
INSERT INTO `calendar` VALUES("614","Jennifer Out"," 4-5","2016-10-14","2016-10-14","spotts","absence");
INSERT INTO `calendar` VALUES("615","Kenneth Out"," <br>","2016-10-14","2016-10-14","spotts","absence");
INSERT INTO `calendar` VALUES("616","Sharon Out"," 8-9","2016-10-26","2016-10-26","spotts","absence");
INSERT INTO `calendar` VALUES("617","FREE Flu Shots available ","10/21 Large Conference Room 9:30am<br>","2016-10-13","2016-10-21","spotts","event");
INSERT INTO `calendar` VALUES("618","Lynda Out"," 1:40-4:30","2016-10-24","2016-10-24","spotts","absence");
INSERT INTO `calendar` VALUES("619","Lynda Out"," 1:40-4:30","2016-10-27","2016-10-27","spotts","absence");
INSERT INTO `calendar` VALUES("620","Lynda Out"," 1:40-4:30","2016-11-03","2016-11-03","spotts","absence");
INSERT INTO `calendar` VALUES("621","Sandi Out"," 11:45-1:45","2016-10-17","2016-10-17","spotts","absence");
INSERT INTO `calendar` VALUES("622","Dave Out"," 8-1","2016-10-17","2016-10-17","spotts","absence");
INSERT INTO `calendar` VALUES("623","Dan Out"," 4-5","2016-10-19","2016-10-19","spotts","absence");
INSERT INTO `calendar` VALUES("624","Katie Out"," 7:30-9:30","2016-10-20","2016-10-20","spotts","absence");
INSERT INTO `calendar` VALUES("625","Chloe Out"," 3:30-5","2016-10-19","2016-10-19","spotts","absence");
INSERT INTO `calendar` VALUES("626","Milton Out"," <br>","2016-10-12","2016-10-12","spotts","absence");
INSERT INTO `calendar` VALUES("627","David Out"," (Miller)","2016-11-04","2016-11-04","spotts","absence");
INSERT INTO `calendar` VALUES("628","Tara Out"," 4-5:30","2016-10-19","2016-10-19","spotts","absence");
INSERT INTO `calendar` VALUES("629","Dan Out"," <br>","2016-10-27","2016-10-29","spotts","absence");
INSERT INTO `calendar` VALUES("630","Jeff Out"," <br>","2016-10-24","2016-10-28","spotts","absence");
INSERT INTO `calendar` VALUES("631","Upcoming Closed Holiday","Veterans\' Day<br>","2016-10-24","2016-11-11","spotts","event");
INSERT INTO `calendar` VALUES("632","Kenneth Out"," <br>","2016-10-21","2016-10-21","spotts","absence");
INSERT INTO `calendar` VALUES("633","Tara Out"," 4:30-5:30","2016-10-21","2016-10-21","spotts","absence");
INSERT INTO `calendar` VALUES("634","Chloe Out"," 1-5","2016-10-25","2016-10-25","spotts","absence");
INSERT INTO `calendar` VALUES("635","Dave Out"," 8-1","2016-10-24","2016-10-24","spotts","absence");
INSERT INTO `calendar` VALUES("636","Aaron Out"," 8-9","2016-10-24","2016-10-24","spotts","absence");
INSERT INTO `calendar` VALUES("637","Jennifer Out"," 4-5","2016-10-31","2016-10-31","spotts","absence");



DROP TABLE `departments`;

CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `about` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE `variables`;

CREATE TABLE `variables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT 'var',
  `value` text NOT NULL,
  `datatype` enum('string','int','bool','float','other') NOT NULL DEFAULT 'string',
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




