<?php
error_reporting(-1);
mb_internal_encoding('utf-8');
$input = '243+6743-78*2=';
$inputLength = mb_strlen($input);

$number = 0; // Текущее число, которое набирает пользователь;
$result = 0; // Результат предыдущих действий
$op = ''; // Предыдущая операция (+ - *)
$digit = '';

for ($i = 0; $i < $inputLength; $i++) {
    $char = mb_substr($input, $i, 1);
    if ($char == '*' || $char == '+' || $char == '-' || $char == '=' || $char == '/') {
        $number = floatval($digit);

        if ($op == '*') {
          $result *= $number;
        }

        if ($op == '+') {
          $result += $number;
        }

        if ($op == '-') {
          $result -= $number;
        }

        if ($op == '/') {
          $result /= $number;
        }

        echo "op=[{$op}] result=[{$result}] number=[{$number}] char[{$char}] \n";

        if ($result == 0) {
          $result = $number;
        }
        $op = $char;
        $digit = '';

        if ($char == "=") {
          echo "Ответ: {$input}{$result}";
        }

    } elseif (is_numeric($char)) {
        $digit .= $char;
        //echo "digit: {$number} \n";
        $number = $number * 10 + intval($char);
    } else {
      echo "Неверный символ: {$char} \n";
    }
}
