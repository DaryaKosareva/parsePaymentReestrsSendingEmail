<?php

include("conf.php");
include("log.php");
$handle = opendir($dir_att);
if ($handle) {
    while (false !== ($filename = readdir($handle))) {
        if ($filename != "." && $filename != "..") {
            $filename_priz = explode("_", $filename);

            if (array_search($filename_priz[0], $filial_kod) > 0) {
                //us
                $dir_sign = $dir_us_sign;
            } elseif (strlen($filename_priz[0]) == 5) {
                //okna
                $dir_sign = $dir_okna_sign;
            } else {
                //other
                $dir_sign = $dir_other;
            }
            @mkdir($dir_sign . date("Ymd"));
            if (@copy($dir_att . $filename, $dir_sign . date("Ymd") . "/" . $filename)) {
                log_file("Info    Файл   $filename   скопирован в " . $dir_sign . date("Ymd") . "/");
            } else {
                log_file("Info    Файл   $filename   не удалось скопировать в " . $dir_sign . date("Ymd") . "/");
            }
        }
    }
}
?>