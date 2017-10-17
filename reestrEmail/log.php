<?php

//функция записи лог-файлов
function log_file($str) {
    include("conf.php");
    $fp = fopen($dir_log . date("Ymd") . ".log", "a"); // Открываем файл в режиме записи
    if ($fp) {
        $str_inf = date("Y-m-d H:i:s", time() + 3600*4) . "   " . $str . "\r\n"; //информация об оплате
        $write = fwrite($fp, $str_inf); // Запись в файл информации
    }
    fclose($fp);
}

?>