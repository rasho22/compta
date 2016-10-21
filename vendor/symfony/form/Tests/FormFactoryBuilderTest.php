<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests;

use Symfony\Component\Form\FormFactoryBuilder;
<<<<<<< HEAD
use Symfony\Component\Form\Tests\Fixtures\FooType;
=======
use Symfony\Component\Form\Tests\Fixtures\LegacyFooType;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

class FormFactoryBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $registry;
    private $guesser;
    private $type;

    protected function setUp()
    {
        $factory = new \ReflectionClass('Symfony\Component\Form\FormFactory');
        $this->registry = $factory->getProperty('registry');
        $this->registry->setAccessible(true);

        $this->guesser = $this->getMock('Symfony\Component\Form\FormTypeGuesserInterface');
<<<<<<< HEAD
        $this->type = new FooType();
=======
        $this->type = new LegacyFooType();
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testAddType()
    {
        $factoryBuilder = new FormFactoryBuilder();
        $factoryBuilder->addType($this->type);

        $factory = $factoryBuilder->getFormFactory();
        $registry = $this->registry->getValue($factory);
        $extensions = $registry->getExtensions();

        $this->assertCount(1, $extensions);
        $this->assertTrue($extensions[0]->hasType($this->type->getName()));
        $this->assertNull($extensions[0]->getTypeGuesser());
    }

    public function testAddTypeGuesser()
    {
        $factoryBuilder = new FormFactoryBuilder();
        $factoryBuilder->addTypeGuesser($this->guesser);

        $factory = $factoryBuilder->getFormFactory();
        $registry = $this->registry->getValue($factory);
        $extensions = $registry->getExtensions();

        $this->assertCount(1, $extensions);
        $this->assertNotNull($extensions[0]->getTypeGuesser());
    }
}
