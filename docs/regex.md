#Regex Validator

This validator can be used to ensure that the given field under validation must match the given regular expression.

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

### Example #1:
You can simply instantiate the `Regex` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Regex;

$validator = Regex(['pattern' => '/\w{4}/']);

if(!$validator->isValid('cool')){ 
	//handle errors
}
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;
$data = ['word' => 'nice'];

$rules = [
	'word' => 'regex:format=/\w{4}/',
];

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
