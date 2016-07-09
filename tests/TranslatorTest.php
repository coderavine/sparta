<?php
use Sparta\Translator;

/**
 * Class TranslatorTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class TranslatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Translator
     *
     * @var Translator
     */
    protected $translator;

    /**
     * Language files folder
     *
     * @var string
     */
    protected $filePath;

    /**
     * Setup test environment
     *
     * @return void
     */
    protected function setUp()
    {
        $this->translator = new Translator();
        $this->translator->setLangFilesPath(__DIR__ . '/lang/');
    }

    /**
     * Ensure that dependencies like path to language folder and locale code
     * can be injected via the class constructor
     *
     * @return void
     */
    public function testInjectingDependenciesViaClassConstructor()
    {
        $translator = new Translator('path/to/languages/folder', 'fo');
        $this->assertEquals('path/to/languages/folder', $translator->getLangFilesPath());
        $this->assertEquals('fo', $translator->getLocale());
    }


    /**
     * Ensure that translator get a default locale code when nothing is specified
     *
     * @return void
     */
    public function testGetDefaultLanguageLocaleCodeViaGetterMethod()
    {
        $this->assertEquals('en', $this->translator->getLocale());
    }

    /**
     * Ensure that translator can set and get a locale code
     *
     * @return void
     */
    public function testSetGetLocaleLanguageCodeViaSetterAndGetter()
    {
        $this->translator->setLocale('fo');
        $this->assertEquals('fo', $this->translator->getLocale());
    }

    /**
     * Ensure that translator can set and get path to language files directory
     *
     * @return void
     */
    public function testSetGetLanguageFilesDirectoryViaSetterAndGetter()
    {
        $this->translator->setLocale('path/to/language/files/');
        $this->assertEquals('path/to/language/files/', $this->translator->getLocale());
    }

    /**
     * Ensure that a single message can be retrieved from translator by key
     *
     * @return void
     */
    public function testCanGetMessageByKeyFromTranslator()
    {
        $this->translator->load();
        $message = $this->translator->get('test_message');
        $this->assertEquals('file has been loaded', $message);
    }

    /**
     * Ensure that translator can load the locale language file from specified path
     *
     * @return void
     */
    public function testCanLoadLanguageFilesFromSpecifiedPath()
    {
        $this->translator->load();
        $messages = $this->translator->all();
        $this->assertArrayHasKey('test_message', $messages);
    }

    /**
     * Ensure that translator throws an exception when trying to load a file
     * that does not exist in the language folder
     *
     * @return void
     */
    public function testLoadingInvalidLanguageFileThrowsException()
    {
        $this->expectException(\Sparta\Exceptions\LanguageFileNotFound::class);
        $this->translator->setLocale('FakeFileLanguageCode');
        $this->translator->load();
    }

    /**
     * Ensure that we can set a default message value to be returned when nothing
     * found in the loaded list
     *
     * @return void
     */
    public function testGetDefaultMessageIfNoMatchingValueFoundInMessagesList()
    {
        $this->translator->load();
        $this->assertEquals('default_value', $this->translator->get('invalid_message_key', 'default_value'));
    }

    /**
     * Ensure that a loaded language file will not be loaded again
     *
     * @return void
     */
    public function testAlreadyLoadedFileWillNotBeLoadedTwice()
    {
        $this->translator->load();
        $this->assertArrayHasKey('test_message', $this->translator->all());
        $this->translator->load();
        $this->assertTrue($this->translator->hasBeenLoaded('en'));
    }

    /**
     *
     */
    protected function tearDown()
    {
        $this->translator = null;
    }
}
