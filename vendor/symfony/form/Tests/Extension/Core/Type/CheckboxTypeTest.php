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

use Symfony\Component\Form\CallbackTransformer;

class CheckboxTypeTest extends \Symfony\Component\Form\Test\TypeTestCase
{
<<<<<<< HEAD
    public function testDataIsFalseByDefault()
    {
        $form = $this->factory->create('checkbox');

=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('checkbox');

        $this->assertSame('checkbox', $form->getConfig()->getType()->getName());
    }

    public function testDataIsFalseByDefault()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType');

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $this->assertFalse($form->getData());
        $this->assertFalse($form->getNormData());
        $this->assertNull($form->getViewData());
    }

    public function testPassValueToView()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array('value' => 'foobar'));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array('value' => 'foobar'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();

        $this->assertEquals('foobar', $view->vars['value']);
    }

    public function testCheckedIfDataTrue()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->setData(true);
        $view = $form->createView();

        $this->assertTrue($view->vars['checked']);
    }

    public function testCheckedIfDataTrueWithEmptyValue()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array('value' => ''));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array('value' => ''));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->setData(true);
        $view = $form->createView();

        $this->assertTrue($view->vars['checked']);
    }

    public function testNotCheckedIfDataFalse()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->setData(false);
        $view = $form->createView();

        $this->assertFalse($view->vars['checked']);
    }

    public function testSubmitWithValueChecked()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => 'foobar',
        ));
        $form->submit('foobar');

        $this->assertTrue($form->getData());
        $this->assertEquals('foobar', $form->getViewData());
    }

    public function testSubmitWithRandomValueChecked()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => 'foobar',
        ));
        $form->submit('krixikraxi');

        $this->assertTrue($form->getData());
        $this->assertEquals('foobar', $form->getViewData());
    }

    public function testSubmitWithValueUnchecked()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => 'foobar',
        ));
        $form->submit(null);

        $this->assertFalse($form->getData());
        $this->assertNull($form->getViewData());
    }

    public function testSubmitWithEmptyValueChecked()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => '',
        ));
        $form->submit('');

        $this->assertTrue($form->getData());
        $this->assertSame('', $form->getViewData());
    }

    public function testSubmitWithEmptyValueUnchecked()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => '',
        ));
        $form->submit(null);

        $this->assertFalse($form->getData());
        $this->assertNull($form->getViewData());
    }

    public function testSubmitWithEmptyValueAndFalseUnchecked()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => '',
        ));
        $form->submit(false);

        $this->assertFalse($form->getData());
        $this->assertNull($form->getViewData());
    }

    public function testSubmitWithEmptyValueAndTrueChecked()
    {
<<<<<<< HEAD
        $form = $this->factory->create('checkbox', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CheckboxType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => '',
        ));
        $form->submit(true);

        $this->assertTrue($form->getData());
        $this->assertSame('', $form->getViewData());
    }

    /**
     * @dataProvider provideCustomModelTransformerData
     */
    public function testCustomModelTransformer($data, $checked)
    {
        // present a binary status field as a checkbox
        $transformer = new CallbackTransformer(
            function ($value) {
                return 'checked' == $value;
            },
            function ($value) {
                return $value ? 'checked' : 'unchecked';
            }
        );

<<<<<<< HEAD
        $form = $this->factory->createBuilder('checkbox')
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\CheckboxType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->addModelTransformer($transformer)
            ->getForm();

        $form->setData($data);
        $view = $form->createView();

        $this->assertSame($data, $form->getData());
        $this->assertSame($checked, $form->getNormData());
        $this->assertEquals($checked, $view->vars['checked']);
    }

    public function provideCustomModelTransformerData()
    {
        return array(
            array('checked', true),
            array('unchecked', false),
        );
    }
}
