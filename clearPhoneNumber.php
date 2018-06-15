<?php
$input = '+7(812)6786767';
$regExp = '/(8)[\d]{10}/';

if (preg_match($regExp, $input)) {
  echo "good\n";
}
else {
  echo "wrong\n";
}

$phone_number = preg_replace('/^\\+7/', '8', $input);
$phone_number = preg_replace('/[\\D]+/', '', $phone_number);
print_r($phone_number);
