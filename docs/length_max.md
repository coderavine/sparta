#LengthMax Validator
This validator can be used to ensure that the length of the given field does not exceed a specified maximum length.

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `LengthMax` validator supports the below option:

* `is`: specifies the required maximum length. It is a __required__ parameter and failing to provide this will result in an `InvalidValidatorArguments` exception.


## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:

### Example #1:
You can simply instantiate the `LengthMax` validator and pass to it the data that you want to validate. 


```php
<?php
use Sparta\Validators\LengthMax;

$validator = LengthMax(11);

if(!$validator->isValid('this is ten')){ 
	//handle errors
}
```

You can also specify the maximum value using the class setter method `setLength` as shown below:

```php
<?php
use Sparta\Validators\LengthMax;

$validator = LengthMax();
$validator->setLength(11);
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'password' => 'length_max:is=10',
];

//Assuming that your $data has an element with the key "password"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.

>__Note__: You can even write the rule in a shorter format as follows:
>
>```php
><?php
>
>$rules = [
>	'password' => 'length:10',
>];
>
>```

[**Back to Validators List**](./reference.md#validators-list)
