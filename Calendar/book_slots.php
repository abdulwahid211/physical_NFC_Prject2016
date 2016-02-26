<?php

// Script to book the slots for the student
//include('php/connect.php'); 
session_start();  // load up the sessions, so i can collect users id from the login page 

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


if(isset($_POST['descriptions'])){
	echo "DONE BITCH";
 $slots_booked = $_POST['slots_booked'];
 $name = $_SESSION['firstName']." ". $_SESSION['lastName'];
 $username = $_SESSION['username'];
 $nfc = $_SESSION['nfc'];
 $descriptions = $_POST['descriptions'];
 $booking_date = $_POST['booking_date'];
echo $booking_date."DONE";

 $explode = explode('|', $slots_booked);

foreach($explode as $slot) {

	if(strlen($slot) > 0) {


$result = "INSERT INTO bookings (date, start, student_name, username, nfc, descriptions) VALUES('$booking_date', '$slot', 
'$name','$username','$nfc','$descriptions')";
$mysqliQuery2 = mysql_query($result);
		



	} // Close if
	
} // Close foreach

} // end main if statement 



if(session_destroy()) // once the session are destroyed 
{
header("Location: http://doc.gold.ac.uk/~ma301ma/phpProg6/login.php"); // Redirecting To editor back to the  Home Page
}








?>


