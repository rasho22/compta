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

use Symfony\Component\Form\FormError;

abstract class AbstractBootstrap3LayoutTest extends AbstractLayoutTest
{
    public function testLabelOnForm()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'date');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();
        $this->renderWidget($view, array('label' => 'foo'));
        $html = $this->renderLabel($view);

        $this->assertMatchesXpath($html,
'/label
    [@class="control-label required"]
    [.="[trans]Name[/trans]"]
'
        );
    }

    public function testLabelDoesNotRenderFieldAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $html = $this->renderLabel($form->createView(), null, array(
            'attr' => array(
                'class' => 'my&class',
            ),
        ));

        $this->assertMatchesXpath($html,
'/label
    [@for="name"]
    [@class="control-label required"]
'
        );
    }

    public function testLabelWithCustomAttributesPassedDirectly()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $html = $this->renderLabel($form->createView(), null, array(
            'label_attr' => array(
                'class' => 'my&class',
            ),
        ));

        $this->assertMatchesXpath($html,
'/label
    [@for="name"]
    [@class="my&class control-label required"]
'
        );
    }

    public function testLabelWithCustomTextAndCustomAttributesPassedDirectly()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $html = $this->renderLabel($form->createView(), 'Custom label', array(
            'label_attr' => array(
                'class' => 'my&class',
            ),
        ));

        $this->assertMatchesXpath($html,
'/label
    [@for="name"]
    [@class="my&class control-label required"]
    [.="[trans]Custom label[/trans]"]
'
        );
    }

    public function testLabelWithCustomTextAsOptionAndCustomAttributesPassedDirectly()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'label' => 'Custom label',
        ));
        $html = $this->renderLabel($form->createView(), null, array(
            'label_attr' => array(
                'class' => 'my&class',
            ),
        ));

        $this->assertMatchesXpath($html,
'/label
    [@for="name"]
    [@class="my&class control-label required"]
    [.="[trans]Custom label[/trans]"]
'
        );
    }

    public function testErrors()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->addError(new FormError('[trans]Error 1[/trans]'));
        $form->addError(new FormError('[trans]Error 2[/trans]'));
        $view = $form->createView();
        $html = $this->renderErrors($view);

        $this->assertMatchesXpath($html,
'/div
    [@class="alert alert-danger"]
    [
        ./ul
            [@class="list-unstyled"]
            [
                ./li
                    [.=" [trans]Error 1[/trans]"]
                    [
                        ./span[@class="glyphicon glyphicon-exclamation-sign"]
                    ]
                /following-sibling::li
                    [.=" [trans]Error 2[/trans]"]
                    [
                        ./span[@class="glyphicon glyphicon-exclamation-sign"]
                    ]
            ]
            [count(./li)=2]
    ]
'
        );
    }

    public function testOverrideWidgetBlock()
    {
        // see custom_widgets.html.twig
<<<<<<< HEAD
        $form = $this->factory->createNamed('text_id', 'text');
=======
        $form = $this->factory->createNamed('text_id', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $html = $this->renderWidget($form->createView());

        $this->assertMatchesXpath($html,
'/div
    [
        ./input
        [@type="text"]
        [@id="text_id"]
        [@class="form-control"]
    ]
    [@id="container"]
'
        );
    }

    public function testCheckedCheckbox()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'checkbox', true);
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', true);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('id' => 'my&id', 'attr' => array('class' => 'my&class')),
'/div
    [@class="checkbox"]
    [
        ./label
            [.=" [trans]Name[/trans]"]
            [
                ./input[@type="checkbox"][@name="name"][@id="my&id"][@class="my&class"][@checked="checked"][@value="1"]
            ]
    ]
'
        );
    }

    public function testUncheckedCheckbox()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'checkbox', false);
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', false);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('id' => 'my&id', 'attr' => array('class' => 'my&class')),
'/div
    [@class="checkbox"]
    [
        ./label
            [.=" [trans]Name[/trans]"]
            [
                ./input[@type="checkbox"][@name="name"][@id="my&id"][@class="my&class"][not(@checked)]
            ]
    ]
'
        );
    }

    public function testCheckboxWithValue()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'checkbox', false, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', false, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => 'foo&bar',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('id' => 'my&id', 'attr' => array('class' => 'my&class')),
'/div
    [@class="checkbox"]
    [
        ./label
            [.=" [trans]Name[/trans]"]
            [
                ./input[@type="checkbox"][@name="name"][@id="my&id"][@class="my&class"][@value="foo&bar"]
            ]
    ]
'
        );
    }

    public function testSingleChoice()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=2]
'
        );
    }

    public function testSingleChoiceAttributesWithMainAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => false,
            'attr' => array('class' => 'bar&baz'),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'bar&baz')),
