#Numeric Validator 

This validator can be used to ensure that the given value is numeric. 

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Inspect validators can be used. See below examples for more explainations:

### Example #1:
You can simply instantiate the `Numeric` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Numeric;

$validator = Numeric();

if(!$validator->isValid(122.33)){ 
	//handle errors
}
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'temperature' => 'numeric',
];

//Assuming that your $data has an element with the key "temperature"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
