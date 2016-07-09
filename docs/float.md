#FloatNumber

This validator can be used to ensure that a given value is a __float__ number. 

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Inspect validators can be used. See below examples for more explainations:

## Example #1
You can simply instantiate the `FloatNumber` validator and pass to it the data that you want to validate.

```php
<?php
use Inspect\Validators\FloatNumber;

$validator = FloatNumber();

if(!$validator->isValid('9.8')){ 
	//handle errors
}
```

## Example #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Inspect\Validation;

$rules = [
	'number' => 'float_number',
];

//Assuming that your $data has two elements with the key "number"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```
In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
