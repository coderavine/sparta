#Callback Validator

This validator can be used to create your own custom validator using `callback`.


[**Back to Validators List**](./reference.md#validators-list)

## Usage
You can simply instantiate the `Callback` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Callback;

class TestValidatorViaCallback
{
    public function isValid($input)
    {
        return ($input == 1) ? true : false;
    }
}

$validator = new \Sparta\Validators\Callback(
    [new TestValidatorViaCallback(), 'isValid']
);

if ($validator->isValid(1)) {
    echo 'valid';
} else {
    echo 'invalid';
}
```

[**Back to Validators List**](./reference.md#validators-list)
