#InArray Validator

This validator can be used to ensure that a given value is contained in the provided array. 

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `InArray` validator supports the below option:

* `haystack`: determine the array that will be used to search for the field under validation. It is a __required__ parameter and failing to provide this will result in an `InvalidValidatorArguments` exception.
 

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:


## Example #1
You can simply instantiate the `InArray` validator and pass to it the data that you want to validate.

```php
<?php
use Sparta\Validators\InArray;

$validator = InArray([1,2,3,4]);

if(!$validator->isValid(3)){ 
	//handle errors
}
```
You can also set __haystack__ value using validator setter method `setHaystack`:

```php
<?php
use Sparta\Validators\InArray;

$validator = InArray();
$validator->setHaystack([1,2,3,4]);
if(!$validator->isValid(3)){ 
	//handle errors
}
```

## Example #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'needle' => 'in_array:haystack=validAnswers',
];

//Assuming that your $data has two elements with the key "needle" and "options"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```
In case of validation failure, error messages can be retrieved using the `getErrors` method.


>__Note__: You can write the rule in a shorter format by dropping the argument key as follows:
>
>```php
><?php
>
>$rules = [
>	'needle' => 'in_array:validAnswers',
>];
>
>```
[**Back to Validators List**](./reference.md#validators-list)
