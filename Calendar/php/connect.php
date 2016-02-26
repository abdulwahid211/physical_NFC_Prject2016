<?php

// Make a MySQL Connection

$host = "localhost";
$user = "ma301ma";
$password = "wahid92";
$dbName = "ma301ma_...test";

$link = mysqli_connect($host, $user, $password);
mysqli_select_db($link, $dbName) or die(mysql_error());

?>
