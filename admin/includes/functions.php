<?php
    
function sendMail($to, $subject, $name, $description, $id){
 
     $from = 'Car Wash Jo <info@carwash-jo.com>';
     
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    $Body = file_get_contents('htmlEmail.html');
    $Body = str_replace('{{name}}', $name, $Body);
    $Body = str_replace('{{description}}', $description, $Body);
    $html = str_replace('{{id}}', $id, $Body);

    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

     
    // Sending email
    if(mail($to, $subject, $html, $headers)){
        return true;
    } else{
        return false;
    }
}

?>