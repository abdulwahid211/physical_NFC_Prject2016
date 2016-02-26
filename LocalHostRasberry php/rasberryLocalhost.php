<?php
session_start(); // load up the session 
$nfc_code ="";


$date = new DateTime();  // retrieve the current date 
$current_date = $date->format('Y-m-d'); // set up the date format 

// using the shell execution function to  send command to the terminal to run the GPIO pin
// php allows shell execution commands 
//we seted up the GPIO pin 21 as the outout for the switch lock 
$setmode17 = shell_exec("gpio -g mode 20 out"); 
//  send 0 value to the GPIO pin 21 to leave the door closed 
$gpio_on = shell_exec("gpio -g write 20 0");



date_default_timezone_set("Europe/London"); // set up the current date in europe 
$time = date('H:00:00', time()); // retireve the current hour 



// url link to check the nfc code in the php server 
$url ="http://doc.gold.ac.uk/~ma301ma/phpProg6/ServerService.php";
// once the user has pressed scan nfc button 
// it would execute the python code for the nfc reader to read and send the nfc code to the server side script through curl library 

if (isset($_POST['submit']) ) { // once the has pressed submit button 

$nfc_code = shell_exec("sudo python read.py"); // run the python code to read the NFC reader 
$nfc_mode = shell_exec("^c"); // once the code has been wriiten cancel the python program 


// array of values to be send 
$fields = array(
	'NFC' => $nfc_code,
        'DATE'=>$current_date,
        'TIME'=>date('H:00:00', time())
);
$_SESSION['nfc'] = $nfc_code;
//url-ify the data for the POST
foreach($fields as $key=>$value) 
{ $fields_string .= $key.'='.$value.'&'; }
//rtrim($fields_string, '&');
//open connection
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
$result = curl_exec($ch);
echo $result;

// direct the user to the approperiate relvant page 
if($result=="ACCEPT"){
header("Location:accept.php"); // 
}// end if
if($result=="REJECT"){
header("Location:reject.php"); // 
}
} // end submit 
//close connection
curl_close($ch);
?>
<!DOCTYPE html>
<html>
<body>
<p> 
<?php 
// print out any message for the user 
echo "Please place your NFC tag?"; ?> </p>
<form action="register.php" method="post" id="register">
  NFC code: <input type="text" name="nfc" value= <?php echo  $nfc_code; ?>    ><br>
</form>
<button type="submit" form="register" name ="submit" value="Submit">Scan NFC</button>
<button onclick="location.href='register.php'">Refresh</button>
</body>
</html>
