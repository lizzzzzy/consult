<?php

$email = 'myagkie-okna.spb@yandex.ru';
//$email = 'lizapozdnyakova@gmail.com';

$tel = @$_POST['tel'];
$tel = trim($tel);
$fio = @$_POST['fio'];
$fio = trim($fio);
$mail = @$_POST['mail'];
$mail = trim($mail);
$typeof = @$_POST['typeof'];
$typeof = trim($typeof);
$message = @$_POST['message'];
$message = trim($message);
$place= @$_POST['place'];
$place= trim($place);

$body = file_get_contents('views/letter.tpl');

if (!empty($fio)) {
  $fio = strtoupper(substr($fio,0,1)).substr($fio,1);
  $body = str_replace("%fio%", $fio, $body);
} else {
  $body = str_replace("%fio%", '-', $body);
}
if (!empty($tel)) {
  $body = str_replace("%tel%", $tel, $body);
} else {
  $body = str_replace("%tel%", '-', $body);
}
if (!empty($typeof)) {
  $body = str_replace("%typeof%", $typeof, $body);
} else {
  $body = str_replace("%typeof%", '-', $body);
}
if (!empty($mail)) {
  $body = str_replace("%mail%", $mail, $body);
} else {
  $body = str_replace("%mail%", '-', $body);
}
if (!empty($message)) {
  $body = str_replace("%message%", $message, $body);
} else {
  $body = str_replace("%message%", '-', $body);
}
if (!empty($place)) {
  $body = str_replace("%place%", $place, $body);
} else {
  $body = str_replace("%place%", '-', $body);
}

date_default_timezone_set('Etc/UTC');
require_once 'lib/PHPM/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';

/* Настройки настроечки для smtp */
// $mail->isSMTP();
// $mail->Host = "smtp.yandex.ru";
// $mail->Port = 465;
// $mail->SMTPSecure = 'ssl';
// $mail->SMTPAuth = true;
// $mail->Username = "логин";
// $mail->Password = "пароль";

$mail->setFrom('info@myagkie-okna.spb.ru', 'Сайт мягкие окна');
$mail->addAddress($email);

$mail->Subject = 'Новая заявка';
$mail->Body    = $body;
$mail->IsHTML(true);

if ($mail->send()) {
  $result = file_get_contents('send.html');
  echo $result;
}

