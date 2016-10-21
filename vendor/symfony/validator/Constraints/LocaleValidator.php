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

use Symfony\Component\Intl\Intl;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Validates whether a value is a valid locale code.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class LocaleValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Locale) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\Locale');
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $value = (string) $value;
        $locales = Intl::getLocaleBundle()->getLocaleNames();
        $aliases = Intl::getLocaleBundle()->getAliases();

        if (!isset($locales[$value]) && !in_array($value, $aliases)) {
            if ($this->context instanceof ExecutionContextInterface) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', $this->formatValue($value))
<<<<<<< HEAD
=======
                    ->setCode(Locale::NO_SUCH_LOCALE_ERROR)
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                    ->addViolation();
            } else {
                $this->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', $this->formatValue($value))
<<<<<<< HEAD
=======
                    ->setCode(Locale::NO_SUCH_LOCALE_ERROR)
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                    ->addViolation();
            }
        }
    }
}
