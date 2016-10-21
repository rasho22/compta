<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Extension\Validator\Type;

class SubmitTypeValidatorExtensionTest extends BaseValidatorExtensionTest
{
    protected function createForm(array $options = array())
    {
<<<<<<< HEAD
        return $this->factory->create('submit', null, $options);
=======
        return $this->factory->create('Symfony\Component\Form\Extension\Core\Type\SubmitType', null, $options);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
