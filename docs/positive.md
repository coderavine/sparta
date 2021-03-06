# Positive Validator 
This validator can be used to ensure that the given field is a __positive__ number.

[**Back to Validators List**](./reference.md#validators-list)

## Usage

There are two different ways in which all Sparta validators can be used. See below examples for more explanations:


### Example #1:
You can simply instantiate the `Positive` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Positive;

$validator = Positive();
if(!$validator->isValid('total')){
//Handle errors
}
```


### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'total' => 'positive',
	//other rules if any
];

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle erros
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.


[**Back to Validators List**](./reference.md#validators-list)
