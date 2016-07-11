<?php
include "vendor/autoload.php";

$validation = new \Sparta\Validators\Callback(
    function ($value) {
        return is_string($value);
    }
);
if ($validation->isValid(22)) {
    echo 'valid';
} else {
    echo 'invalid';
}
