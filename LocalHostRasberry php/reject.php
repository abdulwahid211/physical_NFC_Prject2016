<?php

// page for the rejection when the nfc cannt be recognised or wrong time bookslop 


// ensure the door is still locked 
//we seted up the GPIO pin 21 as the outout for the switch lock 
$setmode17 = shell_exec("gpio -g mode 20 out"); 
//  send 0 value to the GPIO pin 21 to leave the door closed 
$gpio_on = shell_exec("gpio -g write 20 0");



session_start(); // start the sessions 
$url ="http://doc.gold.ac.uk/~ma301ma/phpProg6/ServerService.php"; // url link

$fields = array(
	'reject_details' => 'reject_details'
);
//url-ify the data for the POST
foreach($fields as $key=>$value) 
{ $fields_string .= $key.'='.$value.'&'; }

//open connection
// recieve the details from the server 
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
$result = curl_exec($ch);
echo $result; // print out the results of the message from the server 
// 
echo "<h1>this is your NFC code: ".$_SESSION['nfc']."</h1>";
//close connection
curl_close($ch);
?>
<!DOCTYPE html>
<html>
<body bgcolor="E76B82">
<form action="register.php" method="post" id="register">
 
</form>
<button onclick="location.href='register.php'">Go Back!</button>
</body>
</html>