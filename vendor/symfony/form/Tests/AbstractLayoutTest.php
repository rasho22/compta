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
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;

abstract class AbstractLayoutTest extends \Symfony\Component\Form\Test\FormIntegrationTestCase
{
    protected $csrfTokenManager;
    protected $testableFeatures = array();

    protected function setUp()
    {
        if (!extension_loaded('intl')) {
            $this->markTestSkipped('Extension intl is required.');
        }

        \Locale::setDefault('en');

        $this->csrfTokenManager = $this->getMock('Symfony\Component\Security\Csrf\CsrfTokenManagerInterface');

        parent::setUp();
    }

    protected function getExtensions()
    {
        return array(
            new CsrfExtension($this->csrfTokenManager),
        );
    }

    protected function tearDown()
    {
        $this->csrfTokenManager = null;

        parent::tearDown();
    }

    protected function assertXpathNodeValue(\DOMElement $element, $expression, $nodeValue)
    {
        $xpath = new \DOMXPath($element->ownerDocument);
        $nodeList = $xpath->evaluate($expression);
        $this->assertEquals(1, $nodeList->length);
        $this->assertEquals($nodeValue, $nodeList->item(0)->nodeValue);
    }

    protected function assertMatchesXpath($html, $expression, $count = 1)
    {
        $dom = new \DomDocument('UTF-8');
        try {
            // Wrap in <root> node so we can load HTML with multiple tags at
            // the top level
            $dom->loadXML('<root>'.$html.'</root>');
        } catch (\Exception $e) {
            $this->fail(sprintf(
                "Failed loading HTML:\n\n%s\n\nError: %s",
                $html,
                $e->getMessage()
            ));
        }
        $xpath = new \DOMXPath($dom);
        $nodeList = $xpath->evaluate('/root'.$expression);

        if ($nodeList->length != $count) {
            $dom->formatOutput = true;
            $this->fail(sprintf(
                "Failed asserting that \n\n%s\n\nmatches exactly %s. Matches %s in \n\n%s",
                $expression,
                $count == 1 ? 'once' : $count.' times',
                $nodeList->length == 1 ? 'once' : $nodeList->length.' times',
                // strip away <root> and </root>
                substr($dom->saveHTML(), 6, -8)
            ));
        }
    }

    protected function assertWidgetMatchesXpath(FormView $view, array $vars, $xpath)
    {
        // include ampersands everywhere to validate escaping
        $html = $this->renderWidget($view, array_merge(array(
            'id' => 'my&id',
            'attr' => array('class' => 'my&class'),
        ), $vars));

        if (!isset($vars['id'])) {
            $xpath = trim($xpath).'
    [@id="my&id"]';
        }

        if (!isset($vars['attr']['class'])) {
            $xpath .= '
    [@class="my&class"]';
        }

        $this->assertMatchesXpath($html, $xpath);
    }

    abstract protected function renderForm(FormView $view, array $vars = array());

    protected function renderEnctype(FormView $view)
    {
        $this->markTestSkipped(sprintf('Legacy %s::renderEnctype() is not implemented.', get_class($this)));
    }

    abstract protected function renderLabel(FormView $view, $label = null, array $vars = array());

    abstract protected function renderErrors(FormView $view);

    abstract protected function renderWidget(FormView $view, array $vars = array());

    abstract protected function renderRow(FormView $view, array $vars = array());

    abstract protected function renderRest(FormView $view, array $vars = array());

    abstract protected function renderStart(FormView $view, array $vars = array());

    abstract protected function renderEnd(FormView $view, array $vars = array());

    abstract protected function setTheme(FormView $view, array $themes);

