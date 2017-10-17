<?php

require("phpmailer/class.phpmailer.php");
include("conf.php");
include("log.php");

$port = "25";
$fromname = "OSB N8610 Bank Tatarstan";
$array_file = array();

$files = scandir($dir_att, 1);
$mails = "";

try {
    for ($i = 0; $i < count($files); $i++) {
        $addrs1 = array();
        if (is_dir($files[$i])) {
            continue;
        }
        $cod = substr("$files[$i]", 1, 2);
        $str = $filial[$cod];
        $arr_mail = explode(";", $str);
        //$arr_mail[3] = "kosareva-dv@sb.tatarstan.ru";
        //$arr_mail[3]="danya_87@bk.ru,darjakosareva@bk.ru";
        $arr_mail1 = explode(",", $arr_mail[3]);
        for ($k = 0; $k < count($arr_mail1); $k++) {
            array_push($addrs1, $arr_mail1[$k]);
        }
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
        $mail->Subject = "Reestr from SB Bank Tatarstan";
        $mail->Body = " ";
        $mail->AddAttachment($dir_att . $files[$i]);
        /* for ($i = 0; $i < sizeof($array_file); $i++) {
          $mail->AddAttachment("$path_source/$array_file[$i]");
          } */
        $mail->IsHTML(false); // send as HTML
        $mail->Send();
        echo 'Message has been sent.';
        $addr_str = implode(", ", $addrs1);
        log_file("Info    Файл " . $files[$i] . " отправлен на email " . $addr_str);
    }
} catch (phpmailerException $e) {
    echo $e->errorMessage();
    log_file("Error   " . $e->errorMessage());
} catch (Exception $e) {
    echo $e->getMessage();
    log_file("Error   " . $e->getMessage());
}
?>