<?php
use Sparta\ArgumentParser;

/**
 * Class ArgumentParserTest.php
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ArgumentParserTest extends PHPUnit_Framework_TestCase
{
    /**
     * Parser instance
     *
     * @var ArgumentParser
     */
    protected $parser;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->parser = new ArgumentParser();
    }

    /**
     * Prepare a list of arguments to pares
     *
     * @codeCoverageIgnore
     *
     * @return array
     */
    public function getDataProvider()
    {
        return [
            [
                'input' => 'true',
                'expected' => [0 => "true"],
            ],
            [
                'input' => 'enableWhitespace=true',
                'expected' => ['enableWhitespace' => "true"],
            ],
            [
                'input' => 'enableWhitespace',
                'expected' => [0 => 'enableWhitespace'],
            ],
            [
                'input' => 'min=10,max=100',
                'expected' => ['min' => 10, 'max' => 100],
            ],
            [
                'input' => 'length=100',
                'expected' => ['length' => 100],
            ],
            [
                'input' => 'foo=bar,var=value,testing=cool',
                'expected' => ['foo' => 'bar', 'var' => 'value', 'testing' => 'cool'],
            ],
            [
                'input' => 'testing,is,cool',
                'expected' => [0 => 'testing', 1 => 'is', 2 => 'cool'],
            ],
            [
                'input' => '10,100',
                'expected' => [0 => 10, 1 => 100],
            ],
        ];
    }

    /**
     * Ensure that argument parser behaves as expected
     *
     * @param $input
     * @param $expected
     *
     * @throws \Sparta\Exceptions\MissingParameterException
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($input, $expected)
    {
        $this->parser->run($input);
        $this->assertEquals(
            $expected,
            $this->parser->all(),
            'failed value is :'.$input
        );
    }

    /**
     * @throws \Sparta\Exceptions\MissingParameterException
     */
    public function testKeyOfUserInputCanBeProvidedToParserInOrderToAssignItsValueToArgumentValues()
    {
        $this->parser->setData(['passwordConfig' => 12345]);
        $this->parser->run('passwordConfig');
        $this->assertEquals(12345, $this->parser->get(0));
    }

    /**
     * Ensure that running parser with empty input raise MissingParameterException exception
     *
     * @expectedException Sparta\Exceptions\MissingParameterException
     * @return void
     */
    public function testRunningParserWithoutInputRaiseException()
    {
        $this->parser->run(null);
    }

    /**
     * Ensure that GetKeyValueDelimiter retrieve default delimiter
     */
    public function testGetDefaultKeyValueDelimiter()
    {
        $this->assertEquals('=', $this->parser->getKeyValueDelimiter());
    }

    /**
     * Ensure that Get/SetKeyValueDelimiter assign and retrieve default/new delimiter
     */
    public function testSetGetKeyValueDelimiter()
    {
        $this->parser->setKeyValueDelimiter('#');
        $this->assertEquals('#', $this->parser->getKeyValueDelimiter());
    }

    /**
     * Ensure that GetDefaultArgumentsDelimiter retrieve default delimiter
     */
    public function testGetDefaultArgumentsDelimiter()
    {
        $this->assertEquals(',', $this->parser->getArgumentsDelimiter());
    }

    /**
     * Ensure that Get/GetDefaultArgumentsDelimiter assign and retrieve default/new delimiter
     */
    public function testSetGetArgumentsDelimiter()
    {
        $this->parser->setArgumentsDelimiter(';');
        $this->assertEquals(';', $this->parser->getArgumentsDelimiter());
    }

    /**
     * Ensure that "all" get all arguments list from the parser
     */
    public function testGetAllArguments()
    {
        $this->parser->run('min=10,max=100');
        $this->assertEquals(['min' => 10, 'max' => 100], $this->parser->all());

        $this->parser->run('10,100');
        $this->assertEquals([0 => 10, 1 => 100], $this->parser->all());
    }

    /**
     * Ensure that "clearArguments" remove all arguments list from the parser
     */
    public function testclearArgumentsRemoveAllArgumentsFromList()
    {
        $this->parser->run('min=10,max=100');
        $this->assertEquals(['min' => 10, 'max' => 100], $this->parser->all());
        $this->parser->clearArguments();
        $this->assertEquals([], $this->parser->all());
    }

    /**
     * Ensure that "has" return false when the key does not exists in the
     * arguments list
     */
    public function testCheckingNonExistedKeyReturnFalse()
    {
        $this->parser->run('min=10,max=100');
        $this->assertEquals(false, $this->parser->has('none'));
    }

    /**
     * Ensure that "has" return false when the key does not exists in the
     * arguments list
     */
    public function testGettingNonExistedKeyReturnFalse()
    {
        $this->parser->run('min=10,max=100');
        $this->assertEquals(null, $this->parser->get('none'));
    }

    /**
     * Ensure that "get" retrieve an argument by it is key if it has
     */
    public function testGetArgumentsByKey()
    {
        $this->parser->run('length=100,foo=bar');
        $this->assertEquals('bar', $this->parser->get('foo'));
    }

    /**
     * Ensure that "has" checks the existence of an argument by its key
     */
    public function testCheckExistenceOfArguments()
    {
        $this->parser->run('length=100');
        $this->assertTrue($this->parser->has('length'));
    }

    /**
     * Ensure that "count" get total number of arguments in the list
     */
    public function testCountArgumentsList()
    {
        $this->parser->run('length=100,min=1,max=10,foo=bar');
        $this->assertEquals(4, $this->parser->count());

        $this->parser->run('100,1');
        $this->assertEquals(2, $this->parser->count());
    }

    /**
     * @throws \Sparta\Exceptions\MissingParameterException
     */
    public function testGettingArgumentsValuesFromUserInputCollection()
    {
        // Set field equals to a field from the user input
        $this->parser->setData(['passwordConfirm' => '12345']);
        $this->parser->run('to=passwordConfirm');
        $this->assertEquals(['to' => '12345'], $this->parser->all());
    }

    /**
     *
     */
    public function testSetAndGetDataToAndFromArgumentParser()
    {
        $this->parser->setData(['name' => 'coderavine']);
        $this->assertEquals(['name' => 'coderavine'], $this->parser->getData());
    }

    /**
     *
     */
    public function testParserReturnsNullValueForGivenFieldIfItDoesNotExistInUserInputCollection()
    {
        $this->parser->setData(['name' => 'coderavine']);
        $this->assertNull($this->parser->field('foo'));
    }

    /**
     *
     */
    public function testParserReturnsNullValueForGivenFieldIfUserInputCollectionHasNotBeenProvided()
    {
        $this->assertNull($this->parser->field('foo'));
    }
}
