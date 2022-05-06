<?php
	//The "connect" function is defined externally in functions.php.
	connect();
	
	//These are all queries that create the necessary tables provided that they don't already exist.
	query("CREATE TABLE IF NOT EXISTS announcements (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		title TEXT NOT NULL,
		about TEXT NOT NULL,
		announce_date VARCHAR(200) NOT NULL,
		creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
		LOGON_USER VARCHAR(50) NOT NULL
	);");
	query("CREATE TABLE IF NOT EXISTS accounts (
		id INT NOT NULL AUTO_INCREMENT,
		employee_name VARCHAR(200) NOT NULL,
		LOGON_USER VARCHAR(50) NOT NULL,
		role_id INT NOT NULL,
		department_id INT NOT NULL,
		computer_name VARCHAR(6) NOT NULL,
		email VARCHAR(100) NOT NULL,
		birthday VARCHAR(40) NOT NULL,
		phone VARCHAR(30) NOT NULL,
		ip VARCHAR(25) NOT NULL,
		online BOOLEAN NOT NULL,
		esign TEXT NOT NULL,
		primary key (id)
	);");
	query("CREATE TABLE IF NOT EXISTS calendar (
		id INT NOT NULL AUTO_INCREMENT,
		name VARCHAR(100) NOT NULL,
		about TEXT NOT NULL,
		start_on DATE NOT NULL,
		end_on DATE NOT NULL,
		LOGON_USER VARCHAR(50) NOT NULL,
		primary key (id)
	);");
	query("CREATE TABLE IF NOT EXISTS roles (
		id INT NOT NULL AUTO_INCREMENT,
		name VARCHAR(100) NOT NULL,
		date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
		about TEXT NOT NULL,
		primary key (id)
	);");
	query("CREATE TABLE IF NOT EXISTS departments (
		id INT NOT NULL AUTO_INCREMENT,
		name VARCHAR(80) NOT NULL,
		about TEXT NOT NULL,
		date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
		primary key (id)
	);");
	query("CREATE TABLE IF NOT EXISTS Variables (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(25) DEFAULT 'var' NOT NULL,
		value TEXT NOT NULL,
		datatype ENUM('string','int','bool','float','other') DEFAULT 'string' NOT NULL,
		about TEXT NOT NULL
	);");
?>