<?php

/*
 * This file is part of Twig.
 *
 * (c) 2012 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Internal class.
 *
 * This class is used by Twig_Environment as a staging area and must not be used directly.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
=======
 *
 * @internal
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
 */
class Twig_Extension_Staging extends Twig_Extension
{
    protected $functions = array();
    protected $filters = array();
    protected $visitors = array();
    protected $tokenParsers = array();
    protected $globals = array();
    protected $tests = array();

    public function addFunction($name, $function)
    {
        $this->functions[$name] = $function;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getFunctions()
    {
        return $this->functions;
    }

    public function addFilter($name, $filter)
    {
        $this->filters[$name] = $filter;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getFilters()
    {
        return $this->filters;
    }

    public function addNodeVisitor(Twig_NodeVisitorInterface $visitor)
    {
        $this->visitors[] = $visitor;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getNodeVisitors()
    {
        return $this->visitors;
    }

    public function addTokenParser(Twig_TokenParserInterface $parser)
    {
        $this->tokenParsers[] = $parser;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getTokenParsers()
    {
        return $this->tokenParsers;
    }

    public function addGlobal($name, $value)
    {
        $this->globals[$name] = $value;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getGlobals()
    {
        return $this->globals;
    }

    public function addTest($name, $test)
    {
        $this->tests[$name] = $test;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getTests()
    {
        return $this->tests;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getName()
    {
        return 'staging';
    }
}
