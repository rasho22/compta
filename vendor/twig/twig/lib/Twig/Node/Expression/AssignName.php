<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 * (c) 2009 Armin Ronacher
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Twig_Node_Expression_AssignName extends Twig_Node_Expression_Name
{
<<<<<<< HEAD
    /**
     * Compiles the node to PHP.
     *
     * @param Twig_Compiler $compiler A Twig_Compiler instance
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function compile(Twig_Compiler $compiler)
    {
        $compiler
            ->raw('$context[')
            ->string($this->getAttribute('name'))
            ->raw(']')
        ;
    }
}
