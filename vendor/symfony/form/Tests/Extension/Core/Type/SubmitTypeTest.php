<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Extension\Core\Type;

use Symfony\Component\Form\Test\TypeTestCase as TestCase;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class SubmitTypeTest extends TestCase
{
<<<<<<< HEAD
    public function testCreateSubmitButtonInstances()
    {
        $this->assertInstanceOf('Symfony\Component\Form\SubmitButton', $this->factory->create('submit'));
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('submit');

        $this->assertSame('submit', $form->getConfig()->getType()->getName());
    }

    public function testCreateSubmitButtonInstances()
    {
        $this->assertInstanceOf('Symfony\Component\Form\SubmitButton', $this->factory->create('Symfony\Component\Form\Extension\Core\Type\SubmitType'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testNotClickedByDefault()
    {
<<<<<<< HEAD
        $button = $this->factory->create('submit');
=======
        $button = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\SubmitType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertFalse($button->isClicked());
    }

    public function testNotClickedIfSubmittedWithNull()
    {
<<<<<<< HEAD
        $button = $this->factory->create('submit');
=======
        $button = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\SubmitType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $button->submit(null);

        $this->assertFalse($button->isClicked());
    }

    public function testClickedIfSubmittedWithEmptyString()
    {
<<<<<<< HEAD
        $button = $this->factory->create('submit');
=======
        $button = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\SubmitType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $button->submit('');

        $this->assertTrue($button->isClicked());
    }

    public function testClickedIfSubmittedWithUnemptyString()
    {
<<<<<<< HEAD
        $button = $this->factory->create('submit');
=======
        $button = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\SubmitType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $button->submit('foo');

        $this->assertTrue($button->isClicked());
    }

    public function testSubmitCanBeAddedToForm()
    {
        $form = $this->factory
<<<<<<< HEAD
            ->createBuilder('form')
            ->getForm();

        $this->assertSame($form, $form->add('send', 'submit'));
=======
            ->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType')
            ->getForm();

        $this->assertSame($form, $form->add('send', 'Symfony\Component\Form\Extension\Core\Type\SubmitType'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
