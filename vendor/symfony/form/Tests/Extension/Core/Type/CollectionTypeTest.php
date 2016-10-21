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

use Symfony\Component\Form\Tests\Fixtures\Author;
<<<<<<< HEAD
use Symfony\Component\Form\Tests\Fixtures\AuthorType;

class CollectionTypeTest extends \Symfony\Component\Form\Test\TypeTestCase
{
    public function testContainsNoChildByDefault()
    {
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======

class CollectionTypeTest extends \Symfony\Component\Form\Test\TypeTestCase
{
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('collection', array(
            'entry_type' => 'text',
        ));

        $this->assertSame('collection', $form->getConfig()->getType()->getName());
    }

    public function testContainsNoChildByDefault()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));

        $this->assertCount(0, $form);
    }

    public function testSetDataAdjustsSize()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
            'options' => array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
            'entry_options' => array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                'attr' => array('maxlength' => 20),
            ),
        ));
        $form->setData(array('foo@foo.com', 'foo@bar.com'));

        $this->assertInstanceOf('Symfony\Component\Form\Form', $form[0]);
        $this->assertInstanceOf('Symfony\Component\Form\Form', $form[1]);
        $this->assertCount(2, $form);
        $this->assertEquals('foo@foo.com', $form[0]->getData());
        $this->assertEquals('foo@bar.com', $form[1]->getData());
        $formAttrs0 = $form[0]->getConfig()->getOption('attr');
        $formAttrs1 = $form[1]->getConfig()->getOption('attr');
        $this->assertEquals(20, $formAttrs0['maxlength']);
        $this->assertEquals(20, $formAttrs1['maxlength']);

        $form->setData(array('foo@baz.com'));
        $this->assertInstanceOf('Symfony\Component\Form\Form', $form[0]);
        $this->assertFalse(isset($form[1]));
        $this->assertCount(1, $form);
        $this->assertEquals('foo@baz.com', $form[0]->getData());
        $formAttrs0 = $form[0]->getConfig()->getOption('attr');
        $this->assertEquals(20, $formAttrs0['maxlength']);
    }

    public function testThrowsExceptionIfObjectIsNotTraversable()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));
        $this->setExpectedException('Symfony\Component\Form\Exception\UnexpectedTypeException');
        $form->setData(new \stdClass());
    }

    public function testNotResizedIfSubmittedWithMissingData()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));
        $form->setData(array('foo@foo.com', 'bar@bar.com'));
        $form->submit(array('foo@bar.com'));

        $this->assertTrue($form->has('0'));
        $this->assertTrue($form->has('1'));
        $this->assertEquals('foo@bar.com', $form[0]->getData());
        $this->assertEquals('', $form[1]->getData());
    }

    public function testResizedDownIfSubmittedWithMissingDataAndAllowDelete()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_delete' => true,
        ));
        $form->setData(array('foo@foo.com', 'bar@bar.com'));
        $form->submit(array('foo@foo.com'));

        $this->assertTrue($form->has('0'));
        $this->assertFalse($form->has('1'));
        $this->assertEquals('foo@foo.com', $form[0]->getData());
        $this->assertEquals(array('foo@foo.com'), $form->getData());
    }

    public function testResizedDownIfSubmittedWithEmptyDataAndDeleteEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_delete' => true,
            'delete_empty' => true,
        ));

        $form->setData(array('foo@foo.com', 'bar@bar.com'));
        $form->submit(array('foo@foo.com', ''));

        $this->assertTrue($form->has('0'));
        $this->assertFalse($form->has('1'));
        $this->assertEquals('foo@foo.com', $form[0]->getData());
        $this->assertEquals(array('foo@foo.com'), $form->getData());
    }

    public function testDontAddEmptyDataIfDeleteEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
            'delete_empty' => true,
        ));

        $form->setData(array('foo@foo.com'));
        $form->submit(array('foo@foo.com', ''));

        $this->assertTrue($form->has('0'));
        $this->assertFalse($form->has('1'));
        $this->assertEquals('foo@foo.com', $form[0]->getData());
        $this->assertEquals(array('foo@foo.com'), $form->getData());
    }

    public function testNoDeleteEmptyIfDeleteNotAllowed()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_delete' => false,
            'delete_empty' => true,
        ));

        $form->setData(array('foo@foo.com'));
        $form->submit(array(''));

        $this->assertTrue($form->has('0'));
        $this->assertEquals('', $form[0]->getData());
    }

    public function testResizedDownIfSubmittedWithCompoundEmptyDataAndDeleteEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => new AuthorType(),
            // If the field is not required, no new Author will be created if the
            // form is completely empty
            'options' => array('required' => false),
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Tests\Fixtures\AuthorType',
            // If the field is not required, no new Author will be created if the
            // form is completely empty
            'entry_options' => array('required' => false),
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
            'delete_empty' => true,
        ));

        $form->setData(array(new Author('first', 'last')));
        $form->submit(array(
            array('firstName' => 's_first', 'lastName' => 's_last'),
            array('firstName' => '', 'lastName' => ''),
        ));

        $this->assertTrue($form->has('0'));
        $this->assertFalse($form->has('1'));
        $this->assertEquals(new Author('s_first', 's_last'), $form[0]->getData());
        $this->assertEquals(array(new Author('s_first', 's_last')), $form->getData());
    }

    public function testNotResizedIfSubmittedWithExtraData()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));
        $form->setData(array('foo@bar.com'));
        $form->submit(array('foo@foo.com', 'bar@bar.com'));

        $this->assertTrue($form->has('0'));
        $this->assertFalse($form->has('1'));
        $this->assertEquals('foo@foo.com', $form[0]->getData());
    }

    public function testResizedUpIfSubmittedWithExtraDataAndAllowAdd()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'text',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
        ));
        $form->setData(array('foo@bar.com'));
        $form->submit(array('foo@bar.com', 'bar@bar.com'));

        $this->assertTrue($form->has('0'));
        $this->assertTrue($form->has('1'));
        $this->assertEquals('foo@bar.com', $form[0]->getData());
        $this->assertEquals('bar@bar.com', $form[1]->getData());
        $this->assertEquals(array('foo@bar.com', 'bar@bar.com'), $form->getData());
    }

    public function testAllowAddButNoPrototype()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'form',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FormType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
            'prototype' => false,
        ));

        $this->assertFalse($form->has('__name__'));
    }

    public function testPrototypeMultipartPropagation()
    {
        $form = $this->factory
<<<<<<< HEAD
            ->create('collection', null, array(
                'type' => 'file',
=======
            ->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
                'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FileType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                'allow_add' => true,
                'prototype' => true,
            ))
        ;

        $this->assertTrue($form->createView()->vars['multipart']);
    }

    public function testGetDataDoesNotContainsPrototypeNameBeforeDataAreSet()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', array(), array(
            'type' => 'file',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FileType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'prototype' => true,
            'allow_add' => true,
        ));

        $data = $form->getData();
        $this->assertFalse(isset($data['__name__']));
    }

    public function testGetDataDoesNotContainsPrototypeNameAfterDataAreSet()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', array(), array(
            'type' => 'file',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FileType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
            'prototype' => true,
        ));

        $form->setData(array('foobar.png'));
        $data = $form->getData();
        $this->assertFalse(isset($data['__name__']));
    }

    public function testPrototypeNameOption()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'form',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FormType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'prototype' => true,
            'allow_add' => true,
        ));

        $this->assertSame('__name__', $form->getConfig()->getAttribute('prototype')->getName(), '__name__ is the default');

