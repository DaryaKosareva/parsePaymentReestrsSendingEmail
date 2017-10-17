<?php

/* conf.php
  .-------------------------.
  |                         |
  |  ���������������� ����  |
  |                         |
  '-------------------------'
 */

/*
 * ��������
 */

//������� ��� log-������
$dir_log = "C:/wamp/www/sb/log/";

//������� ��� ��������������� ���������� ���� �������� �� ��������� ����� Sber.Buh@tatar.ru
$dir_att = "C:/WORK/attachment/";

//������� ��� �������� �������� ����� ��
$dir_us = "C:/WORK/ReestrsSberbankUs/";
$dir_us_sign = $dir_us . "Sign/"; //c ��� 
$dir_us_nosign = $dir_us . "NoSign/"; //��� ���
//������� ��� �������� �������� ����� ������������ ����
$dir_okna = "C:/WORK/ReestrsSberbankOkna/";
$dir_okna_sign = $dir_okna . "Sign/"; //c ��� 
$dir_okna_nosign = $dir_okna . "NoSign/"; //��� ���
//������� ��� ������ ������
$dir_other = "C:/WORK/othersFile/";

/*
 * ������� ���
 */

//������ �������� ��� � email ��� �������� �������� ��� ���
$cod_tbl_name1 = 5001;
$cod_tbl_name2 = 5002;
$cod_tbl_name3 = 5003;
$cod_tbl_name4 = 5004;
$filial = array(
    "02" => "��� �11 ���� ��� ������ ��;164402001;$cod_tbl_name1;Uslugi.002@tatar.ru,Uslugi.007@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "07" => "��� �11 ���� ��� ������ ��;164402001;$cod_tbl_name1;Uslugi.007@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "13" => "��� �11 ���� ��� ������ ��;164402001;$cod_tbl_name1;Uslugi.013@tatar.ru,Uslugi.007@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "29" => "��� �11 ���� ��� ������ ��;164402001;$cod_tbl_name1;Uslugi.029@tatar.ru,Uslugi.007@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "43" => "��� �11 ���� ��� ������ ��;164402001;$cod_tbl_name1;Uslugi.043@tatar.ru,Uslugi.007@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "48" => "��� �11 ���� ��� ������ ��;164402001;$cod_tbl_name1;Uslugi.048@tatar.ru,Uslugi.007@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "51" => "��� �11 ���� ��� ������ ��;164402001;$cod_tbl_name1;Uslugi.051@tatar.ru,Uslugi.007@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "55" => "��� �11 ���� ��� ������ ��;164402001;$cod_tbl_name1;Uslugi.055@tatar.ru,Uslugi.007@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "03" => "��� �5 ���� ��� ������ ��;163202001;$cod_tbl_name2;Uslugi.003@tatar.ru,Uslugi.032@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "05" => "��� �5 ���� ��� ������ ��;163202001;$cod_tbl_name2;Uslugi.005@tatar.ru,Uslugi.032@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "06" => "��� �5 ���� ��� ������ ��;163202001;$cod_tbl_name2;Uslugi.006@tatar.ru,Uslugi.032@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "31" => "��� �5 ���� ��� ������ ��;163202001;$cod_tbl_name2;Uslugi.031@tatar.ru,Uslugi.032@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "32" => "��� �5 ���� ��� ������ ��;163202001;$cod_tbl_name2;Uslugi.032@tatar.ru,Uslugi.032@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "37" => "��� �5 ���� ��� ������ ��;163202001;$cod_tbl_name2;Uslugi.037@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "41" => "��� �5 ���� ��� ������ ��;163202001;$cod_tbl_name2;Uslugi.041@tatar.ru,Uslugi.032@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "01" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.001@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "04" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.004@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "26" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.026@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "27" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.027@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "28" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.028@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "30" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.030@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "36" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.036@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "39" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.039@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "47" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.047@tatar.ru,Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "52" => "����������� ������ �8 ���� ��� ������ ��;165002001;$cod_tbl_name3;Uslugi.052@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "08" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.008@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "09" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.009@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "10" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.010@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "12" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.012@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "14" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.014@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "15" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.015@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "16" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.016@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "17" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.017@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "21" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.021@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "22" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.022@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "23" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.023@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "24" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.024@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "33" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.033@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "34" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.034@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "35" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.035@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "38" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.038@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "40" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.040@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "49" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.049@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "50" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.050@tatar.ru,Uslugi.buh@tatar.ru;049205603",
    "54" => "���� ���;165701001;$cod_tbl_name4;Uslugi.BuhKaz@tatar.ru,Uslugi.054@tatar.ru,Uslugi.buh@tatar.ru;049205603");

//������ ����� ������������� �� ����� ��������
$filial_kod = array("001", "002", "003", "004", "005", "006", "007", "008", "009", "010", "012", "013", "014", "015", "016", "017", "021", "022", "023", "024", "026", "027", "028", "029", "030", "031", "032", "033", "034", "035", "036", "037", "038", "039", "040", "041", "043", "047", "048", "049", "050", "051", "052", "054", "055", "101", "102", "103", "104", "105", "106", "107", "108", "109", "110", "112", "113", "114", "115", "116", "117", "121", "122", "123", "124", "126", "127", "128", "129", "130", "131", "132", "133", "134", "135", "136", "137", "138", "139", "140", "141", "143", "147", "148", "149", "150", "151", "152", "154", "155", "201", "202", "203", "204", "205", "206", "207", "208", "209", "210", "212", "213", "214", "215", "216", "217", "221", "222", "223", "224", "226", "227", "228", "229", "230", "231", "232", "233", "234", "235", "236", "237", "238", "239", "240", "241", "243", "247", "248", "249", "250", "251", "252", "254", "255", "301", "302", "303", "304", "305", "306", "307", "308", "309", "310", "312", "313", "314", "315", "316", "317", "321", "322", "323", "324", "326", "327", "328", "329", "330", "331", "332", "333", "334", "335", "336", "337", "338", "339", "340", "341", "343", "347", "348", "349", "350", "351", "352", "354", "355", "401", "402", "403", "404", "405", "406", "407", "408", "409", "410", "412", "413", "414", "415", "416", "417", "421", "422", "423", "424", "426", "427", "428", "429", "430", "431", "432", "433", "434", "435", "436", "437", "438", "439", "440", "441", "443", "447", "448", "449", "450", "451", "452", "454", "455");


/*
 * ������
 */

//������, �����/������, email
$server = "mail.tatar.ru";
$login = "Sber.Buh";
$password = "999Buh%Ye";
$email_bti = "Sber.Buh@tatar.ru"; //email ��� �������� �������� � ���
?>