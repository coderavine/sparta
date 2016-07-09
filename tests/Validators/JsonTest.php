<?php
use Sparta\Validators\Json;

/**
 * Class JsonTest.php
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class JsonTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test if Json string passes validation
     *
     * @dataProvider getDataProvider
     *
     * @param $input
     * @param $excepted
     */
    public function testBasicBehavior($input, $excepted)
    {
        $validator = new Json();
        $this->assertEquals($excepted, $validator->isValid($input));
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new Json();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Json();
        $validator->isValid('coderavine');
        $this->assertCount(1, $validator->errors());
    }

    public function testPassingEmptyStringResultsInValidationErrors()
    {
        $validator = new Json();
        $validator->isValid('');
        $this->assertCount(1, $validator->errors());
    }

    public function testPassingNonStringValueResultsInValidationsError()
    {
        $validator = new Json();
        $validator->isValid(1);
        $this->assertCount(1, $validator->errors());
    }

    /**
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return
            [
                [
                    '{
                   "_id": "5776bc4103fadf3200cc759e",
                   "index": 0,
                   "guid": "93cee2e1-56ce-48d8-9c04-a292a3c64466",
                   "isActive": false,
                   "balance": "$1,137.84",
                   "age": 31,
                   "eyeColor": "brown",
                   "friends": [
                    {
                        "id": 0,
                        "name": "Bauer Murphy"
                    },
                    {
                        "id": 1,
                        "name": "Cynthia Albert"
                    },
                    {
                        "id": 2,
                        "name": "Lancaster Roth"
                    }
                    ]
                   }',
                    true
                ],
                [
                    '{
                  "id": 1,
                  "first_name": "Sarah",
                  "last_name": "Fernandez",
                  "email": "sfernandez0@infoseek.co.jp",
                  "gender": "Female",
                  "ip_address": "222.248.113.8"
                  }',
                    true
                ],

                ['normal string', false],
            ];

    }
}
