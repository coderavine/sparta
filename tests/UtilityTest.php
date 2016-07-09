<?php
use Sparta\Utility;

/**
 * Class UtilityTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class UtilityTest extends PHPUnit_Framework_TestCase
{

    public function testCalculatingStringLength()
    {
        $data = [

            ['input' => 'Τα ως υπ', 'expected' => 8],
            ['input' => '手配書 第十五章 第十八章 第十六章. 復讐者」', 'expected' => 24],
            ['input' => 'Verzameld daaronder gewijzigd al stichting ze na', 'expected' => 48],
            ['input' => 'this is a normal english sentence', 'expected' => 33],
            ['input' => 'foo', 'expected' => 3],
            ['input' => 'السلام عليكم', 'expected' => 12],
            [
                'input' => 'السلام عليكم ورحمه الله وبركاته',
                'expected' => 31
            ]
        ];
        foreach ($data as $string) {
            $this->assertEquals($string['expected'], Utility::stringLength($string['input']));
        }
    }
}