'/select
    [@name="name"]
    [@class="bar&baz form-control"]
    [not(@required)]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=2]
'
        );
    }

    public function testSingleExpandedChoiceAttributesWithMainAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => true,
            'attr' => array('class' => 'bar&baz'),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'bar&baz')),
'/div
    [@class="bar&baz"]
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&A[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&B[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testSelectWithSizeBiggerThanOneCanBeRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('a', 'b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => false,
            'attr' => array('size' => 2),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => '')),
'/select
    [@name="name"]
    [@required="required"]
    [@size="2"]
    [count(./option)=2]
'
        );
    }

    public function testSingleChoiceWithoutTranslation()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => false,
            'choice_translation_domain' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value="&a"][@selected="selected"][.="Choice&A"]
        /following-sibling::option[@value="&b"][not(@selected)][.="Choice&B"]
    ]
    [count(./option)=2]
'
        );
    }

<<<<<<< HEAD
    public function testSingleChoiceAttributes()
    {
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
    public function testSingleChoiceWithPlaceholderWithoutTranslation()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => false,
            'required' => false,
            'translation_domain' => false,
            'placeholder' => 'Placeholder&Not&Translated',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value=""][not(@selected)][not(@disabled)][.="Placeholder&Not&Translated"]
        /following-sibling::option[@value="&a"][@selected="selected"][.="Choice&A"]
        /following-sibling::option[@value="&b"][not(@selected)][.="Choice&B"]
    ]
    [count(./option)=3]
'
        );
    }

    public function testSingleChoiceAttributes()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'choice_attr' => array('Choice&B' => array('class' => 'foo&bar')),
            'multiple' => false,
            'expanded' => false,
        ));

        $classPart = in_array('choice_attr', $this->testableFeatures) ? '[@class="foo&bar"]' : '';

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"]'.$classPart.'[not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=2]
'
        );
    }

    public function testSingleChoiceWithPreferred()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'preferred_choices' => array('&b'),
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('separator' => '-- sep --', 'attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
        /following-sibling::option[@disabled="disabled"][not(@selected)][.="-- sep --"]
        /following-sibling::option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
    ]
    [count(./option)=3]
'
        );
    }

    public function testSingleChoiceWithPreferredAndNoSeparator()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'preferred_choices' => array('&b'),
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('separator' => null, 'attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
        /following-sibling::option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
    ]
    [count(./option)=2]
'
        );
    }

    public function testSingleChoiceWithPreferredAndBlankSeparator()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'preferred_choices' => array('&b'),
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('separator' => '', 'attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
        /following-sibling::option[@disabled="disabled"][not(@selected)][.=""]
        /following-sibling::option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
    ]
    [count(./option)=3]
'
        );
    }

    public function testChoiceWithOnlyPreferred()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'preferred_choices' => array('&a', '&b'),
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@class="my&class form-control"]
    [count(./option)=2]
'
        );
    }

    public function testSingleChoiceNonRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'required' => false,
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value=""][.=""]
        /following-sibling::option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=3]
'
        );
    }

    public function testSingleChoiceNonRequiredNoneSelected()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'required' => false,
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value=""][.=""]
        /following-sibling::option[@value="&a"][not(@selected)][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=3]
'
        );
    }

    public function testSingleChoiceNonRequiredWithPlaceholder()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => false,
            'required' => false,
            'placeholder' => 'Select&Anything&Not&Me',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [
        ./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Select&Anything&Not&Me[/trans]"]
        /following-sibling::option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=3]
'
        );
    }

    public function testSingleChoiceRequiredWithPlaceholder()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'required' => true,
            'multiple' => false,
            'expanded' => false,
            'placeholder' => 'Test&Me',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [@required="required"]
    [
        ./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Test&Me[/trans]"]
        /following-sibling::option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=3]
'
        );
    }

    public function testSingleChoiceRequiredWithPlaceholderViaView()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'required' => true,
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('placeholder' => '', 'attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [@required="required"]
    [
        ./option[@value=""][not(@selected)][not(@disabled)][.=""]
        /following-sibling::option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=3]
'
        );
    }

    public function testSingleChoiceGrouped()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array(
                'Group&1' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
                'Group&2' => array('Choice&C' => '&c'),
            ),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [./optgroup[@label="[trans]Group&1[/trans]"]
        [
            ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
            /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
        ]
        [count(./option)=2]
    ]
    [./optgroup[@label="[trans]Group&2[/trans]"]
        [./option[@value="&c"][not(@selected)][.="[trans]Choice&C[/trans]"]]
        [count(./option)=1]
    ]
    [count(./optgroup)=2]
