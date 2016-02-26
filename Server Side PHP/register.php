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
	echo "failed to connect to the database, please try again!";


}

if (isset($_POST['submit']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])    
   && !empty($_POST['nfc']) && !empty($_POST['student_id'])) {
//Creating variables which will store the values of the form in the android application.
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$nfc = $_POST['nfc'];
$mobile = $_POST['mobile'];
$student_id = $_POST['student_id'];
$username = $_POST['username'];


$result = "INSERT INTO studentDetails(firstName, lastName,nfc,mobile,student_id,username) VALUES('$firstName','$lastName','$nfc','$mobile','$student_id','$username')";
$mysqliQuery = mysql_query( $result);




}



// Check connection if it the database in the igor Sever is accessable 
if (!$connection) {
    echo "Database Fault! please try again";
}

?>


<!DOCTYPE html>
<html>
<body>
<p> <?php 
// print out any message for the user 
echo "Please enter your student details?"; ?> </p>
<form action="register.php" method="post" id="register">
  First Name: <input type="text" name="firstName"><br>
  Last Name: <input type="text" name="lastName"><br>
  NFC code: <input type="text" name="nfc"><br>
  Mobile: <input type="text" name="mobile"><br>
  Student ID: <input type="text" name="student_id"><br>
  Student Username: <input type="text" name="username"><br>
</form>
<button type="submit" form="register" name ="submit" value="Submit">Register</button>
<button onclick="location.href='login.php'">Book 3D Printers!</button>

</body>
</html>




