<?php

/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Represents a trans node.
 *
<<<<<<< HEAD
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
=======
 * @author Fabien Potencier <fabien.potencier@symfony-project.com>
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
 */
class Twig_Extensions_Node_Trans extends Twig_Node
{
    public function __construct(Twig_Node $body, Twig_Node $plural = null, Twig_Node_Expression $count = null, Twig_Node $notes = null, $lineno, $tag = null)
    {
<<<<<<< HEAD
        parent::__construct(array('count' => $count, 'body' => $body, 'plural' => $plural, 'notes' => $notes), array(), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param Twig_Compiler $compiler A Twig_Compiler instance
=======
        $nodes = array('body' => $body);
        if (null !== $count) {
            $nodes['count'] = $count;
        }
        if (null !== $plural) {
            $nodes['plural'] = $plural;
        }
        if (null !== $notes) {
            $nodes['notes'] = $notes;
        }

        parent::__construct($nodes, array(), $lineno, $tag);
    }

    /**
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function compile(Twig_Compiler $compiler)
    {
        $compiler->addDebugInfo($this);

        list($msg, $vars) = $this->compileString($this->getNode('body'));

<<<<<<< HEAD
        if (null !== $this->getNode('plural')) {
=======
        if ($this->hasNode('plural')) {
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            list($msg1, $vars1) = $this->compileString($this->getNode('plural'));

            $vars = array_merge($vars, $vars1);
        }

<<<<<<< HEAD
        $function = null === $this->getNode('plural') ? 'gettext' : 'ngettext';

        if (null !== $notes = $this->getNode('notes')) {
            $message = trim($notes->getAttribute('data'));
=======
        $function = !$this->hasNode('plural') ? 'gettext' : 'ngettext';

        if ($this->hasNode('notes')) {
            $message = trim($this->getNode('notes')->getAttribute('data'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

            // line breaks are not allowed cause we want a single line comment
            $message = str_replace(array("\n", "\r"), ' ', $message);
            $compiler->write("// notes: {$message}\n");
        }

        if ($vars) {
            $compiler
                ->write('echo strtr('.$function.'(')
                ->subcompile($msg)
            ;

<<<<<<< HEAD
            if (null !== $this->getNode('plural')) {
=======
            if ($this->hasNode('plural')) {
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                $compiler
                    ->raw(', ')
                    ->subcompile($msg1)
                    ->raw(', abs(')
<<<<<<< HEAD
                    ->subcompile($this->getNode('count'))
=======
                    ->subcompile($this->hasNode('count') ? $this->getNode('count') : null)
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                    ->raw(')')
                ;
            }

            $compiler->raw('), array(');

            foreach ($vars as $var) {
                if ('count' === $var->getAttribute('name')) {
                    $compiler
                        ->string('%count%')
                        ->raw(' => abs(')
<<<<<<< HEAD
                        ->subcompile($this->getNode('count'))
=======
                        ->subcompile($this->hasNode('count') ? $this->getNode('count') : null)
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                        ->raw('), ')
                    ;
                } else {
                    $compiler
                        ->string('%'.$var->getAttribute('name').'%')
                        ->raw(' => ')
                        ->subcompile($var)
                        ->raw(', ')
                    ;
                }
            }

            $compiler->raw("));\n");
        } else {
            $compiler
                ->write('echo '.$function.'(')
                ->subcompile($msg)
            ;

<<<<<<< HEAD
            if (null !== $this->getNode('plural')) {
=======
            if ($this->hasNode('plural')) {
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                $compiler
                    ->raw(', ')
                    ->subcompile($msg1)
                    ->raw(', abs(')
<<<<<<< HEAD
                    ->subcompile($this->getNode('count'))
=======
                    ->subcompile($this->hasNode('count') ? $this->getNode('count') : null)
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
                    ->raw(')')
                ;
            }

            $compiler->raw(");\n");
        }
    }

    /**
     * @param Twig_Node $body A Twig_Node instance
     *
     * @return array
     */
    protected function compileString(Twig_Node $body)
    {
        if ($body instanceof Twig_Node_Expression_Name || $body instanceof Twig_Node_Expression_Constant || $body instanceof Twig_Node_Expression_TempName) {
            return array($body, array());
        }

        $vars = array();
        if (count($body)) {
            $msg = '';

            foreach ($body as $node) {
                if (get_class($node) === 'Twig_Node' && $node->getNode(0) instanceof Twig_Node_SetTemp) {
                    $node = $node->getNode(1);
                }

                if ($node instanceof Twig_Node_Print) {
                    $n = $node->getNode('expr');
                    while ($n instanceof Twig_Node_Expression_Filter) {
                        $n = $n->getNode('node');
                    }
                    $msg .= sprintf('%%%s%%', $n->getAttribute('name'));
                    $vars[] = new Twig_Node_Expression_Name($n->getAttribute('name'), $n->getLine());
                } else {
                    $msg .= $node->getAttribute('data');
                }
            }
        } else {
            $msg = $body->getAttribute('data');
        }

        return array(new Twig_Node(array(new Twig_Node_Expression_Constant(trim($msg), $body->getLine()))), $vars);
    }
}
