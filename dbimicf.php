<?php
$username = "root";
$password = "";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
// echo "Connected to MySQL<br>";

//select a database to work with
$db_name  = "dbmicf"; 
$selected = mysql_select_db($db_name,$dbhandle)  or die("Could not select $db_name");
?>