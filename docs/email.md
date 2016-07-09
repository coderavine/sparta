#Email Validator

This validator can be used to ensure that a given value is a valid email. 

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Inspect validators can be used. See below examples for more explainations:

## option #1
You can simply instantiate the `Email` validator and pass to it the data that you want to validate. 

```php
<?php
use Inspect\Validators\Email;

$validator = Email();

if(!$validator->isValid('foo@bar.com')){ 
	//handle errors
}
```

## option #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Inspect\Validation;

$rules = [
	'email_address' => 'email',
];

//Assuming that your $data has an element with the key "email_address"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.


[**Back to Validators List**](./reference.md#validators-list)