    /**
     * @group legacy
     */
    public function testEnctype()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamedBuilder('name', 'form')
            ->add('file', 'file')
=======
        $form = $this->factory->createNamedBuilder('name', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('file', 'Symfony\Component\Form\Extension\Core\Type\FileType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();

        $this->assertEquals('enctype="multipart/form-data"', $this->renderEnctype($form->createView()));
    }

    /**
     * @group legacy
     */
    public function testNoEnctype()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamedBuilder('name', 'form')
            ->add('text', 'text')
=======
        $form = $this->factory->createNamedBuilder('name', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('text', 'Symfony\Component\Form\Extension\Core\Type\TextType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();

        $this->assertEquals('', $this->renderEnctype($form->createView()));
    }

    public function testLabel()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();
        $this->renderWidget($view, array('label' => 'foo'));
        $html = $this->renderLabel($view);

        $this->assertMatchesXpath($html,
'/label
    [@for="name"]
    [.="[trans]Name[/trans]"]
'
        );
    }

    public function testLabelWithoutTranslation()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'translation_domain' => false,
        ));

        $this->assertMatchesXpath($this->renderLabel($form->createView()),
'/label
    [@for="name"]
    [.="Name"]
'
        );
    }

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
    [@class="required"]
    [.="[trans]Name[/trans]"]
'
        );
    }

    public function testLabelWithCustomTextPassedAsOption()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'label' => 'Custom label',
        ));
        $html = $this->renderLabel($form->createView());

        $this->assertMatchesXpath($html,
'/label
    [@for="name"]
    [.="[trans]Custom label[/trans]"]
'
        );
    }

    public function testLabelWithCustomTextPassedDirectly()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $html = $this->renderLabel($form->createView(), 'Custom label');

        $this->assertMatchesXpath($html,
'/label
    [@for="name"]
    [.="[trans]Custom label[/trans]"]
'
        );
    }

    public function testLabelWithCustomTextPassedAsOptionAndDirectly()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'text', null, array(
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'label' => 'Custom label',
        ));
        $html = $this->renderLabel($form->createView(), 'Overridden label');

        $this->assertMatchesXpath($html,
'/label
    [@for="name"]
    [.="[trans]Overridden label[/trans]"]
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
    [@class="required"]
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
    [@class="my&class required"]
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
    [@class="my&class required"]
    [.="[trans]Custom label[/trans]"]
'
        );
    }

    // https://github.com/symfony/symfony/issues/5029
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
    [@class="my&class required"]
    [.="[trans]Custom label[/trans]"]
