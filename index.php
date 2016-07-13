<?php
include "vendor/autoload.php";


class TestCallable
{
    public function isValid($input)
    {
        throw new Exception('ewew');
        return ($input == 1) ? true : false;
    }
}


$value2 = 1;
$validator = new \Sparta\Validators\Callback(
    [new TestCallable(), 'isValid']
);

if ($validator->isValid(1)) {
    echo 'valid';
} else {
    echo 'invalid';
}