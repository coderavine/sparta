<?php
return [
    'CLASS_NOT_FOUND' => '%s class could not be found',
    'INVALID_VALIDATOR' => '%s is not a valid validator class.',
    'MISSING_ARGUMENTS' => 'No options have been provided and validation cannot be run.',
    'RULE_PARSER_MISSING_PARAMETER' => 'Both data and rules are required in order to run validation',

    'Date' => [
        'INVALID_DATE_FORMAT' => '%s does not seem to be a valid date',
    ],
    'Alpha' => [
        'INVALID_ALPHA' => '%s is not a valid alphabetic string',
    ],
    'AlphaNum' => [
        'INVALID_ALPHA_NUM' => '%s should only contain numbers and alphabetic characters.',
    ],
    'Boolean' => [
        'INVALID_BOOLEAN' => '%s is not a valid boolean.',
    ],
    'Email' => [
        'INVALID_EMAIL' => '%s is not a valid email.',
    ],
    'FloatNumber' => [
        'INVALID_FLOAT' => '%s is not a valid float.',
    ],
    'Integer' => [
        'INVALID_INTEGER' => '%s is not a valid integer',
        'INVALID_INTEGER_RANGE' => '%s can be only between %d and $d',
    ],
    'Ip' => [
        'INVALID_IP' => '%s is not considered as a valid IP address.',
    ],
    'NotEmpty' => [
        'INVALID_NOT_EMPTY' => 'Input is required and cannot be empty',
    ],
    'Numeric' => [
        'INVALID_NUMERIC' => '%s is not considered as a valid numeric.',
    ],
    'Slug' => [
        'INVALID_IP' => '%s is not a valid slug.',
    ],
    'Url' => [
        'INVALID_URL' => '%s is not considered as a valid URL',
    ],
    'Json' => [
        'INVALID_JSON' => '%s is not considered as a valid Json',
    ],
    'Contains' => [
        'NOT_FOUND' => '%s could not be found in the provided data.',
    ],
    'Required' => [
        'MISSING_REQUIRED_INPUT' => 'Data is required and cannot be empty',
    ],
    'IsArray' => [
        'INVALID_ARRAY' => '%s is not a valid array.',
    ],
    'CreditCard' => [
        'INVALID_CREDIT_CARD' => '%s is not a valid credit card number.',
    ],
    'Between' => [
        'OUT_OF_RANGE' => '%s does not fall between %d and %d.',
        'MISSING_MIN' => 'Minimum value has not been provided.',
        'MISSING_MAX' => 'Maximum value has not been provided',
    ],
    'IsInstanceOf' => [
        'INVALID_INSTANCE' => '%s in not an instance of %s',
    ],
    'LengthMax' => [
        'INVALID_LENGTH' => 'Input has a length of %d which is greater than maximum length %d.',
        'MISSING_MAX' => 'Maximum value has not been provided',
    ],
    'LengthMin' => [
        'INVALID_LENGTH' => 'Input has a length of %d which is less than minimum length %d.',
        'MISSING_MIN' => 'Maximum value has not been provided',
    ],
    'Equals' => [
        'NOT_EQUAL' => '%s does not equal to %s',
        'MISSING_COMPARE_VALUE' => 'Value to compare with is missing',
    ],
    'Lowercase' => [
        'INVALID_LOWERCASE' => 'Given string is not in lowercase.',
    ]
];
