<?php
namespace Sparta;

use Sparta\Exceptions\LanguageFileNotFound;

/**
 * Class Translator
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Translator
{
    /**
     * Default language file to be loaded if no user's locale has
     * been defined
     *
     * @var string
     */
    const DEFAULT_LOCALE = 'en';

    /**
     * Languages folder path
     *
     * @var
     */
    private $langFilesPath;

    /**
     * Error messages list
     *
     * @var
     */
    private $messages = [];

    /**
     * Language locale code
     *
     * @var
     */
    protected $locale;

    /**
     * Loaded files list
     *
     * @var array
     */
    protected $loaded = [];

    /**
     * Translator constructor.
     *
     * @param string $langFilesPath
     * @param string $locale
     */
    public function __construct($langFilesPath = '', $locale = 'en')
    {
        $this->setLangFilesPath($langFilesPath);
        $this->setLocale($locale);
    }

    /**
     * Load default error messages for the provided language locale code
     *
     * @return mixed
     * @throws \Sparta\Exceptions\LanguageFileNotFound
     */
    public function load()
    {
        $locale = $this->getLocale();
        if ($this->hasBeenLoaded($locale)) {
            return true;
        }

        $languageFile = $this->getLangFilesPath() . $locale . '.php';

        if (!$this->exists($languageFile)) {
            throw  new LanguageFileNotFound('Language file ' . $this->getLocale() . '.php does not exist');
        }

        $this->messages = include "$languageFile";
        $this->loaded[$locale] = true;
    }

    /**
     * Determine if translator messages have been loaded for the given locale code
     *
     * @param $locale
     *
     * @return bool
     */
    public function hasBeenLoaded($locale)
    {
        if (array_key_exists($locale, $this->loaded)) {
            return true;
        }
        return false;
    }

    /**
     * Determine if the given file exists
     *
     * @param $file
     *
     * @return bool
     */
    private function exists($file)
    {
        return (file_exists($file)) ? true : false;
    }


    /**
     * Get a translator message by its key
     *
     * @param string $key message key
     *
     * @param string $default
     *
     * @return mixed
     */
    public function get($key, $default = '')
    {
        if (array_key_exists($key, $this->messages)) {
            return $this->messages[$key];
        }
        return $default;
    }

    /**
     * Get all translator messages
     *
     * @return array
     */
    public function all()
    {
        return $this->messages;
    }

    /**
     * Set language locale code
     *
     * @param $locale
     *
     * @return void
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Get language locale code
     *
     * @return string
     */
    public function getLocale()
    {
        return (empty($this->locale)) ? self::DEFAULT_LOCALE : $this->locale;
    }

    /**
     * Get language files directory path
     *
     * @return mixed
     */
    public function getLangFilesPath()
    {
        return $this->langFilesPath;
    }

    /**
     * Get language files directory path
     *
     * @param mixed $langFilesPath
     */
    public function setLangFilesPath($langFilesPath)
    {
        if (!empty($langFilesPath)) {
            $this->langFilesPath = $langFilesPath;
        }
    }

}
