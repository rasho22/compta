<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Fixtures;

use Symfony\Component\Form\AbstractType;

class FooSubType extends AbstractType
{
<<<<<<< HEAD
    public function getName()
    {
        return 'foo_sub_type';
    }

    public function getParent()
    {
        return 'foo';
=======
    public function getParent()
    {
        return __NAMESPACE__.'\FooType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
