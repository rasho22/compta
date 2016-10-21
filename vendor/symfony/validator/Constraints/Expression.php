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

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"CLASS", "PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class Expression extends Constraint
{
<<<<<<< HEAD
=======
    const EXPRESSION_FAILED_ERROR = '6b3befbc-2f01-4ddf-be21-b57898905284';

    protected static $errorNames = array(
        self::EXPRESSION_FAILED_ERROR => 'EXPRESSION_FAILED_ERROR',
    );

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public $message = 'This value is not valid.';
    public $expression;

    /**
     * {@inheritdoc}
     */
    public function getDefaultOption()
    {
        return 'expression';
    }

    /**
     * {@inheritdoc}
     */
    public function getRequiredOptions()
    {
        return array('expression');
    }

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return array(self::CLASS_CONSTRAINT, self::PROPERTY_CONSTRAINT);
    }

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'validator.expression';
    }
}
