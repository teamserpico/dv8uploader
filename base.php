<?php
session_start();

$dbhost = "a.db.shared.orchestra.io"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "db_4251e530"; // the name of the database that you are going to use for this project
$dbuser = "user_4251e530"; // the username that you created, or were given, to access your database
$dbpass = "L&7h0H8AAfXHeM"; // the password that you created, or were given, to access your database

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>