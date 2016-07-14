# Negative Validator 
This validator can be used to ensure that the given field is a __negative__ number.

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

### Example #1:
You can simply instantiate the `Negative` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Negative;

$validator = Negative();

if(!$validator->isValid(-100)){
	foreach($validator->errors as $error){
		echo $error;
	}
}
```


### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'negative_field' => 'negative',
];

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle erros
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.


[**Back to Validators List**](./reference.md#validators-list)
