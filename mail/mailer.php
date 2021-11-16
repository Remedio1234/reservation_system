<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once "vendor/autoload.php";

    function sendMail($customer_name, $customer_email, $subject, $content){
        $mail               = new PHPMailer(true);
        $mail->isSMTP();  
        $mail->SMTPDebug    = 0;                         
        $mail->Host         = "smtp.gmail.com";
        $mail->Port         = 587;      
        $mail->SMTPSecure   = "tls";  
        $mail->SMTPAuth     = true;        
        $mail->Username     = "donelbeach@gmail.com";                 
        $mail->Password     = "donelbeach123";                           
                                 
                                
        $mail->setFrom('donelbeach@gmail.com', 'Donels Beach Resort');
        $mail->addAddress($customer_email, $customer_name);
    
        $mail->Subject = $subject;
        $mail->msgHTML($content);
        $mail->AltBody = $content;
        $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
        if($mail->send()) {
            return array ('response'=>'success');
        } else {
            return array ('response'=>'error');
        }        
        // try {
        //     return $mail->send();
        // } catch (Exception $e) {
        //     return "Mailer Error: " . $mail->ErrorInfo;
        // }
    }
?>