'
        );
    }

    public function testLabelFormatName()
    {
        $form = $this->factory->createNamedBuilder('myform')
<<<<<<< HEAD
            ->add('myfield', 'text')
=======
            ->add('myfield', 'Symfony\Component\Form\Extension\Core\Type\TextType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();
        $view = $form->get('myfield')->createView();
        $html = $this->renderLabel($view, null, array('label_format' => 'form.%name%'));

        $this->assertMatchesXpath($html,
'/label
    [@for="myform_myfield"]
    [.="[trans]form.myfield[/trans]"]
'
        );
    }

    public function testLabelFormatId()
    {
        $form = $this->factory->createNamedBuilder('myform')
<<<<<<< HEAD
            ->add('myfield', 'text')
=======
            ->add('myfield', 'Symfony\Component\Form\Extension\Core\Type\TextType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();
        $view = $form->get('myfield')->createView();
        $html = $this->renderLabel($view, null, array('label_format' => 'form.%id%'));

        $this->assertMatchesXpath($html,
'/label
    [@for="myform_myfield"]
    [.="[trans]form.myform_myfield[/trans]"]
'
        );
    }

    public function testLabelFormatAsFormOption()
    {
        $options = array('label_format' => 'form.%name%');

<<<<<<< HEAD
        $form = $this->factory->createNamedBuilder('myform', 'form', null, $options)
            ->add('myfield', 'text')
=======
        $form = $this->factory->createNamedBuilder('myform', 'Symfony\Component\Form\Extension\Core\Type\FormType', null, $options)
            ->add('myfield', 'Symfony\Component\Form\Extension\Core\Type\TextType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();
        $view = $form->get('myfield')->createView();
        $html = $this->renderLabel($view);

        $this->assertMatchesXpath($html,
'/label
    [@for="myform_myfield"]
    [.="[trans]form.myfield[/trans]"]
'
        );
    }

    public function testLabelFormatOverriddenOption()
    {
        $options = array('label_format' => 'form.%name%');

<<<<<<< HEAD
        $form = $this->factory->createNamedBuilder('myform', 'form', null, $options)
            ->add('myfield', 'text', array('label_format' => 'field.%name%'))
=======
        $form = $this->factory->createNamedBuilder('myform', 'Symfony\Component\Form\Extension\Core\Type\FormType', null, $options)
            ->add('myfield', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('label_format' => 'field.%name%'))
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();
        $view = $form->get('myfield')->createView();
        $html = $this->renderLabel($view);

        $this->assertMatchesXpath($html,
'/label
    [@for="myform_myfield"]
    [.="[trans]field.myfield[/trans]"]
'
        );
    }

<<<<<<< HEAD
    public function testLabelFormatOnButton()
    {
        $form = $this->factory->createNamedBuilder('myform')
            ->add('mybutton', 'button')
=======
    public function testLabelWithoutTranslationOnButton()
    {
        $form = $this->factory->createNamedBuilder('myform', 'Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
                'translation_domain' => false,
            ))
            ->add('mybutton', 'Symfony\Component\Form\Extension\Core\Type\ButtonType')
            ->getForm();
        $view = $form->get('mybutton')->createView();
        $html = $this->renderWidget($view);

        $this->assertMatchesXpath($html,
'/button
    [@type="button"]
    [@name="myform[mybutton]"]
    [.="Mybutton"]
'
        );
    }

    public function testLabelFormatOnButton()
    {
        $form = $this->factory->createNamedBuilder('myform')
            ->add('mybutton', 'Symfony\Component\Form\Extension\Core\Type\ButtonType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();
        $view = $form->get('mybutton')->createView();
        $html = $this->renderWidget($view, array('label_format' => 'form.%name%'));

        $this->assertMatchesXpath($html,
'/button
    [@type="button"]
    [@name="myform[mybutton]"]
    [.="[trans]form.mybutton[/trans]"]
'
        );
    }

    public function testLabelFormatOnButtonId()
    {
        $form = $this->factory->createNamedBuilder('myform')
<<<<<<< HEAD
            ->add('mybutton', 'button')
=======
            ->add('mybutton', 'Symfony\Component\Form\Extension\Core\Type\ButtonType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();
        $view = $form->get('mybutton')->createView();
        $html = $this->renderWidget($view, array('label_format' => 'form.%id%'));

        $this->assertMatchesXpath($html,
'/button
    [@type="button"]
    [@name="myform[mybutton]"]
    [.="[trans]form.myform_mybutton[/trans]"]
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
'/ul
    [
        ./li[.="[trans]Error 1[/trans]"]
        /following-sibling::li[.="[trans]Error 2[/trans]"]
    ]
    [count(./li)=2]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="checkbox"]
    [@name="name"]
    [@checked="checked"]
    [@value="1"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="checkbox"]
    [@name="name"]
    [not(@checked)]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="checkbox"]
    [@name="name"]
    [@value="foo&bar"]
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

        // If the field is collapsed, has no "multiple" attribute, is required but
        // has *no* empty value, the "required" must not be added, otherwise
        // the resulting HTML is invalid.
        // https://github.com/symfony/symfony/issues/8942

        // HTML 5 spec
        // http://www.w3.org/html/wg/drafts/html/master/forms.html#placeholder-label-option

        // "If a select element has a required attribute specified, does not
        //  have a multiple attribute specified, and has a display size of 1,
        //  then the select element must have a placeholder label option."

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
    [not(@required)]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"][not(@selected)][.="[trans]Choice&B[/trans]"]
    ]
    [count(./option)=2]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
    [not(@required)]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"]
        /following-sibling::option[@value="&b"]'.$classPart.'[not(@selected)][.="[trans]Choice&B[/trans]"]
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
    [@class="bar&baz"]
    [not(@required)]
    [
        ./option[@value="&a"][@selected="selected"][.="[trans]Choice&A[/trans]"][not(@id)][not(@name)]
        /following-sibling::option[@value="&b"][not(@class)][not(@selected)][.="[trans]Choice&B[/trans]"][not(@id)][not(@name)]
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
        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
        /following-sibling::label[@for="name_0"][.="[trans]Choice&A[/trans]"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
        /following-sibling::label[@for="name_1"][.="[trans]Choice&B[/trans]"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=3]
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

        $this->assertWidgetMatchesXpath($form->createView(), array('separator' => '-- sep --'),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array('separator' => null),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array('separator' => ''),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        // The "disabled" attribute was removed again due to a bug in the
        // BlackBerry 10 browser.
        // See https://github.com/symfony/symfony/pull/7678
        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        // The "disabled" attribute was removed again due to a bug in the
        // BlackBerry 10 browser.
        // See https://github.com/symfony/symfony/pull/7678
        $this->assertWidgetMatchesXpath($form->createView(), array('placeholder' => ''),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name[]"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name[]"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name[]"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name[]"]
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
        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
        /following-sibling::label[@for="name_0"][.="[trans]Choice&A[/trans]"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
        /following-sibling::label[@for="name_1"][.="[trans]Choice&B[/trans]"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=3]
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
<<<<<<< HEAD
=======
            'placeholder' => 'Placeholder&Not&Translated',
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
        /following-sibling::label[@for="name_0"][.="Choice&A"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_1"][@value="&b"][not(@checked)]
        /following-sibling::label[@for="name_1"][.="Choice&B"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=3]
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
        ./input[@type="radio"][@name="name"][@id="name_0"][@value="&a"][@checked]
        /following-sibling::label[@for="name_0"][.="[trans]Choice&A[/trans]"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_1"][@value="&b"]'.$classPart.'[not(@checked)]
        /following-sibling::label[@for="name_1"][.="[trans]Choice&B[/trans]"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=3]
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
        ./input[@type="radio"][@name="name"][@id="name_placeholder"][not(@checked)]
        /following-sibling::label[@for="name_placeholder"][.="[trans]Test&Me[/trans]"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_0"][@checked]
        /following-sibling::label[@for="name_0"][.="[trans]Choice&A[/trans]"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_1"][not(@checked)]
        /following-sibling::label[@for="name_1"][.="[trans]Choice&B[/trans]"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=4]
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
        ./input[@type="radio"][@name="name"][@id="name_placeholder"][not(@checked)]
        /following-sibling::label[@for="name_placeholder"][.="Placeholder&Not&Translated"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_0"][@checked]
        /following-sibling::label[@for="name_0"][.="Choice&A"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_1"][not(@checked)]
        /following-sibling::label[@for="name_1"][.="Choice&B"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=4]
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
        ./input[@type="radio"][@name="name"][@id="name_0"][@checked]
        /following-sibling::label[@for="name_0"][.="[trans]Choice&A[/trans]"]
        /following-sibling::input[@type="radio"][@name="name"][@id="name_1"][not(@checked)]
        /following-sibling::label[@for="name_1"][.="[trans]Choice&B[/trans]"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=3]
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
        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@checked][not(@required)]
        /following-sibling::label[@for="name_0"][.="[trans]Choice&A[/trans]"]
        /following-sibling::input[@type="checkbox"][@name="name[]"][@id="name_1"][not(@checked)][not(@required)]
        /following-sibling::label[@for="name_1"][.="[trans]Choice&B[/trans]"]
        /following-sibling::input[@type="checkbox"][@name="name[]"][@id="name_2"][@checked][not(@required)]
        /following-sibling::label[@for="name_2"][.="[trans]Choice&C[/trans]"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=4]
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
        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@checked][not(@required)]
        /following-sibling::label[@for="name_0"][.="Choice&A"]
        /following-sibling::input[@type="checkbox"][@name="name[]"][@id="name_1"][not(@checked)][not(@required)]
        /following-sibling::label[@for="name_1"][.="Choice&B"]
        /following-sibling::input[@type="checkbox"][@name="name[]"][@id="name_2"][@checked][not(@required)]
        /following-sibling::label[@for="name_2"][.="Choice&C"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=4]
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
        ./input[@type="checkbox"][@name="name[]"][@id="name_0"][@checked][not(@required)]
        /following-sibling::label[@for="name_0"][.="[trans]Choice&A[/trans]"]
        /following-sibling::input[@type="checkbox"][@name="name[]"][@id="name_1"]'.$classPart.'[not(@checked)][not(@required)]
        /following-sibling::label[@for="name_1"][.="[trans]Choice&B[/trans]"]
        /following-sibling::input[@type="checkbox"][@name="name[]"][@id="name_2"][@checked][not(@required)]
        /following-sibling::label[@for="name_2"][.="[trans]Choice&C[/trans]"]
        /following-sibling::input[@type="hidden"][@id="name__token"]
    ]
    [count(./input)=4]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@id="name_date"]
            [
                ./select
                    [@id="name_date_month"]
                    [./option[@value="2"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_date_day"]
                    [./option[@value="3"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_date_year"]
                    [./option[@value="2011"][@selected="selected"]]
            ]
        /following-sibling::div
            [@id="name_time"]
            [
                ./select
                    [@id="name_time_hour"]
                    [./option[@value="4"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_time_minute"]
                    [./option[@value="5"][@selected="selected"]]
            ]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@id="name_date"]
            [
                ./select
                    [@id="name_date_month"]
                    [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
                /following-sibling::select
                    [@id="name_date_day"]
                    [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
                /following-sibling::select
                    [@id="name_date_year"]
                    [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
            ]
        /following-sibling::div
            [@id="name_time"]
            [
                ./select
                    [@id="name_time_hour"]
                    [./option[@value=""][.="[trans]Change&Me[/trans]"]]
                /following-sibling::select
                    [@id="name_time_minute"]
                    [./option[@value=""][.="[trans]Change&Me[/trans]"]]
            ]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@id="name_date"]
            [
                ./select
                    [@id="name_date_month"]
                    [./option[@value="2"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_date_day"]
                    [./option[@value="3"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_date_year"]
                    [./option[@value="2011"][@selected="selected"]]
            ]
        /following-sibling::div
            [@id="name_time"]
            [
                ./select
                    [@id="name_time_hour"]
                    [./option[@value="4"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_time_minute"]
                    [./option[@value="5"][@selected="selected"]]
            ]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./div
            [@id="name_date"]
            [
                ./select
                    [@id="name_date_month"]
                    [./option[@value="2"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_date_day"]
                    [./option[@value="3"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_date_year"]
                    [./option[@value="2011"][@selected="selected"]]
            ]
        /following-sibling::div
            [@id="name_time"]
            [
                ./select
                    [@id="name_time_hour"]
                    [./option[@value="4"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_time_minute"]
                    [./option[@value="5"][@selected="selected"]]
                /following-sibling::select
                    [@id="name_time_second"]
                    [./option[@value="6"][@selected="selected"]]
            ]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./input
            [@type="date"]
            [@id="name_date"]
            [@name="name[date]"]
            [@value="2011-02-03"]
        /following-sibling::input
            [@type="time"]
            [@id="name_time"]
            [@name="name[time]"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="datetime"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="datetime"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_month"]
            [./option[@value="2"][@selected="selected"]]
        /following-sibling::select
            [@id="name_day"]
            [./option[@value="3"][@selected="selected"]]
        /following-sibling::select
            [@id="name_year"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_month"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
        /following-sibling::select
            [@id="name_day"]
            [./option[@value=""][not(@selected)][not(@disabled)][.="[trans]Change&Me[/trans]"]]
        /following-sibling::select
            [@id="name_year"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_month"]
            [./option[@value="1"]]
        /following-sibling::select
            [@id="name_day"]
            [./option[@value="1"]]
        /following-sibling::select
            [@id="name_year"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./input
            [@id="name_month"]
            [@type="text"]
            [@value="2"]
        /following-sibling::input
            [@id="name_day"]
            [@type="text"]
            [@value="3"]
        /following-sibling::input
            [@id="name_year"]
            [@type="text"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="date"]
    [@name="name"]
    [@value="2011-02-03"]
'
        );
    }

    public function testDateErrorBubbling()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamedBuilder('form', 'form')
            ->add('date', 'date')
=======
        $form = $this->factory->createNamedBuilder('form', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('date', 'Symfony\Component\Form\Extension\Core\Type\DateType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();
        $form->get('date')->addError(new FormError('[trans]Error![/trans]'));
        $view = $form->createView();

        $this->assertEmpty($this->renderErrors($view));
        $this->assertNotEmpty($this->renderErrors($view['date']));
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_month"]
            [./option[@value="2"][@selected="selected"]]
        /following-sibling::select
            [@id="name_day"]
            [./option[@value="3"][@selected="selected"]]
        /following-sibling::select
            [@id="name_year"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_month"]
            [./option[@value=""][not(@selected)][not(@disabled)][.=""]]
            [./option[@value="1"][@selected="selected"]]
        /following-sibling::select
            [@id="name_day"]
            [./option[@value=""][not(@selected)][not(@disabled)][.=""]]
            [./option[@value="1"][@selected="selected"]]
        /following-sibling::select
            [@id="name_year"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="email"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="email"]
    [@name="name"]
    [@value="foo&bar"]
    [@maxlength="123"]
'
        );
    }

    public function testFile()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'file');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\FileType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="file"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="hidden"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="text"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="text"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="number"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="text"]
    [@name="name"]
    [@value="1234.56"]
    [contains(.., "€")]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="text"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="password"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="password"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="password"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="text"]
    [@name="name"]
    [@value="10"]
    [contains(.., "%")]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="radio"]
    [@name="name"]
    [@checked="checked"]
    [@value="1"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="radio"]
    [@name="name"]
    [not(@checked)]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="radio"]
    [@name="name"]
    [@value="foo&bar"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="range"]
    [@name="name"]
    [@value="42"]
    [@min="5"]
'
        );
    }

    public function testRangeWithMinMaxValues()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\RangeType', 42, array('attr' => array('min' => 5, 'max' => 57)));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="range"]
    [@name="name"]
    [@value="42"]
    [@min="5"]
    [@max="57"]
'
        );
    }

    public function testTextarea()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', 'foo&bar', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('pattern' => 'foo'),
        ));

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/textarea
    [@name="name"]
    [@pattern="foo"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="text"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="text"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="search"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_hour"]
            [not(@size)]
            [./option[@value="4"][@selected="selected"]]
        /following-sibling::select
            [@id="name_minute"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_hour"]
            [not(@size)]
            [./option[@value="4"][@selected="selected"]]
            [count(./option)>23]
        /following-sibling::select
            [@id="name_minute"]
            [not(@size)]
            [./option[@value="5"][@selected="selected"]]
            [count(./option)>59]
        /following-sibling::select
            [@id="name_second"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./input
            [@type="text"]
            [@id="name_hour"]
            [@name="name[hour]"]
            [@value="04"]
            [@size="1"]
            [@required="required"]
        /following-sibling::input
            [@type="text"]
            [@id="name_minute"]
            [@name="name[minute]"]
            [@value="05"]
            [@size="1"]
            [@required="required"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="time"]
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_hour"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/div
    [
        ./select
            [@id="name_hour"]
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

    public function testTimeErrorBubbling()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamedBuilder('form', 'form')
            ->add('time', 'time')
=======
        $form = $this->factory->createNamedBuilder('form', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('time', 'Symfony\Component\Form\Extension\Core\Type\TimeType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();
        $form->get('time')->addError(new FormError('[trans]Error![/trans]'));
        $view = $form->createView();

        $this->assertEmpty($this->renderErrors($view));
        $this->assertNotEmpty($this->renderErrors($view['time']));
    }

    public function testTimezone()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'timezone', 'Europe/Vienna');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\TimezoneType', 'Europe/Vienna');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
    [@name="name"]
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/select
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
'/input
    [@type="url"]
    [@name="name"]
    [@value="http://www.google.com?foo1=bar1&foo2=bar2"]
'
        );
    }

    public function testCollectionPrototype()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamedBuilder('name', 'form', array('items' => array('one', 'two', 'three')))
            ->add('items', 'collection', array('allow_add' => true))
=======
        $form = $this->factory->createNamedBuilder('name', 'Symfony\Component\Form\Extension\Core\Type\FormType', array('items' => array('one', 'two', 'three')))
            ->add('items', 'Symfony\Component\Form\Extension\Core\Type\CollectionType', array('allow_add' => true))
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm()
            ->createView();

        $html = $this->renderWidget($form);

        $this->assertMatchesXpath($html,
            '//div[@id="name_items"][@data-prototype]
            |
            //table[@id="name_items"][@data-prototype]'
        );
    }

    public function testEmptyRootFormName()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamedBuilder('', 'form')
            ->add('child', 'text')
=======
        $form = $this->factory->createNamedBuilder('', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('child', 'Symfony\Component\Form\Extension\Core\Type\TextType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();

        $this->assertMatchesXpath($this->renderWidget($form->createView()),
            '//input[@type="hidden"][@id="_token"][@name="_token"]
            |
             //input[@type="text"][@id="child"][@name="child"]', 2);
    }

    public function testButton()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'button');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ButtonType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array(),
            '/button[@type="button"][@name="name"][.="[trans]Name[/trans]"]'
        );
    }

    public function testButtonLabelIsEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'button');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ButtonType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertSame('', $this->renderLabel($form->createView()));
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

        $this->assertWidgetMatchesXpath($form->createView(), array(),
            '/button[@type="button"][@name="name"][.="Name"]'
        );
    }

    public function testSubmit()
    {
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\SubmitType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array(),
            '/button[@type="submit"][@name="name"]'
        );
    }

    public function testReset()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('name', 'reset');
=======
        $form = $this->factory->createNamed('name', 'Symfony\Component\Form\Extension\Core\Type\ResetType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertWidgetMatchesXpath($form->createView(), array(),
            '/button[@type="reset"][@name="name"]'
        );
    }

    public function testStartTag()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'method' => 'get',
            'action' => 'http://example.com/directory',
        ));

        $html = $this->renderStart($form->createView());

        $this->assertSame('<form name="form" method="get" action="http://example.com/directory">', $html);
    }

    public function testStartTagForPutRequest()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'method' => 'put',
            'action' => 'http://example.com/directory',
        ));

        $html = $this->renderStart($form->createView());

        $this->assertMatchesXpath($html.'</form>',
'/form
    [./input[@type="hidden"][@name="_method"][@value="PUT"]]
    [@method="post"]
    [@action="http://example.com/directory"]'
        );
    }

    public function testStartTagWithOverriddenVars()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'method' => 'put',
            'action' => 'http://example.com/directory',
        ));

        $html = $this->renderStart($form->createView(), array(
            'method' => 'post',
            'action' => 'http://foo.com/directory',
        ));

        $this->assertSame('<form name="form" method="post" action="http://foo.com/directory">', $html);
    }

    public function testStartTagForMultipartForm()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('form', null, array(
                'method' => 'get',
                'action' => 'http://example.com/directory',
            ))
            ->add('file', 'file')
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
                'method' => 'get',
                'action' => 'http://example.com/directory',
            ))
            ->add('file', 'Symfony\Component\Form\Extension\Core\Type\FileType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();

        $html = $this->renderStart($form->createView());

        $this->assertSame('<form name="form" method="get" action="http://example.com/directory" enctype="multipart/form-data">', $html);
    }

    public function testStartTagWithExtraAttributes()
    {
<<<<<<< HEAD
        $form = $this->factory->create('form', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'method' => 'get',
            'action' => 'http://example.com/directory',
        ));

        $html = $this->renderStart($form->createView(), array(
            'attr' => array('class' => 'foobar'),
        ));

        $this->assertSame('<form name="form" method="get" action="http://example.com/directory" class="foobar">', $html);
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
        $this->assertSame('<input type="text" id="text" name="text" readonly="readonly" disabled="disabled" required="required" maxlength="10" pattern="\d+" class="foobar" data-foo="bar" value="value" />', $html);
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
        $this->assertSame('<input type="text" id="text" name="text" required="required" foo="foo" value="value" />', $html);
    }

    public function testWidgetAttributeHiddenIfFalse()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('text', 'text', 'value', array(
=======
        $form = $this->factory->createNamed('text', 'Symfony\Component\Form\Extension\Core\Type\TextType', 'value', array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('foo' => false),
        ));

        $html = $this->renderWidget($form->createView());

        $this->assertNotContains('foo="', $html);
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
        $this->assertSame('<button type="button" id="button" name="button" disabled="disabled" class="foobar" data-foo="bar">[trans]Button[/trans]</button>', $html);
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
        $this->assertSame('<button type="button" id="button" name="button" foo="foo">[trans]Button[/trans]</button>', $html);
    }

    public function testButtonAttributeHiddenIfFalse()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('button', 'button', null, array(
=======
        $form = $this->factory->createNamed('button', 'Symfony\Component\Form\Extension\Core\Type\ButtonType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('foo' => false),
        ));

        $html = $this->renderWidget($form->createView());

        $this->assertNotContains('foo="', $html);
    }

    public function testTextareaWithWhitespaceOnlyContentRetainsValue()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('textarea', 'textarea', '  ');
=======
        $form = $this->factory->createNamed('textarea', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', '  ');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $html = $this->renderWidget($form->createView());

        $this->assertContains('>  </textarea>', $html);
    }

    public function testTextareaWithWhitespaceOnlyContentRetainsValueWhenRenderingForm()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('form', array('textarea' => '  '))
            ->add('textarea', 'textarea')
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FormType', array('textarea' => '  '))
            ->add('textarea', 'Symfony\Component\Form\Extension\Core\Type\TextareaType')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm();

        $html = $this->renderForm($form->createView());

        $this->assertContains('>  </textarea>', $html);
    }

    public function testWidgetContainerAttributeHiddenIfFalse()
    {
<<<<<<< HEAD
        $form = $this->factory->createNamed('form', 'form', null, array(
=======
        $form = $this->factory->createNamed('form', 'Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'attr' => array('foo' => false),
        ));

        $html = $this->renderWidget($form->createView());

        // no foo
        $this->assertNotContains('foo="', $html);
    }

    public function testTranslatedAttributes()
    {
<<<<<<< HEAD
        $view = $this->factory->createNamedBuilder('name', 'form')
            ->add('firstName', 'text', array('attr' => array('title' => 'Foo')))
            ->add('lastName', 'text', array('attr' => array('placeholder' => 'Bar')))
=======
        $view = $this->factory->createNamedBuilder('name', 'Symfony\Component\Form\Extension\Core\Type\FormType')
            ->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('attr' => array('title' => 'Foo')))
            ->add('lastName', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('attr' => array('placeholder' => 'Bar')))
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->getForm()
            ->createView();

        $html = $this->renderForm($view);

        $this->assertMatchesXpath($html, '/form//input[@title="[trans]Foo[/trans]"]');
        $this->assertMatchesXpath($html, '/form//input[@placeholder="[trans]Bar[/trans]"]');
    }
<<<<<<< HEAD
=======

    public function testAttributesNotTranslatedWhenTranslationDomainIsFalse()
    {
        $view = $this->factory->createNamedBuilder('name', 'Symfony\Component\Form\Extension\Core\Type\FormType', null, array(
                'translation_domain' => false,
            ))
            ->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('attr' => array('title' => 'Foo')))
            ->add('lastName', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('attr' => array('placeholder' => 'Bar')))
            ->getForm()
            ->createView();

        $html = $this->renderForm($view);

        $this->assertMatchesXpath($html, '/form//input[@title="Foo"]');
        $this->assertMatchesXpath($html, '/form//input[@placeholder="Bar"]');
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