'
        );
    }

    public function testMultipleChoice()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'required' => true,
            'multiple' => true,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name[]"]
    [@class="my&class form-control"]
    [@required="required"]
    [@multiple="multiple"]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=2]
'
        );
    }

    public function testMultipleChoiceAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'choice_attr' => array('Choice&B' => array('class' => 'foo&bar')),
            'required' => true,
            'multiple' => true,
            'expanded' => false,
        ));

        $classPart = in_array('choice_attr', $this->testableFeatures) ? '[@class="foo&bar"]' : '';

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name[]"]
    [@class="my&class form-control"]
    [@required="required"]
    [@multiple="multiple"]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"]'.$classPart.'[not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=2]
'
        );
    }

    public function testMultipleChoiceSkipsPlaceholder()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => true,
            'expanded' => false,
            'placeholder' => 'Test&Me',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name[]"]
    [@class="my&class form-control"]
    [@multiple="multiple"]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=2]
'
        );
    }

    public function testMultipleChoiceNonRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'required' => false,
            'multiple' => true,
            'expanded' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name[]"]
    [@class="my&class form-control"]
    [@multiple="multiple"]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=2]
'
        );
    }

    public function testSingleChoiceExpanded()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&A[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&B[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testSingleChoiceExpandedWithLabelsAsFalse()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'choice_label' => false,
            'multiple' => false,
            'expanded' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testSingleChoiceExpandedWithLabelsSetByCallable()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b', 'Choice&C' => '&c'),
            'choices_as_values' => true,
            'choice_label' => function ($choice, $label, $value) {
                if ('&b' === $choice) {
                    return false;
                }

                return 'label.'.$value;
            },
            'multiple' => false,
            'expanded' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]label.&a[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]label.&c[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_2"][@value="&c"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testSingleChoiceExpandedWithLabelsSetFalseByCallable()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'choice_label' => function () {
                return false;
            },
            'multiple' => false,
            'expanded' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testSingleChoiceExpandedWithoutTranslation()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => true,
            'choice_translation_domain' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [.=" Choice&A"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" Choice&B"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testSingleChoiceExpandedAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'choice_attr' => array('Choice&B' => array('class' => 'foo&bar')),
            'multiple' => false,
            'expanded' => true,
        ));

        $classPart = in_array('choice_attr', $this->testableFeatures) ? '[@class="foo&bar"]' : '';

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&A[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&B[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]'.$classPart.'
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testSingleChoiceExpandedWithPlaceholder()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', '&a', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => true,
            'placeholder' => 'Test&Me',
            'required' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Test&Me[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_placeholder"][not(@checked)]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&A[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&B[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

<<<<<<< HEAD
    public function testSingleChoiceExpandedWithBooleanValue()
    {
        $form = $this->factory->createNamed('name', 'choice', true, array(
=======
    public function testSingleChoiceExpandedWithPlaceholderWithoutTranslation()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', '&a', array(
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => true,
            'required' => false,
            'choice_translation_domain' => false,
            'placeholder' => 'Placeholder&Not&Translated',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [.=" Placeholder&Not&Translated"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_placeholder"][not(@checked)]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" Choice&A"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" Choice&B"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testSingleChoiceExpandedWithBooleanValue()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', true, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '1', 'Choice&B' => '0'),
            'choices_as_values' => true,
            'multiple' => false,
            'expanded' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&A[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_0"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="radio"]
            [
                ./label
                    [.=" [trans]Choice&B[/trans]"]
                    [
                        ./input[@type="radio"][@name="name"][@id="name_1"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testMultipleChoiceExpanded()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a', '&c'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a', '&c'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b', 'Choice&C' => '&c'),
            'choices_as_values' => true,
            'multiple' => true,
            'expanded' => true,
            'required' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="checkbox"]
            [
                ./label
                    [.=" [trans]Choice&A[/trans]"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@checked][not(@required)]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [.=" [trans]Choice&B[/trans]"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_1"][not(@checked)][not(@required)]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [.=" [trans]Choice&C[/trans]"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_2"][@checked][not(@required)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testMultipleChoiceExpandedWithLabelsAsFalse()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'choice_label' => false,
            'multiple' => true,
            'expanded' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="checkbox"]
            [
                ./label
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testMultipleChoiceExpandedWithLabelsSetByCallable()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b', 'Choice&C' => '&c'),
            'choices_as_values' => true,
            'choice_label' => function ($choice, $label, $value) {
                if ('&b' === $choice) {
                    return false;
                }

                return 'label.'.$value;
            },
            'multiple' => true,
            'expanded' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
            '/div
    [
        ./div
            [@class="checkbox"]
            [
                ./label
                    [.=" [trans]label.&a[/trans]"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [.=" [trans]label.&c[/trans]"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_2"][@value="&c"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testMultipleChoiceExpandedWithLabelsSetFalseByCallable()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b'),
            'choices_as_values' => true,
            'choice_label' => function () {
                return false;
            },
            'multiple' => true,
            'expanded' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="checkbox"]
            [
                ./label
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@value="&a"][@checked]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_1"][@value="&b"][not(@checked)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testMultipleChoiceExpandedWithoutTranslation()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a', '&c'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a', '&c'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b', 'Choice&C' => '&c'),
            'choices_as_values' => true,
            'multiple' => true,
            'expanded' => true,
            'required' => true,
            'choice_translation_domain' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="checkbox"]
            [
                ./label
                    [.=" Choice&A"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@checked][not(@required)]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [.=" Choice&B"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_1"][not(@checked)][not(@required)]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [.=" Choice&C"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_2"][@checked][not(@required)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testMultipleChoiceExpandedAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'choice', array('&a', '&c'), array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array('&a', '&c'), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'choices' => array('Choice&A' => '&a', 'Choice&B' => '&b', 'Choice&C' => '&c'),
            'choices_as_values' => true,
            'choice_attr' => array('Choice&B' => array('class' => 'foo&bar')),
            'multiple' => true,
            'expanded' => true,
            'required' => true,
        ));

        $classPart = in_array('choice_attr', $this->testableFeatures) ? '[@class="foo&bar"]' : '';

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@class="checkbox"]
            [
                ./label
                    [.=" [trans]Choice&A[/trans]"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@checked][not(@required)]
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [.=" [trans]Choice&B[/trans]"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_1"][not(@checked)][not(@required)]'.$classPart.'
                    ]
            ]
        /following-sibling::div
            [@class="checkbox"]
            [
                ./label
                    [.=" [trans]Choice&C[/trans]"]
                    [
                        ./input[@type="checkbox"][@name="name[]"][@id="name_2"][@checked][not(@required)]
                    ]
            ]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
'
        );
    }

    public function testCountry()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'country', 'AT');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\CountryType', 'AT');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [./option[@value="AT"][@selected="selected"][.="Austria"]]
    [count(./option)>200]
'
        );
    }

    public function testCountryWithPlaceholder()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'country', 'AT', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\CountryType', 'AT', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'placeholder' => 'Select&Country',
            'required' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Select&Country[/trans]"]]
    [./option[@value="AT"][@selected="selected"][.="Austria"]]
    [count(./option)>201]
'
        );
    }

    public function testDateTime()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'datetime', '2011-02-03 04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', '2011-02-03 04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'with_seconds' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [
        ./select
            [@id="name_date_month"]
            [@class="form-control"]
            [./option[@value="2"][@selected="selected"]]
        /following-sibling::select
            [@id="name_date_day"]
            [@class="form-control"]
            [./option[@value="3"][@selected="selected"]]
        /following-sibling::select
            [@id="name_date_year"]
            [@class="form-control"]
            [./option[@value="2011"][@selected="selected"]]
        /following-sibling::select
            [@id="name_time_hour"]
            [@class="form-control"]
            [./option[@value="4"][@selected="selected"]]
        /following-sibling::select
            [@id="name_time_minute"]
            [@class="form-control"]
            [./option[@value="5"][@selected="selected"]]
    ]
    [count(.//select)=5]
'
        );
    }

    public function testDateTimeWithPlaceholderGlobal()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'datetime', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'placeholder' => 'Change&Me',
            'required' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_date_month"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
        /following-sibling::select
            [@id="name_date_day"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
        /following-sibling::select
            [@id="name_date_year"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
        /following-sibling::select
            [@id="name_time_hour"]
            [@class="form-control"]
            [./option[@value=""][.="[trans]Change&Me[/trans]"]]
        /following-sibling::select
            [@id="name_time_minute"]
            [@class="form-control"]
            [./option[@value=""][.="[trans]Change&Me[/trans]"]]
    ]
    [count(.//select)=5]
'
        );
    }

    public function testDateTimeWithHourAndMinute()
    {
        $data = array('year' => '2011', 'month' => '2', 'day' => '3', 'hour' => '4', 'minute' => '5');

<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'datetime', $data, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', $data, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'array',
            'required' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_date_month"]
            [@class="form-control"]
            [./option[@value="2"][@selected="selected"]]
        /following-sibling::select
            [@id="name_date_day"]
            [@class="form-control"]
            [./option[@value="3"][@selected="selected"]]
        /following-sibling::select
            [@id="name_date_year"]
            [@class="form-control"]
            [./option[@value="2011"][@selected="selected"]]
        /following-sibling::select
            [@id="name_time_hour"]
            [@class="form-control"]
            [./option[@value="4"][@selected="selected"]]
        /following-sibling::select
            [@id="name_time_minute"]
            [@class="form-control"]
            [./option[@value="5"][@selected="selected"]]
    ]
    [count(.//select)=5]
'
        );
    }

    public function testDateTimeWithSeconds()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'datetime', '2011-02-03 04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', '2011-02-03 04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'with_seconds' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_date_month"]
            [@class="form-control"]
            [./option[@value="2"][@selected="selected"]]
        /following-sibling::select
            [@id="name_date_day"]
            [@class="form-control"]
            [./option[@value="3"][@selected="selected"]]
        /following-sibling::select
            [@id="name_date_year"]
            [@class="form-control"]
            [./option[@value="2011"][@selected="selected"]]
        /following-sibling::select
            [@id="name_time_hour"]
            [@class="form-control"]
            [./option[@value="4"][@selected="selected"]]
        /following-sibling::select
            [@id="name_time_minute"]
            [@class="form-control"]
            [./option[@value="5"][@selected="selected"]]
        /following-sibling::select
            [@id="name_time_second"]
            [@class="form-control"]
            [./option[@value="6"][@selected="selected"]]
    ]
    [count(.//select)=6]
'
        );
    }

    public function testDateTimeSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'datetime', '2011-02-03 04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', '2011-02-03 04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'date_widget' => 'single_text',
            'time_widget' => 'single_text',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./input
            [@type="date"]
            [@id="name_date"]
            [@name="name[date]"]
            [@class="form-control"]
            [@value="2011-02-03"]
        /following-sibling::input
            [@type="time"]
            [@id="name_time"]
            [@name="name[time]"]
            [@class="form-control"]
            [@value="04:05"]
    ]
'
        );
    }

    public function testDateTimeWithWidgetSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'datetime', '2011-02-03 04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', '2011-02-03 04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'widget' => 'single_text',
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="datetime"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="2011-02-03T04:05:06Z"]
'
        );
    }

    public function testDateTimeWithWidgetSingleTextIgnoreDateAndTimeWidgets()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'datetime', '2011-02-03 04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', '2011-02-03 04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'date_widget' => 'choice',
            'time_widget' => 'choice',
            'widget' => 'single_text',
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="datetime"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="2011-02-03T04:05:06Z"]
'
        );
    }

    public function testDateChoice()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'date', '2011-02-03', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateType', '2011-02-03', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'widget' => 'choice',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_month"]
            [@class="form-control"]
            [./option[@value="2"][@selected="selected"]]
        /following-sibling::select
            [@id="name_day"]
            [@class="form-control"]
            [./option[@value="3"][@selected="selected"]]
        /following-sibling::select
            [@id="name_year"]
            [@class="form-control"]
            [./option[@value="2011"][@selected="selected"]]
    ]
    [count(./select)=3]
