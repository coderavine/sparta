#Validation Rules

__Sparta__ has a simple rule's syntax that can be defined in two different ways. Here are the explanations of both:

###Option 1:

The default syntax is to build your rule as string using various delimiters to denote the different parts (i.e., __validator__, __arguments__, and __arguments values__). A single attribute rule can be writting as follows:
		
```	
'attribute_name' => 'rule1 : argument1 = value1 , argument2 = value2 | rule2 | ....' 
```

### <a name="rule-syntax-explaination"></a>Rule's Syntax

The following list providers a brief description of each rule segment:

* `attribute_name`: Name of the field to be validated as defined in your input collection 
* `rule1`: Rule name in lowercase (e.g. __alpha, email, required,...etc.__)  
* `:`: Default delimiter used to separate a given rule and its arguments
* `argument1`: Argument name to be passed to the validator 
* `=`:  Default delimiter used between an argument and its value 
* `value1`: Argument's value  
* `,`:Default delimiter used between multiple arguments
* `|`:Default delimiter used between multiple rules
* `rule2`:Other rule name 
       	      
A simple example that illustrates the usage of this syntax option is given below:
	
```php
<?php
$rules = [
	'username' 		=> 'required|alpha_num|length_min=12,length_max=50',
	'email_address' => 'required|email'
];
```


###Option 2:

Alternatively, a rule can be built using a simple array syntax as follows:


```php
<?php
$rules = [
	'username' 		=> [
		'required',
		'alpha',
		'length_min=12',
		'length_max=50',
	]
	'email_address' => [
		'required',
		'email'
	]
];
```

#<a name="validators-list"></a>Predefined Validators List

Sparta comes with the below out of the box validators:

* [**Alpha**](./alpha.md): a field must contain only alphabetic characters
* [**AlphaNum**](./alpha_num.md): a filed must contain only number and alphabetic character
* [**Between**](./between.md): a number falls within specified range
* [**Boolean**](./boolean.md): a field must be boolean
* [**Contains**](./contains.md): a field contains a given value
* [**Date**](./date.md): a field must be a valid date
* [**Email**](./email.md): a field must be a valid email address
* [**Equals**](./equals.md): a field must be equal to the specified value
* [**Even**](./equals.md): a field must be an even number
* [**FloatNumber**](./float_num.md): a field must be a float number
* [**InArray**](./in_array.md): a field is contained in the given array
* [**Integer**](./integer.md): a field must be a valid integer number
* [**Ip**](./ip.md): a field must be a valid IP address
* [**IsArray**](./is_array.md): a field must be a valid array 
* [**IsInstanceOf**](./is_instance_of.md): a field must be an instance of given reference/value
* [**Json**](./json.md): a field must be a valid JSON 
* [**Length**](./length.md): a field length must be equal to the given length
* [**LengthMax**](./length_max.md): a field length must not exceed the given length
* [**LengthMin**](./length_min.md): a field length must not be less than the given length
* [**Negative**](./length_min.md): a field must be a negative number
* [**NotEmpty**](./not_empty.md): a field must not be empty
* [**Numeric**](./numeric.md): a field must contain only numeric characters
* [**Odd**](./odd.md): a field must be an odd number
* [**Positive**](./positive.md): a field must a positive number  
* [**Required**](./required.md): a field must be present and cannot be empty  
* [**Slug**](./slug.md): a field must be a valid URL slug 
* [**Url**](./url.md): a field must be a valid URL

However, this does not mean that we are only limited to this list. In fact, adding new validators is a breeze. To learn more about creating new validators, please refer to the [contributions section](contributions.md") 




