<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
=======
@trigger_error('The Twig_Node_Expression_ExtensionReference class is deprecated since version 1.23 and will be removed in 2.0.', E_USER_DEPRECATED);

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
/**
 * Represents an extension call node.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
=======
 *
 * @deprecated since 1.23 and will be removed in 2.0.
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
 */
class Twig_Node_Expression_ExtensionReference extends Twig_Node_Expression
{
    public function __construct($name, $lineno, $tag = null)
    {
        parent::__construct(array(), array('name' => $name), $lineno, $tag);
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
        $compiler->raw(sprintf("\$this->env->getExtension('%s')", $this->getAttribute('name')));
    }
}
