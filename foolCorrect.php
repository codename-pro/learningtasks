<?php
$text = 'Дурак, д у р а к';
$regEx = '/[дД]\s?[уУ|yY]\s?[рР|pP]\s?[аА|aA]\s?[кК|kK]/u';

echo $result = preg_replace($regEx, 'хороший', $text);
