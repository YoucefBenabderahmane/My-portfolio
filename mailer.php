<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST["full-name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'benabderahmane.youcef@gmail.com'; 
        $mail->Password   = 'dcuo drus koib jfef'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email setup
        $mail->setFrom($email, $name);
        $mail->addAddress('benabderahmane.youcef@gmail.com'); 

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = "Message from: $name\nEmail: $email\n\n$message";

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
