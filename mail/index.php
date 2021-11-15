<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Mailer</title>
</head>
<body>
    <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require_once "vendor/autoload.php";

        $mail = new PHPMailer(true);

        //Set PHPMailer to use SMTP.
        $mail->isSMTP();  

        //Enable SMTP debugging.
        $mail->SMTPDebug = 2;                               
                  
        //Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";

        //Set TCP port to connect to
        $mail->Port = 587;      
        
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";  

        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;    
        
        
        //Provide username and password     
        $mail->Username = "donelbeach@gmail.com";                 
        $mail->Password = "donelbeach123";                           
                                 
                                
        $mail->setFrom('panfilo.glophics@gmail.com', 'Glophics'); // From email and name
        $mail->addAddress('panfilo.glophics@gmail.com', 'Mr. Ping'); // to email and name
        // $mail->From = "panfilo.glophics@gmail.com";
        // $mail->FromName = "Ping";

        // $mail->addAddress("panfilo.glophics@gmail.com", "pilox");

        // $mail->isHTML(true);

        $mail->Subject = 'PHPMailer GMail SMTP test';
        // $mail->Body = "<i>Mail body in HTML</i>";
        //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->msgHTML("This is the plain text version of the email content");
        // If html emails is not supported by the receiver, show this body
        $mail->AltBody = "This is the plain text version of the email content";
        $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    ?>
</body>
</html>