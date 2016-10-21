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

use Symfony\Component\Form\AbstractExtension;
use Symfony\Component\Form\Tests\Fixtures\FooType;

class AbstractExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testHasType()
    {
        $loader = new ConcreteExtension();
<<<<<<< HEAD
        $this->assertTrue($loader->hasType('foo'));
        $this->assertFalse($loader->hasType('bar'));
=======
        $this->assertTrue($loader->hasType('Symfony\Component\Form\Tests\Fixtures\FooType'));
        $this->assertFalse($loader->hasType('foo'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testGetType()
    {
        $loader = new ConcreteExtension();
<<<<<<< HEAD
        $this->assertInstanceOf('Symfony\Component\Form\Tests\Fixtures\FooType', $loader->getType('foo'));
=======
        $this->assertInstanceOf('Symfony\Component\Form\Tests\Fixtures\FooType', $loader->getType('Symfony\Component\Form\Tests\Fixtures\FooType'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage Custom resolver "Symfony\Component\Form\Tests\Fixtures\CustomOptionsResolver" must extend "Symfony\Component\OptionsResolver\OptionsResolver".
     */
    public function testCustomOptionsResolver()
    {
<<<<<<< HEAD
        $extension = new Fixtures\FooTypeBarExtension();
=======
        $extension = new Fixtures\LegacyFooTypeBarExtension();
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $resolver = new Fixtures\CustomOptionsResolver();
        $extension->setDefaultOptions($resolver);
    }
}

class ConcreteExtension extends AbstractExtension
{
    protected function loadTypes()
    {
        return array(new FooType());
    }

    protected function loadTypeGuesser()
    {
    }
}
