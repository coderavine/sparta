#Slug Validator

This validator can be used to ensure that the given value is a valid __slug__. If you don't know what a slug is, kindly read about it [here](https://en.wikipedia.org/wiki/Slug "Slug Background")

[**Back to Validators List**](./reference.md#validators-list)

## Usage
There are two different ways in which all Sparta validators can be used. See below examples for more explanation:

### Example #1:
You can simply instantiate the `Slug` validator and pass to it the data that you want to validate. 

```php
<?php
use Sparta\Validators\Slug;

$validator = Slug();

if(!$validator->isValid('This-is-Slug')){ 
	//handle errors
}
```

### Example #2:
You can build your validation rules and pass it to the __Validation__ object to handle as shown below:

```php
<?php
use Sparta\Validation;

$rules = [
	'articleSlug' => 'slug',
];

//Assuming that your $data has an element with the key "title_slug"

$validation = new Validation($data, $rules);
if(!$validation->isValid()){
	//handle errors
}

```

In case of validation failure, error messages can be retrieved using the `getErrors` method.

[**Back to Validators List**](./reference.md#validators-list)
