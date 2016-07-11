#Equals Validator

This validator can be used to ensure that two values are matching (e.g. __password__ and __confirm_password__). 

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `Equals` validator supports the below options:

* `to`: determines the element that our check value should be matching. It is a required parameter and failing to provide this will result in an `InvalidValidatorArguments` exception.
 

## Usage
There are two different ways in which all Inspect validators can be used. See below examples for more explainations:

## Example #1
You can simply instantiate the `Equals` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Equals;

//Assuming that we have two variables called 
//$password and $passwordConfirm
$validator = Equals(['to' => $passwordConfirm ]);

if(!$validator->isValid($password)){ 
	//handle errors
}
```

## Example #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'password' => 'equals:to=passwordConfirm',
];

//Assuming that your $data has two elements "password"
//and "confirmPassword"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```
In case of validation failure, error messages can be retrieved using the `getErrors` method.

__Note__: You can even write the rule in a shorter format as follows:

```php
<?php
use Sparta\Validation;

$rules = [
	'password' => 'equals:passwordConfirm',
];

```

[**Back to Validators List**](./reference.md#validators-list)
