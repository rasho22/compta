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

abstract class AbstractBootstrap3HorizontalLayoutTest extends AbstractBootstrap3LayoutTest
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
    [@class="col-sm-2 control-label required"]
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
    [@class="col-sm-2 control-label required"]
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
    [@class="my&class col-sm-2 control-label required"]
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
    [@class="my&class col-sm-2 control-label required"]
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
    [@class="my&class col-sm-2 control-label required"]
    [.="[trans]Custom label[/trans]"]
'
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

        $this->assertSame('<form name="form" method="get" action="http://example.com/directory" class="form-horizontal">', $html);
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

        $this->assertSame('<form name="form" method="post" action="http://foo.com/directory" class="form-horizontal">', $html);
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

        $this->assertSame('<form name="form" method="get" action="http://example.com/directory" class="form-horizontal" enctype="multipart/form-data">', $html);
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

        $this->assertSame('<form name="form" method="get" action="http://example.com/directory" class="foobar form-horizontal">', $html);
    }
}