<<<<<<< HEAD
        $form = $this->factory->create('collection', null, array(
            'type' => 'form',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', null, array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FormType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'prototype' => true,
            'allow_add' => true,
            'prototype_name' => '__test__',
        ));

        $this->assertSame('__test__', $form->getConfig()->getAttribute('prototype')->getName());
    }

<<<<<<< HEAD
    public function testPrototypeDefaultLabel()
    {
        $form = $this->factory->create('collection', array(), array(
            'type' => 'file',
=======
    /**
     * @group legacy
     */
    public function testLegacyEntryOptions()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'type' => 'Symfony\Component\Form\Extension\Core\Type\NumberType',
            'options' => array('attr' => array('maxlength' => '10')),
        ));

        $resolvedOptions = $form->getConfig()->getOptions();

        $this->assertEquals('Symfony\Component\Form\Extension\Core\Type\NumberType', $resolvedOptions['entry_type']);
        $this->assertEquals(array('attr' => array('maxlength' => '10'), 'block_name' => 'entry'), $resolvedOptions['entry_options']);
    }

    public function testPrototypeDefaultLabel()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FileType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
            'prototype' => true,
            'prototype_name' => '__test__',
        ));

        $this->assertSame('__test__label__', $form->createView()->vars['prototype']->vars['label']);
    }

