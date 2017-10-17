<?php

require("phpmailer/class.phpmailer.php");
include("conf.php");

$port = "25";
$fromname = "BTI " . $email_bti;
$array_file = array();

$files = scandir($dir_log, 1);
$mails = "";

try {

    $addrs1 = array("kosareva-dv@sb.tatarstan.ru", "mirs@sb.tatarstan.ru");

    $mail = new PHPMailer(true); //New instance, with exceptions enabled
    $mail->Host = $server;
    $mail->Port = $port;
    $mail->Sender = $email_bti;
    $mail->Username = $email_bti; // SMTP account username  
    $mail->Password = $password;
    $mail->SMTPKeepAlive = true;
    $mail->Mailer = "smtp";
    $mail->IsSMTP(); // telling the class to use SMTP  
    $mail->SMTPAuth = "NTLM";                  // enable SMTP authentication  
    $mail->CharSet = 'utf-8';
    $mail->SMTPDebug = 0;
    $mail->FromName = $fromname;

    for ($j = 0; $j < sizeof($addrs1); $j++) {
        $mail->AddAddress($addrs1[$j]);
    }
    $mail->Subject = "Log-file BTI";
    $mail->Body = "Log-file BTI " . date("Ymd");
    $mail->AddAttachment($dir_log . date("Ymd").".log");
    /* for ($i = 0; $i < sizeof($array_file); $i++) {
      $mail->AddAttachment("$path_source/$array_file[$i]");
      } */
    $mail->IsHTML(false); // send as HTML
    $mail->Send();
    echo 'Message has been sent.';
    //$addr_str = implode(", ", $addrs1);
    // }
} catch (phpmailerException $e) {
    echo $e->errorMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>