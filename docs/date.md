#Date Validator

This validator can be used to ensure that a given value is a valid date.

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `Date` validator supports the below options:

* `format`: determines the date format to use during the validation. It is an optional parameter and __'Y-m-d'__ is used by default.

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

## Example #1
You can instantiate the validator directly and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Date;

$validator = Date();

if(!$validator->isValid('2016-01-01')){ 
	//handle errors
}
```

If you would like to use another date format, then this can be configured either via the validator constructor method:

```php
$validator = Date(['format' => 'm/d/Y']);
```

Or via the validator setter `SetFormat` method:

```php
$validator->setFormat('m/d/Y');
```



## Example #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'birthdate' => 'date',
];

//Assuming that your $data has an element with the key "birthdate"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```
In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
