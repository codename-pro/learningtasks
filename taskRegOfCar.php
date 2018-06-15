<?php
$text = 'а123в1>';
$regEx = '/[а-яА-Я]\d{3}[а-яА-Я]{2}/';


$match = [];
if(preg_match($regEx, $text, $match) > 0)  {
  echo "Верно";
}

print_r($match[0]);