'
        );
    }

    public function testDateChoiceWithPlaceholderGlobal()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'date', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'widget' => 'choice',
            'placeholder' => 'Change&Me',
            'required' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_month"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
        /following-sibling::select
            [@id="name_day"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
        /following-sibling::select
            [@id="name_year"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
    ]
    [count(./select)=3]
'
        );
    }

    public function testDateChoiceWithPlaceholderOnYear()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'date', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'widget' => 'choice',
            'required' => false,
            'placeholder' => array('year' => 'Change&Me'),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_month"]
            [@class="form-control"]
            [./option[@value="1"]]
        /following-sibling::select
            [@id="name_day"]
            [@class="form-control"]
            [./option[@value="1"]]
        /following-sibling::select
            [@id="name_year"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
    ]
    [count(./select)=3]
'
        );
    }

    public function testDateText()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'date', '2011-02-03', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateType', '2011-02-03', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'widget' => 'text',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./input
            [@id="name_month"]
            [@type="text"]
            [@class="form-control"]
            [@value="2"]
        /following-sibling::input
            [@id="name_day"]
            [@type="text"]
            [@class="form-control"]
            [@value="3"]
        /following-sibling::input
            [@id="name_year"]
            [@type="text"]
            [@class="form-control"]
            [@value="2011"]
    ]
    [count(./input)=3]
