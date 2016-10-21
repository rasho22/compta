<?php

/**
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Ricard Clau <ricard.clau@gmail.com>
 */
class Twig_Extensions_Extension_Array extends Twig_Extension
{
    /**
<<<<<<< HEAD
     * Returns a list of filters.
     *
     * @return array
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getFilters()
    {
        $filters = array(
             new Twig_SimpleFilter('shuffle', 'twig_shuffle_filter'),
        );

        return $filters;
    }
<<<<<<< HEAD
    /**
     * Name of this extension.
     *
     * @return string
=======

    /**
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getName()
    {
        return 'array';
    }
}

/**
 * Shuffles an array.
 *
 * @param array|Traversable $array An array
 *
 * @return array
 */
function twig_shuffle_filter($array)
{
    if ($array instanceof Traversable) {
        $array = iterator_to_array($array, false);
    }

    shuffle($array);

    return $array;
}
