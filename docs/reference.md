#Validation Rules

__Sparta__ has a simple rule's syntax that can be defined in two different ways. Here are the explanations of both:

###Option 1:

The default syntax is to build your rule as string using various delimiters to denote the different parts (i.e., __validator__, __arguments__, and __arguments values__). A single attribute rule can be written as follows:
		
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
	'username' 		=> 'required|alpha_num|min:12|max:50',
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
		'length_min:12',
		'length_max:50',
	]
	'email_address' => [
		'required',
		'email'
	]
];
```

#<a name="validators-list"></a>Predefined Validators List

Sparta comes with the below out of the box validators:

* [**Accepted**](./accepted.md): a field must be `yes`, `on`, `1`, or `true`.
* [**Alpha**](./alpha.md): a field must contain only `alphabetic` characters.
* [**AlphaNum**](./alpha_num.md): a field must contain only `numerical` and `alphabetic` characters.
* [**Between**](./between.md): a field must be a number that falls within the `specified range`.
* [**Boolean**](./boolean.md): a field must be `boolean`.
* [**Callback**](./callback.md): use this to add your custom validations using a valid `callback`.
* [**Contains**](./contains.md): a field must contain another given value.
* [**Date**](./date.md): a field must be a valid `date`.
* [**Different**](./different.md): a field must have a different value than the other given field.
* [**Email**](./email.md): a field must be a valid `email` address.
* [**Equals**](./equals.md): a field must be `equal` to the specified other specified value.
* [**Even**](./equals.md): a field must be an `even` number.
* [**FloatNumber**](./float_num.md): a field must be a `float` number.
* [**In**](./in_array.md): an alias of the validator `InArray`
* [**InArray**](./in_array.md): a field must be contained in the given `array`
* [**Integer**](./integer.md): a field must be a valid `integer` number
* [**Ip**](./ip.md): a field must be a valid `IP` address
* [**IsArray**](./is_array.md): a field must be a valid `array` 
* [**IsInstanceOf**](./is_instance_of.md): a field must be an instance of given reference/value
* [**Json**](./json.md): a field must be a valid `JSON` 
* [**Length**](./length.md): a field length must be equal to the specified length
* [**LengthMax**](./length_max.md): a field length must not exceed the given length
* [**LengthMin**](./length_min.md): a field length must not be less than the given length
* [**Max**](./length_max.md): an alias of `LengthMax`
* [**Min**](./length_min.md): an alias of `LengthMix`
* [**Negative**](./length_min.md): a field must be a `negative` number
* [**NotEmpty**](./not_empty.md): a field must not be `empty`
* [**Numeric**](./numeric.md): a field must contain `numerical` characters
* [**Odd**](./odd.md): a field must be an `odd` number
* [**Positive**](./positive.md): a field must be a `positive` number  
* [**Regex**](./regex.md): a field must match the given regular expression. 
* [**Required**](./required.md): a field must be present and cannot be empty  
* [**Slug**](./slug.md): a field must be a valid `slug` 
* [**Timezone**](./timezone.md): a field must be a valid `timezone` identifier according to the `timezone_identifiers_list` PHP function.
* [**Url**](./url.md): a field must be a valid `URL`

However, this does not mean that we are only limited to this list. In fact, adding new validators is a breeze. To learn more about creating new validators, please refer to the [contribution section](contributions.md") 




