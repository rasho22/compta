<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Extension\Validator\Type;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class SubmitTypeValidatorExtension extends BaseValidatorExtension
{
    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
<<<<<<< HEAD
        return 'submit';
=======
        return 'Symfony\Component\Form\Extension\Core\Type\SubmitType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
