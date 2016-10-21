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

use Symfony\Component\PropertyAccess\PropertyPath;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Tests\Fixtures\Author;
use Symfony\Component\Form\Tests\Fixtures\FixedDataTransformer;
use Symfony\Component\Form\FormError;

class FormTest_AuthorWithoutRefSetter
{
    protected $reference;

    protected $referenceCopy;

    public function __construct($reference)
    {
        $this->reference = $reference;
        $this->referenceCopy = $reference;
    }

    // The returned object should be modified by reference without having
    // to provide a setReference() method
    public function getReference()
    {
        return $this->reference;
    }

    // The returned object is a copy, so setReferenceCopy() must be used
    // to update it
    public function getReferenceCopy()
    {
        return is_object($this->referenceCopy) ? clone $this->referenceCopy : $this->referenceCopy;
    }

    public function setReferenceCopy($reference)
    {
        $this->referenceCopy = $reference;
    }
}

class FormTypeTest extends BaseTypeTest
{
<<<<<<< HEAD
    public function testCreateFormInstances()
    {
        $this->assertInstanceOf('Symfony\Component\Form\Form', $this->factory->create('form'));
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('form');

        $this->assertSame('form', $form->getConfig()->getType()->getName());
    }

    public function testCreateFormInstances()
    {
        $this->assertInstanceOf('Symfony\Component\Form\Form', $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testPassRequiredAsOption()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array('required' => false));

        $this->assertFalse($form->isRequired());

        $form = $this->factory->create('form', null, array('required' => true));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array('required' => false));

        $this->assertFalse($form->isRequired());

        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array('required' => true));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertTrue($form->isRequired());
    }

    public function testSubmittedDataIsTrimmedBeforeTransforming()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('form')
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->addViewTransformer(new FixedDataTransformer(array(
                null => '',
                'reverse[a]' => 'a',
            )))
            ->setCompound(false)
            ->getForm();

        $form->submit(' a ');

        $this->assertEquals('a', $form->getViewData());
        $this->assertEquals('reverse[a]', $form->getData());
    }

    public function testSubmittedDataIsNotTrimmedBeforeTransformingIfNoTrimming()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('form', null, array('trim' => false))
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array('trim' => false))
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->addViewTransformer(new FixedDataTransformer(array(
                null => '',
                'reverse[ a ]' => ' a ',
            )))
            ->setCompound(false)
            ->getForm();

        $form->submit(' a ');

        $this->assertEquals(' a ', $form->getViewData());
        $this->assertEquals('reverse[ a ]', $form->getData());
    }

