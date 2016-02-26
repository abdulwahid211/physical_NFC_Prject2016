<?php

//Variables for the connection to the database.
$hostName = "localhost";
$username = "ma301ma";
$password = "wahid92";
$dbName = "ma301ma_...test";

//Connecting to the host and database.
$connection = mysql_connect($hostName, $username, $password, $dbName);



//Checking if the connection has worked.
if(!mysql_select_db($dbName))
{
	//Printing out the error.
	die("failed to connect to the database, please try again!");


}
