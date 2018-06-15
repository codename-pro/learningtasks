<?php
$mail = 'you+me@some.domain-domain.com';
$regEx = '/^[\w+]+@[\w\\.-]+$/';
$match = [];
echo $result = preg_match($regEx, $mail, $match);
echo "\n";
print_r($match);
