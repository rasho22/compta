<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Extension\Core\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ButtonTypeInterface;

/**
 * A reset button.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ResetType extends AbstractType implements ButtonTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
<<<<<<< HEAD
        return 'button';
=======
        return __NAMESPACE__.'\ButtonType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
<<<<<<< HEAD
=======
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        return 'reset';
    }
}
