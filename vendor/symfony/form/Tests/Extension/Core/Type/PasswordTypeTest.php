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

class PasswordTypeTest extends \Symfony\Component\Form\Test\TypeTestCase
{
<<<<<<< HEAD
    public function testEmptyIfNotSubmitted()
    {
        $form = $this->factory->create('password');
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('password');

        $this->assertSame('password', $form->getConfig()->getType()->getName());
    }

    public function testEmptyIfNotSubmitted()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\PasswordType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->setData('pAs5w0rd');
        $view = $form->createView();

        $this->assertSame('', $view->vars['value']);
    }

    public function testEmptyIfSubmitted()
    {
<<<<<<< HEAD
        $form = $this->factory->create('password');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\PasswordType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->submit('pAs5w0rd');
        $view = $form->createView();

        $this->assertSame('', $view->vars['value']);
    }

    public function testNotEmptyIfSubmittedAndNotAlwaysEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->create('password', null, array('always_empty' => false));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\PasswordType', null, array('always_empty' => false));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->submit('pAs5w0rd');
        $view = $form->createView();

        $this->assertSame('pAs5w0rd', $view->vars['value']);
    }

    public function testNotTrimmed()
    {
<<<<<<< HEAD
        $form = $this->factory->create('password', null);
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\PasswordType', null);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->submit(' pAs5w0rd ');
        $data = $form->getData();

        $this->assertSame(' pAs5w0rd ', $data);
    }
}
