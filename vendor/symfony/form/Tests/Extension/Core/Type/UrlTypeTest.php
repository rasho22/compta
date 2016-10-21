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

class UrlTypeTest extends TestCase
{
<<<<<<< HEAD
    public function testSubmitAddsDefaultProtocolIfNoneIsIncluded()
    {
        $form = $this->factory->create('url', 'name');
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('url');

        $this->assertSame('url', $form->getConfig()->getType()->getName());
    }

    public function testSubmitAddsDefaultProtocolIfNoneIsIncluded()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\UrlType', 'name');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $form->submit('www.domain.com');

        $this->assertSame('http://www.domain.com', $form->getData());
        $this->assertSame('http://www.domain.com', $form->getViewData());
    }

    public function testSubmitAddsNoDefaultProtocolIfAlreadyIncluded()
    {
<<<<<<< HEAD
        $form = $this->factory->create('url', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\UrlType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'default_protocol' => 'http',
        ));

        $form->submit('ftp://www.domain.com');

        $this->assertSame('ftp://www.domain.com', $form->getData());
        $this->assertSame('ftp://www.domain.com', $form->getViewData());
    }

    public function testSubmitAddsNoDefaultProtocolIfEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->create('url', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\UrlType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'default_protocol' => 'http',
        ));

        $form->submit('');

        $this->assertNull($form->getData());
        $this->assertSame('', $form->getViewData());
    }

    public function testSubmitAddsNoDefaultProtocolIfNull()
    {
<<<<<<< HEAD
        $form = $this->factory->create('url', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\UrlType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'default_protocol' => 'http',
        ));

        $form->submit(null);

        $this->assertNull($form->getData());
        $this->assertSame('', $form->getViewData());
    }

    public function testSubmitAddsNoDefaultProtocolIfSetToNull()
    {
<<<<<<< HEAD
        $form = $this->factory->create('url', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\UrlType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'default_protocol' => null,
        ));

        $form->submit('www.domain.com');

        $this->assertSame('www.domain.com', $form->getData());
        $this->assertSame('www.domain.com', $form->getViewData());
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfDefaultProtocolIsInvalid()
    {
<<<<<<< HEAD
        $this->factory->create('url', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\UrlType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'default_protocol' => array(),
        ));
    }
}
