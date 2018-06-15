<?php
/*
*Дан неграмотно написанный текст, состоящий из нескольких предложений на русском языке. Ошибки заключаются в неправильной *расстановке пробелов и отсутствии заглавных букв. Исправь текст так, чтобы все предложения в нем начинались с большой буквы,
*а после знаков запятая, точка, точка с запятой, двоеточие, восклицательный и вопросительный знак стоял ровно один пробел (а *перед ними — ни одного). Составные знаки вроде многоточия или 2 вопросительных знаков подряд должны сохраняться.
1. Лишние пробелы;
2. Предложения с большой буквы;
3. После знаков запятая, точка, точка с запятой, двоеточие, восклицательный и вопросительный знак стоял ровно один пробел (а *перед ними — ни одного).
4. Составные знаки вроде многоточия или 2 вопросительных знаков подряд должны сохраняться.
*/
error_reporting(-1);
mb_internal_encoding('utf-8');

$text = "ну что.      не смотрел еще black mesa.я собирался скачать  ,но все как-то некогда было.";
// Для тестов
// $text = 'roses are red,and violets are blue.whatever you do i'll keep it for you.';
// $text = 'привет.есть 2 функции,preg_split и explode ,не понимаю,в чем между ними разница.';

/* Делает первую букву в строке заглавной */
function makeFirstLetterUppercase($text) {
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);  /* .... */
}

/* исправляет текст */
function fixText($text) {

  $text = makeFirstLetterUppercase($text);

  $textArray = preg_split('/((?<=[.?!]))/ui', $text, 0, PREG_SPLIT_NO_EMPTY);
  foreach ($textArray as $value) {
    $textArray = trim($value);
    echo $valueFix[] = makeFirstLetterUppercase($textArray);
    echo "\n";
  }
  $text = implode($valueFix);


  $reg_all_space = '/\\s+/'; // лишние пробелы
  $reg_ucfirst = '/([.])(\\s?)([а-яёА-Я-Ё])/u'; // заглавная буква после точки
  $reg_post_space = '/([\\,\\.\\;\\:\\!\\?])([\\s]*)/u'; // пробел после знаков пунктуации
  $reg_pre_space = '/([\\s]+)([\\,\\.\\;\\:\\!\\?])/u'; // пробел перед знаком пунктуации

  $text = preg_replace($reg_all_space, ' ', $text);
  $text = preg_replace($reg_post_space, '$1 ', $text);
  $text = preg_replace($reg_pre_space, '$2', $text);

  /* if (preg_match_all($reg_ucfirst, $text, $match)) {
    foreach ($match[0] as &$value) {
      echo $value = mb_strtoupper($value);
      echo "\n";
    }
  }
  */


  return $text;
}

//$result = fixText($text);
//echo "{$result}\n";
echo fixText($text);
