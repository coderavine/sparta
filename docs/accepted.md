#Accepted Validator

This validator can be used to ensure that the field under validation must be yes, on, 1, or true. For example, this is useful for validating "Terms of Agreement" acceptance filed.

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

## option #1
You can simply instantiate the `Accepted` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Accepted;

$validator = Accepted();

//Assuming that we have a field named $term_of_acceptance
if(!$validator->isValid($term_of_service)){ 
	//handle errors
}
```

## option #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'term_of_service' => 'accepted',
];

//Assuming that your $data has an element with the key "term_of_service"
$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.


[**Back to Validators List**](./reference.md#validators-list)
