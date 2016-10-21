<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\PropertyAccess;

/**
 * Entry point of the PropertyAccess component.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
final class PropertyAccess
{
    /**
     * Creates a property accessor with the default configuration.
     *
     * @return PropertyAccessor The new property accessor
     */
    public static function createPropertyAccessor()
    {
        return self::createPropertyAccessorBuilder()->getPropertyAccessor();
    }

    /**
     * Creates a property accessor builder.
     *
     * @return PropertyAccessorBuilder The new property accessor builder
     */
    public static function createPropertyAccessorBuilder()
    {
        return new PropertyAccessorBuilder();
    }

    /**
<<<<<<< HEAD
     * Alias of {@link createPropertyAccessor}.
     *
     * @return PropertyAccessor The new property accessor
     *
     * @deprecated since version 2.3, to be removed in 3.0.
     *             Use {@link createPropertyAccessor()} instead.
     */
    public static function getPropertyAccessor()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 2.3 and will be removed in 3.0. Use the createPropertyAccessor() method instead.', E_USER_DEPRECATED);

        return self::createPropertyAccessor();
    }

    /**
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     * This class cannot be instantiated.
     */
    private function __construct()
    {
    }
}
