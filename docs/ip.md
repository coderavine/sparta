#IP Address Validator 

This validator can be used to ensure that a given value is a valid __IP__ address. 

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `Ip` validator supports the below options:



## Usage
There are two different ways in which all Inspect validators can be used. See below examples for more explainations:

### Example #1:
You can simply instantiate the `Ip` validator and pass to it the data that you want to validate. 


```php
<?php
use Inspect\Validators\Ip;

$validator = Ip();

if(!$validator->isValid('127.0.0.1')){ 
	//handle errors
}
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Inspect\Validation;

$rules = [
	'ip_address' => 'ip',
];

//Assuming that your $data has an element with the eye "ip_address"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)

