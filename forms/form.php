<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
        $message = $_POST['message'];
		$from = $email; 
		
		// WARNING: Be sure to change this. This is the address that the email will be sent to
		$to = 'amirnazir2828@gmail.com'; 
		
		$subject = "Message from ".$name." ";
		
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['subject']) {
			$errMessage = 'Please enter your message';
		}
		if (!$_POST['message']) {
			$errMessages = 'Please enter your message';
		}
		
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>