<?php

//������� ������ ���-������
function log_file($str) {
    include("conf.php");
    $fp = fopen($dir_log . date("Ymd") . ".log", "a"); // ��������� ���� � ������ ������
    if ($fp) {
        $str_inf = date("Y-m-d H:i:s", time() + 3600*4) . "   " . $str . "\r\n"; //���������� �� ������
        $write = fwrite($fp, $str_inf); // ������ � ���� ����������
    }
    fclose($fp);
}

?>