'
        );
    }

    public function testDateSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'date', '2011-02-03', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\DateType', '2011-02-03', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'widget' => 'single_text',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="date"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="2011-02-03"]
'
        );
    }

    public function testBirthDay()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'birthday', '2000-02-03', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\BirthdayType', '2000-02-03', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_month"]
            [@class="form-control"]
            [./option[@value="2"][@selected="selected"]]
        /following-sibling::select
            [@id="name_day"]
            [@class="form-control"]
            [./option[@value="3"][@selected="selected"]]
        /following-sibling::select
            [@id="name_year"]
            [@class="form-control"]
            [./option[@value="2000"][@selected="selected"]]
    ]
    [count(./select)=3]
'
        );
    }

    public function testBirthDayWithPlaceholder()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'birthday', '1950-01-01', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\BirthdayType', '1950-01-01', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'placeholder' => '',
            'required' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_month"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.=""]]
            [./option[@value="1"][@selected="selected"]]
        /following-sibling::select
            [@id="name_day"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.=""]]
            [./option[@value="1"][@selected="selected"]]
        /following-sibling::select
            [@id="name_year"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.=""]]
            [./option[@value="1950"][@selected="selected"]]
    ]
    [count(./select)=3]
'
        );
    }

    public function testEmail()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'email', 'foo&bar');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\EmailType', 'foo&bar');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="email"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="foo&bar"]
    [not(@maxlength)]
