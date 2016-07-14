#Timezone Validator
This validator can be used to ensure that the given field must be a valid `timezone` identifier according to the `timezone_identifiers_list` PHP function

[**Back to Validators List**](./reference.md#validators-list)


## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

### Example #1:
You can simply instantiate the `Timezone` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Timezone;

$validator = Timezone();

if(!$validator->isValid('Asia/Colombo')){ 
	//handle errors
}
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'locale_timezoen' => 'timezone',
];

//Assuming that your $data has an element with the key "locale_timezoen"
$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```


In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