<<<<<<< HEAD
    public function testPrototypeDefaultRequired()
    {
        $form = $this->factory->create('collection', array(), array(
            'type' => 'file',
=======
    public function testPrototypeData()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'allow_add' => true,
            'prototype' => true,
            'prototype_data' => 'foo',
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
            'entry_options' => array(
                'data' => 'bar',
                'label' => false,
            ),
        ));

        $this->assertSame('foo', $form->createView()->vars['prototype']->vars['value']);
        $this->assertFalse($form->createView()->vars['prototype']->vars['label']);
    }

    /**
     * @group legacy
     */
    public function testLegacyPrototypeData()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'allow_add' => true,
            'prototype' => true,
            'type' => 'Symfony\Component\Form\Extension\Core\Type\TextType',
            'options' => array(
                'data' => 'bar',
                'label' => false,
            ),
        ));
        $this->assertSame('bar', $form->createView()->vars['prototype']->vars['value']);
        $this->assertFalse($form->createView()->vars['prototype']->vars['label']);
    }

    public function testPrototypeDefaultRequired()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FileType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
            'prototype' => true,
            'prototype_name' => '__test__',
        ));

        $this->assertTrue($form->createView()->vars['prototype']->vars['required']);
    }

    public function testPrototypeSetNotRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('collection', array(), array(
            'type' => 'file',
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FileType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
            'prototype' => true,
            'prototype_name' => '__test__',
            'required' => false,
        ));

        $this->assertFalse($form->createView()->vars['required'], 'collection is not required');
        $this->assertFalse($form->createView()->vars['prototype']->vars['required'], '"prototype" should not be required');
    }

    public function testPrototypeSetNotRequiredIfParentNotRequired()
    {
<<<<<<< HEAD
        $child = $this->factory->create('collection', array(), array(
            'type' => 'file',
=======
        $child = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FileType',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'allow_add' => true,
            'prototype' => true,
            'prototype_name' => '__test__',
        ));

<<<<<<< HEAD
        $parent = $this->factory->create('form', array(), array(
=======
        $parent = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', array(), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => false,
        ));

        $child->setParent($parent);
        $this->assertFalse($parent->createView()->vars['required'], 'Parent is not required');
        $this->assertFalse($child->createView()->vars['required'], 'Child is not required');
        $this->assertFalse($child->createView()->vars['prototype']->vars['required'], '"Prototype" should not be required');
    }

    public function testPrototypeNotOverrideRequiredByEntryOptionsInFavorOfParent()
    {
<<<<<<< HEAD
        $child = $this->factory->create('collection', array(), array(
            'type' => 'file',
            'allow_add' => true,
            'prototype' => true,
            'prototype_name' => '__test__',
            'options' => array(
=======
        $child = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CollectionType', array(), array(
            'entry_type' => 'Symfony\Component\Form\Extension\Core\Type\FileType',
            'allow_add' => true,
            'prototype' => true,
            'prototype_name' => '__test__',
            'entry_options' => array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                'required' => true,
            ),
        ));

<<<<<<< HEAD
        $parent = $this->factory->create('form', array(), array(
=======
        $parent = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', array(), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => false,
        ));

        $child->setParent($parent);

        $this->assertFalse($parent->createView()->vars['required'], 'Parent is not required');
        $this->assertFalse($child->createView()->vars['required'], 'Child is not required');
        $this->assertFalse($child->createView()->vars['prototype']->vars['required'], '"Prototype" should not be required');
    }
}
