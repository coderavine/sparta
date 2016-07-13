#Url Validator

[**Back to Validators List**](./reference.md#validators-list)

This validator can be used to ensure that the given value is a valid __URL__. 

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

### Example #1:
You can simply instantiate the `Url` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Url;

$validator = Url();

if(!$validator->isValid('http://www.google.com')){ 
	//handle errors
}
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'avatarLink' => 'url',
];

//Assuming that your $data has an element with the key "link"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```


In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
