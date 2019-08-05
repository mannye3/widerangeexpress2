<?php

function sendMail_SendParcelInfoToUser($email, $desc, $source, $destination, $present, $date, $time, $code, $status){
  // Send To Email
  $to  = strtolower(trim($email));
  //$to  = 'info@' . URLNAME;
  //$to  = strtolower(trim("root@localhost"));
  
  // subject
  $subject = 'Your parcel details for ' . URLNAME;
  
  // message
  $message = '
  <html>
  <head>
    <title>Parcel Details</title>
  </head>
  <body>
    <p>Find below your parcel details</p>
    <p>Description : ' . $desc . '</p>
    <p>Source Location : ' . $source . '</p>
    <p>Destination Location : ' . $destination . '</p>
    <p>Present Location : ' . $present . '</p>
    <p>Date : ' . $date . '</p>
    <p>Time : ' . $time . '</p>
    <p>Tracking Code : ' . $code . '</p>
    <p>Status : ' . $status . '</p>
  </body>
  </html>
  ';
  
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
  // Additional headers
  $headers .= 'To: ' . strtolower(trim($email))."\r\n";
  $headers .= 'From: info@' . URLNAME."\r\n";
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