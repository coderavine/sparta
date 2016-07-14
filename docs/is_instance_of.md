#IsInstanceOf Validator

This validator can be used to determine whether a given object is an instance of a specific class or interface. 

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `IsInstanceOf` validator supports the below option:

* `class`: Defines the fully-qualified class name which objects must be an instance of.


## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanations:


### Example #1:
You can simply instantiate the `IsInstanceOf` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\IsInstanceOf;

$validator = IsInstanceOf('Sparta\Validators\Alpha');

if(!$validator->isValid(new Sparta\Validators\Alpha())){ 
	//handle errors
}
```
You can also set the __class__ value using validator setter method `setClass`:
 
```php
<?php
use Sparta\Validators\IsInstanceOf;

$validator = IsInstanceOf();
$validator->setClass('Sparta\Validators\Alpha');

```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'object' => 'is_instance_of:class=Sparta\Validators\Alpha',
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
>	'password' => 'is_instance_of:Sparta\Validators\Alpha',
>];
>
>```
[**Back to Validators List**](./reference.md#validators-list)
