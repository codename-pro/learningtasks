<?php
$text = "«Grammar Nazi». Напиши скрипт, проверяющий текст на наличие злостных ошибок:\n
нет пробела после запятой,точки с запятой;восклицательного!знака, \n
вопросительного?знака, двоеточия:«жы» или «шы» написано с буквой ы.\n
в тексте есть слово «координально» или «зделал», «зделаю», «зделан»\n
в тексте есть слова «а» или «но» без запятой после них например а или но даже.\n";

$reg_check1 = '/(здел)(ал|аю|ан)/iu';
$reg_check2 = '/([\,\;\!\?\:])([\w])/ui';
$reg_check3 = '/([ж|ш])ы/ui';
$reg_check4 = '/(координально)/ui';
$reg_check5 = '/(\w+)(\s+)(но|а)(\s+)/ui';


if (preg_match_all($reg_check1, $text, $out)) {
  foreach ($out[0] as $value) {
    echo "Найдено: {$value}\n";
  }
};
echo "\n";
if (preg_match_all($reg_check2, $text, $out_two)) {
  foreach ($out_two[0] as $value) {
    echo "Найдено: {$value}\n";
  }
}
echo "\n";
if (preg_match_all($reg_check3, $text, $out_three)) {
  foreach ($out_three[0] as $value) {
    echo "Найдено: {$value}\n";
  }
}
echo "\n";
if (preg_match_all($reg_check4, $text, $out_four)) {
  foreach ($out_four[0] as $value) {
    echo "Найдено: {$value}\n";
  }
}
echo "\n";

if (preg_match_all($reg_check5, $text, $out_five)) {
  foreach ($out_five[0] as $value) {
    echo "Найдено: {$value}\n";
  }
}

//echo $check2 = preg_replace($reg_chek2, '$1 $2', $text);
//echo $text = preg_replace($check1, 'сдел$2', $text1);
