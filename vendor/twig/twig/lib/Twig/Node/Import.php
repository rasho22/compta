<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Represents an import node.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Twig_Node_Import extends Twig_Node
{
    public function __construct(Twig_Node_Expression $expr, Twig_Node_Expression $var, $lineno, $tag = null)
    {
        parent::__construct(array('expr' => $expr, 'var' => $var), array(), $lineno, $tag);
    }

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
            ->addDebugInfo($this)
            ->write('')
            ->subcompile($this->getNode('var'))
            ->raw(' = ')
        ;

        if ($this->getNode('expr') instanceof Twig_Node_Expression_Name && '_self' === $this->getNode('expr')->getAttribute('name')) {
            $compiler->raw('$this');
        } else {
            $compiler
                ->raw('$this->loadTemplate(')
                ->subcompile($this->getNode('expr'))
                ->raw(', ')
<<<<<<< HEAD
                ->repr($compiler->getFilename())
=======
                ->repr($this->getFilename())
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                ->raw(', ')
                ->repr($this->getLine())
                ->raw(')')
            ;
        }

        $compiler->raw(";\n");
    }
}
