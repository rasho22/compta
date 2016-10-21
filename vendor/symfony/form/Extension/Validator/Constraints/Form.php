<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Extension\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class Form extends Constraint
{
<<<<<<< HEAD
    const NOT_SYNCHRONIZED_ERROR = 1;
    const NO_SUCH_FIELD_ERROR = 2;
=======
    const NOT_SYNCHRONIZED_ERROR = '1dafa156-89e1-4736-b832-419c2e501fca';
    const NO_SUCH_FIELD_ERROR = '6e5212ed-a197-4339-99aa-5654798a4854';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

    /**
     * @deprecated since version 2.6, to be removed in 3.0.
     *             Use {@self NOT_SYNCHRONIZED_ERROR} instead.
     */
<<<<<<< HEAD
    const ERR_INVALID = 1;
=======
    const ERR_INVALID = self::NOT_SYNCHRONIZED_ERROR;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

    protected static $errorNames = array(
        self::NOT_SYNCHRONIZED_ERROR => 'NOT_SYNCHRONIZED_ERROR',
        self::NO_SUCH_FIELD_ERROR => 'NO_SUCH_FIELD_ERROR',
    );

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
