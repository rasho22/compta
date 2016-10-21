<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\Twig\Node;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FormThemeNode extends \Twig_Node
{
    public function __construct(\Twig_Node $form, \Twig_Node $resources, $lineno, $tag = null)
    {
        parent::__construct(array('form' => $form, 'resources' => $resources), array(), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param \Twig_Compiler $compiler A Twig_Compiler instance
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
<<<<<<< HEAD
            ->write('$this->env->getExtension(\'form\')->renderer->setTheme(')
=======
            ->write('$this->env->getExtension(\'Symfony\Bridge\Twig\Extension\FormExtension\')->renderer->setTheme(')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->subcompile($this->getNode('form'))
            ->raw(', ')
            ->subcompile($this->getNode('resources'))
            ->raw(");\n");
    }
}