<<<<<<< HEAD
    public function testNonReadOnlyFormWithReadOnlyParentIsReadOnly()
    {
        $view = $this->factory->createNamedBuilder('parent', 'form', null, array('read_only' => true))
            ->add('child', 'form')
=======
    /**
     * @group legacy
     */
    public function testLegacyNonReadOnlyFormWithReadOnlyParentIsReadOnly()
    {
        $view = $this->factory->createNamedBuilder('parent', 'Symfony\Component\Form\Extension\Core\Type\FormType', null, array('read_only' => true))
            ->add('child', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->getForm()
            ->createView();

        $this->assertTrue($view['child']->vars['read_only']);
    }

    public function testNonReadOnlyFormWithReadOnlyParentIsReadOnly()
    {
        $view = $this->factory->createNamedBuilder('parent', 'Symfony\Component\Form\Extension\Core\Type\FormType', null, array('attr' => array('readonly' => true)))
            ->add('child', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->getForm()
            ->createView();

        $this->assertTrue($view['child']->vars['attr']['readonly']);
    }

    /**
     * @group legacy
     */
    public function testLegacyReadOnlyFormWithNonReadOnlyParentIsReadOnly()
    {
        $view = $this->factory->createNamedBuilder('parent', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('child', 'Symfony\Component\Form\Extension\Core\Type\FormType', array('read_only' => true))
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm()
            ->createView();

        $this->assertTrue($view['child']->vars['read_only']);
    }

    public function testReadOnlyFormWithNonReadOnlyParentIsReadOnly()
    {
<<<<<<< HEAD
        $view = $this->factory->createNamedBuilder('parent', 'form')
            ->add('child', 'form', array('read_only' => true))
            ->getForm()
            ->createView();

        $this->assertTrue($view['child']->vars['read_only']);
    }

    public function testNonReadOnlyFormWithNonReadOnlyParentIsNotReadOnly()
    {
        $view = $this->factory->createNamedBuilder('parent', 'form')
                ->add('child', 'form')
=======
        $view = $this->factory->createNamedBuilder('parent', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('child', 'Symfony\Component\Form\Extension\Core\Type\FormType', array('attr' => array('readonly' => true)))
            ->getForm()
            ->createView();

        $this->assertTrue($view['child']->vars['attr']['readonly']);
    }

    /**
     * @group legacy
     */
    public function testLegacyNonReadOnlyFormWithNonReadOnlyParentIsNotReadOnly()
    {
        $view = $this->factory->createNamedBuilder('parent', 'Symfony\Component\Form\Extension\Core\Type\FormType')
                ->add('child', 'Symfony\Component\Form\Extension\Core\Type\FormType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                ->getForm()
                ->createView();

        $this->assertFalse($view['child']->vars['read_only']);
    }

<<<<<<< HEAD
    public function testPassMaxLengthToView()
    {
        $form = $this->factory->create('form', null, array('attr' => array('maxlength' => 10)));
=======
    public function testNonReadOnlyFormWithNonReadOnlyParentIsNotReadOnly()
    {
        $view = $this->factory->createNamedBuilder('parent', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('child', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->getForm()
            ->createView();

        $this->assertArrayNotHasKey('readonly', $view['child']->vars['attr']);
    }

    public function testPassMaxLengthToView()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array('attr' => array('maxlength' => 10)));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();

        $this->assertSame(10, $view->vars['attr']['maxlength']);
    }

    public function testPassMaxLengthBCToView()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array('max_length' => 10));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array('max_length' => 10));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();

        $this->assertSame(10, $view->vars['attr']['maxlength']);
    }

    public function testDataClassMayBeNull()
    {
<<<<<<< HEAD
        $this->factory->createBuilder('form', null, array(
=======
        $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'data_class' => null,
        ));
    }

    public function testDataClassMayBeAbstractClass()
    {
<<<<<<< HEAD
        $this->factory->createBuilder('form', null, array(
=======
        $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\AbstractAuthor',
        ));
    }

    public function testDataClassMayBeInterface()
    {
<<<<<<< HEAD
        $this->factory->createBuilder('form', null, array(
=======
        $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\AuthorInterface',
        ));
    }

    /**
     * @expectedException \Symfony\Component\Form\Exception\InvalidArgumentException
     */
    public function testDataClassMustBeValidClassOrInterface()
    {
<<<<<<< HEAD
        $this->factory->createBuilder('form', null, array(
=======
        $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'data_class' => 'foobar',
        ));
    }

    public function testSubmitWithEmptyDataCreatesObjectIfClassAvailable()
    {
<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'required' => false,
        ));
        $builder->add('firstName', 'text');
        $builder->add('lastName', 'text');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'required' => false,
        ));
        $builder->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
        $builder->add('lastName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form->setData(null);
        // partially empty, still an object is created
        $form->submit(array('firstName' => 'Bernhard', 'lastName' => ''));

        $author = new Author();
        $author->firstName = 'Bernhard';
        $author->setLastName('');

        $this->assertEquals($author, $form->getData());
    }

    public function testSubmitWithEmptyDataCreatesObjectIfInitiallySubmittedWithObject()
    {
<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', null, array(
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            // data class is inferred from the passed object
            'data' => new Author(),
            'required' => false,
        ));
<<<<<<< HEAD
        $builder->add('firstName', 'text');
        $builder->add('lastName', 'text');
