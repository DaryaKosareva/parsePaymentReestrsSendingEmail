<?php

include("conf.php");
include("log.php");

$handle = opendir($dir_okna_nosign);
if ($handle) {
    while (false !== ($filename = readdir($handle))) {
        $arr = array();
        if ($filename != "." && $filename != "..") {
            $file_array = file($dir_okna_nosign . $filename); // ���������� ����� � ������ $file_array
            unlink($dir_okna_nosign . $filename); //�������� �����
            $str_shapka = explode("|", $file_array[0]); //������ ������ �������
            $filename_priz = explode("_", $filename); //������ ����� �����
            $plat_por = trim($str_shapka[1]); //����� ���������� ���������
            $nom_txt = trim($filename_priz[2]); //����� ����� + ����������

            $plat_por_data = trim($str_shapka[0]); //���� ���������� ���������
            for ($h = 1; $h < count($file_array) - 1; $h++) {
                echo $filename_priz[0];
                echo "<br>";
                $file_array[$h]=str_replace(" ", "", $file_array[$h]);
                $str_inf = explode("|", trim($file_array[$h])); //������ �����
                
                $str_inf[1] = str_replace(trim($filename_priz[0]), "", trim($str_inf[1])); //�����-���, ������� ������ �����
                array_push($str_inf, 1);
                //$kod = substr($str_inf[2], 0, 3); //��� ��������� ���
                //$str_inf= 
                array_push($arr, $str_inf);
            }
        }
        $arr = array_slice($arr, 0);
        //print_r($arr);
        $arr_itog = array();
        $arr_itog = $arr;
        $r = 0;
        $z = 0;
        //$a_LISTPAR = array($tran, $ident, $date, $summa, $mail, $barcode, $kod, $kolopl, $bik, $summa1, $summa2);
        for ($i = 0; $i < count($arr_itog); $i++) {
            $poisk_kod = substr($arr_itog[$i][1], 0, 3);
            for ($j = $i + 1; $j < count($arr_itog); $j++) {
                if ($poisk_kod == substr($arr_itog[$j][1], 0, 3)) {
                    $arr_itog[$j][6] = $arr_itog[$i][6] + $arr_itog[$j][6]; //��� �������� ����������
                    $arr_itog[$j][2] = $arr_itog[$i][2] + $arr_itog[$j][2]; //$summa = $str_in2[$j][5];
                    $arr_itog[$j][3] = $arr_itog[$i][3] + $arr_itog[$j][3]; //$summa1 = intval($summa * 0.01);
                    $arr_itog[$j][4] = $arr_itog[$i][4] + $arr_itog[$j][4]; // $summa2 = $summa - $summa1;
                    $arr_itog[$i] = "";
                    break;
                }
            }
        }

        $arr_itog = array_filter($arr_itog);
        $arr_itog = array_slice($arr_itog, 0);
        $r = count($arr_itog);
        for ($i = 0; $i < $r; $i++) {
            $kod = substr($arr_itog[$i][1], 0, 3);

            $filenameout = $dir_okna_nosign . $kod . "_" . date("Ymd") . "_" . $nom_txt;
            $str_shapka = "����|" . $plat_por_data . "|\r\n"; //���������
            $str_shapka2 = "�����|" . $plat_por . "|\r\n"; //���������

            $fp = fopen($filenameout, "x"); // ��������� ���� � ������ ������
            if ($fp) {
                $write = fwrite($fp, $str_shapka); // ������ � ���� ���������
                $write = fwrite($fp, $str_shapka2); // ������ � ���� ���������
            }
        }
        if ($handle1 = opendir($dir_okna_nosign)) {
            $p = 0;
            while (false !== ($filename1 = readdir($handle1))) {
                if ($filename1 != "." && $filename1 != "..") {
                    $file = $filename1;
                    $fp = fopen($dir_okna_nosign . $filename1, "a"); // ��������� ���� � ������ ������
                    if ($fp) {
                        for ($i = 0; $i < count($arr); $i++) {
                            $date = $arr[$i][0];
                            $barcode = $arr[$i][1];
                            $summaoplaty = $arr[$i][2];
                            $summaoplaty1 = $arr[$i][3];
                            $summaoplaty2 = $arr[$i][4];
                            $bik = $arr[$i][5];
                            $kod = substr($barcode, 0, 3);
                            $filenameout = $kod . "_" . date("Ymd") . "_" . $nom_txt;

                            if ($filename1 == $filenameout) {
                                $p++;
                                $str_inf = "|" . $p . "|" . $date . "|" . $barcode . "|" . $summaoplaty . "|" . $summaoplaty1 . "|" . $summaoplaty2 . "|" . $bik . "|\r\n"; //���������� �� ������
                                $write = fwrite($fp, $str_inf); // ������ � ���� ����������
                            }
                        }
                        $p = 0;
                    }
                    fclose($fp);
                }
            }
        }
        if ($handle2 = opendir($dir_okna_nosign)) {
            while (false !== ($filename2 = readdir($handle2))) {
                if ($filename2 != "." && $filename2 != "..") {
                    for ($i = 0; $i < count($arr_itog); $i++) {
                        $summaoplaty = rub_sep($arr_itog[$i][2]);
                        $summaoplaty1 = rub_sep($arr_itog[$i][3]);
                        $summaoplaty2 = rub_sep($arr_itog[$i][4]);

                        $kod = substr($arr_itog[$i][1], 0, 3);
                        $filenameout = $kod . "_" . date("Ymd") . "_" . $nom_txt;

                        if ($filename2 == $filenameout) {
                            $fp = fopen($dir_okna_nosign . $filename2, "a"); // ��������� ���� � ������ ������
                            if ($fp) {
                                $str_itogo_summ = "�����|" . $summaoplaty . "|" . $summaoplaty1 . "|" . $summaoplaty2 . "|\r\n"; //����� �����                             
                                $write = fwrite($fp, $str_itogo_summ); // ������ � ���� ����������
                            }
                            fclose($fp);
                            log_file("Info    ������ ���� " . $filename2);
                        }
                    }
                }
            }
        }
    }
}

function rub_sep($summaoplaty) {
    if (array_search(".", array($summaoplaty)) == false) {
        $summaoplaty = $summaoplaty * 100;
        if (strlen($summaoplaty) == 1) {
            $summaoplaty = "0.0" . substr($summaoplaty, -2); //����� � ������
        } elseif (strlen($summaoplaty) == 2) {
            $summaoplaty = "0." . substr($summaoplaty, -2); //����� � ������
        } else {
            $summaoplaty = substr($summaoplaty, 0, -2) . "." . substr($summaoplaty, -2); //����� � ������
        }
        return $summaoplaty;
    } else {
        return $summaoplaty;
    }
}

?>