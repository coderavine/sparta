# AlphaNum Validator 
This validator can be used to ensure that a given value contains only __numeric__ and __alphabetical__ characters.

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `AlphaNum` validator supports the below option:

* `allow_whitespace`: determines if whitespace characters are allowed or not. The default value is __false__.


## Usage
There are two different ways in which all __Sparta__ validators can be used. See below examples for more explanations:

### Example #1:
You can simply instantiate the `AlphaNum` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\AlphaNum;

$validator = AlphaNum();

if(!$validator->isValid('test123')){
	foreach($validator->errors as $error){
		echo $error;
	}
}
```

By default, __whitespace__ characters are not accepted as they are not part of the alphabet or number values. However, this can be enabled by passing the `allow_whitespace` option either through the validator constructor:

```php
$validator = AlphaNum(['allow_whitespace' => true]);
```

Or it can be configured via the validator setter method `enableWhitespace`:

```php
$validator->enableWhitespace();
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'username' => 'alpha_num:allow_whitespace',
];

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	// Get errors by using the method $validation->getErrors(); 
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.


[**Back to Validators List**](./reference.md#validators-list)
