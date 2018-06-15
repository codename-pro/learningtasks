<?php
//https://3v4l.org/psi7R
// Staring straight up into the sky ... oh my my
error_reporting(-1);
mb_internal_encoding('utf-8');

/* Делает первую букву заглавной*/
function makeFirstLetterUppercase($text) {
  return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1, NULL);
}

/* Возвращает соответствующую числу форму слова: 1 рубль, 2 рубля, 5 рублей */
function inclineWord($number, $word1, $word2, $word5) {
   $exception = $number;
   $number %= 10;

   if (($number == 1) && ($exception != 11)) {
     return $word1;
   } elseif (($number >= 2) && ($number <= 4) && (($exception <= 10) || ($exception >= 15))) {
     return $word2;
   } else {
     return $word5;
   }
}


/*
    Преобразует числа от 0 до 999 в текст. Параметр $isFemale равен нулю,
    если мы считаем число для мужского рода (один рубль),
    и 1 — для женского (одна тысяча)
*/
function smallNumberToText($number, $isFemale) {

    $spelling = array(
        0   =>  'ноль',                                     10  =>  'десять',       100 =>  'сто',
        1   =>  'один',         11  =>  'одиннадцать',      20  =>  'двадцать',     200 =>  'двести',
        2   =>  'два',          12  =>  'двенадцать',       30  =>  'тридцать',     300 =>  'триста',
        3   =>  'три',          13  =>  'тринадцать',       40  =>  'сорок',        400 =>  'четыреста',
        4   =>  'четыре',       14  =>  'четырнадцать',     50  =>  'пятьдесят',    500 =>  'пятьсот',
        5   =>  'пять',         15  =>  'пятнадцать',       60  =>  'шестьдесят',   600 =>  'шестьсот',
        6   =>  'шесть',        16  =>  'шестнадцать',      70  =>  'семьдесят',    700 =>  'семьсот',
        7   =>  'семь',         17  =>  'семнадцать',       80  =>  'восемьдесят',   800 =>  'восемьсот',
        8   =>  'восемь',       18  =>  'восемнадцать',     90  =>  'девяносто',     900 =>  'девятьсот',
        9   =>  'девять',       19  =>  'девятнадцать'
    );

    if (($isFemale == 1) || ($isFemale == 2))  {
      $spelling[1] = 'одна';
      $spelling[2] = 'две';
    }

    $firstDigit = floor($number / 100) * 100; // Получаем кол-во сотен (900 из числа 985)
    $middleDigit = floor(($number % 100) / 10) * 10; // Получаем ко-во десятков (80 из числа 985)
    $lastDigit = $number % 10; // Получаем кол-во единиц (5 из числа 985)

    if ($firstDigit != 0) {
      $text[] = $spelling[$firstDigit];
    }

    if (($middleDigit != 0) && ($middleDigit >= 20)) {
      $text[] = $spelling[$middleDigit];
    } elseif (($middleDigit != 0) && ($middleDigit <= 19)) {
      $text[] = $spelling[$middleDigit + $lastDigit];
      $lastDigit = 0;
    }
    if ($lastDigit != 0) {
        $text[] = $spelling[$lastDigit];
      }

      return implode($text, ' ');
  }

function numberToText($number) {
    $millions = floor($number / 1000000); //Получаем кол-во миллионов (99 из 99965985);
    $thousands = floor(($number % 1000000) / 1000); //Получаем кол-во тысяч (965 из числа 99965985)
    $hundreds = $number % 1000; //Получаем кол-во тысяч (965 из числа 99965985)

    if($millions != 0) {
      $text[] = smallNumberToText($millions, 0) . inclineWord($millions % 10, ' миллион', ' миллиона', ' миллионов');
    }

    if ($thousands != 0) {
      $text[] = smallNumberToText($thousands, $thousands % 10) . inclineWord($thousands % 10, ' тысяча', ' тысячи', ' тысяч');
    }

    if ($hundreds != 0) {
      $text[] = smallNumberToText($hundreds, 0) . inclineWord($hundreds, ' рубль', ' рубля', ' рублей');
    }

    if ($number == 0) {
      $text[] = '0 рублей';
    }

    $text = makeFirstLetterUppercase(implode($text, ' ') . " ({$number})");

    return $text;
}

/* Вызовем функцию несколько раз */
$amount1 = mt_rand(1,99999999);
$text1 = numberToText($amount1);

echo "На вашем счету {$text1}\n";

$amount2 = mt_rand(1,99999999);
$text2 = numberToText($amount2);

echo "На вашем счету {$text2}\n";

$amount3 = mt_rand(1,99999999);
$text3 = numberToText($amount3);

echo "На вашем счету {$text3}\n";

$amount4 = mt_rand(1,99999999);
$text4 = numberToText($amount4);

echo "На вашем счету {$text4}\n";
