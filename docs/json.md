#Json Validator

This validator can be used to ensure that a given value is valid __Json__ format. 

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

### Example #1:
You can simply instantiate the `Json` validator and pass to it the data that you want to validate.

```php
<?php
use Sparta\Validators\Json;

$validator = Json();

if(!$validator->isValid('{"a":1,"b":2,"c":3,"d":4,"e":5}')){ 
	//handle errors
}
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'data_load' => 'json',
];

//Assuming that your $data has an element with the key "data_load"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```
In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
