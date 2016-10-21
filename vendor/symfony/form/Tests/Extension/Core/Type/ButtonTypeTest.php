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

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ButtonTypeTest extends BaseTypeTest
{
<<<<<<< HEAD
    public function testCreateButtonInstances()
    {
        $this->assertInstanceOf('Symfony\Component\Form\Button', $this->factory->create('button'));
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('button');

        $this->assertSame('button', $form->getConfig()->getType()->getName());
    }

    public function testCreateButtonInstances()
    {
        $this->assertInstanceOf('Symfony\Component\Form\Button', $this->factory->create('Symfony\Component\Form\Extension\Core\Type\ButtonType'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    protected function getTestedType()
    {
<<<<<<< HEAD
        return 'button';
=======
        return 'Symfony\Component\Form\Extension\Core\Type\ButtonType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