'
        );
    }

    public function testEmailWithMaxLength()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'email', 'foo&bar', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\EmailType', 'foo&bar', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('maxlength' => 123),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="email"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="foo&bar"]
    [@maxlength="123"]
'
        );
    }

    public function testHidden()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'hidden', 'foo&bar');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\HiddenType', 'foo&bar');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="hidden"]
    [@name="name"]
    [@class="my&class"]
    [@value="foo&bar"]
'
        );
    }

<<<<<<< HEAD
    public function testReadOnly()
    {
        $form = $this->factory->createNamed('name', 'text', null, array(
=======
    /**
     * @group legacy
     */
    public function testLegacyReadOnly()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'read_only' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="text"]
    [@name="name"]
    [@class="my&class form-control"]
    [@readonly="readonly"]
'
        );
    }

    public function testDisabled()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'disabled' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="text"]
    [@name="name"]
    [@class="my&class form-control"]
    [@disabled="disabled"]
'
        );
    }

    public function testInteger()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'integer', 123);
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\IntegerType', 123);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="number"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="123"]
'
        );
    }

    public function testLanguage()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'language', 'de');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\LanguageType', 'de');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [./option[@value="de"][@selected="selected"][.="German"]]
    [count(./option)>200]
'
        );
    }

    public function testLocale()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'locale', 'de_AT');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\LocaleType', 'de_AT');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [./option[@value="de_AT"][@selected="selected"][.="German (Austria)"]]
    [count(./option)>200]
'
        );
    }

    public function testMoney()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'money', 1234.56, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\MoneyType', 1234.56, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'currency' => 'EUR',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('id' => 'my&id', 'attr' => array('class' => 'my&class')),
'/div
    [@class="input-group"]
    [
        ./span
            [@class="input-group-addon"]
            [contains(.., "€")]
        /following-sibling::input
            [@id="my&id"]
            [@type="text"]
            [@name="name"]
            [@class="my&class form-control"]
            [@value="1234.56"]
    ]
'
        );
    }

    public function testNumber()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'number', 1234.56);
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\NumberType', 1234.56);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="text"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="1234.56"]
'
        );
    }

    public function testPassword()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'password', 'foo&bar');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\PasswordType', 'foo&bar');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="password"]
    [@name="name"]
    [@class="my&class form-control"]
'
        );
    }

    public function testPasswordSubmittedWithNotAlwaysEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'password', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\PasswordType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'always_empty' => false,
        ));
        $form->submit('foo&bar');

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="password"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="foo&bar"]
'
        );
    }

    public function testPasswordWithMaxLength()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'password', 'foo&bar', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\PasswordType', 'foo&bar', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('maxlength' => 123),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="password"]
    [@name="name"]
    [@class="my&class form-control"]
    [@maxlength="123"]
'
        );
    }

    public function testPercent()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'percent', 0.1);
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\PercentType', 0.1);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('id' => 'my&id', 'attr' => array('class' => 'my&class')),
'/div
    [@class="input-group"]
    [
        ./input
            [@id="my&id"]
            [@type="text"]
            [@name="name"]
            [@class="my&class form-control"]
            [@value="10"]
        /following-sibling::span
            [@class="input-group-addon"]
            [contains(.., "%")]
    ]
'
        );
    }

    public function testCheckedRadio()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'radio', true);
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\RadioType', true);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('id' => 'my&id', 'attr' => array('class' => 'my&class')),
'/div
    [@class="radio"]
    [
        ./label
            [@class="required"]
            [
                ./input
                    [@id="my&id"]
                    [@type="radio"]
                    [@name="name"]
                    [@class="my&class"]
                    [@checked="checked"]
                    [@value="1"]
            ]
    ]
