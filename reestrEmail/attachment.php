<?php

include("conf.php");
include("log.php");
//соедин€емс€ с удаленным SSL IMAP-сервером с самосто€тельно сгенерированным (self-signed) сертификатом
$connect = @imap_open("{" . $server . ":993/imap/ssl/novalidate-cert}INBOX", $login, $password);
if ($connect)
    log_file("Info    ѕодключение к серверу прошло успешно");
else {
    $imap_errors = imap_errors();
    log_file("Error   Ќе удалось подключитьс€ к серверу. " . $imap_errors[0]);
    die;
}

//возвращаем массив с номерами новых сообщений UNSEEN
$mails = imap_search($connect, 'UNSEEN');
//$mails = imap_search($connect, 'ALL'); //дл€ теста

if (!$mails) {
    log_file("Info    Ќовых писем нет");
    log_file("---------FINISH attachment.php---------");
    log_file("*********FINISH SESSION*********");
    $fp = fopen("C:/wamp/www/sb/1.txt", "w"); // ќткрываем файл в режиме записи
    if ($fp) {
	$write = fwrite($fp, "null"); 
   }

    exit;
} else {
    log_file("Info     оличество новых писем - " . count($mails));
   $fp = fopen("C:/wamp/www/sb/1.txt", "w"); // ќткрываем файл в режиме записи
   if ($fp) {
	$write = fwrite($fp, "pis"); 
   }
}
for ($p = 0; $p < count($mails); $p++) {
    $mail[0] = $mails[$p];

    //читаем структуру сообщени€
    $structure = imap_fetchstructure($connect, $mails[$p]);
    //print_r($structure);
    //определ€ем метку-разделитель ($boundary), необходимую дл€ разбора тела письма
    $boundary = '';
    if ($structure->ifparameters) {
        foreach ($structure->parameters as $param) {
            if (strtolower($param->attribute) == 'boundary') // strtolower - преобразование строки в нижний регистр
                $boundary = $param->value;
        }
    }

    //разбираем тело письма. „асть тела может содержать вложенные части или не содержать. 
    //если часть тела содержит вложенные части, то атрибут type будет равен 1.
    if ($structure->type == 1) {

        $parts = array();

        // Get allparts to $parts
        getParts($structure, $parts);
        //print_r($parts);
        //извлекаем первый раздел тела сообщени€
        $mail['body'] = imap_fetchbody($connect, $mails[$p], 1);
        $mail['body'] = imap_utf8((getPlain($mail['body'], $boundary)));
        $mail['body'] = iconv('KOI8-R', 'utf-8', $mail['body']);

        // Get attach
        $i = 0;
        //print_r($parts);
        foreach ($parts as $part) {
            // Not text or multipart
            //print_r($part);
            $i++;
            if ($part['disp'] == "attachment") {
                $file = imap_fetchbody($connect, $mails[$p], $i);
                $filename = imap_utf8($part['params'][0]['val']);
                $file = compile_body($file, $part['encode']);
                $mail['files'][] = array('content' => base64_decode($file),
                    'filename' => iconv('utf-8', 'cp1251', $filename),
                    'size' => $part['bytes']);
                $ft = fopen($dir_att . iconv('utf-8', 'cp1251', $filename), "wb");
                fwrite($ft, $file);
                fclose($ft);
                log_file("Info    ‘айл   " . iconv('utf-8', 'cp1251', $filename) . "   сохранен в $dir_att");
            }
        }
    } else {
        // возвращаем тело сообщени€ (string)
        $mail['body'] = imap_body($connect, $mails[$p]);
        $mail['body'] = imap_utf8((getPlain($mail['body'], $boundary)));
        $mail['body'] = iconv('KOI8-R', 'utf-8', $mail['body']);
    }

// возвращаем шапку сообщени€ 
    $header = imap_header($connect, $mails[$p]);

    if (!empty($header->subject)) {
        $mail['subject'] = imap_utf8($header->subject);
    }

    if (isset($header->to[0]->personal))
        $mail['to']['personal'] = imap_utf8($header->to[0]->personal);
    else
        $mail['to']['personal'] = '';
    $mail['to']['mailbox'] = imap_utf8($header->to[0]->mailbox);
    $mail['to']['host'] = imap_utf8($header->to[0]->host);

    if (isset($header->from[0]->personal))
        $mail['from']['personal'] = imap_utf8($header->from[0]->personal);
    else
        $mail['from']['personal'] = '';
    $mail['from']['mailbox'] = imap_utf8($header->from[0]->mailbox);
    $mail['from']['host'] = imap_utf8($header->from[0]->host);

    $mail['maildate'] = strtotime(imap_utf8($header->MailDate));
    $mail['date'] = strtotime(imap_utf8($header->date));
    $mail['udate'] = imap_utf8($header->udate);
    $mail['size'] = imap_utf8($header->Size);
    $mail['id'] = md5($header->message_id);
}

function getParts($object, & $parts) {

// Object is multipart
    if ($object->type == 1) {

        foreach ($object->parts as $part) {
            getParts($part, $parts);
        }
    } else {
        $p['type'] = $object->type;
        $p['encode'] = $object->encoding;
        $p['subtype'] = $object->subtype;
        $p['bytes'] = $object->bytes;
        if ($object->ifparameters == 1) {
            foreach ($object->parameters as $param) {
                $p['params'][] = array('attr' => $param->attribute,
                    'val' => $param->value);
            }
        }
        if ($object->ifdparameters == 1) {
            foreach ($object->dparameters as $param) {
                $p['dparams'][] = array('attr' => $param->attribute,
                    'val' => $param->value);
            }
        }
        $p['disp'] = null;
        if ($object->ifdisposition == 1) {
            $p['disp'] = $object->disposition;
        }
        $parts[] = $p;
    }
}

function getPlain($str, $boundary) {
    $lines = explode("\n", $str);

    $plain = false;
    $res = '';
    $start = false;
    foreach ($lines as $line) {

        if (strpos($line, 'text/plain') !== false)
            $plain = true;

        if (strlen($line) == 1 && $plain) {
            $start = true;
            $plain = false;
            continue;
        }

        if ($start && strpos($line, 'Content-Type') !== false)
            $start = false;
        if ($start)
            $res .= $line;
    }

    $res = substr($res, 0, strpos($res, '--' . $boundary));

    $res = base64_decode($res == '' ? $str : $res);

    return $res;
}

function compile_body($body, $enctype) {
    $enctype = explode(" ", $enctype);
    $enctype = $enctype[0];
    if (strtolower($enctype) == "3")
        $body = base64_decode($body);
    elseif (strtolower($enctype) == "4")
        $body = quoted_printable_decode($body);
    return $body;
}

?>