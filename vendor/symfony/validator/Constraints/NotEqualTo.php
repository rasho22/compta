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
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Daniel Holmes <daniel@danielholmes.org>
<<<<<<< HEAD
 */
class NotEqualTo extends AbstractComparison
{
=======
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class NotEqualTo extends AbstractComparison
{
    const IS_EQUAL_ERROR = 'aa2e33da-25c8-4d76-8c6c-812f02ea89dd';

    protected static $errorNames = array(
        self::IS_EQUAL_ERROR => 'IS_EQUAL_ERROR',
    );

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public $message = 'This value should not be equal to {{ compared_value }}.';
}
