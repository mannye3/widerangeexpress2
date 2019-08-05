<?php

function sendMail_Registration($email){
  // Send To Email
  //$to  = strtolower(trim($email));
  $to  = strtolower(trim("root@localhost"));
  
  // subject
  $subject = 'Registration Information From ' . URLNAME;
  
  // message
  $message = '
  <html>
  <head>
    <title>Registration Information</title>
  </head>
  <body>
    <p>Welcome to ' . SITENAME . ' !</p>
    <p>Click on the link below to complete your registration.</p>
    <p><a href="' . URLROOT . 'users/compsignup/'. strtolower(trim($email)) .'" target="_blank">/users/compsignup/'.uniqid().uniqid().uniqid().uniqid().uniqid().'</a></p>
  </body>
  </html>
  ';
  
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
  // Additional headers
  $headers .= 'To: '.strtolower(trim($email)). "\r\n";
  $headers .= 'From: ' . SITENAME . ' <info@' . URLNAME;
  //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
  //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n"; ?email='.strtolower(trim($_POST['txtEmail']))
  
  // Mail it
  
  if(mail($to, $subject, $message, $headers)){
      return true;
  }
  else{
    return false;
  }
}

function sendMail_RequestCode($email, $messagebody, $code){
	// Send To Email
	//$to  = strtolower(trim($email));
  //$to  = 'info@' . URLNAME;
  $to  = strtolower(trim("root@localhost"));
  
  // subject
  $subject = 'Request For ' . $code . ' Code From ' . URLNAME;
  
  // message
  $message = '
  <html>
  <head>
    <title>Code Request</title>
  </head>
  <body>
    <p>' . $messagebody . '</p>
  </body>
  </html>
  ';
  
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
  // Additional headers
  $headers .= 'To: info@' . URLNAME."\r\n";
  $headers .= 'From: ' . strtolower(trim($email))."\r\n";
  //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
  //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n"; ?email='.strtolower(trim($_POST['txtEmail']))
  
  // Mail it
  
  if(mail($to, $subject, $message, $headers)){
      return true;
	}
	else{
		return false;
	}
}


?>