'
        );
    }

    public function testUncheckedRadio()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'radio', false);
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\RadioType', false);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('id' => 'my&id', 'attr' => array('class' => 'my&class')),
'/div
    [@class="radio"]
    [
        ./label
            [@class="required"]
            [
                ./input
                    [@id="my&id"]
                    [@type="radio"]
                    [@name="name"]
                    [@class="my&class"]
                    [not(@checked)]
            ]
    ]
'
        );
    }

    public function testRadioWithValue()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'radio', false, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\RadioType', false, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'value' => 'foo&bar',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('id' => 'my&id', 'attr' => array('class' => 'my&class')),
'/div
    [@class="radio"]
    [
        ./label
            [@class="required"]
            [
                ./input
                    [@id="my&id"]
                    [@type="radio"]
                    [@name="name"]
                    [@class="my&class"]
                    [@value="foo&bar"]
            ]
    ]
'
        );
    }

<<<<<<< HEAD
    public function testTextarea()
    {
        $form = $this->factory->createNamed('name', 'textarea', 'foo&bar', array(
=======
    public function testRange()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\RangeType', 42, array('attr' => array('min' => 5)));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="range"]
    [@name="name"]
    [@value="42"]
    [@min="5"]
    [@class="my&class form-control"]
'
        );
    }

    public function testRangeWithMinMaxValues()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\RangeType', 42, array('attr' => array('min' => 5, 'max' => 57)));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="range"]
    [@name="name"]
    [@value="42"]
    [@min="5"]
    [@max="57"]
    [@class="my&class form-control"]
'
        );
    }

    public function testTextarea()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', 'foo&bar', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('pattern' => 'foo'),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/textarea
    [@name="name"]
    [@pattern="foo"]
    [@class="my&class form-control"]
    [.="foo&bar"]
'
        );
    }

    public function testText()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text', 'foo&bar');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType', 'foo&bar');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="text"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="foo&bar"]
    [not(@maxlength)]
'
        );
    }

    public function testTextWithMaxLength()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text', 'foo&bar', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType', 'foo&bar', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('maxlength' => 123),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="text"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="foo&bar"]
    [@maxlength="123"]
'
        );
    }

    public function testSearch()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'search', 'foo&bar');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\SearchType', 'foo&bar');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="search"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="foo&bar"]
    [not(@maxlength)]
'
        );
    }

    public function testTime()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'time', '04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimeType', '04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'with_seconds' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_hour"]
            [@class="form-control"]
            [not(@size)]
            [./option[@value="4"][@selected="selected"]]
        /following-sibling::select
            [@id="name_minute"]
            [@class="form-control"]
            [not(@size)]
            [./option[@value="5"][@selected="selected"]]
    ]
    [count(./select)=2]
'
        );
    }

    public function testTimeWithSeconds()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'time', '04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimeType', '04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'with_seconds' => true,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_hour"]
            [@class="form-control"]
            [not(@size)]
            [./option[@value="4"][@selected="selected"]]
            [count(./option)>23]
        /following-sibling::select
            [@id="name_minute"]
            [@class="form-control"]
            [not(@size)]
            [./option[@value="5"][@selected="selected"]]
            [count(./option)>59]
        /following-sibling::select
            [@id="name_second"]
            [@class="form-control"]
            [not(@size)]
            [./option[@value="6"][@selected="selected"]]
            [count(./option)>59]
    ]
    [count(./select)=3]
'
        );
    }

    public function testTimeText()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'time', '04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimeType', '04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'widget' => 'text',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./input
            [@type="text"]
            [@id="name_hour"]
            [@name="name[hour]"]
            [@class="form-control"]
            [@value="04"]
            [@required="required"]
            [not(@size)]
        /following-sibling::input
            [@type="text"]
            [@id="name_minute"]
            [@name="name[minute]"]
            [@class="form-control"]
            [@value="05"]
            [@required="required"]
            [not(@size)]
    ]
    [count(./input)=2]
'
        );
    }

    public function testTimeSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'time', '04:05:06', array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimeType', '04:05:06', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'widget' => 'single_text',
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="time"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="04:05"]
    [not(@size)]
'
        );
    }

    public function testTimeWithPlaceholderGlobal()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'time', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'placeholder' => 'Change&Me',
            'required' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_hour"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
            [count(./option)>24]
        /following-sibling::select
            [@id="name_minute"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
            [count(./option)>60]
    ]
    [count(./select)=2]
