<?php
include __DIR__.'/vendor/autoload.php';

$jwt = new Naux\JWT('secret');

$data = [ 'iss' => 1, 'exp' => 1450539234 ];
$token = $jwt->encode($data);

var_dump($jwt->decode($token) == $data);
