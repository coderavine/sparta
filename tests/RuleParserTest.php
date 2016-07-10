<?php
use Sparta\RuleParser;

class RuleParserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RuleParser
     */
    protected $ruleParse;


    public function setUp()
    {
        $this->ruleParse = new RuleParser();
    }

    /**
     * Ensure that getDefaultRulesSeparator get a default separator
     *
     * @return void
     */
    public function testSetDefaultRulesSeparator()
    {
        $this->assertEquals('|', $this->ruleParse->getDefaultRulesDelimiter());
    }

    /**
     * Ensure that set/get DefaultRulesSeparator set a the specified separator
     *
     * @return void
     */
    public function testGetSetRulesSeparator()
    {
        $this->ruleParse->setDefaultRulesDelimiter('||');
        $this->assertEquals('||', $this->ruleParse->getDefaultRulesDelimiter());
    }

    /**
     * Ensure that getDefaultArgumentsSeparator gets a default separator
     *
     * @return void
     */
    public function testGetDefaultArgumentsSeparator()
    {
        $this->assertEquals(',', $this->ruleParse->getDefaultArgumentsDelimiter());
    }

    /**
     * Ensure that set/get DefaultArgumentsSeparator gets a  separator
     *
     * @return void
     */
    public function testGetSetArgumentsSeparator()
    {
        $this->ruleParse->setDefaultArgumentsDelimiter(',,');
        $this->assertEquals(',,', $this->ruleParse->getDefaultArgumentsDelimiter());
    }

    /**
     * Ensure that GetDefaultValidatorArgumentsSeparator gets a default separator
     */
    public function testGetDefaultValidatorArgumentsSeparator()
    {
        $this->assertEquals(':', $this->ruleParse->getDefaultValidatorArgumentsDelimiter());
    }

    /**
     * Ensure that Set/Get DefaultValidatorArgumentsSeparator gets a  separator
     */
    public function testSetGetValidatorArgumentsSeparator()
    {
        $this->ruleParse->setDefaultValidatorArgumentsDelimiter('::');
        $this->assertEquals('::', $this->ruleParse->getDefaultValidatorArgumentsDelimiter());
    }

    /**
     * Ensure that GetDefaultValidatorArgumentsSeparator gets a default separator
     */
    public function testGetDefaultArgumentKeyValueSeparator()
    {
        $this->assertEquals('=', $this->ruleParse->getDefaultArgumentKeyValueDelimiter());
    }

    /**
     * Ensure that Set/Get DefaultValidatorArgumentsSeparator gets a  separator
     */
    public function testSetGetArgumentKeyValueSeparator()
    {
        $this->ruleParse->setDefaultArgumentKeyValueDelimiter('==');
        $this->assertEquals('==', $this->ruleParse->getDefaultArgumentKeyValueDelimiter());
    }

    /**
     * Ensure that ruleParser can be run and return a rulesBag
     */
    public function testRunRuleParser()
    {
        $rules = [
            'var1' => 'alpha|between:min=10,max=100',
            'var2' => 'email',
            'var3' => 'alpha',
        ];
        $rulesBag = $this->ruleParse->run($rules);
        $this->assertInstanceOf(Sparta\RulesBag::class, $rulesBag);
        $this->assertEquals($rulesBag, $this->ruleParse->getRulesBag());
    }

    public function testParsingRuleGivenInDifferentFormatOtherThanDefault()
    {
        $rules = [
            'va1' =>
                [
                    'alpha',
                    'between:min=10,max=100'
                ]
        ];

        $rulesBag = $this->ruleParse->run($rules);
        $this->assertInstanceOf(Sparta\RulesBag::class, $rulesBag);
        $validators = $rulesBag->get('va1');
        $this->assertArrayHasKey('alpha', $validators);
        $this->assertArrayHasKey('between', $validators);
    }

    /**
     * Ensure that "resolve" handles and resolve only string based rule
     */
    public function testPassingAnEmptyOrNonStringRuleToResolveMethodReturnNull()
    {
        $this->assertNull($this->ruleParse->resolve(''));
        $this->assertNull($this->ruleParse->resolve(11));
        $this->assertNull($this->ruleParse->resolve(null));
        $this->assertNull($this->ruleParse->resolve([]));
        $this->assertNull($this->ruleParse->resolve(['var' => 'value']));
    }

    /**
     * Ensure that "ParseArguments" is able to parse rule arguments
     */
    public function testParseArgumentsCanParseRuleArguments()
    {
        $this->assertEquals(['min' => 10, 'max' => 100], $this->ruleParse->parseArguments('min=10,max=100'));
        $this->assertEquals([0 => 10, 1 => 100], $this->ruleParse->parseArguments('10,100'));
    }

    /**
     *  Ensure that "getRulesBag" return a valid instance of RuleBag
     */
    public function testGetRulesBagReturnAnInstanceOfRuleBag()
    {
        $rules = [
            'name' => 'alpha|length_max:10',
        ];
        $rulesBag = $this->ruleParse->run($rules);
        $this->assertInstanceOf(Sparta\RulesBag::class, $rulesBag);
        $this->assertTrue($rulesBag->hasRulesFor('name'));
        $validators = $rulesBag->getRuleFor('name');
        $this->assertArrayHasKey('length_max', $validators);
    }

    public function testSetAndGetDataToAndFromRuleParser()
    {
        $this->ruleParse->setData(['name' => 'coderavine']);
        $this->assertEquals(['name' => 'coderavine'], $this->ruleParse->getData());
    }

    public function testGetAttributeValidatorsBagReturnAnArrayOfValidators()
    {
        $rules = [
            'name' => 'alpha|length_max:10',
        ];
        $this->ruleParse->run($rules);
        $list = ($this->ruleParse->getAttributeValidatorsBag());
        $this->assertCount(2, $list);
        $this->assertArrayHasKey('alpha', $list);
        $this->assertArrayHasKey('length_max', $list);
        $this->ruleParse->getAttributeValidatorsBag();
    }

    public function testThatAttributeValidatorsBagCanBeCleared()
    {
        $rules = [
            'name' => 'alpha',
        ];
        $this->ruleParse->run($rules);
        $list = ($this->ruleParse->getAttributeValidatorsBag());
        $this->assertArrayHasKey('alpha', $list);
        $this->ruleParse->clearAttributeValidatorsBag();
        $this->assertNull($this->ruleParse->getAttributeValidatorsBag());
    }

    public function testThatParserCanNormalizeValidatorNameByRemovingUnderscoreAndCapitalizeWordsLetter()
    {
        $this->assertEquals('LengthMax', $this->ruleParse->normalizeName('length_max'));
        $this->assertEquals('IsInstanceOf', $this->ruleParse->normalizeName('is_instance_of'));
    }

}
