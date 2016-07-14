#Contributing to Sparta
Contributing your great ideas to the library are always more than welcome. Kindly, do this by creating pull requests. To do so, just follow the below steps:

* Fork the project repository
* Create your feature topic branch (`git checkout -b new-feature`)
* Make your proposed changes
* Run the tests to make sure that every thing is running smoothly
* Commit your changes (`git commit -am 'Added my new feature/fixes'`)
* Push to the branch (`git push origin new-feature`)
* Create new Pull Request

for more details about contributing to a project on github, kindly refer to [GitHub - Contributing to a Project](https://git-scm.com/book/en/v2/GitHub-Contributing-to-a-Project).

#Creating a new Validator
As mentioned before, adding a new validator to the library is a breeze. Sparta comes with the __spartan__ console command that will extremely ease this process. 

>Note: before using this command, you need to install the symfony `Console` component. 
>Please refer to the [official documentation ](http://symfony.com/doc/current/components/using_components.html) for more details.

Once you are done installing the above dependency, you can generate a new validator using the `generate:validator` command as shown:

`php spartan generate:validator ValidatorName`

For example, to generate a new validated named Foo, you can use the below:

`php spartan generate:validator Foo`

This will generate a validator file named __Foo.php__ in the appropriate project directory. This validator class contains all necessary methods that you need to implement in order to have a very basic validator. A sample code of the newly created class is given below:

```
<?php
namespace Sparta/Validators;

/**
 * Foo Class
 *
 * @package Sparta
 * @author  Author Name <author-email>
 * @link    http://www.coderavine.com/
 */
class Foo extends AbstractValidator
{

    /**
    * Class error messages
    *
    * @var string
    */
    protected $classMessage = [
        'YOUR_MESSAGE_KEY' => 'your message content',
    ];

    /**
     * Foo constructor.
     *
     * @param array $options validator options
     */
    public function __construct($options = [])
    {
        //Handle validator arguments over here
    }


    /**
     * Validate given input
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        //Handle validation logic over here
    }
}
```

* `$ClassMessages`: is used to define the validation error messages
* `__construct`: is used to handle any arguments that the validator accepts.
* `isValid`: is where you define and handle all of your validation logic.






#Testing
We believe that test-driven development can speed up your development process, as you can be confident that your code works before moving on and problems can be found early in the development cycle. Without test-driven development, it's common to find bugs later in the process, requiring the team to revisit blocks of code, slowing down the process. Also, it makes us better programmers, as we have the opportunity to understand other people's code and your own code.

We use __PHPUnit__ testing framework to test our library as it can assist in several areas. First, it can help us find the areas in the application that require refactoring. Second, the mere implementation of unit testing allows team to focus their attention on improving code, by making their code testable.

>Note: we assume that you have a basic knowledge of this framework. Kindly refer to the  [official documentation ](https://phpunit.de/getting->started.html) before proceeding. 

##Writing Tests
With PHPUnit, the most basic thing you’ll write is a test case. A test case is just a term for a class with several different tests all related to the same functionality. There are a few rules you’ll need to follow when writing your cases so that they’ll work with PHPUnit. Please refer to the [PHPUnit Documentation ](https://phpunit.de/manual/current/en/index.html) to familiarize your self with the framework.

We recommend using __Sparta__ console command option `--with-unit-test` that will ease the creation of test case class during creating the validator class as follows:

`php spartan generate:validator Foo --with-unit-test`

In addition to creating a validator class as explained earlier, this command will also create test case file named __FooTest.php__ in the appropriate project tests folder. The file will look like the below:

```
<?php
use Sparta\Validators\Foo;

/**
 * FooTest Class
 *
 * @package Sparta
 * @author  Author Name <author_email>
 * @link    http://www.coderavine.com/
 */
class FooTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Foo
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Foo();
    }


    /**
     * Test validator Foo basic behavior
     *
     */
    public function testBasicBehavior()
    {
        //Your test code over here
    }
}

```
You can use this as a startup and expand the test as you see fit.


##Running Tests

Once your are happy with your awesome changes,  you need to ensure that everything can be executed smoothly. You can run the project test using the below commands:

```
$ vendor/bin/phpunit
```

or

```
$ composer test
```

#Issues
If you find any issue, please feel free to report it in [here](https://github.com/coderavine/sparta/issues)

#Documentation

Our documentation is proudly generated by [Couscous](http://couscous.io/) , an awesome tool which turns [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet) documentation into beautiful websites. To contribute to the project documentation, please do the following:

* Write your documentation using Markdown and place them inside the repository `docs` folder.
* Create a pull request to submit your changes.






