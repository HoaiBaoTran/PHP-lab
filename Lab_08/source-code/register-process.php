<?php
require_once("./connection.php");

require_once('./vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$firstName = $_POST['first'];
$lastName = $_POST['last'];
$email = $_POST['email'];
$username = $_POST['user'];
$password = $_POST['pass'];
$fullName = "$firstName $lastName";
$hashPassword = password_hash($password, PASSWORD_BCRYPT);

// Generate a unique activation token
$activate_token = bin2hex(random_bytes(32));
$activation_link = "http://localhost:8080/activate.php?token=$activate_token";

$mail = new PHPMailer(true);
$sql = 'INSERT INTO account(username, firstname, lastname, email, password, activate_token, activated) VALUES(?,?,?,?,?,?,0)';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($username, $firstName, $lastName, $email, $hashPassword, $activate_token));
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'luffyemailsender@gmail.com';                     //SMTP username
    $mail->Password   = 'oqng sakk biei wjmp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('luffyemailsender@gmail.com', 'Luffy');
    $mail->addAddress($email, $fullName);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Activate Your Account';
    $mail->Body = "<p>Hello $username,\n\nPlease click the following link to activate your account:\n$activation_link</p>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (PDOException $ex) {
    echo "Error: " . $ex->getMessage();
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
