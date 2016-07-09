![Sparta Logo](docs/logo.png)

#Introduction

__Sparta__ is a simple, elegant, and easy to use stand-alone PHP library for effortless inputs validation. Sparta uses simple, straightforward validation techniques that attempt to take the pain out of development by easing common validation tasks used in the majority of web projects. If you are looking  for implementing reliable, effective, quick validations and a library that can be extended easily to fit your needs, then __Sparta__ is definitely for you.


#Installation

You can install and update __Sparta__ library using [Composer](https://getcomposer.org/ "Composer"):

```
composer require coderavine/sparta
```


#Usage
Sparta validation can be used in two different ways. Below are various examples that explain both:


 
* You can simply use a validator class to validate a certain type of data. For example, if you have a date and you want to ensure that only a date and nothing else is provided by end users, then you can do something as follows:

```php
<?php
use Sparta\Validators\Date; 
	    
$dateValidator = new Date();  
if(!$dateValidator->isValid('2007-01-01')){
	//Error messages can be simply retrieved using "errors" method
	$errors = $dateValidator->errors();
}
```


* Another alternative way is to use the __Validation__ class that accepts the data to be validated along with a list of defined rules for each attributes and let it do the heavy lifting for you. A simple example that explains this is given below:

Let us assume that we have an account registration option in our web-based application and we want to enforce the below rules for the __username__ field:
   	 
1. It __must__ be a `required` field 
2. It __must__ only contain `alphabetic` characters
3. It __must__ have a `minimum` and `maximum` length of 12 and 50 respectively
    
To achieve this, we first need to define our validation rules for the __username__ as follows:
    
```php
<?php
	//We define our rules for the username field as specified above
	$rules = [
		'username' => 'required|alpha|length_min=12,length_max=50',
	];
```
    
After that, we need to ensure that the username field content is available in our user's input collection:
    
```php
<?php

$data = [
	//This could be coming from $_POST, $_GET,etc.,
	'username => 'JohnDoe', 
];
```
    
Then, we can simply run the validation by passing both data and rules to the __Validation__ object to handle the validation for us as follows:
    
```php
<?php
use Sparta\Validation;
    
$validation = new Validation($data,$rules);
if(!$validation->isValid()){
	//Get error messages and manipulate them however you want
	$validation->getErrors();
 }
```


#Documentation
Please refer to the [usage section](https://coderavine.github.io/sparta/index.html) for more information

#Contributions

Contributing your PHP love to __Sparta__ is always more than welcome via a __Pull Request__. Please refer to [Contribution Policy](docs/contributions.md)


#License
The Sparta Validation is open-sourced library licensed under the [**MIT**](https://opensource.org/licenses/MIT) license



