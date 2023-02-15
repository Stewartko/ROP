<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



function sendMail($prijemca, $predmet, $sprava){

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->isHTML(true);  
        $mail->Host       = 'smtp.seznam.cz';                   
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'gprotectsk@seznam.cz';                    
        $mail->Password   = 'Lolanek589';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    
        $mail->CharSet    = "UTF-8";
        $mail->setFrom('gprotectsk@seznam.cz', 'GProtect');
        $mail->addAddress($prijemca);    
        $mail->Subject = $predmet;
        $mail->Body    = $sprava;
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

