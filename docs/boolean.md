#Boolean Validator

This validator can be used to ensure that a given value contains only __boolean__ literals (i.e. __true__ or __false__).

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explainations:

## Example #1
You can simply instantiate the `Boolean ` validator and pass to it the data that you want to validate. 

```php
<?php
use Inspect\Validators\Boolean;

$validator = Boolean();

//Assuming that we have a variable called "$isMember"
if(!$validator->isValid($isMember)){ 
	//handle errors
}
```

## Example #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Inspect\Validation;

$rules = [
	'isMember' => 'boolean',
];

//Assuming we have a $data inputs collection that  
//has an element with the key "isMember"
$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
