<?php
include "vendor/autoload.php";

use Sparta\Validation;
$data = ['word' => 'nice'];

$rules = [
    'word' => 'regex:format=/\w{4}/',
];

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
    echo 'invalod';
}else{
    echo 'valid';
}