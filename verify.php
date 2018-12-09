<?php
$access_token = '+RAgZsXSoIB12rh5ilBLg3BySGaIGHSvVROMcOJ9yw0B96H9VLORNgQs+a6Og5wS/MOplVEgqgYoVs5BosxYieMV5GGaOqnXhNrFje4NnnPhc04X57HVXsYDisV4JycZ2OovPF6jkSq6EHAN6xijpQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
