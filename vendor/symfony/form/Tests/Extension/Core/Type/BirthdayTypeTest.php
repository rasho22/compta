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
 * @author Stepan Anchugov <kixxx1@gmail.com>
 */
class BirthdayTypeTest extends BaseTypeTest
{
    /**
<<<<<<< HEAD
=======
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('birthday');

        $this->assertSame('birthday', $form->getConfig()->getType()->getName());
    }

    /**
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testSetInvalidYearsOption()
    {
<<<<<<< HEAD
        $this->factory->create('birthday', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\BirthdayType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'years' => 'bad value',
        ));
    }

    protected function getTestedType()
    {
<<<<<<< HEAD
        return 'birthday';
=======
        return 'Symfony\Component\Form\Extension\Core\Type\BirthdayType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
