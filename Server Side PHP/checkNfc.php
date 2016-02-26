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

if (isset($_POST['submit']) &&  !empty($_POST['nfc'])) {
//Creating variables which will store the values of the form in the android application.

$nfc = $_POST['nfc'];



$result = "select * from studentDetails where nfc='$nfc'";
$mysqliQuery = mysql_query( $result);




if(mysql_num_rows($mysqliQuery)<1)
{

echo "nfc cannt be recognised!";
//echo json_encode($_POST);

} // end if statement 
else
{

while($row=mysql_fetch_assoc($mysqliQuery)){
echo $row["firstName"]."\n";
echo $row["lastName"]."\n";
echo $row["nfc"]."\n";
echo $row["mobile"]."\n";
echo $row["student_id"]."\n";
echo $row["degreeCourse"]."\n";
}



} // end else statement 





} // end all statements 



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
<form action="checkNfc.php" method="post" id="register">
  NFC code: <input type="text" name="nfc"><br>
</form>
<button type="submit" form="register" name ="submit" value="Submit">Check NFC/button>
<button onclick="location.href='register.php'"> Go Register</button>

</body>
</html>




