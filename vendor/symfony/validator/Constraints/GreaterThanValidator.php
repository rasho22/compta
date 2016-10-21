<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Constraints;

/**
 * Validates values are greater than the previous (>).
 *
 * @author Daniel Holmes <daniel@danielholmes.org>
<<<<<<< HEAD
=======
 * @author Bernhard Schussek <bschussek@gmail.com>
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
 */
class GreaterThanValidator extends AbstractComparisonValidator
{
    /**
     * {@inheritdoc}
     */
    protected function compareValues($value1, $value2)
    {
        return $value1 > $value2;
    }
<<<<<<< HEAD
=======

    /**
     * {@inheritdoc}
     */
    protected function getErrorCode()
    {
        return GreaterThan::TOO_LOW_ERROR;
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
