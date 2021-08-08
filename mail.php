<?php
require_once('phpmailer/PHPMailerAutoload.php');
$dotenv->load();
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = 'Заявка Коновалов';
$phone = $_POST['phone'];
$email = $_POST['email'];

// $mail->SMTPDebug = 1;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;
$mail->Username = 'example@example.com';
$mail->Password = 'your_password';
$mail->SMTPSecure = 'ssl';

$mail->setFrom('ivitalka24@gmail.com');
$mail->addAddress('skpr19+lead@mail.amocrm.ru');
$mail->addAddress('order@salesgenerator.pro');

$mail->isHTML(true);

$mail->Subject = $name;
$mail->Body    = 'Tелефон: ' .$phone. '<br>Email: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: index.html');
}
?>
