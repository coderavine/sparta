#Length

This validator can be used to ensure that the length of a given value equals to the specified one including whitespace. 

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `Length` validator supports the below options:

* `is`: specifies the required string length. It is a required parameter and failing to provide this will result in an `InvalidValidatorArguments` exception.


## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

### Example #1:
You can simply instantiate the `Length` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Length;

$validator = Length(11);

if(!$validator->isValid('this is ten')){ 
	//handle errors
}
```
You can also set the __is__ value using validator setter methods `setLength`:
 
```php
<?php
use Sparta\Validators\Length;

$validator = Length();
$validator->setLength(11);

```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'password' => 'length:is=10',
];

//Assuming that your $data has an element with the key "password"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```
In case of validation failure, error messages can be retrieved using the `getErrors` method.

__Note__: You can even write the rule in a shorter format as follows:

```php
<?php

$rules = [
	'password' => 'length:10',
];

```
[**Back to Validators List**](./reference.md#validators-list)
