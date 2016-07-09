#Between Validator 
This validator can be used to ensure that a given value falls within a specified range. 

[**Back to Validators List**](./reference.md#validators-list)

## Supported Options
The `Between` validator supports the below options:

* `min`: determines the minimum value of the range. It is a required parameter and failing to provide this will result in an `InvalidValidatorArguments` exception.

* `max`: determines the maximum value of the range. It is a required parameter and failing to provide this will result in an `InvalidValidatorArguments` exception.

* `inclusive`: determines if both min and max parameters will be included in the range or not. This is optional and the default value is __true__.


## Usage
There are two different ways in which all __Sparta__ validators can be used. See below examples for more explanations:

### Example #1
let us assume that you want to ensure that only users between the age of 18-100 can proceed with the registration process. To achieve this, you can instantiate the `Between` validator and as shown below:

```php
<?php
use Sparta\Validators\Between;

$validator = Between(['min' => 18, 'max' => 100]);

// Assuming you have a variable named $age
if(!$validator->isValid($age)){ 
	//handle errors
}
```
You can also both __min__ and __max__ values using validator setter methods `setMin` and `setMax`:
 
```php
<?php
use Sparta\Validators\Between;

$validator = Between();

$validator->setMin(18);
$validator->setMax(100);

// $age variable can be from $_POST
if(!$validator->isValid($age)){ 
	//handle errors
}
```

By default, both __min__ and __max__ values will included in the specified range. If both should be excluded, then you need to set the `inclusive` parameter to __false__. This can be done either via the validator constructor:

```php
$validator = Between(['min' => 18, 'max' => 100, 'inclusive' => true]);
```

Or it can be configured via the validator setter method `setInclusive`:

```php
$validator->setInclusive(true);
```

### Example #2
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Inspect\Validation;

$rules = [
	'age' => 'between:min=18,max=100,inclusive=true',
];
//Assuming that your $data has an element with the key "age"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}
```
In case of validation failure, error messages can be retrieved using the `getErrors` method.

__Note__: You can even write the rule in a shorter format as follows:

```php
<?php
use Inspect\Validation;

$rules = [
	'age' => 'between:18,100,true',
];

```

However, keep in mind that when using the short format, options should be passed in the above specified order (i.e., min, max, and then inclusive). Failing to do so will result in undesirable behaviors.


[**Back to Validators List**](./reference.md#validators-list)
