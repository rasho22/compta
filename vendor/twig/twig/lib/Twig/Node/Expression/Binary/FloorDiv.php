<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Twig_Node_Expression_Binary_FloorDiv extends Twig_Node_Expression_Binary
{
<<<<<<< HEAD
    /**
     * Compiles the node to PHP.
     *
     * @param Twig_Compiler $compiler A Twig_Compiler instance
     */
    public function compile(Twig_Compiler $compiler)
    {
        $compiler->raw('intval(floor(');
        parent::compile($compiler);
        $compiler->raw('))');
=======
    public function compile(Twig_Compiler $compiler)
    {
        $compiler->raw('(int) floor(');
        parent::compile($compiler);
        $compiler->raw(')');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function operator(Twig_Compiler $compiler)
    {
        return $compiler->raw('/');
    }
}