=======
        $builder->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
        $builder->add('lastName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form->setData(null);
        // partially empty, still an object is created
        $form->submit(array('firstName' => 'Bernhard', 'lastName' => ''));

        $author = new Author();
        $author->firstName = 'Bernhard';
        $author->setLastName('');

        $this->assertEquals($author, $form->getData());
    }

    public function testSubmitWithEmptyDataCreatesArrayIfDataClassIsNull()
    {
<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', null, array(
            'data_class' => null,
            'required' => false,
        ));
        $builder->add('firstName', 'text');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
            'data_class' => null,
            'required' => false,
        ));
        $builder->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form->setData(null);
        $form->submit(array('firstName' => 'Bernhard'));

        $this->assertSame(array('firstName' => 'Bernhard'), $form->getData());
    }

    public function testSubmitEmptyWithEmptyDataCreatesNoObjectIfNotRequired()
    {
<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'required' => false,
        ));
        $builder->add('firstName', 'text');
        $builder->add('lastName', 'text');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'required' => false,
        ));
        $builder->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
        $builder->add('lastName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form->setData(null);
        $form->submit(array('firstName' => '', 'lastName' => ''));

        $this->assertNull($form->getData());
    }

    public function testSubmitEmptyWithEmptyDataCreatesObjectIfRequired()
    {
<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'required' => true,
        ));
        $builder->add('firstName', 'text');
        $builder->add('lastName', 'text');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'required' => true,
        ));
        $builder->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
        $builder->add('lastName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form->setData(null);
        $form->submit(array('firstName' => '', 'lastName' => ''));

        $this->assertEquals(new Author(), $form->getData());
    }

    /*
     * We need something to write the field values into
     */
    public function testSubmitWithEmptyDataStoresArrayIfNoClassAvailable()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('form')
            ->add('firstName', 'text')
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();

        $form->setData(null);
        $form->submit(array('firstName' => 'Bernhard'));

        $this->assertSame(array('firstName' => 'Bernhard'), $form->getData());
    }

    public function testSubmitWithEmptyDataPassesEmptyStringToTransformerIfNotCompound()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('form')
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->addViewTransformer(new FixedDataTransformer(array(
                // required for the initial, internal setData(null)
                null => 'null',
                // required to test that submit(null) is converted to ''
                'empty' => '',
            )))
            ->setCompound(false)
            ->getForm();

        $form->submit(null);

        $this->assertSame('empty', $form->getData());
    }

    public function testSubmitWithEmptyDataUsesEmptyDataOption()
    {
        $author = new Author();

<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'empty_data' => $author,
        ));
        $builder->add('firstName', 'text');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'empty_data' => $author,
        ));
        $builder->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form->submit(array('firstName' => 'Bernhard'));

        $this->assertSame($author, $form->getData());
        $this->assertEquals('Bernhard', $author->firstName);
    }

    public function provideZeros()
    {
        return array(
            array(0, '0'),
            array('0', '0'),
            array('00000', '00000'),
        );
    }

    /**
     * @dataProvider provideZeros
     *
     * @see https://github.com/symfony/symfony/issues/1986
     */
    public function testSetDataThroughParamsWithZero($data, $dataAsString)
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'data' => $data,
            'compound' => false,
        ));
        $view = $form->createView();

        $this->assertFalse($form->isEmpty());

        $this->assertSame($dataAsString, $view->vars['value']);
        $this->assertSame($dataAsString, $form->getData());
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testAttributesException()
    {
<<<<<<< HEAD
        $this->factory->create('form', null, array('attr' => ''));
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array('attr' => ''));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testNameCanBeEmptyString()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('', 'form');
=======
        $form = $this->factory->createNamed('', 'Symfony\Component\Form\Extension\Core\Type\FormType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertEquals('', $form->getName());
    }

    public function testSubformDoesntCallSetters()
    {
        $author = new FormTest_AuthorWithoutRefSetter(new Author());

<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', $author);
        $builder->add('reference', 'form', array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
        ));
        $builder->get('reference')->add('firstName', 'text');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', $author);
        $builder->add('reference', 'Symfony\Component\Form\Extension\Core\Type\FormType', array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
        ));
        $builder->get('reference')->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form->submit(array(
            // reference has a getter, but not setter
            'reference' => array(
                'firstName' => 'Foo',
            ),
        ));

        $this->assertEquals('Foo', $author->getReference()->firstName);
    }

    public function testSubformCallsSettersIfTheObjectChanged()
    {
        // no reference
        $author = new FormTest_AuthorWithoutRefSetter(null);
        $newReference = new Author();

<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', $author);
        $builder->add('referenceCopy', 'form', array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
        ));
        $builder->get('referenceCopy')->add('firstName', 'text');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', $author);
        $builder->add('referenceCopy', 'Symfony\Component\Form\Extension\Core\Type\FormType', array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
        ));
        $builder->get('referenceCopy')->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form['referenceCopy']->setData($newReference); // new author object

        $form->submit(array(
        // referenceCopy has a getter that returns a copy
            'referenceCopy' => array(
                'firstName' => 'Foo',
        ),
        ));

        $this->assertEquals('Foo', $author->getReferenceCopy()->firstName);
    }

    public function testSubformCallsSettersIfByReferenceIsFalse()
    {
        $author = new FormTest_AuthorWithoutRefSetter(new Author());

<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', $author);
        $builder->add('referenceCopy', 'form', array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'by_reference' => false,
        ));
        $builder->get('referenceCopy')->add('firstName', 'text');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', $author);
        $builder->add('referenceCopy', 'Symfony\Component\Form\Extension\Core\Type\FormType', array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'by_reference' => false,
        ));
        $builder->get('referenceCopy')->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        $form->submit(array(
            // referenceCopy has a getter that returns a copy
            'referenceCopy' => array(
                'firstName' => 'Foo',
            ),
        ));

        // firstName can only be updated if setReferenceCopy() was called
        $this->assertEquals('Foo', $author->getReferenceCopy()->firstName);
    }

    public function testSubformCallsSettersIfReferenceIsScalar()
    {
        $author = new FormTest_AuthorWithoutRefSetter('scalar');

<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', $author);
        $builder->add('referenceCopy', 'form');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', $author);
        $builder->add('referenceCopy', 'Symfony\Component\Form\Extension\Core\Type\FormType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $builder->get('referenceCopy')->addViewTransformer(new CallbackTransformer(
            function () {},
            function ($value) { // reverseTransform

                return 'foobar';
            }
        ));
        $form = $builder->getForm();

        $form->submit(array(
            'referenceCopy' => array(), // doesn't matter actually
        ));

        // firstName can only be updated if setReferenceCopy() was called
        $this->assertEquals('foobar', $author->getReferenceCopy());
    }

    public function testSubformAlwaysInsertsIntoArrays()
    {
        $ref1 = new Author();
        $ref2 = new Author();
        $author = array('referenceCopy' => $ref1);

<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form');
        $builder->setData($author);
        $builder->add('referenceCopy', 'form');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType');
        $builder->setData($author);
        $builder->add('referenceCopy', 'Symfony\Component\Form\Extension\Core\Type\FormType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $builder->get('referenceCopy')->addViewTransformer(new CallbackTransformer(
            function () {},
            function ($value) use ($ref2) { // reverseTransform

                return $ref2;
            }
        ));
        $form = $builder->getForm();

        $form->submit(array(
            'referenceCopy' => array('a' => 'b'), // doesn't matter actually
        ));

        // the new reference was inserted into the array
        $author = $form->getData();
        $this->assertSame($ref2, $author['referenceCopy']);
    }

    public function testPassMultipartTrueIfAnyChildIsMultipartToView()
    {
<<<<<<< HEAD
        $view = $this->factory->createBuilder('form')
            ->add('foo', 'text')
            ->add('bar', 'file')
=======
        $view = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('foo', 'Symfony\Component\Form\Extension\Core\Type\TextType')
            ->add('bar', 'Symfony\Component\Form\Extension\Core\Type\FileType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm()
            ->createView();

        $this->assertTrue($view->vars['multipart']);
    }

    public function testViewIsNotRenderedByDefault()
    {
<<<<<<< HEAD
        $view = $this->factory->createBuilder('form')
                ->add('foo', 'form')
=======
        $view = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType')
                ->add('foo', 'Symfony\Component\Form\Extension\Core\Type\FormType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                ->getForm()
                ->createView();

        $this->assertFalse($view->isRendered());
    }

    public function testErrorBubblingIfCompound()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'compound' => true,
        ));

        $this->assertTrue($form->getConfig()->getErrorBubbling());
    }

    public function testNoErrorBubblingIfNotCompound()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'compound' => false,
        ));

        $this->assertFalse($form->getConfig()->getErrorBubbling());
    }

    public function testOverrideErrorBubbling()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'compound' => false,
            'error_bubbling' => true,
        ));

        $this->assertTrue($form->getConfig()->getErrorBubbling());
    }

    public function testPropertyPath()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'property_path' => 'foo',
        ));

        $this->assertEquals(new PropertyPath('foo'), $form->getPropertyPath());
        $this->assertTrue($form->getConfig()->getMapped());
    }

    public function testPropertyPathNullImpliesDefault()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'form', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'property_path' => null,
        ));

        $this->assertEquals(new PropertyPath('name'), $form->getPropertyPath());
        $this->assertTrue($form->getConfig()->getMapped());
    }

    public function testNotMapped()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'property_path' => 'foo',
            'mapped' => false,
        ));

        $this->assertEquals(new PropertyPath('foo'), $form->getPropertyPath());
        $this->assertFalse($form->getConfig()->getMapped());
    }

    public function testViewValidNotSubmitted()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();
        $this->assertTrue($view->vars['valid']);
    }

    public function testViewNotValidSubmitted()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->submit(array());
        $form->addError(new FormError('An error'));
        $view = $form->createView();
        $this->assertFalse($view->vars['valid']);
    }

    public function testViewSubmittedNotSubmitted()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();
        $this->assertFalse($view->vars['submitted']);
    }

    public function testViewSubmittedSubmitted()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->submit(array());
        $view = $form->createView();
        $this->assertTrue($view->vars['submitted']);
    }

    public function testDataOptionSupersedesSetDataCalls()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'data' => 'default',
            'compound' => false,
        ));

        $form->setData('foobar');

        $this->assertSame('default', $form->getData());
    }

    public function testDataOptionSupersedesSetDataCallsIfNull()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'data' => null,
            'compound' => false,
        ));

        $form->setData('foobar');

        $this->assertNull($form->getData());
    }

    public function testNormDataIsPassedToView()
    {
<<<<<<< HEAD
        $view = $this->factory->createBuilder('form')
=======
        $view = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->addViewTransformer(new FixedDataTransformer(array(
                'foo' => 'bar',
            )))
            ->setData('foo')
            ->getForm()
            ->createView();

        $this->assertSame('foo', $view->vars['data']);
        $this->assertSame('bar', $view->vars['value']);
    }

    // https://github.com/symfony/symfony/issues/6862
    public function testPassZeroLabelToView()
    {
<<<<<<< HEAD
        $view = $this->factory->create('form', null, array(
=======
        $view = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                'label' => '0',
            ))
            ->createView();

        $this->assertSame('0', $view->vars['label']);
    }

    /**
     * @group legacy
     */
    public function testCanGetErrorsWhenButtonInForm()
    {
<<<<<<< HEAD
        $builder = $this->factory->createBuilder('form', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'required' => false,
        ));
        $builder->add('foo', 'text');
        $builder->add('submit', 'submit');
=======
        $builder = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
            'required' => false,
        ));
        $builder->add('foo', 'Symfony\Component\Form\Extension\Core\Type\TextType');
        $builder->add('submit', 'Symfony\Component\Form\Extension\Core\Type\SubmitType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form = $builder->getForm();

        //This method should not throw a Fatal Error Exception.
        $form->getErrorsAsString();
    }

    protected function getTestedType()
    {
<<<<<<< HEAD
        return 'form';
=======
        return 'Symfony\Component\Form\Extension\Core\Type\FormType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
