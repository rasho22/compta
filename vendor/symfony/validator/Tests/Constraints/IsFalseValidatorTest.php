<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Tests\Constraints;

use Symfony\Component\Validator\Constraints\IsFalse;
use Symfony\Component\Validator\Constraints\IsFalseValidator;
use Symfony\Component\Validator\Validation;

class IsFalseValidatorTest extends AbstractConstraintValidatorTest
{
    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5;
    }

    protected function createValidator()
    {
        return new IsFalseValidator();
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, new IsFalse());

        $this->assertNoViolation();
    }

    public function testFalseIsValid()
    {
        $this->validator->validate(false, new IsFalse());

        $this->assertNoViolation();
    }

    public function testTrueIsInvalid()
    {
        $constraint = new IsFalse(array(
            'message' => 'myMessage',
        ));

        $this->validator->validate(true, $constraint);

        $this->buildViolation('myMessage')
            ->setParameter('{{ value }}', 'true')
<<<<<<< HEAD
=======
            ->setCode(IsFalse::NOT_FALSE_ERROR)
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->assertRaised();
    }
}
