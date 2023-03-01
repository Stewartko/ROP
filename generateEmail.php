<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__.'/PHPMailer/src/Exception.php';
require __DIR__.'/PHPMailer/src/PHPMailer.php';
require __DIR__.'/PHPMailer/src/SMTP.php';


function sendMail($prijemca, $predmet, $sprava){

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->isHTML(true);  
        $mail->Host       = 'smtp.seznam.cz';                   
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'gprotectsk@seznam.cz';                    
        $mail->Password   = '5527GProtect';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    
        $mail->CharSet    = "UTF-8";
        $mail->setFrom('gprotectsk@seznam.cz', 'GProtect');
        $mail->addAddress($prijemca);    
        $mail->Subject = $predmet;
        $mail->Body    = $sprava;
        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")<\script>';
    }
}

function sendRef($odosielatel, $predmet, $sprava){

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->isHTML(true);  
        $mail->Host       = 'smtp.seznam.cz';                   
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'gprotectsk@seznam.cz';                    
        $mail->Password   = '5527GProtect';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    
        $mail->CharSet    = "UTF-8";
        $mail->setFrom('gprotectsk@seznam.cz', 'Reklamacia/Staznost');
        $mail->addAddress('adamko5554@gmail.com');    
        $mail->addReplyTo($odosielatel, 'Zakaznik');
        $mail->Subject = $predmet;
        $mail->Body    = $sprava;
        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")<\script>';
    }
}

function sendOrder($odosielatel, $predmet, $sprava){

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->isHTML(true);  
        $mail->Host       = 'smtp.seznam.cz';                   
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'gprotectsk@seznam.cz';                    
        $mail->Password   = '5527GProtect';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    
        $mail->CharSet    = "UTF-8";
        $mail->setFrom('gprotectsk@seznam.cz', 'Potvrdenie objednávky');
        $mail->addAddress('adamko5554@gmail.com');    
        $mail->addAddress($odosielatel); 
        $mail->Subject = $predmet;
        $mail->Body    = $sprava;
        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")<\script>';
    }
}
?>
