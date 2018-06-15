<?php

error_reporting(-1);
mb_internal_encoding('utf-8');

$text = "Кажется, нас обнаружили! Надо срочно уходить отсюда, пока не поздно. Бежим же скорее!";
// Другие варианты для тестов
// $text = "Ну, прости меня! Не хотела я тебе зла сделать; да в себе не вольна была. Что говорила, что делала, себя не помнила.";
// $text = "Идет гражданская война. Космические корабли повстанцев, наносящие удар с тайной базы, одержали первую победу, в схватке со зловещей Галактической Империей.";

/* Делает первую букву предложения заглавной */
function makeFirstletterUppercase($text) {
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}

function makeYodaStyleText($text) {

    $result = '';

    $text = mb_strtolower($text);
    $textArray = preg_split('/(?<=([\\.\\?\\!]\\s))/ui', $text, 0, PREG_SPLIT_NO_EMPTY);
    $textArray = preg_replace('/[\\,]/ui', '', $textArray);
    $textArray = preg_replace('/[\\!]/ui', '.', $textArray);

    foreach ($textArray as &$value) {
      $value = preg_split('/[\s]/ui', $value, 0, PREG_SPLIT_NO_EMPTY);
      $value = array_reverse($value);
      $value = preg_replace('/[\\.]/ui', '', $value);
      $value = makeFirstletterUppercase(implode(" ", $value));
    }
    $result = implode(". ", $textArray).".";
    return $result;
}
$yodaText = makeYodaStyleText($text);
echo "Йода говорит: {$yodaText}\n";
