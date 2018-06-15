<?php
$regExp = '/[а-яА-Я][0-9]{3}[а-яА-Я]{2}/u';
$text = 'а123аа';
$match = [];
if (preg_match($regExp, $text, $match) > 0) {
  echo "match";
}
else {
  echo "dismatch";
}
