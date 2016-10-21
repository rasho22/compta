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

class RepeatedTypeTest extends \Symfony\Component\Form\Test\TypeTestCase
{
    protected $form;

    protected function setUp()
    {
        parent::setUp();

<<<<<<< HEAD
        $this->form = $this->factory->create('repeated', null, array(
            'type' => 'text',
=======
        $this->form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));
        $this->form->setData(null);
    }

<<<<<<< HEAD
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('repeated', array(
            'type' => 'text',
        ));

        $this->assertSame('repeated', $form->getConfig()->getType()->getName());
    }

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function testSetData()
    {
        $this->form->setData('foobar');

        $this->assertEquals('foobar', $this->form['first']->getData());
        $this->assertEquals('foobar', $this->form['second']->getData());
    }

    public function testSetOptions()
    {
<<<<<<< HEAD
        $form = $this->factory->create('repeated', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'options' => array('label' => 'Global'),
        ));

        $this->assertEquals('Global', $form['first']->getConfig()->getOption('label'));
        $this->assertEquals('Global', $form['second']->getConfig()->getOption('label'));
        $this->assertTrue($form['first']->isRequired());
        $this->assertTrue($form['second']->isRequired());
    }

    public function testSetOptionsPerChild()
    {
<<<<<<< HEAD
        $form = $this->factory->create('repeated', null, array(
            // the global required value cannot be overridden
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
            // the global required value cannot be overridden
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'first_options' => array('label' => 'Test', 'required' => false),
            'second_options' => array('label' => 'Test2'),
        ));

        $this->assertEquals('Test', $form['first']->getConfig()->getOption('label'));
        $this->assertEquals('Test2', $form['second']->getConfig()->getOption('label'));
        $this->assertTrue($form['first']->isRequired());
        $this->assertTrue($form['second']->isRequired());
    }

    public function testSetRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('repeated', null, array(
            'required' => false,
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
            'required' => false,
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));

        $this->assertFalse($form['first']->isRequired());
        $this->assertFalse($form['second']->isRequired());
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testSetInvalidOptions()
    {
<<<<<<< HEAD
        $this->factory->create('repeated', null, array(
            'type' => 'text',
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'options' => 'bad value',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testSetInvalidFirstOptions()
    {
<<<<<<< HEAD
        $this->factory->create('repeated', null, array(
            'type' => 'text',
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'first_options' => 'bad value',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testSetInvalidSecondOptions()
    {
<<<<<<< HEAD
        $this->factory->create('repeated', null, array(
            'type' => 'text',
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'second_options' => 'bad value',
        ));
    }

    public function testSetErrorBubblingToTrue()
    {
<<<<<<< HEAD
        $form = $this->factory->create('repeated', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'error_bubbling' => true,
        ));

        $this->assertTrue($form->getConfig()->getOption('error_bubbling'));
        $this->assertTrue($form['first']->getConfig()->getOption('error_bubbling'));
        $this->assertTrue($form['second']->getConfig()->getOption('error_bubbling'));
    }

    public function testSetErrorBubblingToFalse()
    {
<<<<<<< HEAD
        $form = $this->factory->create('repeated', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'error_bubbling' => false,
        ));

        $this->assertFalse($form->getConfig()->getOption('error_bubbling'));
        $this->assertFalse($form['first']->getConfig()->getOption('error_bubbling'));
        $this->assertFalse($form['second']->getConfig()->getOption('error_bubbling'));
    }

    public function testSetErrorBubblingIndividually()
    {
<<<<<<< HEAD
        $form = $this->factory->create('repeated', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'error_bubbling' => true,
            'options' => array('error_bubbling' => false),
            'second_options' => array('error_bubbling' => true),
        ));

        $this->assertTrue($form->getConfig()->getOption('error_bubbling'));
        $this->assertFalse($form['first']->getConfig()->getOption('error_bubbling'));
        $this->assertTrue($form['second']->getConfig()->getOption('error_bubbling'));
    }

    public function testSetOptionsPerChildAndOverwrite()
    {
<<<<<<< HEAD
        $form = $this->factory->create('repeated', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\RepeatedType', null, array(
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'options' => array('label' => 'Label'),
            'second_options' => array('label' => 'Second label'),
        ));

        $this->assertEquals('Label', $form['first']->getConfig()->getOption('label'));
        $this->assertEquals('Second label', $form['second']->getConfig()->getOption('label'));
        $this->assertTrue($form['first']->isRequired());
        $this->assertTrue($form['second']->isRequired());
    }

    public function testSubmitUnequal()
    {
        $input = array('first' => 'foo', 'second' => 'bar');

        $this->form->submit($input);

        $this->assertEquals('foo', $this->form['first']->getViewData());
        $this->assertEquals('bar', $this->form['second']->getViewData());
        $this->assertFalse($this->form->isSynchronized());
        $this->assertEquals($input, $this->form->getViewData());
        $this->assertNull($this->form->getData());
    }

    public function testSubmitEqual()
    {
        $input = array('first' => 'foo', 'second' => 'foo');

        $this->form->submit($input);

        $this->assertEquals('foo', $this->form['first']->getViewData());
        $this->assertEquals('foo', $this->form['second']->getViewData());
        $this->assertTrue($this->form->isSynchronized());
        $this->assertEquals($input, $this->form->getViewData());
        $this->assertEquals('foo', $this->form->getData());
    }
}