'
        );
    }

    public function testTimeWithPlaceholderOnYear()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'time', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'string',
            'required' => false,
            'placeholder' => array('hour' => 'Change&Me'),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/div
    [@class="my&class form-inline"]
    [
        ./select
            [@id="name_hour"]
            [@class="form-control"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
            [count(./option)>24]
        /following-sibling::select
            [@id="name_minute"]
            [./option[@value="1"]]
            [count(./option)>59]
    ]
    [count(./select)=2]
'
        );
    }

    public function testTimezone()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'timezone', 'Europe/Vienna');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimezoneType', 'Europe/Vienna');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@name="name"]
    [@class="my&class form-control"]
    [not(@required)]
    [./optgroup
        [@label="Europe"]
        [./option[@value="Europe/Vienna"][@selected="selected"][.="Vienna"]]
    ]
    [count(./optgroup)>10]
    [count(.//option)>200]
'
        );
    }

    public function testTimezoneWithPlaceholder()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'timezone', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimezoneType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'placeholder' => 'Select&Timezone',
            'required' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/select
    [@class="my&class form-control"]
    [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Select&Timezone[/trans]"]]
    [count(./optgroup)>10]
    [count(.//option)>201]
'
        );
    }

    public function testUrl()
    {
        $url = 'http://www.google.com?foo1=bar1&foo2=bar2';
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'url', $url);
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\UrlType', $url);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
'/input
    [@type="url"]
    [@name="name"]
    [@class="my&class form-control"]
    [@value="http://www.google.com?foo1=bar1&foo2=bar2"]
'
        );
    }

    public function testButton()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'button');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ButtonType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
            '/button[@type="button"][@name="name"][.="[trans]Name[/trans]"][@class="my&class btn"]'
        );
    }

<<<<<<< HEAD
    public function testSubmit()
    {
        $form = $this->factory->createNamed('name', 'submit');
=======
    public function testButtonlabelWithoutTranslation()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ButtonType', null, array(
            'translation_domain' => false,
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
            '/button[@type="button"][@name="name"][.="Name"][@class="my&class btn"]'
        );
    }

    public function testSubmit()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\SubmitType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
            '/button[@type="submit"][@name="name"][@class="my&class btn"]'
        );
    }

    public function testReset()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'reset');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ResetType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array('attr' => array('class' => 'my&class')),
            '/button[@type="reset"][@name="name"][@class="my&class btn"]'
        );
    }

    public function testWidgetAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('text', 'text', 'value', array(
            'required' => true,
            'disabled' => true,
            'read_only' => true,
            'attr' => array('maxlength' => 10, 'pattern' => '\d+', 'class' => 'foobar', 'data-foo' => 'bar'),
=======
        $form = $this->factory->createNamed('text', 'Symfony\Component\Form\Extension\Core\Type\TextType', 'value', array(
            'required' => true,
            'disabled' => true,
            'attr' => array('readonly' => true, 'maxlength' => 10, 'pattern' => '\d+', 'class' => 'foobar', 'data-foo' => 'bar'),
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));

        $html = $this->renderWidget($form->createView());

        // compare plain HTML to check the whitespace
        $this->assertSame('<input type="text" id="text" name="text" readonly="readonly" disabled="disabled" required="required" maxlength="10" pattern="\d+" class="foobar form-control" data-foo="bar" value="value" />', $html);
    }

    public function testWidgetAttributeNameRepeatedIfTrue()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('text', 'text', 'value', array(
=======
        $form = $this->factory->createNamed('text', 'Symfony\Component\Form\Extension\Core\Type\TextType', 'value', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('foo' => true),
        ));

        $html = $this->renderWidget($form->createView());

        // foo="foo"
        $this->assertSame('<input type="text" id="text" name="text" required="required" foo="foo" class="form-control" value="value" />', $html);
    }

    public function testButtonAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('button', 'button', null, array(
=======
        $form = $this->factory->createNamed('button', 'Symfony\Component\Form\Extension\Core\Type\ButtonType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'disabled' => true,
            'attr' => array('class' => 'foobar', 'data-foo' => 'bar'),
        ));

        $html = $this->renderWidget($form->createView());

        // compare plain HTML to check the whitespace
        $this->assertSame('<button type="button" id="button" name="button" disabled="disabled" class="foobar btn" data-foo="bar">[trans]Button[/trans]</button>', $html);
    }

    public function testButtonAttributeNameRepeatedIfTrue()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('button', 'button', null, array(
=======
        $form = $this->factory->createNamed('button', 'Symfony\Component\Form\Extension\Core\Type\ButtonType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('foo' => true),
        ));

        $html = $this->renderWidget($form->createView());

        // foo="foo"
        $this->assertSame('<button type="button" id="button" name="button" foo="foo" class="btn-default btn">[trans]Button[/trans]</button>', $html);
    }
}
