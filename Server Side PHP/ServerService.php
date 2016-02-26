<?php
// This is the main server side sciprt which is uploaded on the UNIX server IGOR 
// it verifies if the student's nfc exist in the database 
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
	echo "failed to connect to the database, please try again!";


}
$username = $_POST['NFC'];
$date = $_POST['DATE'];
$time = $_POST['TIME'];


// remove the white space 
$username = preg_replace('/\s+/', '', $username);
$date = preg_replace('/\s+/', '', $date);

// if it rejects, send the details to the user 
if (isset($_POST['reject_details'])) {

echo "<h1> Opps, NFC either can't be recognised or this is not the time you booked. </h1><br>";
echo "<h1> Please register on: http://doc.gold.ac.uk/~ma301ma/phpProg6/register.php </h1><br>";



}// accept details end if



// if the NFC has posted from the localhost script, start verifying its in the database 
if (isset($_POST['NFC'])) {

// collect the all posts methods from the localhost scripts 
$time = $_POST['TIME'];
$time = preg_replace('/\s+/', '', $time); // remove white space 
$nfc = $_POST['NFC'];
$nfc = preg_replace('/\s+/', '', $username); // remove white space 

// my sql state to check if the correct nfc, current date and time exists in the database 
$verify = "SELECT * FROM bookings WHERE nfc ='$nfc' AND date ='$date' AND start='$time'";
//echo $username;

$result = mysql_query($verify);

// if does not, send the rejection message to the user, which directs to rejection page 
// esnure the door lock is closed 
if(mysql_num_rows($result)<1)
{

echo "REJECT";


} 
// if it does exist ensure the door lock is open for the user 
// send the message back to the localhost server 
else{

echo "ACCEPT";

} 








}




?>