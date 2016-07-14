#Contains Validator

This validator can be used to check if a given value is contained in another one. In addition, it can be also used to determine if a given array has the specified element.

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `Alpha` validator supports the below option:

* `needle`: determines the __field__/__value__ to look for. It is a __required__ parameter and failing to provide this will result in an `InvalidValidatorArguments` exception.


## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

## Example #1
You can instantiate the `Contains` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Contains;

//Searching for a specific sub string/word example
$validator = Contains('stupid');
if(!$validator->isValid('This is a stupid person')){ 
	//handle errors
}

//Searching for an element in a given array example
$arrayValidator = Contains('foo');
if(!$validator->isValid(['foo','bar'])){ 
	//handle errors
}


```
You can also set the value of the `needle` option using the validator setter method `setNeedle`:

```php
<?php
use Sparta\Validators\Contains;

$validator = Contains();
$validator->setNeedle('stupid');

//$sentence variable can be from $_POST
if(!$validator->isValid($sentence)){ 
	//handle errors
}
```

## Example #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'title' => 'contains:needle=test',
];

//Assuming that your $data has an element with the key "title"

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
>use Sparta\Validation;
>
>$rules = [
>	'title' => 'contains:test',
>];
>
>```

[**Back to Validators List**](./reference.md#validators-list)
