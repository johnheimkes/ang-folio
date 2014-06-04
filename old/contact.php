<?php
	$send = true;	
	$error_message = '';
	$success_message = '';
	
	if ( $_POST[name] == "" ) {
	    $send = false;
		$message .= "Please enter your name.<br />\n";
	}	
	if ( $send ) {
		$email_content = "name: $_POST[name]\n";
		$email_content .= "email: $_POST[email]\n";
	
		$safe_email = str_replace("\r\n","",$_POST[email]);
		$safe_sub = "Form has been submitted from: $safe_email ";
    mail(
          "1017allen@gmail.com",
          $safe_sub, 
          $email_content,
          "MIME-Version: 1.0\r\n" . 
          "Content-type: text/html; charset=iso-8859-1"
        );
    
    $success_message = "Thank you.";
		
	}
	
?>