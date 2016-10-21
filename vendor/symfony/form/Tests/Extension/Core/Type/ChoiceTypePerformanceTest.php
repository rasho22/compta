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

use Symfony\Component\Form\Test\FormPerformanceTestCase;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ChoiceTypePerformanceTest extends FormPerformanceTestCase
{
    /**
     * This test case is realistic in collection forms where each
     * row contains the same choice field.
     *
     * @group benchmark
     */
    public function testSameChoiceFieldCreatedMultipleTimes()
    {
        $this->setMaxRunningTime(1);
        $choices = range(1, 300);

        for ($i = 0; $i < 100; ++$i) {
<<<<<<< HEAD
            $this->factory->create('choice', mt_rand(1, 400), array(
=======
            $this->factory->create('Symfony\Component\Form\Extension\Core\Type\ChoiceType', mt_rand(1, 400), array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                'choices' => $choices,
            ));
        }
    }
}
